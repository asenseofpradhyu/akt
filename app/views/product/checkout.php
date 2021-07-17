<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="page-content">
    <!--Body Container-->
    <!--Breadcrumbs-->
    <div class="breadcrumbs-wrapper">
        <div class="container">
            <div class="breadcrumbs"><a href="index.html" title="Back to the home page">Home</a> <span aria-hidden="true">|</span> <span>Checkout</span></div>
        </div>
    </div>
    <!--End Breadcrumbs-->
    <!--Page Title with Image-->

    <!--End Page Title with Image-->
    <div class="container">
        <!--Main Content-->
        <form action="<?php echo URLROOT; ?>/cart/saveTransaction" method="POST">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="card card--grey">
                        <div class="card-body">
                            <h2>SHIPPING ADDRESS</h2>
                            <!-- <p><a href="login.html">Login</a> or <a href="#">Register</a> for faster payment.</p> -->
                            <div class="row mt-2">
                                <div class="col-sm-6"><label class="text-uppercase">First Name:</label>
                                    <div class="form-group"><input type="text" class="form-control"></div>
                                </div>
                                <div class="col-sm-6"><label class="text-uppercase">Last Name:</label>
                                    <div class="form-group"><input type="text" class="form-control"></div>
                                </div>
                            </div><label class="text-uppercase">Country:</label>
                            <div class="form-group select-wrapper"><select class="form-control">
                                    <option value="United States">United States</option>
                                    <option value="Canada">Canada</option>
                                    <option value="China">China</option>
                                    <option value="India">India</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Mexico">Mexico</option>
                                </select></div>
                            <div class="row">
                                <div class="col-sm-6"><label class="text-uppercase">State:</label>
                                    <div class="form-group select-wrapper"><select class="form-control">
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District Of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                        </select></div>
                                </div>
                                <div class="col-sm-6"><label class="text-uppercase">zip/postal code:</label>
                                    <div class="form-group"><input type="text" class="form-control"></div>
                                </div>
                            </div><label class="text-uppercase">Address:</label>
                            <div class="form-group"><input type="text" class="form-control"></div>
                            <!-- <label class="text-uppercase">Address 2:</label>
                                    <div class="form-group"><input type="text" class="form-control"></div>
                                    <div class="clearfix"><input id="formcheckoutCheckbox1" name="checkbox1" type="checkbox"> <label for="formcheckoutCheckbox1">Save address to my account</label></div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 mt-2 mt-md-0">

                    <div class="mt-2"></div>
                    <div class="card card--grey">
                        <div class="card-body">
                            <h2 class="title">ORDER SUMMARY</h2>
                            <div class="table-responsive-sm order-table">
                                <table class="bg-white table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>

                                            <th class="text-left">Product Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $subtotal = 0;
                                        foreach ($data['img'] as $nav) :
                                            $subtotal += $nav->discount_price;
                                        ?>
                                            <tr>
                                                <td class="text-left"><?php echo $nav->product_name; ?></td>
                                                <td><?php echo $nav->discount_price; ?></td>
                                                <td>1</td>
                                                <td><?php echo $nav->discount_price; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot class="font-weight-600">
                                        <!-- <tr>
                                            <td colspan="4" class="text-right">Shipping </td>
                                            <td>$50.00</td>
                                        </tr> -->
                                        <tr>
                                            <td colspan="3" class="text-right">Total</td>
                                            <td><?php echo $subtotal; ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <!-- <div id="paypal-button-container"></div> -->
                    <!-- <div id="paypal-button"></div> -->
                    <!-- <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $data['key'] ?>" data-amount="<?php echo $data['amount'] ?>" data-currency="INR" data-name="<?php echo $data['name'] ?>" data-image="<?php echo $data['image'] ?>" data-description="<?php echo $data['description'] ?>" data-prefill.name="<?php echo $data['prefill']['name'] ?>" data-prefill.email="<?php echo $data['prefill']['email'] ?>" data-prefill.contact="<?php echo $data['prefill']['contact'] ?>" data-notes.shopping_order_id="3456" data-order_id="<?php echo $data['order_id'] ?>" <?php if ($data['display_currency'] !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount'] ?>" <?php } ?> <?php if ($data['display_currency'] !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency'] ?>" <?php } ?>>
                    </script> -->
                    <button id="rzp-button1">Pay with Razorpay</button>
                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
                    <!-- <div class="clearfix"><button type="submit" class="btn btn-large btn--lg w-100">Place Order</button></div> -->
                </div>
            </div>
        </form>
        <!--End Main Content-->
    </div>
    <!--End Body Container-->

</div>
<!--End Page Wrapper-->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    // Checkout details as a json
    var options = <?php echo $data['json'] ?>;

    /**
     * The entire list of Checkout fields is available at
     * https://docs.razorpay.com/docs/checkout-form#checkout-fields
     */
    options.handler = function(response) {
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.razorpayform.submit();
    };

    // Boolean whether to show image inside a white frame. (default: true)
    options.theme.image_padding = false;

    options.modal = {
        ondismiss: function() {
            console.log("This code runs when the popup is closed");
        },
        // Boolean indicating whether pressing escape key 
        // should close the checkout form. (default: true)
        escape: true,
        // Boolean indicating whether clicking translucent blank
        // space outside checkout form should close the form. (default: false)
        backdropclose: false
    };

    var rzp = new Razorpay(options);

    document.getElementById('rzp-button1').onclick = function(e) {
        // console.log('btc');
        // return false;
        rzp.open();
        e.preventDefault();
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>