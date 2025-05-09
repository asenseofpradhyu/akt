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
        $this->AdminProductModel = $this->model('AdminProductModel');
    }

    public function index()
    {
        redirect('');
    }

    public function productlist(int $id = 0)
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
            'totalCount' => $total,
            'filter_categories' => $this->NavigationModel->getCategoryFilter($id),
            'colors'            => $this->AdminProductModel->getColors(),
            'sizes'             => $this->AdminProductModel->getSizes(),
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
        $size   = $this->AdminProductModel->getSizes();
        $available_sizes = $this->AdminProductModel->getAvailableSizes($id);

        $data = [
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'detail' => $detail,
            'images' => $images,
            'singleimg' => $singleimg,
            'color' => $color,
            'similar_product' => $similarproducts,
            'sizes' => $size,
            'available_sizes' => $available_sizes,
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
        $countries = $this->UserModel->getCountries();
        if ($payment_info['amount'] > 0) {
            $getPayment = new RazorPay();
            $getPayment->pay_var['receipt'] = 'receipt' . uniqid();
            $getPayment->pay_var['amount'] = $payment_info['amount'] * 100; //$amount;
            $getPayment->pay_var['user_name'] = $user->customer_name;
            $getPayment->pay_var['email'] = $user->customer_email;
            $getPayment->pay_var['mobile'] = $user->customer_phone;
            $getPayment->pay_var['order_id'] = uniqid(); //giving static for now
            $paymentData = $getPayment->payment();
        };
        $data = [
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'img' => $singleimg,
            'payment_info' => $payment_info,
            'countries'     => $countries
        ];
        $this->view('product/checkout', array_merge($data, $paymentData));
    }

    public function getPayableAmount($bought_products, $params)
    {
        $payable_amount = 0;
        foreach ($bought_products as $key => $product) {
            $payable_amount += ($product->discount_price * $product->qnty);
        }
        $coupon_id = 0;
        $discount_amount = 0;
        $payable_amount += (($payable_amount < 500) ? 60 : 0);
        if (!empty($params['coupon_id'])) {
            $coupon = $this->CouponModel->getCoupon($params['coupon_id']);
            if (!empty($coupon)) {
                $payable_amount -= ($payable_amount * ($coupon->discount / 100));
                $coupon_id = $coupon->id;
                $discount_amount = $coupon->discount;
            }
        }
        return ['amount' => $payable_amount, 'coupon_id' => $coupon_id, 'discount_amount' => $discount_amount];
    }

    public function saveOrderDetails()
    {
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
        if(isset($_REQUEST['razorpay_payment_id']) && !empty($_REQUEST['razorpay_payment_id'])){
            $payment_json = json_encode(['razorpay_payment_id' => $_REQUEST['razorpay_payment_id'], 'razorpay_signature' => $_REQUEST['razorpay_signature']]);
            $payment_info = [
                'purchase_json'  => $payment_json,
                'purchase_mode'  => 1,
                'purchase_amount' => $_REQUEST['purchase_amount'],
                'payment_status' => 1,
                'coupon_id'      => $_REQUEST['coupon_id'],
            ];
        }else{
            $payment_info = [
                'purchase_json'  => '',
                'purchase_mode'  => 2,
                'purchase_amount' => $_REQUEST['purchase_amount'],
                'payment_status' => 0,
                'coupon_id'      => $_REQUEST['coupon_id'],
            ];
        }
        $payment_details_id = $this->UserModel->savePaymentDetails($payment_info);

        // save order
        $order_details = [
            'user_id' => $_SESSION['customer_id'],
            'shipping_address_id' => $shipping_address_id,
            'purchase_id' => $payment_details_id
        ];
        $basic_order = $this->ProductModel->saveBasicOrder($order_details);

        // save detailed products
        $login_user_id = $_SESSION['customer_id'];
        $get_cart      = $this->ProductModel->moveCartToOrderDetails(['user_id' => $login_user_id, 'order_id' => $basic_order]);

        // send product purchase mail
        $this->sendProductPurchaseMail($basic_order);
        if ($get_cart) {
            return redirect('/');
        } else {
            die('something went wrong');
        }
    }

    public function sendProductPurchaseMail(int $order_id)
    {
        $user = $this->UserModel->getUserdetails($_SESSION['customer_id']);
        $productDetails = $this->ProductModel->getPurchasedProductDetails($order_id);
        $shipping = $this->ProductModel->getShippingDetail($order_id);
        $payment_id = json_decode($shipping->purchase_json, true);
        $innerhtml = '';
        foreach ($productDetails as $product) :
            $innerData = [
                'product_name' => $product->product_name,
                'price' => $product->discount_price,
                'quantity' => $product->quantity,
                'product_image' => join('/', [URLROOT, $product->images]),
                'color' => $product->color,
                'size' => $product->size,
            ];
            $innerhtml .= $this->emailTemplate('email/product_portion', $innerData);
        endforeach;

        $param_array['address'] = join(',', [$shipping->address, $shipping->state_name, $shipping->zip_code, $shipping->country_name]);
        $param_array['name'] = join(' ', [$shipping->first_name, $shipping->last_name]);
        $param_array['total_price'] = $shipping->purchase_amount;
        $param_array['order_id'] = $order_id;
        $param_array['product_portion'] = $innerhtml;

        $html = $this->emailTemplate('email/purchase_product', $param_array);

        // make email parameters
        $sendmail = new sendmail();
        $sendmail->mail_params['tousers'][0]['email'] = $user->customer_email;
        $sendmail->mail_params['tousers'][0]['name'] = $user->customer_name;
        $sendmail->mail_params['subject'] = 'Product Purchased';
        $sendmail->mail_params['body'] = $html;
        $mail_sent = $sendmail->sendMail();
        if (is_bool($mail_sent)) {
            return true;
        } else {
            die(print_r('Could not send email'));
        }
    }

    public function filterProducts(){
        $mixed_params = explode('?', $_REQUEST['subCatid']);
        $other_params = [];
        parse_str($mixed_params[1], $other_params);
        $param_array = [
            'category' => $mixed_params[0],
            'minimum_price' => $_REQUEST['minimum_price'],
            'maximum_price' => $_REQUEST['maximum_price'],
            'colors'        => $_REQUEST['color'],
            'sizes'         => $_REQUEST['sizeID'],
            'search_query'  => $_REQUEST['search_query'],
            'sort_by'       => $_REQUEST['sortBy'],
        ];
        $param_array = array_merge($param_array, $other_params);
        $filter_data = $this->ProductModel->getFilteredProducts($param_array);
        echo json_encode($filter_data);
    }

    public function getColorsAndStock(){
        $product_id = $_REQUEST['product_id'];
        $size_id = $_REQUEST['size_id'];
        $colors = $this->AdminProductModel->getColorsAndStock($product_id, $size_id);
        echo json_encode(['colors' => $colors]);
    }
}
