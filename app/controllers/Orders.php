<?php
class Orders extends Controller
{
  public function __construct()
  {
    parent::__construct();
    /* if (!isLoggedInAdmin()) {
      redirect('adminmaster/adminlogin');
    } */

    $this->NavigationModel = $this->model('NavigationModel');
    $this->HomepageModel = $this->model('HomepageModel');
    $this->AdminProductModel  = $this->model('AdminProductModel');
    $this->ProductModel  = $this->model('ProductModel');
    $this->UsersModel    = $this->model('UsersModel');
  }

  public function checkAdmin()
  {
    if (!isLoggedInAdmin()) {
      redirect('adminmaster/adminlogin');
    }
  }

  public function purchasereport()
  {
    $user_id = $_SESSION['user_id'];
    $data = [
      'title' => 'Purchase Report',
      'navigation' => $this->NavigationModel->getNavigation(),
      'purchasereport' => $this->AdminProductModel->getPurchaseReport($user_id),
    ];

    $this->view('adminmaster/purchasereports', $data);
  }

  public function getUserOrders()
  {
    $user_id = $_SESSION['customer_id'];
    $data = $this->ProductModel->getPurchaseReport($user_id);
    foreach ($data as $key => $object) {
      $data[$key]->purchase_date = date('d/m/Y h:i A', strtotime($object->purchase_date));
    }
    $return_data = json_encode([
      'status' => 1,
      'orders' => $data,
    ]);
    echo $return_data;
  }

  public function getAllPurchaseReport()
  {
    $this->checkAdmin();
    $data = [
      'title' => 'Purchase Report',
      'navigation' => $this->NavigationModel->getMainNav(),
      'purchasereport' => $this->AdminProductModel->getPurchaseReportAllUsers(),
    ];
    return $this->view('adminorders/purchasereports', $data);
  }

  public function purchaseList()
  {
    $this->checkAdmin();
    $data = [
      'title' => 'Purchase List',
      'navigation' => $this->NavigationModel->getMainNav(),
      'purchaselist' => $this->AdminProductModel->getPurchaseList(),
    ];
    return $this->view('adminorders/purchaselist', $data);
  }

  public function markAsPaid($purchase_id){
    $this->checkAdmin();
    $this->AdminProductModel->markAsPaid($purchase_id);
    redirect('orders/purchaseList');
  }

  public function userList()
  {
    $this->checkAdmin();
    $data = [
      'title' => 'User List',
      'navigation' => $this->NavigationModel->getMainNav(),
      'userlist' => $this->UsersModel->getUserList(),
    ];
    return $this->view('adminorders/userlist', $data);
  }

  public function inquiryList()
  {
    $this->checkAdmin();
    $data = [
      'title' => 'Inquiry List',
      'navigation' => $this->NavigationModel->getMainNav(),
      'inquirylist' => $this->HomepageModel->getInquiryList(),
    ];
    return $this->view('adminorders/inquirylist', $data);
  }

}