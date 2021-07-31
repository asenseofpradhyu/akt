<?php
class Coupon extends Controller{
    public function __construct(){
        parent::__construct();
        /* if (!isLoggedInAdmin()) {
            redirect('adminmaster/adminlogin');
          } */
        $this->CouponModel = $this->model('CouponModel');
  
    }

    public function index(){
        return true;
    }

    /**
     * get list of all coupons
     * @author: harsh bhatt
     * @date: 26-01-2021
     */
    public function couponList(){
        $getcoupons = $this->CouponModel->getCouponList();
        $this->view('coupons/list', ['coupons' => $getcoupons]);
    }

    /**
     * get view to add coupon
     * @author: harsh bhatt
     * @date: 26-01-2021
     * @params: int id (if id 0 than add coupon or edit coupon)
     */

    public function addCoupons($id = 0){
       $return_data = [];
       if($id > 0){
           $return_data['coupon'] = $this->CouponModel->getCoupon($id);
       }
       $this->view('coupons/addOrEdit', $return_data);
    }

    public function saveCoupon(){
        $request = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->CouponModel->attributes['id'] = $request['id'];
        $this->CouponModel->attributes['coupon_code'] = $request['coupon_code'];
        $this->CouponModel->attributes['discount'] = $request['discount'];
        $this->CouponModel->attributes['no_of_attempts'] = $request['no_of_attempts'];
        $saveSuccess = $this->CouponModel->save();
        if($saveSuccess){
            redirect('coupon/couponList');
        }else{
            die('oh crap!');
        }
    }

    public function checkApplyCoupon(){
        $coupon_code = $_REQUEST['coupon_code'];
        $cou = $this->CouponModel->checkApplyCoupon($coupon_code);
        echo json_encode(['status' => 1, 'coupon_code' => (array)$cou]);
        // return $cou;
    }
}
