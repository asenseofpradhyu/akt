<?php
class Product extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->db = new Database;

        //  Main Menu
        $this->main_menu = $this->NavigationModel->getMainNav();

        // Sub Menu 
        $this->sub_menu = $this->NavigationModel->getsubnav();

        $this->ProductModel = $this->model('ProductModel');
        $this->UserModel = $this->model('UsersModel');
    }

    public function index()
    {
        redirect('');
    }

    public function productlist($id = 0)
    {
        $data['id'] = $id;
        if (isset($_REQUEST['product_category_id']) && isset($_REQUEST['search_query'])) {
            $data['id'] = $_REQUEST['product_category_id'];
            $data['search_query'] = $_REQUEST['search_query'];
        }
        $list = $this->ProductModel->getProductList($data);
        $total = count($list);

        $data = [
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'list' => $list,
            'totalCount' => $total
        ];
        $this->view('product/productlist', $data);
    }

    public function productdetail($id)
    {

        $detail = $this->ProductModel->getProductDetail($id);
        $images = $this->ProductModel->getProductImages($id);
        $singleimg = $this->ProductModel->getProductSingleImg($id);
        $color = $this->ProductModel->getProductColor($id);
        $similarproducts = $this->ProductModel->getSimilarProducts($detail->sub_menu_id);
        $data = [
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'detail' => $detail,
            'images' => $images,
            'singleimg' => $singleimg,
            'color' => $color,
            'similar_product' => $similarproducts
        ];



        $this->view('product/productdetail', $data);
    }

    public function cart($customerID)
    {

        // $detail = $this->ProductModel->getProductDetail($id);
        $singleimg = $this->ProductModel->getCartProductSingleImg($customerID);
        $data = [
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'img' => $singleimg,

        ];

        $this->view('product/cart', $data);
    }

    public function checkout($customerID)
    {

        // $detail = $this->ProductModel->getProductDetail($id);
        $singleimg = $this->ProductModel->getCartProductSingleImg($customerID);
        $user      = $this->UserModel->getUserdetails($customerID);
        $getPayment= new RazorPay();
        $getPayment->pay_var['receipt'] = 'receipt'. uniqid();
        $getPayment->pay_var['amount'] = 2000; //$amount;
        $getPayment->pay_var['user_name'] = $user->customer_name;
        $getPayment->pay_var['email'] = $user->customer_email;
        $getPayment->pay_var['mobile'] = $user->customer_phone;
        $getPayment->pay_var['address'] = '2, navdeep'; //$address;
        $getPayment->pay_var['order_id'] = 1; //giving static for now
        $paymentData = $getPayment->payment();
        $data = [
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'img' => $singleimg
        ];


        $this->view('product/checkout', array_merge($data, $paymentData));
    }
}
