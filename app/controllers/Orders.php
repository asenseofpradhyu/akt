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

}