<?php
class AdminProduct extends Controller
{

  public function __construct()
  {
    $this->db = new Database;

    if (!isLoggedInAdmin()) {
      redirect('adminmaster/adminlogin');
    }

    $this->ProductModel = $this->model('AdminProductModel');
    $this->NavigationModel = $this->model('NavigationModel');
    $this->main_menu  = '';
    $this->sub_menu  = '';
  }

  public function index()
  {


    $data = [
      'title' => 'AKT Fashion Store',
      'description' => 'NEw MVC',
      'main_menu' => $this->main_menu,
      'sub_menu' => $this->sub_menu
    ];

    // $this->view('inc/navbar', $data);
    redirect('AdminProduct/addproduct');
  }


  public function addproduct()
  {

    $color = $this->ProductModel->getColors();
    $mainNav = $this->NavigationModel->getMainNav();
    $subNav = $this->NavigationModel->getSubNav();
    $size   = $this->ProductModel->getSizes();

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'subnav' => isset($_POST['subNavSelect']),
        'mainnav' => isset($_POST['mainNavSelect']),
        'productname' => trim($_POST['name']),
        'productdesc' => trim($_POST['description']),
        'totalprice' => trim($_POST['totalprice']),
        'discountprice' => trim($_POST['discountprice']),
        'code' => trim($_POST['code']),
        'length' => trim($_POST['length']),
        'garment' => trim($_POST['garment']),
        'neck' => trim($_POST['neck']),
        'fabric' => trim($_POST['fabric']),
        'occasion' => trim($_POST['occasion']),
        'design' => trim($_POST['design']),
        'inclusive' => trim($_POST['inclusive']),
        'notinclusive' => trim($_POST['notinclusive']),
        'care' => trim($_POST['care']),
        'style' => trim($_POST['style']),
        'subnav_err' => '',
        'mainnav_err' => '',
        'productname_err' => '',
        'productdesc_err' => '',
        'totalprice_err' => '',
        'discountprice_err' => '',
        'code_err' => '',
        'stock_err' => '',
        'size_err' => '',
        'color_err' => '',
        'length_err' => '',
        'garment_err' => '',
        'neck_err' => '',
        'fabric_err' => '',
        'occasion_err' => '',
        'design_err' => '',
        'inclusive_err' => '',
        'notinclusive_err' => '',
        'care_err' => '',
        'style_err' => '',
        'mainNavlist' => $mainNav['results'],
        'subnavlist' => $subNav,
        'colorlist' => $color
      ];


      if (empty($data['subnav'])) {
        $data['subnav_err'] = 'Please Select Sub Navigation';
      }

      if (empty($data['mainnav'])) {
        $data['mainnav_err'] = 'Please Select Main Navigation';
      }

      if (empty($data['productname'])) {
        $data['productname_err'] = 'Please Enter Product Name';
      }

      if (empty($data['productdesc'])) {
        $data['productdesc_err'] = 'Please Enter Product Description';
      }

      if (empty($data['totalprice'])) {
        $data['totalprice_err'] = 'Please Enter Product Name';
      }

      if (empty($data['discountprice'])) {
        $data['discountprice_err'] = 'Please Enter Product Description';
      }

      if (empty($data['code'])) {
        $data['code_err'] = 'Please Enter Product Code';
      }

      if (empty($data['length'])) {
        $data['length_err'] = 'Please enter Feature Length';
      }

      if (empty($data['garment'])) {
        $data['garment_err'] = 'Please enter Feature Garment Type';
      }

      if (empty($data['neck'])) {
        $data['neck_err'] = 'Please enter Feature Neck';
      }

      if (empty($data['fabric'])) {
        $data['fabric_err'] = 'Please enter Feature Fabric';
      }

      if (empty($data['occasion'])) {
        $data['occasion_err'] = 'Please enter Feature Occasion';
      }

      if (empty($data['design'])) {
        $data['design_err'] = 'Please enter Feature Design Type';
      }

      if (empty($data['inclusive'])) {
        $data['inclusive_err'] = 'Please enter Inclusive Details';
      }

      if (empty($data['notinclusive'])) {
        $data['notinclusive_err'] = 'Please enter Not Inclusive Details';
      }

      if (empty($data['care'])) {
        $data['care_err'] = 'Please enter Care Details';
      }

      if (empty($data['style'])) {
        $data['style_err'] = 'Please enter Style Details';
      }

      // Make sure errors are empty
      if (
        empty($data['subnav_err']) &&
        empty($data['mainnav_err']) &&
        empty($data['productname_err']) &&
        empty($data['productdesc_err']) &&
        empty($data['totalprice_err']) &&
        empty($data['discountprice_err']) &&
        empty($data['length_err']) &&
        empty($data['garment_err']) &&
        empty($data['neck_err']) &&
        empty($data['fabric_err']) &&
        empty($data['occasion_err']) &&
        empty($data['design_err']) &&
        empty($data['inclusive_err']) &&
        empty($data['notinclusive_err']) &&
        empty($data['care_err']) &&
        empty($data['style_err'])
      ) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->ProductModel->AddProduct($data);

        if ($isAddValue) {
          redirect('AdminProduct/adminproductlist');

        } else {
          $data['color_err'] = 'Wrong Information';

          $this->view('adminproduct/addproduct', $data);
        }
      } else {
        // Load view with errors
        $this->view('adminproduct/addproduct', $data);
      }
    } else {


      $data = [
        'subnav' => '',
        'mainnav' => '',
        'productname' => '',
        'productdesc' => '',
        'totalprice' => '',
        'discountprice' => '',
        'code' => '',
        'length' => '',
        'garment' => '',
        'neck' => '',
        'fabric' => '',
        'occasion' => '',
        'design' => '',
        'inclusive ' => '',
        'notinclusive ' => '',
        'care' => '',
        'style' => '',
        'subnav_err' => '',
        'mainnav_err' => '',
        'productname_err' => '',
        'productdesc_err' => '',
        'totalprice_err' => '',
        'discountprice_err' => '',
        'code_err' => '',
        'stock_err' => '',
        'size_err' => '',
        'color_err' => '',
        'length_err' => '',
        'garment_err' => '',
        'neck_err' => '',
        'fabric_err' => '',
        'occasion_err' => '',
        'design_err' => '',
        'inclusive_err' => '',
        'notinclusive_err' => '',
        'care_err' => '',
        'style_err' => '',
        'mainNavlist' => $mainNav['results'],
        'subnavlist' => $subNav,
        'colorlist' => $color,
        'sizes'     => $size
      ];


      // Load view
      $this->view('adminproduct/addproduct', $data);
    }
  }



  // Product Images
  public function addproductimages()
  {

    $colorlist = $this->ProductModel->getColors();
    $productName = $this->ProductModel->getProductName();
    $img = $this->ProductModel->GetImages();
    $color_err = '';
    $product_err = '';
    $img_err = '';
    $type = '';
    $success = '';

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'color' => isset($_POST['color']) ? $_POST['color'] : '',
        'product' => isset($_POST['product']) ? $_POST['product'] : '',
        'imgFile' => $_FILES['file'],
        'product_err' => '',
        'color_err' => '',
        'img_err' => '',
        'type' => '',
        'success' => '',
        'colorlist' => $colorlist,
        'productlist' => $productName
      ];


      if (empty($data['color'])) {
        $color_err = 'Please Select Color';
      }

      if (empty($data['product'])) {
        $product_err = 'Please Select Product';
      }


      // Validate Image
      if (empty(array_filter($_FILES['file']['name']))) {
        $img_err = 'Please select Product Image';
      }




      // Make sure errors are empty
      if (empty($color_err) && empty($product_err) && empty($img_err)) {
        // Validated
        // Check and set logged in user



        // Configure upload directory and allowed file types 
        $public_path = "/public/uploads/";
        $upload_dir = UPLOADPATH . $public_path;
        $allowed_types = array('jpg', 'png', 'jpeg');

        // Define maxsize for files 250KB 
        $maxsize = 250000;

        // Checks if user sent an empty form  
        // if(!empty(array_filter($_FILES['file']['name']))) { 

        // Loop through each file in files[] array 
        foreach ($_FILES['file']['tmp_name'] as $key => $value) {

          $file_tmpname = $_FILES['file']['tmp_name'][$key];
          $file_name = $_FILES['file']['name'][$key];
          $file_size = $_FILES['file']['size'][$key];
          $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

          // Set upload file path 
          $filepath = $upload_dir . $file_name;
          $data['imgFile'] = $filepath;

          // Check file type is allowed or not 
          if (in_array(strtolower($file_ext), $allowed_types)) {

            // Verify file size - 250KB max  
            if ($file_size > $maxsize) {
              $img_err .= "{$file_name} size is larger than the allowed limit.(MAX:- 250KB), ";
            } else {
              // If file with name already exist then append time in 
              // front of name of the file to avoid overwriting of file 
              if (file_exists($filepath)) {
                $f_name = time() . $file_name;
                $filepath = $upload_dir . $f_name;
                // $data['imgFile'] = $filepath;
                $data['imgFile'] = $public_path . $f_name;

                if (move_uploaded_file($file_tmpname, $filepath)) {
                  $success .= "{$file_name} successfully uploaded <br />";
                  $this->ProductModel->AddProductImages($data);
                } else {
                  $img_err .= "Error uploading {$file_name} <br /> ";
                }
              } else {

                if (move_uploaded_file($file_tmpname, $filepath)) {
                  $success .= "{$file_name} successfully uploaded <br />";
                  $this->ProductModel->AddProductImages($data);
                } else {
                  $img_err .= "Error uploading {$file_name} <br /> ";
                }
              }
            }
          } else {

            // If file extention not valid 
            $img_err .= "Error uploading {$file_name} ";
            $type =  "({$file_ext} file type is not allowed)<br / >";
          }
        }
        // }  
        // else { 

        //     // If no files selected 
        //     echo "No files selected."; 
        // }

        // if($isAddValue){

        //   redirect('product/addproductimages');
        // } else {
        //   $data['color_err'] = 'Wrong Information';


        // }
      } else {

        $colorlist = $this->ProductModel->getColors();
        $productName = $this->ProductModel->getProductName();
        $img = $this->ProductModel->GetImages();

        $data = [
          'color' => '',
          'product' => '',
          'product_err' => $product_err,
          'color_err' => $color_err,
          'img_err' => $img_err,
          'type' => $type,
          'success' => $success,
          'colorlist' => $colorlist,
          'productlist' => $productName,
          'list' => $img
        ];

        // Load view with errors
        $this->view('adminproduct/addproductimages', $data);
      }

      $colorlist = $this->ProductModel->getColors();
      $productName = $this->ProductModel->getProductName();
      $img = $this->ProductModel->GetImages();

      $data = [
        'color' => '',
        'product' => '',
        'product_err' => $product_err,
        'color_err' => $color_err,
        'img_err' => $img_err,
        'type' => $type,
        'success' => $success,
        'colorlist' => $colorlist,
        'productlist' => $productName,
        'list' => $img
      ];

      $this->view('adminproduct/addproductimages', $data);
    } else {

      // Init data
      $data = [
        'color' => '',
        'product' => '',
        'product_err' => '',
        'color_err' => '',
        'img_err' => '',
        'type' => '',
        'success' => '',
        'colorlist' => $colorlist,
        'productlist' => $productName,
        'list' => $img
      ];

      // Load view
      $this->view('adminproduct/addproductimages', $data);
    }
  }


  // Product Images
  public function updateproductimages($id)
  {

    $color_err = '';
    $product_err = '';
    $img_err = '';
    $type = '';
    $success = '';

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'id' => $id,
        'product_err' => '',
        'color_err' => '',
        'img_err' => '',
        'type' => '',
        'imgFile' => $_FILES['file'],
        'img_err' => '',
      ];

      // Validate Image
      if (empty(array_filter($_FILES['file']['name']))) {
        $data['img_err'] = 'Please select Product Image';
      }




      // Make sure errors are empty
      if (empty($data['img_err'])) {
        // Validated
        // Check and set logged in user



        // Configure upload directory and allowed file types 
        $public_path = "/public/uploads/";
        $upload_dir = UPLOADPATH . $public_path;
        $allowed_types = array('jpg', 'png', 'jpeg');

        // Define maxsize for files 250KB 
        $maxsize = 250000;

        // Checks if user sent an empty form  
        // if(!empty(array_filter($_FILES['file']['name']))) { 

        // Loop through each file in files[] array 
        foreach ($_FILES['file']['tmp_name'] as $key => $value) {

          $file_tmpname = $_FILES['file']['tmp_name'][$key];
          $file_name = $_FILES['file']['name'][$key];
          $file_size = $_FILES['file']['size'][$key];
          $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

          // Set upload file path 
          $filepath = $upload_dir . $file_name;
          $data['imgFile'] = $filepath;

          // Check file type is allowed or not 
          if (in_array(strtolower($file_ext), $allowed_types)) {

            // Verify file size - 250KB max  
            if ($file_size > $maxsize) {
              $img_err .= "{$file_name} size is larger than the allowed limit.(MAX:- 250KB), ";
            } else {
              // If file with name already exist then append time in 
              // front of name of the file to avoid overwriting of file 
              if (file_exists($filepath)) {
                $f_name = time() . $file_name;
                $filepath = $upload_dir . $f_name;
                // $data['imgFile'] = $filepath;
                $data['imgFile'] = $public_path . $f_name;

                if (move_uploaded_file($file_tmpname, $filepath)) {
                  $success .= "{$file_name} successfully uploaded <br />";
                  $this->ProductModel->updateProductImages($data);
                } else {
                  $img_err .= "Error uploading {$file_name} <br /> ";
                }
              } else {

                if (move_uploaded_file($file_tmpname, $filepath)) {
                  $success .= "{$file_name} successfully uploaded <br />";
                  $this->ProductModel->updateProductImages($data);
                } else {
                  $img_err .= "Error uploading {$file_name} <br /> ";
                }
              }
            }
          } else {

            // If file extention not valid 
            $img_err .= "Error uploading {$file_name} ";
            $type =  "({$file_ext} file type is not allowed)<br / >";
          }
        }
        // }  
        // else { 

        //     // If no files selected 
        //     echo "No files selected."; 
        // }

        // if($isAddValue){

        //   redirect('product/addproductimages');
        // } else {
        //   $data['color_err'] = 'Wrong Information';

        // $this->view('adminproduct/addproductimages', $data);
        // }
      } else {

        $colorlist = $this->ProductModel->getColors();
        $productName = $this->ProductModel->getProductName();
        $img = $this->ProductModel->GetImages();

        $data = [
          'color' => '',
          'product' => '',
          'product_err' => $product_err,
          'color_err' => $color_err,
          'img_err' => $img_err,
          'type' => $type,
          'success' => $success,
          'colorlist' => $colorlist,
          'productlist' => $productName,
          'list' => $img
        ];

        // Load view with errors
        $this->view('adminproduct/addproductimages', $data);
      }

      $colorlist = $this->ProductModel->getColors();
      $productName = $this->ProductModel->getProductName();
      $img = $this->ProductModel->GetImages();

      $data = [
        'color' => '',
        'product' => '',
        'product_err' => $product_err,
        'color_err' => $color_err,
        'img_err' => $img_err,
        'type' => $type,
        'success' => $success,
        'colorlist' => $colorlist,
        'productlist' => $productName,
        'list' => $img
      ];

      $this->view('adminproduct/addproductimages', $data);
    }
  }
  // Add Color (Product)
  public function color()
  {

    $listData = $this->ProductModel->getColors();

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'color' => trim($_POST['color']),
        'color_err' => '',
        'colorlist' => $listData
      ];

      // Validate mainnav
      if (empty($data['color'])) {
        $data['color_err'] = 'Please enter Color';
      }

      // Make sure errors are empty
      if (empty($data['color_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->ProductModel->AddColor($data);

        if ($isAddValue) {

          redirect('AdminProduct/color');
        } else {
          $data['color_err'] = 'Wrong Information';

          $this->view('adminproduct/color', $data);
        }
      } else {
        // Load view with errors
        $this->view('adminproduct/color', $data);
      }
    } else {

      $listData = $this->ProductModel->getColors();

      // Init data
      $data = [
        'color' => '',
        'color_err' => '',
        'colorlist' => $listData
      ];

      // Load view
      $this->view('adminproduct/color', $data);
    }
  }


  // Delete Color (Product)

  public function deletecolor($id)
  {


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      if ($this->ProductModel->deleteColor($id)) {
        //   flash('post_message', 'Post Removed');
        redirect('AdminProduct/color');
      } else {
        die('AdminProduct/color');
      }
    } else {
      redirect('AdminProduct/color');
    }
  }


  // Delete ProductImage(Product)
  public function deleteproductimage($id)
  {


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      if ($this->ProductModel->deleteproductimage($id)) {
        //   flash('post_message', 'Post Removed');
        echo "<script>console.log('1');</script>";
        redirect('AdminProduct/addproductimages');
      } else {
        echo "<script>console.log('2');</script>";
        die('adminproduct/addproductimages');
      }
    } else {
      echo "<script>console.log('3');</script>";
      redirect('AdminProduct/addproductimages');
    }
    echo "<script>console.log('4');</script>";
  }

  // ProductImage List
  public function adminproductlist()
  {

    $listData = $this->ProductModel->getproductListData();

    $data = [
      'list' => $listData
    ];


    $this->view('adminproduct/adminproductlist', $data);
  }

  public function editproductdetails($id)
  {

    $color = $this->ProductModel->getColors();
    $mainNav = $this->NavigationModel->getMainNav();
    $subNav = $this->NavigationModel->getSubNav();
    $size   = $this->ProductModel->getSizes();

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'id' => $id,
        'subnav' => $_POST['subNavSelect'],
        'mainnav' => $_POST['mainNavSelect'],
        'productname' => trim($_POST['name']),
        'productdesc' => trim($_POST['description']),
        'totalprice' => trim($_POST['totalprice']),
        'discountprice' => trim($_POST['discountprice']),
        'code' => trim($_POST['code']),
        'length' => trim($_POST['length']),
        'garment' => trim($_POST['garment']),
        'neck' => trim($_POST['neck']),
        'fabric' => trim($_POST['fabric']),
        'occasion' => trim($_POST['occasion']),
        'design' => trim($_POST['design']),
        'inclusive' => trim($_POST['inclusive']),
        'notinclusive' => trim($_POST['notinclusive']),
        'care' => trim($_POST['care']),
        'style' => trim($_POST['style']),
        'subnav_err' => '',
        'mainnav_err' => '',
        'productname_err' => '',
        'productdesc_err' => '',
        'totalprice_err' => '',
        'discountprice_err' => '',
        'code_err' => '',
        'stock_err' => '',
        'size_err' => '',
        'color_err' => '',
        'length_err' => '',
        'garment_err' => '',
        'neck_err' => '',
        'fabric_err' => '',
        'occasion_err' => '',
        'design_err' => '',
        'inclusive_err' => '',
        'notinclusive_err' => '',
        'care_err' => '',
        'style_err' => '',
        'mainNavlist' => $mainNav['results'],
        'subnavlist' => $subNav,
        'colorlist' => $color
      ];


      if (empty($data['subnav'])) {
        $data['subnav_err'] = 'Please Select Sub Navigation';
      }

      if (empty($data['mainnav'])) {
        $data['mainnav_err'] = 'Please Select Main Navigation';
      }

      if (empty($data['productname'])) {
        $data['productname_err'] = 'Please Enter Product Name';
      }

      if (empty($data['productdesc'])) {
        $data['productdesc_err'] = 'Please Enter Product Description';
      }

      if (empty($data['totalprice'])) {
        $data['totalprice_err'] = 'Please Enter Product Name';
      }

      if (empty($data['discountprice'])) {
        $data['discountprice_err'] = 'Please Enter Product Description';
      }

      if (empty($data['code'])) {
        $data['code_err'] = 'Please Enter Product Code';
      }

      if (empty($data['length'])) {
        $data['length_err'] = 'Please enter Feature Length';
      }

      if (empty($data['garment'])) {
        $data['garment_err'] = 'Please enter Feature Garment Type';
      }

      if (empty($data['neck'])) {
        $data['neck_err'] = 'Please enter Feature Neck';
      }

      if (empty($data['fabric'])) {
        $data['fabric_err'] = 'Please enter Feature Fabric';
      }

      if (empty($data['occasion'])) {
        $data['occasion_err'] = 'Please enter Feature Occasion';
      }

      if (empty($data['design'])) {
        $data['design_err'] = 'Please enter Feature Design Type';
      }

      if (empty($data['inclusive'])) {
        $data['inclusive_err'] = 'Please enter Inclusive Details';
      }

      if (empty($data['notinclusive'])) {
        $data['notinclusive_err'] = 'Please enter Not Inclusive Details';
      }

      if (empty($data['care'])) {
        $data['care_err'] = 'Please enter Care Details';
      }

      if (empty($data['style'])) {
        $data['style_err'] = 'Please enter Style Details';
      }

      // Make sure errors are empty
      if (
        empty($data['subnav_err']) &&
        empty($data['mainnav_err']) &&
        empty($data['productname_err']) &&
        empty($data['productdesc_err']) &&
        empty($data['totalprice_err']) &&
        empty($data['discountprice_err']) &&
        empty($data['code_err']) &&
        empty($data['length_err']) &&
        empty($data['garment_err']) &&
        empty($data['neck_err']) &&
        empty($data['fabric_err']) &&
        empty($data['occasion_err']) &&
        empty($data['design_err']) &&
        empty($data['inclusive_err']) &&
        empty($data['notinclusive_err']) &&
        empty($data['care_err']) &&
        empty($data['style_err'])
      ) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->ProductModel->UpdateProduct($data);

        if ($isAddValue) {

          redirect('AdminProduct/adminproductlist');
        } else {
          $data['color_err'] = 'Wrong Information';

          $this->view('adminproduct/addproduct', $data);
        }
      } else {
        // Load view with errors
        $this->view('adminproduct/addproduct', $data);
      }
    } else {

      $detail = $this->ProductModel->getProductDetailbyId($id);

      $data = [
        'id' => $id,
        'subnav' => $detail->sub_menu_id,
        'mainnav' => $detail->main_menu_id,
        'productname' => $detail->product_name,
        'productdesc' => $detail->product_desc,
        'totalprice' => $detail->total_price,
        'discountprice' => $detail->discount_price,
        'code' => $detail->product_code,
        'length' => $detail->length,
        'garment' => $detail->garment,
        'neck' => $detail->neck,
        'fabric' => $detail->fabric,
        'occasion' => $detail->occasion,
        'design' => $detail->design_type,
        'inclusive' => $detail->d_inclusive,
        'notinclusive' => $detail->d_not_inclusive,
        'care' => $detail->care,
        'style' => $detail->style_tip,
        'subnav_err' => '',
        'mainnav_err' => '',
        'productname_err' => '',
        'productdesc_err' => '',
        'totalprice_err' => '',
        'discountprice_err' => '',
        'code_err' => '',
        'stock_err' => '',
        'size_err' => '',
        'color_err' => '',
        'length_err' => '',
        'garment_err' => '',
        'neck_err' => '',
        'fabric_err' => '',
        'occasion_err' => '',
        'design_err' => '',
        'inclusive_err' => '',
        'notinclusive_err' => '',
        'care_err' => '',
        'style_err' => '',
        'mainNavlist' => $mainNav['results'],
        'subnavlist' => $subNav,
        'colorlist' => $color,
        'sizes'     => $size
      ];


      // Load view
      $this->view('adminproduct/editproductdetails', $data);
    }
  }

  public function inventoryList($id)
  {
    $data = [
      'product_id' => $id,
      'inventorylist' => $this->ProductModel->getInventoryList($id)
    ];

    $this->view('adminproduct/inventorylist', $data);
  }

  public function editInventory($id = 0)
  {
    $updateArray = [
      'id' => $id,
      'product_id' => $_POST['product_id'],
      'size_id' => $_POST['size_id'],
      'color_id' => $_POST['color_id'],
      'stock' => $_POST['stock']
    ];
    $this->ProductModel->updateInventory($updateArray);

    redirect('AdminProduct/inventoryList/' . $_POST['product_id']);
  }

  public function addInventory()
  {
    $data = [
      'product_id' => $_POST['product_id'],
      'size_id' => $_POST['size_id'],
      'color_id' => $_POST['color_id'],
      'stock' => $_POST['stock']
    ];
    $this->ProductModel->addInventory($data);

    redirect('AdminProduct/inventoryList/' . $_POST['product_id']);
  }

  public function deletedInventory($id = 0)
  {
    $this->ProductModel->deleteInventory($id);

    redirect('AdminProduct/inventoryList/' . $_POST['product_id']);
  }

  public function modifyInventoryView($id=0)
  {
    $data = [
      'inventory' => $this->ProductModel->getInventoryById($id),
      'colors'   => $this->ProductModel->getColors(),
      'sizes'    => $this->ProductModel->getSizes(),
      'product_id' => $id
    ];

    $this->view('adminproduct/modifyinventory', $data);
  }
}
