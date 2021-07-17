<?php
class Pages extends Controller
{

  private $main_menu;
  private $sub_menu;

  public function __construct()
  {
    parent::__construct();
    $this->db = new Database;
    $this->HomepageModel = $this->model('HomepageModel');

    //  Main Menu
    $this->main_menu = $this->NavigationModel->getMainNav();

    // Sub Menu 
    $this->sub_menu = $this->NavigationModel->getsubnav();
  }

  public function index()
  {

    $mainsliderlist = $this->HomepageModel->getMainSliderList();
    $gridimagesList = $this->HomepageModel->getgridimagesList();
    $collectionList = $this->HomepageModel->getSalesCollectionList();
    $accessoriesList = $this->HomepageModel->getAccessoriesList();
    $testimonailList = $this->HomepageModel->getTestimonialsList();
    $newarrivallist  = $this->HomepageModel->getNewArrival();

    $data = [
      'title' => 'AKT Fashion Store',
      'description' => 'NEw MVC',
      'main_menu' => $this->main_menu,
      'sub_menu' => $this->sub_menu,
      'mainsliderlist' => $mainsliderlist,
      'gridimagelist' => $gridimagesList,
      'salesCollection' => $collectionList,
      'Accessories' => $accessoriesList,
      'testi_list' => $testimonailList,
      'new_arrival' => $newarrivallist
    ];

    // $this->view('inc/navbar', $data);
    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data = [
      'title' => 'About Us',
      'description' => 'App to share posts with other users',
      'main_menu' => $this->main_menu,
      'sub_menu' => $this->sub_menu
    ];

    $this->view('pages/about', $data);
  }

  public function productlist()
  {


    $this->view('product/productlist');
  }

  public function contact()
  {

    $data = [
      'main_menu' => $this->main_menu,
      'sub_menu' => $this->sub_menu
    ];

    $this->view('pages/contact', $data);
  }
}
