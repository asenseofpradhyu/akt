<?php
class AdminProductModel
{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}


	public function AddProduct($data)
	{

		$this->db->query('INSERT INTO product_detail (product_name, product_desc, main_menu_id, sub_menu_id, total_price, discount_price, product_code, length, garment, neck, fabric, occasion, design_type, d_inclusive, d_not_inclusive, care, style_tip, status, created_date)  
                                            VALUES(:product_name, :product_desc, :main_menu_id, :sub_menu_id, :total_price, :discount_price, :product_code, :length, :garment, :neck, :fabric, :occasion, :design_type, :d_inclusive, :d_not_inclusive, :care, :style_tip, 1, NOW())');
		// Bind values
		$this->db->bind(':product_name', $data['productname']);
		$this->db->bind(':product_desc', $data['productdesc']);
		$this->db->bind(':main_menu_id', $data['mainnav']);
		$this->db->bind(':sub_menu_id', $data['subnav']);
		$this->db->bind(':total_price', $data['totalprice']);
		$this->db->bind(':discount_price', $data['discountprice']);
		$this->db->bind(':product_code', $data['code']);
		$this->db->bind(':length', $data['length']);
		$this->db->bind(':garment', $data['garment']);
		$this->db->bind(':neck', $data['neck']);
		$this->db->bind(':fabric', $data['fabric']);
		$this->db->bind(':occasion', $data['occasion']);
		$this->db->bind(':design_type', $data['design']);
		$this->db->bind(':d_inclusive', $data['inclusive']);
		$this->db->bind(':d_not_inclusive', $data['notinclusive']);
		$this->db->bind(':care', $data['care']);
		$this->db->bind(':style_tip', $data['style']);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function getProductName()
	{

		$this->db->query('SELECT product_id, product_name FROM product_detail');
		$results = $this->db->resultSet();
		return $results;
	}

	public function AddProductImages($data)
	{

		$data['imgFile'] = strstr($data['imgFile'], "/public");

		$this->db->query('INSERT INTO image_data (product_id, color_id, images, created_date) VALUES(:product_id, :color_id, :images, NOW())');
		// Bind values
		$this->db->bind(':product_id', $data['product']);
		$this->db->bind(':color_id', $data['color']);
		$this->db->bind(':images', $data['imgFile']);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function GetImages()
	{
		$this->db->query('SELECT product_detail.product_name, color.color, image_data.images, image_data.product_id, image_data.color_id, image_data.image_id FROM image_data INNER JOIN product_detail ON product_detail.product_id = image_data.product_id INNER JOIN color ON image_data.color_id = color.color_id GROUP BY image_data.product_id, color.color_id');
		$results = $this->db->resultSet();
		return $results;
	}

	public function updateProductImages($data)
	{

		$data['imgFile'] = strstr($data['imgFile'], "/public");
		$this->db->query('UPDATE image_data SET images = :images WHERE image_id = :id');
		// Bind values
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':images', $data['imgFile']);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}







	// Colors
	public function getColors()
	{
		$this->db->query('SELECT * FROM color');
		$results = $this->db->resultSet();
		return $results;
	}

	public function AddColor($data)
	{

		$this->db->query('INSERT INTO color (color) VALUES(:color)');
		// Bind values
		$this->db->bind(':color', $data['color']);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteColor($id)
	{
		$this->db->query('DELETE FROM color WHERE color_id = :id');
		// Bind values
		$this->db->bind(':id', $id);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteproductimage($id)
	{
		$this->db->query('DELETE FROM image_data WHERE image_id = :id');
		// Bind values
		$this->db->bind(':id', $id);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}


	public function getproductListData()
	{
		$this->db->query('SELECT product_detail.*, main_menu.main_menu_name, sub_menu.sub_menu_name FROM sub_menu INNER JOIN product_detail ON product_detail.sub_menu_id = sub_menu.sub_menu_id INNER JOIN main_menu ON product_detail.main_menu_id = main_menu.main_menu_id');
		$results = $this->db->resultSet();
		return $results;
	}

	public function getProductDetailbyId($id)
	{

		$this->db->query('SELECT * FROM product_detail WHERE product_id = :id');
		// Bind value
		$this->db->bind(':id', $id);

		$row = $this->db->single();

		return $row;
	}

	public function UpdateProduct($data)
	{

		$this->db->query('UPDATE product_detail SET product_name = :product_name, product_desc = :product_desc, main_menu_id = :main_menu_id, sub_menu_id = :sub_menu_id, total_price = :total_price, discount_price = :discount_price, product_code = :product_code, length = :length, garment = :garment, neck = :neck, fabric = :fabric, occasion = :occasion, design_type = :design_type, d_inclusive = :d_inclusive, d_not_inclusive = :d_not_inclusive, care = :care, style_tip = :style_tip WHERE product_id = :id');
		// Bind values
		$this->db->bind(':product_name', $data['productname']);
		$this->db->bind(':product_desc', $data['productdesc']);
		$this->db->bind(':main_menu_id', $data['mainnav']);
		$this->db->bind(':sub_menu_id', $data['subnav']);
		$this->db->bind(':total_price', $data['totalprice']);
		$this->db->bind(':discount_price', $data['discountprice']);
		$this->db->bind(':product_code', $data['code']);
		$this->db->bind(':length', $data['length']);
		$this->db->bind(':garment', $data['garment']);
		$this->db->bind(':neck', $data['neck']);
		$this->db->bind(':fabric', $data['fabric']);
		$this->db->bind(':occasion', $data['occasion']);
		$this->db->bind(':design_type', $data['design']);
		$this->db->bind(':d_inclusive', $data['inclusive']);
		$this->db->bind(':d_not_inclusive', $data['notinclusive']);
		$this->db->bind(':care', $data['care']);
		$this->db->bind(':style_tip', $data['style']);
		$this->db->bind(':id', $data['id']);

		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function getSizes()
	{
		$query = "SELECT * FROM sizes";
		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function getPurchaseReportAllUsers()
	{
		$getOrders ="select	product_orders.purchase_date, product_detail.product_name, sizes.title AS size, color.color, order_details.quantity, users.customer_name, users.customer_email, users.customer_phone from product_orders INNER JOIN order_details ON product_orders.id = order_details.order_id INNER JOIN product_detail ON order_details.product_id = product_detail.product_id INNER JOIN purchases ON product_orders.purchase_id = purchases.id INNER JOIN sizes ON order_details.size_id = sizes.id INNER JOIN color ON order_details.color_id = color.color_id INNER JOIN customer_account AS users ON product_orders.user_id = users.customer_id group by product_orders.purchase_date order by product_orders.purchase_date DESC";

		$this->db->query($getOrders);
		return $this->db->resultSet();
	}

	public function getInventoryList($product_id)
	{
		$this->db->query('SELECT c.color, s.title AS size, phi.id, phi.stock FROM product_has_inventory as phi INNER JOIN color AS c ON phi.color_id=c.color_id INNER JOIN sizes AS s ON phi.size_id=s.id WHERE product_id = :product_id AND is_deleted = 0');
		// Bind value
		$this->db->bind(':product_id', $product_id);
		$row = $this->db->resultSet();
		return $row;
	}

	public function updateInventory(array $inventoryModel){
		$query = 'UPDATE product_has_inventory SET stock = :stock, color_id = :color_id, size_id = :size_id WHERE id = :id';
		$this->db->query($query);
		// Bind values
		$this->db->bind(':stock', $inventoryModel['stock']);
		$this->db->bind(':color_id', $inventoryModel['color_id']);
		$this->db->bind(':size_id', $inventoryModel['size_id']);
		$this->db->bind(':id', $inventoryModel['id']);
		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function addInventory(array $inventoryModel){
		$query = 'INSERT INTO product_has_inventory (product_id, stock, color_id, size_id) VALUES (:product_id, :stock, :color_id, :size_id)';
		$this->db->query($query);
		// Bind values
		$this->db->bind(':product_id', $inventoryModel['product_id']);
		$this->db->bind(':stock', $inventoryModel['stock']);
		$this->db->bind(':color_id', $inventoryModel['color_id']);
		$this->db->bind(':size_id', $inventoryModel['size_id']);
		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteInventory($id)
	{
		$query = 'UPDATE product_has_inventory SET is_deleted = 1 WHERE id = :id';
		$this->db->query($query);
		// Bind values
		$this->db->bind(':id', $id);
		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function getInventoryById($id = 0)
	{
		$query = 'SELECT * FROM product_has_inventory WHERE id = :id';
		$this->db->query($query);
		// Bind value
		$this->db->bind(':id', $id);
		return $this->db->single();
	}

	public function getAvailableSizes(int $id)
	{
		$query = "SELECT s.* FROM product_has_inventory AS phi INNER JOIN sizes AS s ON phi.size_id=s.id WHERE product_id = :id AND is_deleted = 0 GROUP BY size_id";
		$this->db->query($query);
		// Bind value
		$this->db->bind(':id', $id);
		return $this->db->resultSet();
	}

	public function getColorsAndStock($product_id, $size_id)
	{
		$query = "SELECT c.*, phi.stock FROM product_has_inventory AS phi INNER JOIN color AS c ON phi.color_id=c.color_id WHERE product_id = :product_id AND size_id = :size_id AND is_deleted = 0";
		$this->db->query($query);
		// Bind value
		$this->db->bind(':product_id', $product_id);
		$this->db->bind(':size_id', $size_id);
		return $this->db->resultSet();
	}

	public function getPurchaseList(){
		$query = "SELECT purchases.*, customer_account.customer_name, customer_account.customer_email, customer_account.customer_phone, product_orders.purchase_date FROM purchases INNER JOIN product_orders ON purchases.id = product_orders.purchase_id INNER JOIN customer_account ON product_orders.user_id = customer_account.customer_id GROUP BY purchases.id";
		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function markAsPaid(int $purchase_id){
		$query = "UPDATE purchases SET payment_status = 1 WHERE id = :purchase_id";
		$this->db->query($query);
		// Bind value
		$this->db->bind(':purchase_id', $purchase_id);
		// Execute
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}
}
