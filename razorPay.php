<?php
require('vendor/razorpay-php/Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class RazorPay
{
    public $pay_var = [];
    public $verify  = [];
    public function __construct()
    {
        $this->key = paymant_key;
        $this->secret = payment_secret;
        $this->currency = currency;
        $this->api = new Api($this->key, $this->secret);
    }

    public function payment(){
        //
        // We create an razorpay order using orders api
        // Docs: https://docs.razorpay.com/docs/orders
        //
        $orderData = [
            'receipt'         => $this->pay_var['receipt'],
            'amount'          => $this->pay_var['amount'], // * 100, // rupees in paise commented
            'currency'        => $this->currency,
            'payment_capture' => 1 // auto capture
        ];
        // die(print_r($this->api));
        $razorpayOrder = $this->api->order->create($orderData);

        $razorpayOrderId = $razorpayOrder['id'];

        $_SESSION['razorpay_order_id'] = $razorpayOrderId;

        $displayAmount = $amount = $orderData['amount'];

        /* if ($this->currency !== 'INR') {
            $url = "https://api.fixer.io/latest?symbols=$this->currency&base=INR";
            $exchange = json_decode(file_get_contents($url), true);

            $displayAmount = $exchange['rates'][$this->currency] * $amount / 100;
        } */

        $data = [
            "key"               => $this->key,
            "amount"            => $amount,
            "name"              => SITENAME,
            "description"       => "Clothing Store",
            "image"             => URLROOT .'/public/images/icon-100px.png',
            "prefill"           => [
                "name"              => $this->pay_var['user_name'],
                "email"             => $this->pay_var['email'],
                "contact"           => $this->pay_var['mobile'],
            ],
            "notes"             => [
                // "address"           => $this->pay_var['address'],
                "merchant_order_id" => $this->pay_var['order_id'],
            ],
            "theme"             => [
                "color"             => "#111111"
            ],
            "order_id"          => $razorpayOrderId,
        ];

        // if ($this->currency !== 'INR') {
            $data['display_currency']  = $this->currency;
            $data['display_amount']    = (float)($displayAmount / 100);
        // }
            
        $json = json_encode($data);
        $data['json'] = $json;
        return $data;
    }

    public function verifyPayment(){
        $success = true;

        $error = "Payment Failed";

        if (empty($this->verify['razorpay_payment_id']) === false) {
            $api = new Api($this->key, $this->secret);

            try {
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                    'razorpay_payment_id' => $this->verify['razorpay_payment_id'],
                    'razorpay_signature' => $this->verify['razorpay_signature']
                );

                $api->utility->verifyPaymentSignature($attributes);
            } catch (SignatureVerificationError $e) {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }

        if ($success === true) {
            $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$this->verify['razorpay_payment_id']}</p>";
        } else {
            $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
        }
        return $html;
    }
}
