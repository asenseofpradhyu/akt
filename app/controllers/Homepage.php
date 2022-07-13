<?php
class Homepage extends Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!isLoggedInAdmin()) {
      redirect('adminmaster/adminlogin');
    }

    $this->NavigationModel = $this->model('NavigationModel');
    $this->HomepageModel = $this->model('HomepageModel');
  }


  public function index()
  {


    // Init data
    $data = [
      'mainnav' => '',
      'mainnav_err' => '',

    ];

    redirect('homepage/mainslider');
  }


  public function mainslider()
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'img' => $_FILES['sliderimg'],
        'subNavSelect' => isset($_POST['subNavSelect']) ? $_POST['subNavSelect'] : '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  '',
        'mainsliderlist' => ''
      ];


      // Validate Image
      if ($_FILES['sliderimg']['error'] == 4) {

        $data['img_err'] = 'Please select Slider Image';
      } else {

        // if($data['img']){
        $name = $_FILES['sliderimg']['name'];
        $target_file = basename($_FILES["sliderimg"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
          // Convert to base64 
          $image_base64 = base64_encode(file_get_contents($_FILES['sliderimg']['tmp_name']));
          $data['img'] = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        } else {

          $data['img_err'] = 'Image Must be JPG, JPEG, PNG Only';
        }
        // }

      }


      // Validate Subnnav
      if (empty($data['subNavSelect'])) {
        $data['subNavSelect_err'] = 'Please Select SubNavigation';
      }

      // Make sure errors are empty
      if (empty($data['img_err']) && empty($data['subNavSelect_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->HomepageModel->addMainSlider($data);

        if ($isAddValue) {

          redirect('homepage/mainslider');
        } else {
          $data['img_err'] = 'Wrong Information';
          $data['subNavSelect_err'] = 'Wrong Information';

          $this->view('homepage/mainslider', $data);
        }
      } else {

        $subNav = $this->NavigationModel->getsubnav();
        $mainsliderlist = $this->HomepageModel->getMainSliderList();

        $data['subnavlist'] = $subNav;
        $data['mainsliderlist'] = $mainsliderlist;


        // Load view with errors
        $this->view('homepage/mainslider', $data);
      }
    } else {

      $mainsliderlist = $this->HomepageModel->getMainSliderList();
      $subNav = $this->NavigationModel->getsubnav();

      // Init data
      $data = [
        'img' => '',
        'subNavSelect' => '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' => $subNav,
        'mainsliderlist' => $mainsliderlist
      ];

      // Load view
      $this->view('homepage/mainslider', $data);
    }
  }

  public function deletemainslider($id)
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      if ($this->HomepageModel->deleteMainslider($id)) {
        //   flash('post_message', 'Post Removed');
        redirect('homepage/mainslider');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('homepage/mainslider');
    }
  }

  public function editmainslider($id)
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'id' => $id,
        'img' => $_FILES['sliderimg'],
        'subNavSelect' => isset($_POST['subNavSelect']) ? $_POST['subNavSelect'] : '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  '',
        'mainsliderlist' => ''
      ];

      // Validate Image
      if ($_FILES['sliderimg']['error'] == 4) {

        $data['img_err'] = 'Please select Slider Image';
      } else {

        // if($data['img']){
        $name = $_FILES['sliderimg']['name'];
        $target_file = basename($_FILES["sliderimg"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
          // Convert to base64 
          $image_base64 = base64_encode(file_get_contents($_FILES['sliderimg']['tmp_name']));
          $data['img'] = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        } else {

          $data['img_err'] = 'Image Must be JPG, JPEG, PNG Only';
        }
        // }

      }


      // Validate Subnnav
      if (empty($data['subNavSelect'])) {
        $data['subNavSelect_err'] = 'Please Select SubNavigation';
      }


      // Make sure errors are empty
      if (empty($data['img_err']) && empty($data['subNavSelect_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->HomepageModel->updateMainSlider($data);

        if ($isAddValue) {

          redirect('homepage/mainslider');
        } else {
          $data['img_err'] = 'Wrong Information';
          $data['subNavSelect_err'] = 'Wrong Information';

          $this->view('homepage/editmainslider', $data);
        }
      } else {

        $subNav = $this->NavigationModel->getsubnav();
        $mainsliderlist = $this->HomepageModel->getMainSliderList();

        $data['subnavlist'] = $subNav;
        $data['mainsliderlist'] = $mainsliderlist;


        // Load view with errors
        $this->view('homepage/editmainslider', $data);
      }
    } else {

      $mainsliderlist = $this->HomepageModel->getMainSliderById($id);
      $subNav = $this->NavigationModel->getsubnav();

      $data = [
        'id' => $id,
        'img' => $mainsliderlist->img,
        'subNavSelect' => $mainsliderlist->sub_menu_id,
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  $subNav,
        'mainsliderlist' => ''
      ];

      // Load view
      $this->view('homepage/editmainslider', $data);
    }
  }


  // Grid Images

  public function gridimages()
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'title' => trim($_POST['imgtitle']),
        'img' => $_FILES['gridimg'],
        'subNavSelect' => isset($_POST['subNavSelect']) ? $_POST['subNavSelect'] : '',
        'title_err' => '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  '',
        'gridimagelist' => ''
      ];


      // Validate Name
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter Main Navigation';
      }

      // Validate Image
      if ($_FILES['gridimg']['error'] == 4) {

        $data['img_err'] = 'Please select Slider Image';
      } else {

        // if($data['img']){
        $name = $_FILES['gridimg']['name'];
        $target_file = basename($_FILES["gridimg"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
          // Convert to base64 
          $image_base64 = base64_encode(file_get_contents($_FILES['gridimg']['tmp_name']));
          $data['img'] = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        } else {

          $data['img_err'] = 'Image Must be JPG, JPEG, PNG Only';
        }
        // }

      }


      // Validate Subnnav
      if (empty($data['subNavSelect'])) {
        $data['subNavSelect_err'] = 'Please Select SubNavigation';
      }

      // Make sure errors are empty
      if (empty($data['title_err']) && empty($data['img_err']) && empty($data['subNavSelect_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->HomepageModel->addGridImages($data);

        if ($isAddValue) {

          redirect('homepage/gridimages');
        } else {

          $data['title_err'] = "Wrong Information";
          $data['img_err'] = 'Wrong Information';
          $data['subNavSelect_err'] = 'Wrong Information';

          $this->view('homepage/gridimages', $data);
        }
      } else {

        $subNav = $this->NavigationModel->getsubnav();
        $gridimagesList = $this->HomepageModel->getgridimagesList();

        $data['subnavlist'] = $subNav;
        $data['gridimagelist'] = $gridimagesList;


        // Load view with errors
        $this->view('homepage/gridimages', $data);
      }
    } else {

      $gridimagesList = $this->HomepageModel->getgridimagesList();
      $subNav = $this->NavigationModel->getsubnav();

      // Init data
      $data = [
        'title' => '',
        'img' => '',
        'subNavSelect' => '',
        'title_err' => '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  $subNav,
        'gridimagelist' => $gridimagesList
      ];

      // Load view
      $this->view('homepage/gridimages', $data);
    }
  }

  public function editgridimages($id)
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'id' => $id,
        'title' => trim($_POST['imgtitle']),
        'img' => $_FILES['gridimg'],
        'subNavSelect' => isset($_POST['subNavSelect']) ? $_POST['subNavSelect'] : '',
        'title_err' => '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  '',
        'gridimagelist' => ''
      ];

      // Validate Image
      if ($_FILES['gridimg']['error'] == 4) {

        $data['img_err'] = 'Please select Image';
      } else {

        // if($data['img']){
        $name = $_FILES['gridimg']['name'];
        $target_file = basename($_FILES["gridimg"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
          // Convert to base64 
          $image_base64 = base64_encode(file_get_contents($_FILES['gridimg']['tmp_name']));
          $data['img'] = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        } else {

          $data['img_err'] = 'Image Must be JPG, JPEG, PNG Only';
        }
        // }

      }


      // Validate Subnnav
      if (empty($data['subNavSelect'])) {
        $data['subNavSelect_err'] = 'Please Select SubNavigation';
      }


      // Make sure errors are empty
      if (empty($data['title_err']) && empty($data['img_err']) && empty($data['subNavSelect_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->HomepageModel->updateGridIMages($data);

        if ($isAddValue) {

          redirect('homepage/gridimages');
        } else {

          $data['title_err'] = "Wrong Information";
          $data['img_err'] = 'Wrong Information';
          $data['subNavSelect_err'] = 'Wrong Information';

          $this->view('homepage/editgridimages', $data);
        }
      } else {

        $subNav = $this->NavigationModel->getsubnav();
        $gridimagesList = $this->HomepageModel->getgridimagesList();

        $data['subnavlist'] = $subNav;
        $data['gridimagelist'] = $gridimagesList;


        // Load view with errors
        $this->view('homepage/editgridimages', $data);
      }
    } else {

      $gridimagesList = $this->HomepageModel->getGridImagesById($id);
      $subNav = $this->NavigationModel->getsubnav();

      // Init data
      $data = [
        'id' => $id,
        'title' => $gridimagesList->img_title,
        'img' => $gridimagesList->grid_img,
        'subNavSelect' => $gridimagesList->sub_menu_id,
        'title_err' => '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  $subNav,
        'gridimagelist' => ''
      ];

      // Load view
      $this->view('homepage/editgridimages', $data);
    }
  }


  public function deletegridimages($id)
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      if ($this->HomepageModel->deleteGridImages($id)) {
        //   flash('post_message', 'Post Removed');
        redirect('homepage/gridimages');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('homepage/gridimages');
    }
  }



  // Sales Collection

  public function salescollection()
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'title' => trim($_POST['imgtitle']),
        'img' => $_FILES['gridimg'],
        'subNavSelect' => isset($_POST['subNavSelect']) ? $_POST['subNavSelect'] : '',
        'title_err' => '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  '',
        'gridimagelist' => ''
      ];


      // Validate Name
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter Main Navigation';
      }

      // Validate Image
      if ($_FILES['gridimg']['error'] == 4) {

        $data['img_err'] = 'Please select Image';
      } else {

        // if($data['img']){
        $name = $_FILES['gridimg']['name'];
        $target_file = basename($_FILES["gridimg"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
          // Convert to base64 
          $image_base64 = base64_encode(file_get_contents($_FILES['gridimg']['tmp_name']));
          $data['img'] = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        } else {

          $data['img_err'] = 'Image Must be JPG, JPEG, PNG Only';
        }
        // }

      }


      // Validate Subnnav
      if (empty($data['subNavSelect'])) {
        $data['subNavSelect_err'] = 'Please Select SubNavigation';
      }

      // Make sure errors are empty
      if (empty($data['title_err']) && empty($data['img_err']) && empty($data['subNavSelect_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->HomepageModel->addSalesCollection($data);

        if ($isAddValue) {

          redirect('homepage/salescollection');
        } else {

          $data['title_err'] = "Wrong Information";
          $data['img_err'] = 'Wrong Information';
          $data['subNavSelect_err'] = 'Wrong Information';

          $this->view('homepage/salescollection', $data);
        }
      } else {

        $subNav = $this->NavigationModel->getsubnav();
        $gridimagesList = $this->HomepageModel->getSalesCollectionList();

        $data['subnavlist'] = $subNav;
        $data['gridimagelist'] = $gridimagesList;


        // Load view with errors
        $this->view('homepage/salescollection', $data);
      }
    } else {

      $collectionList = $this->HomepageModel->getSalesCollectionList();
      $subNav = $this->NavigationModel->getsubnav();

      // Init data
      $data = [
        'title' => '',
        'img' => '',
        'subNavSelect' => '',
        'title_err' => '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  $subNav,
        'gridimagelist' => $collectionList
      ];

      // Load view
      $this->view('homepage/salescollection', $data);
    }
  }

  public function editsalescollection($id)
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'id' => $id,
        'title' => trim($_POST['imgtitle']),
        'img' => $_FILES['gridimg'],
        'subNavSelect' => isset($_POST['subNavSelect']) ? $_POST['subNavSelect'] : '',
        'title_err' => '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  '',
        'gridimagelist' => ''
      ];

      // Validate Image
      if ($_FILES['gridimg']['error'] == 4) {

        $data['img_err'] = 'Please select Image';
      } else {

        // if($data['img']){
        $name = $_FILES['gridimg']['name'];
        $target_file = basename($_FILES["gridimg"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
          // Convert to base64 
          $image_base64 = base64_encode(file_get_contents($_FILES['gridimg']['tmp_name']));
          $data['img'] = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        } else {

          $data['img_err'] = 'Image Must be JPG, JPEG, PNG Only';
        }
        // }

      }


      // Validate Subnnav
      if (empty($data['subNavSelect'])) {
        $data['subNavSelect_err'] = 'Please Select SubNavigation';
      }


      // Make sure errors are empty
      if (empty($data['title_err']) && empty($data['img_err']) && empty($data['subNavSelect_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->HomepageModel->updateSalescollection($data);

        if ($isAddValue) {

          redirect('homepage/salescollection');
        } else {

          $data['title_err'] = "Wrong Information";
          $data['img_err'] = 'Wrong Information';
          $data['subNavSelect_err'] = 'Wrong Information';

          $this->view('homepage/editsalescollection', $data);
        }
      } else {

        $subNav = $this->NavigationModel->getsubnav();
        $gridimagesList = $this->HomepageModel->getSalesCollectionList();

        $data['subnavlist'] = $subNav;
        $data['gridimagelist'] = $gridimagesList;


        // Load view with errors
        $this->view('homepage/editsalescollection', $data);
      }
    } else {

      $gridimagesList = $this->HomepageModel->getSalesCollectionById($id);
      $subNav = $this->NavigationModel->getsubnav();

      // Init data
      $data = [
        'id' => $id,
        'title' => $gridimagesList->sc_name,
        'img' => $gridimagesList->sc_img,
        'subNavSelect' => $gridimagesList->sub_menu_id,
        'title_err' => '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  $subNav,
        'gridimagelist' => ''
      ];

      // Load view
      $this->view('homepage/editsalescollection', $data);
    }
  }

  public function deletesalescollection($id)
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      if ($this->HomepageModel->deleteSalesCollection($id)) {
        //   flash('post_message', 'Post Removed');
        redirect('homepage/salescollection');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('homepage/salescollection');
    }
  }


  // Accessories

  public function accessories()
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'title' => trim($_POST['imgtitle']),
        'img' => $_FILES['gridimg'],
        'subNavSelect' => isset($_POST['subNavSelect']) ? $_POST['subNavSelect'] : '',
        'title_err' => '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  '',
        'gridimagelist' => ''
      ];


      // Validate Name
      if (empty($data['title'])) {
        $data['title_err'] = 'Please Enter Name';
      }

      // Validate Image
      if ($_FILES['gridimg']['error'] == 4) {

        $data['img_err'] = 'Please select Image';
      } else {

        // if($data['img']){
        $name = $_FILES['gridimg']['name'];
        $target_file = basename($_FILES["gridimg"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
          // Convert to base64 
          $image_base64 = base64_encode(file_get_contents($_FILES['gridimg']['tmp_name']));
          $data['img'] = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        } else {

          $data['img_err'] = 'Image Must be JPG, JPEG, PNG Only';
        }
        // }

      }


      // Validate Subnnav
      if (empty($data['subNavSelect'])) {
        $data['subNavSelect_err'] = 'Please Select SubNavigation';
      }

      // Make sure errors are empty
      if (empty($data['title_err']) && empty($data['img_err']) && empty($data['subNavSelect_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->HomepageModel->addAccessories($data);

        if ($isAddValue) {

          redirect('homepage/accessories');
        } else {

          $data['title_err'] = "Wrong Information";
          $data['img_err'] = 'Wrong Information';
          $data['subNavSelect_err'] = 'Wrong Information';

          $this->view('homepage/accessories', $data);
        }
      } else {

        $subNav = $this->NavigationModel->getsubnav();
        $gridimagesList = $this->HomepageModel->getAccessoriesList();

        $data['subnavlist'] = $subNav;
        $data['gridimagelist'] = $gridimagesList;


        // Load view with errors
        $this->view('homepage/accessories', $data);
      }
    } else {

      $collectionList = $this->HomepageModel->getAccessoriesList();
      $subNav = $this->NavigationModel->getsubnav();

      // Init data
      $data = [
        'title' => '',
        'img' => '',
        'subNavSelect' => '',
        'title_err' => '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  $subNav,
        'gridimagelist' => $collectionList
      ];

      // Load view
      $this->view('homepage/accessories', $data);
    }
  }

  public function editaccessories($id)
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'id' => $id,
        'title' => trim($_POST['imgtitle']),
        'img' => $_FILES['gridimg'],
        'subNavSelect' => isset($_POST['subNavSelect']) ? $_POST['subNavSelect'] : '',
        'title_err' => '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  '',
        'gridimagelist' => ''
      ];

      // Validate Image
      if ($_FILES['gridimg']['error'] == 4) {

        $data['img_err'] = 'Please select Image';
      } else {

        // if($data['img']){
        $name = $_FILES['gridimg']['name'];
        $target_file = basename($_FILES["gridimg"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
          // Convert to base64 
          $image_base64 = base64_encode(file_get_contents($_FILES['gridimg']['tmp_name']));
          $data['img'] = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        } else {

          $data['img_err'] = 'Image Must be JPG, JPEG, PNG Only';
        }
        // }

      }


      // Validate Subnnav
      if (empty($data['subNavSelect'])) {
        $data['subNavSelect_err'] = 'Please Select SubNavigation';
      }


      // Make sure errors are empty
      if (empty($data['title_err']) && empty($data['img_err']) && empty($data['subNavSelect_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->HomepageModel->updateAccessories($data);

        if ($isAddValue) {

          redirect('homepage/accessories');
        } else {

          $data['title_err'] = "Wrong Information";
          $data['img_err'] = 'Wrong Information';
          $data['subNavSelect_err'] = 'Wrong Information';

          $this->view('homepage/editaccessories', $data);
        }
      } else {

        $subNav = $this->NavigationModel->getsubnav();
        $gridimagesList = $this->HomepageModel->getAccessoriesById();

        $data['subnavlist'] = $subNav;
        $data['gridimagelist'] = $gridimagesList;


        // Load view with errors
        $this->view('homepage/editaccessories', $data);
      }
    } else {

      $gridimagesList = $this->HomepageModel->getAccessoriesById($id);
      $subNav = $this->NavigationModel->getsubnav();

      // Init data
      $data = [
        'id' => $id,
        'title' => $gridimagesList->acc_name,
        'img' => $gridimagesList->acc_img,
        'subNavSelect' => $gridimagesList->sub_menu_id,
        'title_err' => '',
        'img_err' => '',
        'subNavSelect_err' => '',
        'subnavlist' =>  $subNav,
        'gridimagelist' => ''
      ];

      // Load view
      $this->view('homepage/editaccessories', $data);
    }
  }

  public function deleteaccessories($id)
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      if ($this->HomepageModel->deleteAccessories($id)) {
        //   flash('post_message', 'Post Removed');
        redirect('homepage/accessories');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('homepage/accessories');
    }
  }


  // Testimonial
  public function testimonial()
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'descp' => trim($_POST['descp']),
        'name' => trim($_POST['name']),
        'img' => $_FILES['gridimg'],
        'descp_err' => '',
        'img_err' => '',
        'name_err' => '',
        'list' => ''
      ];


      // Validate Name
      if (empty($data['descp'])) {
        $data['descp_err'] = 'Please Enter Description';
      }

      // Validate Name
      if (empty($data['name'])) {
        $data['name_err'] = 'Please Enter Name';
      }

      // Validate Image
      if ($_FILES['gridimg']['error'] == 4) {

        $data['img_err'] = 'Please select Image';
      } else {

        // if($data['img']){
        $name = $_FILES['gridimg']['name'];
        $target_file = basename($_FILES["gridimg"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
          // Convert to base64 
          $image_base64 = base64_encode(file_get_contents($_FILES['gridimg']['tmp_name']));
          $data['img'] = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        } else {

          $data['img_err'] = 'Image Must be JPG, JPEG, PNG Only';
        }
        // }

      }


      // Make sure errors are empty
      if (empty($data['descp_err']) && empty($data['img_err']) && empty($data['name_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->HomepageModel->addTestimonial($data);

        if ($isAddValue) {

          redirect('homepage/testimonial');
        } else {

          $data['descp_err'] = "Wrong Information";
          $data['img_err'] = 'Wrong Information';
          $data['name_err'] = 'Wrong Information';

          $this->view('homepage/testimonial', $data);
        }
      } else {

        $gridimagesList = $this->HomepageModel->getTestimonialsList();

        $data['list'] = $gridimagesList;


        // Load view with errors
        $this->view('homepage/testimonial', $data);
      }
    } else {

      $list = $this->HomepageModel->getTestimonialsList();

      // Init data
      $data = [
        'descp' => '',
        'name' => '',
        'img' => '',
        'descp_err' => '',
        'img_err' => '',
        'name_err' => '',
        'list' => $list
      ];

      // Load view
      $this->view('homepage/testimonial', $data);
    }
  }

  public function edittestimonial($id)
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'id' => $id,
        'descp' => trim($_POST['descp']),
        'name' => trim($_POST['name']),
        'img' => $_FILES['gridimg'],
        'descp_err' => '',
        'img_err' => '',
        'name_err' => '',
        'list' => ''
      ];


      // Validate Name
      if (empty($data['descp'])) {
        $data['descp_err'] = 'Please Enter Description';
      }

      // Validate Name
      if (empty($data['name'])) {
        $data['name_err'] = 'Please Enter Name';
      }

      // Validate Image
      if ($_FILES['gridimg']['error'] == 4) {

        $data['img_err'] = 'Please select Image';
      } else {

        // if($data['img']){
        $name = $_FILES['gridimg']['name'];
        $target_file = basename($_FILES["gridimg"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
          // Convert to base64 
          $image_base64 = base64_encode(file_get_contents($_FILES['gridimg']['tmp_name']));
          $data['img'] = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        } else {

          $data['img_err'] = 'Image Must be JPG, JPEG, PNG Only';
        }
        // }

      }


      // Make sure errors are empty
      if (empty($data['descp_err']) && empty($data['img_err']) && empty($data['name_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->HomepageModel->updateTestimonial($data);

        if ($isAddValue) {

          redirect('homepage/testimonial');
        } else {

          $data['descp_err'] = "Wrong Information";
          $data['img_err'] = 'Wrong Information';
          $data['name_err'] = 'Wrong Information';

          $this->view('homepage/edittestimonial', $data);
        }
      } else {

        $gridimagesList = $this->HomepageModel->getTestimonialsList();

        $data['list'] = $gridimagesList;


        // Load view with errors
        $this->view('homepage/edittestimonial', $data);
      }
    } else {

      $list = $this->HomepageModel->getTestimonialById($id);

      // Init data
      $data = [
        'id' => $id,
        'descp' => $list->testi_desc,
        'name' => $list->testi_name,
        'img' => $list->testi_img,
        'descp_err' => '',
        'img_err' => '',
        'name_err' => '',
        'list' => ''
      ];

      // Load view
      $this->view('homepage/edittestimonial', $data);
    }
  }

  public function deletetestimonial($id)
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      if ($this->HomepageModel->deletetestimonial($id)) {
        //   flash('post_message', 'Post Removed');
        redirect('homepage/accessories');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('homepage/accessories');
    }
  }

  // Email Subs

  public function emailsubs()
  {

    $list = $this->HomepageModel->getEmailSubs();

    // Init data
    $data = [
      'list' => $list
    ];

    // Load view
    $this->view('homepage/emailsubs', $data);
  }

  public function addEmailSubs()
  {
      $this->HomepageModel->addEmailSubs(['email' => $_POST['email']]);
      redirect('/');
  }

  public function deleteemailsubs($id)
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      if ($this->HomepageModel->deleteemailsubs($id)) {
        //   flash('post_message', 'Post Removed');
        redirect('homepage/emailsubs');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('homepage/emailsubs');
    }
  }
  
  public function offerLink(){
    $link = $this->HomepageModel->getlinkByTitle('offer_link');
    $data = ['link_obj' => $link];
    $this->view('homepage/saveLinkPage', $data);
  }

  public function saveMiscLink($link_id){
    $link_save = $this->HomepageModel->saveLinkText($_POST, 'offer_link');
    return redirect('homepage/offerLink');
  }
}
