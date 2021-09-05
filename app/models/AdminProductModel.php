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

    $this->db->query('INSERT INTO product_detail (product_name, product_desc, main_menu_id, sub_menu_id, total_price, discount_price, product_code, stock, size, color, length, garment, neck, fabric, occasion, design_type, d_inclusive, d_not_inclusive, care, style_tip)  
                                            VALUES(:product_name, :product_desc, :main_menu_id, :sub_menu_id, :total_price, :discount_price, :product_code, :stock, :size, :color, :length, :garment, :neck, :fabric, :occasion, :design_type, :d_inclusive, :d_not_inclusive, :care, :style_tip, 1, NOW())');
    // Bind values
    $this->db->bind(':product_name', $data['productname']);
    $this->db->bind(':product_desc', $data['productdesc']);
    $this->db->bind(':main_menu_id', $data['mainnav']);
    $this->db->bind(':sub_menu_id', $data['subnav']);
    $this->db->bind(':total_price', $data['totalprice']);
    $this->db->bind(':discount_price', $data['discountprice']);
    $this->db->bind(':product_code', $data['code']);
    $this->db->bind(':stock', $data['stock']);
    $this->db->bind(':size', $data['size']);
    $this->db->bind(':color', $data['color']);
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

  public function getProductDetailbyId($id){

    $this->db->query('SELECT * FROM product_detail WHERE product_id = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;

  }

  public function UpdateProduct($data)
  {

    $this->db->query('UPDATE product_detail SET product_name = :product_name, product_desc = :product_desc, main_menu_id = :main_menu_id, sub_menu_id = :sub_menu_id, total_price = :total_price, discount_price = :discount_price, product_code = :product_code, stock = :stock, size = :size, color = :color, length = :length, garment = :garment, neck = :neck, fabric = :fabric, occasion = :occasion, design_type = :design_type, d_inclusive = :d_inclusive, d_not_inclusive = :d_not_inclusive, care = :care, style_tip = :style_tip WHERE product_id = :id');
    // Bind values
    $this->db->bind(':product_name', $data['productname']);
    $this->db->bind(':product_desc', $data['productdesc']);
    $this->db->bind(':main_menu_id', $data['mainnav']);
    $this->db->bind(':sub_menu_id', $data['subnav']);
    $this->db->bind(':total_price', $data['totalprice']);
    $this->db->bind(':discount_price', $data['discountprice']);
    $this->db->bind(':product_code', $data['code']);
    $this->db->bind(':stock', $data['stock']);
    $this->db->bind(':size', $data['size']);
    $this->db->bind(':color', $data['color']);
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

  
  public function getSizes(){
    $query = "SELECT * FROM sizes";
    $this->db->query($query);
    return $this->db->resultSet();
  }


}
