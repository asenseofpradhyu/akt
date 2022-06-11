

<?php
class ProductModel
{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}


	public function getProductList($data)
	{
		$sub_links = $this->getNavSearchCategories($data['id']);
		$sub_ids = [];
		if (count($sub_links) > 0) {
			foreach ($sub_links as $key => $sl) {
				$sub_ids[] = $sl->sub_menu_id;
			}
		} else {
			$sub_ids[] = $data['id'];
		}
		$sub_id_string = implode(',', $sub_ids);

		$query = 'SELECT image_data.images, product_detail.product_id, product_detail.product_name, product_detail.discount_price FROM product_detail INNER JOIN image_data ON product_detail.product_id = image_data.product_id WHERE product_detail.sub_menu_id in (' . $sub_id_string . ') ';
		if (isset($data['search_query']) && !empty($data['search_query'])) {
			$query .= 'AND product_detail.product_name LIKE :search_query';
		}
		$query .= ' GROUP BY image_data.product_id HAVING COUNT(image_data.product_id) > 1';
		$this->db->query($query);
		// Bind values
		if (isset($data['search_query']) && !empty($data['search_query'])) {
			$this->db->bind(':search_query', '%' . $data['search_query'] . '%');
		}
		// $this->db->query('SELECT image_data.images, product_detail.product_id, product_detail.product_name, product_detail.discount_price FROM product_detail INNER JOIN image_data ON product_detail.product_id = image_data.product_id WHERE product_detail.sub_menu_id = :id GROUP BY image_data.product_id HAVING COUNT(image_data.product_id) > 1');
		// // Bind values
		// $this->db->bind(':id', $id);
		$results = $this->db->resultSet();
		return $results;
	}

	public function getProductDetail($id)
	{

		$this->db->query('SELECT * FROM product_detail WHERE product_id = :id');
		// Bind value
		$this->db->bind(':id', $id);
		$row = $this->db->single();
		return $row;
	}

	public function getProductImages($id)
	{
		$this->db->query('SELECT * FROM image_data WHERE product_id = :id');
		// Bind value
		$this->db->bind(':id', $id);
		$results = $this->db->resultSet();
		return $results;
	}

	public function getProductSingleImg($id)
	{

		$this->db->query('SELECT images FROM image_data WHERE product_id = :id GROUP BY product_id HAVING COUNT(product_id) > 1');
		// Bind values
		$this->db->bind(':id', $id);
		$row = $this->db->single();
		return $row;
	}

	public function getProductColor($id)
	{

		$this->db->query('SELECT color.color, image_data.color_id FROM image_data INNER JOIN color ON image_data.color_id = color.color_id WHERE product_id = :id GROUP BY image_data.color_id HAVING COUNT(image_data.color_id) > 1');
		// Bind value
		$this->db->bind(':id', $id);
		$results = $this->db->resultSet();
		return $results;
	}

	public function getCartProductSingleImg($id)
	{

		$con = DbConnect();

		$this->db->query('SELECT cart.*, product_detail.product_name, product_detail.discount_price, product_detail.stock, color.color, image_data.images, sizes.title AS size_title FROM image_data INNER JOIN product_detail ON product_detail.product_id = image_data.product_id INNER JOIN cart ON cart.product_id = image_data.product_id INNER JOIN color ON color.color_id = cart.color_id INNER JOIN sizes ON cart.size_id = sizes.id WHERE cart.customer_id = :id GROUP BY cart.product_id, cart.color_id, cart.size_id');

		$this->db->bind(':id', $id);
		$row = $this->db->resultSet();


		return $row;
	}

	public function getSimilarProducts($sub_menu_id)
	{
		$this->db->query('SELECT pd.product_id, pd.product_name, pd.sub_menu_id, pd.total_price, pd.discount_price, CONCAT("[", GROUP_CONCAT(JSON_OBJECT("image_id", ID.image_id, "color_id", ID.color_id, "image", ID.images)),"]") AS images FROM product_detail AS pd LEFT JOIN image_data AS ID ON pd.product_id = ID.product_id WHERE sub_menu_id= :sub_menu_id GROUP BY pd.product_id Order By RAND() LIMIT 10');
		$this->db->bind(':sub_menu_id', $sub_menu_id);
		$row = $this->db->resultSet();
		return $row;
	}

	public function getNavSearchCategories($id = 0)
	{
		$query = 'SELECT * FROM sub_menu';
		if ($id != 0) {
			$query .= ' where sub_menu_links = :id';
		}
		// die(print_r($query));
		$this->db->query($query);
		if ($id != 0) {
			$this->db->bind(':id', $id);
		}
		$titles = $this->db->resultSet();
		// die(print_r($titles));
		return $titles;
	}

	public function saveBasicOrder(array $param)
	{
		$keys = implode(',', array_keys($param));
		$values = implode("','", array_values($param));
		$query = "INSERT INTO product_orders ($keys) VALUES ('$values')";
		$this->db->query($query);
		return $this->db->execute(true);
	}

	public function moveCartToOrderDetails(array $param)
	{
		$login_user_id = $param['user_id'];
		$this->db->query("SELECT * FROM cart WHERE customer_id = $login_user_id");
		$count = $this->db->rowCount();
		$carts = $this->db->resultSet();

		// now remove cart from customer
		$this->db->query("DELETE FROM cart WHERE customer_id = $login_user_id");
		$this->db->execute();

		// carts move to order details and remove quantity from stock
		$query_array = [];
		foreach ($carts as $key => $cart_array) {
			$query_array[] = "(" . $param['order_id'] . ", " . $cart_array->product_id . ", " . $cart_array->qnty . ", " . $cart_array->color_id . ", " . $cart_array->size_id . ")";

			// change quantity after product bought
			$this->replaceQuantityProduct($cart_array);
		}
		$query_array = implode(', ', $query_array);
		$final_insert = (($count > 1) ? "($query_array)" : $query_array);
		$insert_query = "INSERT INTO order_details(order_id, product_id, quantity, color_id, size_id) VALUES $final_insert";
		$this->db->query($insert_query);
		return $this->db->execute(true);
	}

	public function replaceQuantityProduct(object &$cart_detail)
	{
		$this->db->query("UPDATE product_detail SET stock=stock- " . $cart_detail->qnty . " WHERE product_id=" . $cart_detail->product_id);
		$this->db->execute();
		return true;
	}

	public function getPurchasedProductDetails(int $orderId)
	{
		$query = "SELECT detail.product_name, detail.discount_price, ord.quantity, ord.size_id, c.color, detail.product_code FROM product_orders INNER JOIN order_details AS ord ON product_orders.id=ord.order_id INNER JOIN product_detail AS detail ON ord.product_id = detail.product_id INNER JOIN color AS c ON ord.color_id = c.color_id WHERE product_orders.id= $orderId";
		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function getShippingDetail(int $orderId)
	{
		$query = "SELECT ship.*, p.purchase_json, s.name AS state_name, c.name AS country_name FROM product_orders INNER JOIN shipping_info AS ship ON product_orders.shipping_address_id=ship.id INNER JOIN purchases AS p ON product_orders.purchase_id=p.id INNER JOIN states AS s ON ship.state_id=s.id INNER JOIN countries AS c ON ship.country_id=c.id WHERE product_orders.id= $orderId";
		$this->db->query($query);
		return $this->db->single();
	}

	public function getFilteredProducts(array $parambag){
		extract($parambag);
		$sub_links = $this->getNavSearchCategories($category);
		$sub_ids = [];
		if (count($sub_links) > 0) {
			foreach ($sub_links as $key => $sl) {
				$sub_ids[] = $sl->sub_menu_id;
			}
		} else {
			$sub_ids[] = $category;
		}
		$sub_id_string = implode(',', $sub_ids);

		$query = 'SELECT image_data.images, product_detail.product_id, product_detail.product_name, product_detail.discount_price FROM product_detail INNER JOIN image_data ON product_detail.product_id = image_data.product_id
		INNER JOIN product_has_inventory AS phi ON product_detail.product_id = phi.product_id AND phi.is_deleted=0 WHERE product_detail.sub_menu_id in (' . $sub_id_string . ') ';
		// print_r($colors);die();
		if (isset($colors) && !empty($colors)) {
			$query .= "AND phi.color_id IN(".implode(',', $colors).")";
		}
		if (isset($sizes) && !empty($sizes)) {
			$query .= "AND phi.size_id IN(".implode(',', $sizes).")";
		}
		if (isset($maximum_price) && !empty($maximum_price)) {
			$query .= "AND product_detail.discount_price <= $maximum_price ";
		}
		if (isset($minimum_price) && !empty($minimum_price)) {
			$query .= "AND product_detail.discount_price >= $minimum_price ";
		}
		if(isset($search_query) && !empty($search_query)){
			$query .= "AND product_detail.product_name LIKE '%$search_query%'";
		}
		$query .= ' GROUP BY image_data.product_id';
		if(!empty($sort_by)){
			$orderBy = $this->getOrderBy($sort_by);
			$query .= " ORDER BY $orderBy";
		}
		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function getOrderBy($sort_by){
		$orderBy = '';
		switch ($sort_by) {
			case 'price_low_high':
				$orderBy = 'product_detail.discount_price ASC';
				break;
			case 'price_high_low':
				$orderBy = 'product_detail.discount_price DESC';
				break;
			case 'name_a_z':
				$orderBy = 'product_detail.product_name ASC';
				break;
			case 'name_z_a':
				$orderBy = 'product_detail.product_name DESC';
				break;
			default:
				$orderBy = 'product_detail.product_name ASC';
				break;
		}
		return $orderBy;
	}

	public function getPurchaseReport($user_id)
	{
		$getOrders = <<<productList
	select
	product_orders.purchase_date,
	product_detail.product_name,
	sizes.title AS size,
	color.color,
	order_details.quantity
	from
	product_orders
	INNER JOIN order_details ON product_orders.id = order_details.order_id
	INNER JOIN product_detail ON order_details.product_id = product_detail.product_id
	INNER JOIN purchases ON product_orders.purchase_id = purchases.id
	INNER JOIN sizes ON order_details.size_id = sizes.id
	INNER JOIN color ON order_details.color_id = color.color_id
	WHERE product_orders.user_id= :user_id
	group by product_orders.purchase_date
	order by product_orders.purchase_date DESC;
productList;

		$this->db->query($getOrders);
		$this->db->bind(':user_id', $user_id);
		return $this->db->resultSet();
	}

}



?>