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
  public function emptyPage()
  {
    $this->view('pages/empty');
  }

  public function postContact(){
    $request = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $this->HomepageModel->saveInquiryDetails($request);
    // send mail to self user
    // make email parameters
    $sendmail = new sendmail();
    $sendmail->mail_params['tousers'][0]['email'] = SITE_ADMIN_EMAIL;
    $sendmail->mail_params['tousers'][0]['name'] = SITE_ADMIN_USERNAME;
    $sendmail->mail_params['subject'] = 'Inquiry from '.$request['name'];
    $sendmail->mail_params['body'] = $this->emailTemplate('email/inquiry_admin', $request);
    $sendmail->sendMail();

    $sendmail = new sendmail();
    $sendmail->mail_params['tousers'][0]['email'] = $request['email'];
    $sendmail->mail_params['tousers'][0]['name'] = $request['name'];
    $sendmail->mail_params['subject'] = 'Inquiry Response';
    $sendmail->mail_params['body'] = $this->emailTemplate('email/inquiry_user', $request);
    $sendmail->sendMail();
    redirect('pages/contact');
  }
}
