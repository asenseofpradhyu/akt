

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

    $query = 'SELECT image_data.images, product_detail.product_id, product_detail.product_name, product_detail.discount_price FROM product_detail INNER JOIN image_data ON product_detail.product_id = image_data.product_id WHERE product_detail.sub_menu_id in ('.$sub_id_string.') ';
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

    $this->db->query('SELECT cart.*, product_detail.product_name, product_detail.discount_price, product_detail.stock, color.color, image_data.images FROM image_data INNER JOIN product_detail ON product_detail.product_id = image_data.product_id INNER JOIN color ON color.color_id = image_data.color_id INNER JOIN cart ON cart.product_id = image_data.product_id WHERE cart.customer_id = :id GROUP BY image_data.product_id HAVING COUNT(image_data.product_id) > 1');

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
    if($id !=0){
      $query .= ' where sub_menu_links = :id';
    }
    // die(print_r($query));
    $this->db->query($query);
    if($id!=0){
      $this->db->bind(':id', $id);
    }
    $titles = $this->db->resultSet();
    // die(print_r($titles));
    return $titles;
  }

  public function saveBasicOrder(array $param){
      $keys = implode(array_keys($param));
      $values = implode(array_values($param));
      $query = "INSERT INTO product_orders ($keys) VALUES ($values)";
      $this->db->query($query);
      return $this->db->execute();
  }

}



?>