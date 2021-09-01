<?php
class HomepageModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }


  public function getMainSliderList()
  {
    $this->db->query('SELECT index_mainslider.*, sub_menu.sub_menu_name FROM index_mainslider INNER JOIN sub_menu ON sub_menu.sub_menu_id = index_mainslider.sub_menu_id');

    $results = $this->db->resultSet();

    return $results;
  }

  public function deleteMainslider($id)
  {
    $this->db->query('DELETE FROM index_mainslider WHERE index_mainslider_id = :id');
    // Bind values
    $this->db->bind(':id', $id);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function addMainSlider($data)
  {
    $this->db->query('INSERT INTO index_mainslider (sub_menu_id, img) VALUES(:subid, :img)');
    // Bind values
    $this->db->bind(':subid', $data['subNavSelect']);
    $this->db->bind(':img', $data['img']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Get Main Nav by ID
  public function getMainSliderById($id)
  {
    $this->db->query('SELECT * FROM index_mainslider WHERE index_mainslider_id = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function updateMainSlider($data)
  {
    $this->db->query('UPDATE index_mainslider SET sub_menu_id = :subid, img = :img WHERE mainslider_id = :id');
    // Bind values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':subid', $data['subNavSelect']);
    $this->db->bind(':img', $data['img']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Grid Images Model

  public function getgridimagesList()
  {
    $this->db->query('SELECT grid_images.*, sub_menu.sub_menu_name FROM grid_images INNER JOIN sub_menu ON sub_menu.sub_menu_id = grid_images.sub_menu_id');

    $results = $this->db->resultSet();

    return $results;
  }

  public function addGridImages($data)
  {
    $this->db->query('INSERT INTO grid_images (img_title, grid_img, sub_menu_id) VALUES(:imgTitle, :Gridimg, :subMenuID)');
    // Bind values
    $this->db->bind(':imgTitle', $data['title']);
    $this->db->bind(':Gridimg', $data['img']);
    $this->db->bind(':subMenuID', $data['subNavSelect']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Get GridImage by ID
  public function getGridImagesById($id)
  {
    $this->db->query('SELECT * FROM grid_images WHERE gridimages_id = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function updateGridIMages($data)
  {
    $this->db->query('UPDATE grid_images SET img_title = :imgtitle, sub_menu_id = :subid, grid_img = :img WHERE gridimages_id = :id');
    // Bind values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':imgtitle', $data['title']);
    $this->db->bind(':subid', $data['subNavSelect']);
    $this->db->bind(':img', $data['img']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deleteGridImages($id)
  {
    $this->db->query('DELETE FROM grid_images WHERE gridimages_id = :id');
    // Bind values
    $this->db->bind(':id', $id);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


  // Sales Collection

  public function getSalesCollectionList()
  {
    $this->db->query('SELECT index_salescollection.*, sub_menu.sub_menu_name FROM index_salescollection INNER JOIN sub_menu ON sub_menu.sub_menu_id = index_salescollection.sub_menu_id');

    $results = $this->db->resultSet();

    return $results;
  }

  public function addSalesCollection($data)
  {
    $this->db->query('INSERT INTO index_salescollection (sc_name, sub_menu_id, sc_img) VALUES(:imgTitle, :subMenuID, :Gridimg)');
    // Bind values
    $this->db->bind(':imgTitle', $data['title']);
    $this->db->bind(':subMenuID', $data['subNavSelect']);
    $this->db->bind(':Gridimg', $data['img']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function updateSalescollection($data)
  {
    $this->db->query('UPDATE index_salescollection SET sc_name = :imgtitle, sub_menu_id = :subid, sc_img = :img WHERE indexsc_id = :id');
    // Bind values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':imgtitle', $data['title']);
    $this->db->bind(':subid', $data['subNavSelect']);
    $this->db->bind(':img', $data['img']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getSalesCollectionById($id)
  {
    $this->db->query('SELECT * FROM index_salescollection WHERE indexsc_id = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function deleteSalesCollection($id)
  {
    $this->db->query('DELETE FROM index_salescollection WHERE indexsc_id = :id');
    // Bind values
    $this->db->bind(':id', $id);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Accessories 

  public function getAccessoriesList()
  {
    $this->db->query('SELECT index_accessories.*, sub_menu.sub_menu_name FROM index_accessories INNER JOIN sub_menu ON sub_menu.sub_menu_id = index_accessories.sub_menu_id');

    $results = $this->db->resultSet();

    return $results;
  }

  public function addAccessories($data)
  {
    $this->db->query('INSERT INTO index_accessories (acc_name, acc_img, sub_menu_id) VALUES(:imgTitle, :Gridimg, :subMenuID)');
    // Bind values
    $this->db->bind(':imgTitle', $data['title']);
    $this->db->bind(':subMenuID', $data['subNavSelect']);
    $this->db->bind(':Gridimg', $data['img']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getAccessoriesById($id)
  {
    $this->db->query('SELECT * FROM index_accessories WHERE indexacc_id = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function updateAccessories($data)
  {
    $this->db->query('UPDATE index_accessories SET acc_name = :imgtitle, sub_menu_id = :subid, acc_img = :img WHERE indexacc_id = :id');
    // Bind values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':imgtitle', $data['title']);
    $this->db->bind(':subid', $data['subNavSelect']);
    $this->db->bind(':img', $data['img']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deleteAccessories($id)
  {
    $this->db->query('DELETE FROM index_accessories WHERE indexacc_id = :id');
    // Bind values
    $this->db->bind(':id', $id);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


  // Testimonials

  public function getTestimonialsList()
  {
    $this->db->query('SELECT * FROM testimonial');

    $results = $this->db->resultSet();

    return $results;
  }

  public function addTestimonial($data)
  {
    $this->db->query('INSERT INTO testimonial (testi_name, testi_desc, testi_img) VALUES(:name, :desc, :img)');
    // Bind values
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':desc', $data['descp']);
    $this->db->bind(':img', $data['img']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getTestimonialById($id)
  {
    $this->db->query('SELECT * FROM testimonial WHERE testimonial_id = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function updateTestimonial($data)
  {
    $this->db->query('UPDATE testimonial SET testi_name = :name, testi_desc = :desc, testi_img = :img WHERE testimonial_id = :id');
    // Bind values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':desc', $data['descp']);
    $this->db->bind(':img', $data['img']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deletetestimonial($id)
  {
    $this->db->query('DELETE FROM testimonial WHERE testimonial_id = :id');
    // Bind values
    $this->db->bind(':id', $id);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // EMail Subscription
  public function addEmailSubs($data)
  {
    $this->db->query('INSERT INTO email_subs (email) VALUES(:email)');
    // Bind values
    $this->db->bind(':email', $data['email']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getEmailSubs()
  {
    $this->db->query('SELECT * FROM email_subs');

    $results = $this->db->resultSet();

    return $results;
  }

  public function deleteemailsubs($id)
  {
    $this->db->query('DELETE FROM email_subs WHERE email_subs_id = :id');
    // Bind values
    $this->db->bind(':id', $id);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getNewArrival()
  {
    $this->db->query('SELECT pd.product_id, pd.product_name, pd.sub_menu_id, pd.total_price, pd.discount_price, CONCAT("[", GROUP_CONCAT(JSON_OBJECT("image_id", ID.image_id, "color_id", ID.color_id, "image", ID.images)),"]") AS images FROM product_detail AS pd LEFT JOIN image_data AS ID ON pd.product_id = ID.product_id GROUP BY pd.product_id Order By pd.product_id DESC LIMIT 10');
    $row = $this->db->resultSet();
    return $row;
  }

  public function getlinkByTitle(string $link_title){
    $this->db->query('SELECT * FROM misc_links WHERE link_for = :link_type');
    $this->db->bind(':link_type', $link_title);
    return $this->db->single();
  }

  public function saveLinkText($link_params, $enum){
    $link_text = $link_params['offer_link_text'];
    $link_url  = $link_params['offer_link_url'];
    $link_id   = $link_params['id'];
    $query     = '';
    if(!empty($link_id)){
      $query = "UPDATE misc_links SET content='$link_text', link_url='$link_url' WHERE id='$link_id'";
    }else{
      $query = "INSERT INTO misc_links (link_for, content, link_url) VALUES ('$enum', '$link_text', '$link_url')";
    }
    $this->db->query($query);
    $getId = $this->db->execute(1);
    return $getId;
  }
}
