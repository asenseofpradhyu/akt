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
        $this->CouponModel = $this->model('CouponModel');
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
        $payment_info = $this->getPayableAmount($singleimg, ['coupon_id' => $_REQUEST['coupon_id']]);
        $user      = $this->UserModel->getUserdetails($customerID);
        if($payment_info['amount'] > 0){
            $getPayment= new RazorPay();
            $getPayment->pay_var['receipt'] = 'receipt'. uniqid();
            $getPayment->pay_var['amount'] = $payment_info['amount'] * 100; //$amount;
            $getPayment->pay_var['user_name'] = $user->customer_name;
            $getPayment->pay_var['email'] = $user->customer_email;
            $getPayment->pay_var['mobile'] = $user->customer_phone;
            $getPayment->pay_var['address'] = '2, navdeep'; //$address;
            $getPayment->pay_var['order_id'] = 1; //giving static for now
            $paymentData = $getPayment->payment();
        };
        $data = [
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'img' => $singleimg,
            'payment_info' => $payment_info
        ];
        $this->view('product/checkout', array_merge($data, $paymentData));
    }

    public function getPayableAmount($bought_products, $params){
        $payable_amount = 0;
        foreach ($bought_products as $key => $product) {
            $payable_amount += ($product->discount_price * $product->qnty);
        }
        $coupon_id = 0;
        $payable_amount += (($payable_amount < 500) ? 60 : 0);
        if(!empty($params['coupon_id'])){
            $coupon = $this->CouponModel->checkApplyCoupon($params['coupon_id']);
            if(!empty($coupon)){
                $payable_amount -= ($payable_amount * ($coupon->discount / 100));
                $coupon_id = $coupon->id;
            }
        }
        return ['amount' => $payable_amount, 'coupon_id' => $coupon_id];
    }

    public function saveOrderDetails(){
        // save shipping address
        $shipping_address = [
            'first_name' => $_REQUEST['first_name'],
            'last_name' => $_REQUEST['last_name'],
            'country_id' => $_REQUEST['country_id'],
            'state_id' => $_REQUEST['state_id'],
            'zip_code' => $_REQUEST['zip_code'],
            'address' => $_REQUEST['address'],
        ];
        $shipping_address_id = $this->UserModel->saveShippingAddress($shipping_address);

        // save payment details
        $payment_json = json_encode(['razorpay_payment_id' => $_REQUEST['razorpay_payment_id'], 'razorpay_signature' => $_REQUEST['razorpay_signature']]);
        $payment_info = [
            'purchase_json'  => $payment_json,
            'purchase_mode'  => 1,
            'payment_status' => 1
        ];
        $payment_details_id = $this->UserModel->savePaymentDetails($payment_info);

        // save order
        $order_details = [
            'user_id' => $_SESSION['customer_id'],
            'shipping_address_id' => $shipping_address_id,
            'purchase_id' => $payment_details_id
        ];
        $basic_order = $this->ProductModel->saveBasicOrder($order_details);

        // save detailed products
        
    }
}
