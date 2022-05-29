<?php
class Navigation extends Controller
{
  public function __construct()
  {

    if (!isLoggedInAdmin()) {
      redirect('adminmaster/adminlogin');
    }

    $this->NavigationModel = $this->model('NavigationModel');
  }


  public function index()
  {

    $mainNav = $this->NavigationModel->getMainNav();

    // Init data
    $data = [
      'mainnav' => '',
      'mainnav_err' => '',
      'mainNavlist' => $mainNav
    ];

    $this->view('navigation/mainnavigation', $data);
  }



  public function mainnavigation()
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'mainnav' => trim($_POST['mainnav']),
        'mainnav_err' => ''
      ];

      // Validate mainnav
      if (empty($data['mainnav'])) {
        $data['mainnav_err'] = 'Please enter Main Navigation';
      }

      // Make sure errors are empty
      if (empty($data['mainnav_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->NavigationModel->addMainNav($data);

        if ($isAddValue) {

          redirect('navigation/mainnavigation');
        } else {
          $data['mainnav_err'] = 'Wrong Information';

          $this->view('navigation/mainnavigation', $data);
        }
      } else {
        // Load view with errors
        $mainNav = $this->NavigationModel->getMainNav();

        $data = [
          'mainnav' => trim($_POST['mainnav']),
          'mainnav_err' => 'Please enter Main Navigation',
          'mainNavlist' => $mainNav['results']
        ];
        $this->view('navigation/mainnavigation', $data);
      }
    } else {

      $mainNav = $this->NavigationModel->getMainNav();

      // Init data
      $data = [
        'mainnav' => '',
        'mainnav_err' => '',
        'mainNavlist' => $mainNav['results']
      ];

      // Load view
      $this->view('navigation/mainnavigation', $data);
    }
  }

  // public function mainnavigation(){
  //   $this->view('navigation/mainnavigation');
  // }


  public function editmainnavigation($id)
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'id' => $id,
        'mainnav' => trim($_POST['mainnav']),
        'mainnav_err' => ''
      ];

      // Validate mainnav
      if (empty($data['mainnav'])) {
        $data['mainnav'] = 'Please enter Main Navigation';
      }

      // Make sure errors are empty
      if (empty($data['mainnav_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->NavigationModel->updateMainNav($data);

        if ($isAddValue) {

          redirect('navigation/mainnavigation');
        } else {
          $data['mainnav_err'] = 'Wrong Information';

          $this->view('navigation/mainnavigation', $data);
        }
      } else {
        // Load view with errors
        $this->view('navigation/mainnavigation', $data);
      }
    } else {

      $mainNav = $this->NavigationModel->getMainNavById($id);

      // Init data
      $data = [
        'id' => $id,
        'mainnav' => $mainNav->main_menu_name,
        'mainnav_err' => ''
      ];

      // Load view
      $this->view('navigation/editmainnavigation', $data);
    }
  }


  public function maindelete($id)
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      if ($this->NavigationModel->deleteMainnav($id)) {
        //   flash('post_message', 'Post Removed');
        redirect('navigation/mainnavigation');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('navigation/mainnavigation');
    }
  }

  public function subnavigation()
  {

    $mainNav = $this->NavigationModel->getMainNav();
    $subNav = $this->NavigationModel->getSubNav();

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'subnav' => trim($_POST['subnav']),
        'mainNavSelect' => isset($_POST['mainNavSelect']) ? $_POST['mainNavSelect'] : 0,
        'subNavTitle' => isset($_POST['subNavTitle']) ? $_POST['subNavTitle'] : 0,
        'check' => isset($_POST['check']) ? $_POST['check'] : 1,
        'parent' => isset($_POST['parent']) ? $_POST['parent'] : 0,
        'subnav_err' => '',
        'mainNavSelect_err' => '',
        'mainNavlist' => $mainNav,
        'subNavlist' => $subNav
      ];

      // Validate mainnav
      if (empty($data['subnav'])) {
        $data['subnav_err'] = 'Please enter Sub Navigation';
      }

      // Validate mainnav
      if (empty($data['mainNavSelect'])) {
        $data['mainNavSelect_err'] = 'Please Select Main Navigation';
      }

      // Make sure errors are empty
      if (empty($data['subnav_err']) && empty($data['mainNavSelect_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->NavigationModel->addSubNav($data);

        if ($isAddValue) {

          redirect('navigation/subnavigation');
        } else {
          $data['subnav_err'] = 'Wrong Information';
          $data['mainNavSelect_err'] = 'Wrong Information';

          $this->view('navigation/subnavigation', $data);
        }
      } else {
        // Load view with errors
        $this->view('navigation/subnavigation', $data);
      }
    } else {



      // Init data
      $data = [
        'subnav' => '',
        'mainNavSelect' => '',
        'subnav_err' => '',
        'mainNavSelect_err' => '',
        'mainNavlist' => $mainNav['results'],
        'subNavlist' => $subNav
      ];

      // Load view
      $this->view('navigation/subnavigation', $data);
    }
  }

  public function subdelete($id)
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      if ($this->NavigationModel->deleteSubnav($id)) {
        //   flash('post_message', 'Post Removed');
        redirect('navigation/subnavigation');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('navigation/subnavigation');
    }
  }

  public function editsubnavigation($id)
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'id' => $id,
        'subnav' => trim($_POST['subnav']),
        'mainNavSelect' => isset($_POST['mainNavSelect']) ? $_POST['mainNavSelect'] : '',
        'parent' => isset($_POST['parent']) ? $_POST['parent'] : '',
        'subnav_err' => '',
        'mainNavSelect_err' => '',
        'parent_err' => ''
      ];

      // Validate mainnav
      if (empty($data['subnav'])) {
        $data['subnav_err'] = 'Please enter Sub Navigation';
      }

      // Validate mainnav
      if (empty($data['mainNavSelect'])) {
        $data['mainNavSelect_err'] = 'Please Select Main Navigation';
      }

      if (empty($data['parent'])) {
        $data['parent_err'] = 'Please Select Sub Navigation Title';
      }

      // Make sure errors are empty
      if (empty($data['subnav_err']) && empty($data['mainNavSelect_err']) && empty($data['parent_err'])) {
        // Validated
        // Check and set logged in user
        $isAddValue = $this->NavigationModel->updateSubNav($data);

        if ($isAddValue) {

          redirect('navigation/subnavigation');
        } else {
          $data['subnav_err'] = 'Wrong Information';
          $data['mainNavSelect_err'] = 'Wrong Information';

          $this->view('navigation/subnavigation', $data);
        }
      } else {
        // Load view with errors
        $this->view('navigation/subnavigation', $data);
      }
    } else {

      $subNav = $this->NavigationModel->getSubNavById($id);
      $subNavlist = $this->NavigationModel->getMainNav();
      $list = $this->NavigationModel->getSubNav();

      $data = [
        'id' => $id,
        'subnav' => $subNav->sub_menu_name,
        'mainnavid' => $subNav->main_menu_id,
        'mainNavSelect' => $subNav->main_menu_id,
        'parentid' => $subNav->parent_id,
        'subnav_err' => '',
        'mainnav_err' => '',
        'subnavlist' =>  $subNavlist['results'],
        'list' => $list
      ];

      // Load view
      $this->view('navigation/editsubnavigation', $data);
    }
  }
}
