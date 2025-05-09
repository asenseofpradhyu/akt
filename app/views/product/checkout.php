<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="page-content">
    <!--Body Container-->
    <!--Breadcrumbs-->
    <div class="breadcrumbs-wrapper">
        <div class="container">
            <div class="breadcrumbs"><a href="<?php echo URLROOT; ?>" title="Back to the home page">Home</a> <span aria-hidden="true">|</span> <span>Checkout</span></div>
        </div>
    </div>
    <!--End Breadcrumbs-->
    <!--Page Title with Image-->

    <!--End Page Title with Image-->
    <div class="container">
        <!--Main Content-->
        <form name='razorpayform' action="<?php echo URLROOT; ?>/Product/saveOrderDetails" method="POST" id="razorpayform" novalidate>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="card card--grey">
                        <div class="card-body">
                            <h2>SHIPPING ADDRESS</h2>
                            <!-- <p><a href="login.html">Login</a> or <a href="#">Register</a> for faster payment.</p> -->
                            <div class="row mt-2">
                                <div class="col-sm-6"><label class="text-uppercase">First Name:</label>
                                    <div class="form-group"><input type="text" name="first_name" class="form-control"></div>
                                </div>
                                <div class="col-sm-6"><label class="text-uppercase">Last Name:</label>
                                    <div class="form-group"><input type="text" name="last_name" class="form-control"></div>
                                </div>
                            </div><label class="text-uppercase">Country:</label>
                            <div class="form-group select-wrapper"><select class="form-control" name="country_id"  onchange="getStates(this.value)">
                                    <?php foreach ($data['countries'] as $country) {
                                        echo "<option value='$country->id'>" . $country->name . "</option>"; 
                                    } ?>
                                </select></div>
                            <div class="row">
                                <div class="col-sm-6"><label class="text-uppercase">State:</label>
                                    <div class="form-group select-wrapper"><select class="form-control" id="state_id" name="state_id">
                                        </select></div>
                                </div>
                                <div class="col-sm-6"><label class="text-uppercase">zip/postal code:</label>
                                    <div class="form-group"><input type="text" name="zip_code" class="form-control"></div>
                                </div>
                            </div><label class="text-uppercase">Address:</label>
                            <div class="form-group"><input type="text" name="address" class="form-control"></div>
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
                                        // echo '<pre>';print_r($data['img']);

                                        $subtotal = 0;
                                        foreach ($data['img'] as $nav) :
                                            $subtotal += ($nav->discount_price * $nav->qnty);
                                        ?>
                                        <input type="hidden" name="product_id[]" value="<?php echo $nav->product_id; ?>">
                                        <input type="hidden" name="qty[]" value="<?php echo $nav->qnty; ?>">
                                        <input type="hidden" name="color[]" value="<?php echo $nav->color_id; ?>">
                                        <input type="hidden" name="size_id[]" value="<?php echo $nav->size_id; ?>">
                                            <tr>
                                                <td class="text-left"><?php echo $nav->product_name; ?></td>
                                                <td><?php echo $nav->discount_price; ?></td>
                                                <td><?php echo $nav->qnty; ?></td>
                                                <td><?php echo ($nav->discount_price * $nav->qnty); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <?php $shipping_charges = (($subtotal > 500) ? 0 : 60);
                                    $subtotal += $shipping_charges; ?>
                                    <tfoot class="font-weight-600">
                                        <tr>
                                            <td colspan="3" class="text-right">Shipping </td>
                                            <td><?php echo $shipping_charges; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right">Discount</td>
                                            <td><?php echo $data['payment_info']['discount_amount']; ?>%</td>
                                        <tr>
                                            <td colspan="3" class="text-right">Total</td>
                                            <td><?php echo $data['payment_info']['amount']; ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <input type="hidden" name="coupon_id" value="<?php echo $data['payment_info']['coupon_id']; ?>">
                    <input type="hidden" name="purchase_amount" value="<?php echo $data['payment_info']['amount']; ?>">
                    <?php
                    if ($data['payment_info']['amount'] > 0) :
                    ?>
                        <button id="rzp-button1" class="btn btn-primary">Pay with Razorpay</button>
                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                        <input type="hidden" name="razorpay_signature" id="razorpay_signature">
                        OR
                        <button type="submit" class="btn btn-primary">Cash On Delivery</button>

                    <?php else : ?>
                        <input type="submit" name="Purchase">
                    <?php endif; ?>
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

    function getStates(country_id) {
        $.ajax({
            type: "get",
            url: "<?php echo URLROOT; ?>/Users/getStates",
            data: {country_id : country_id},
            dataType: "JSON",
            success: function (response) {
                html = '';
                $.each(response, function (indexInArray, state) { 
                    html +='<option value='+state.id+'> ' + state.name + '</option>';
                });
                $('#state_id').html(html);
            }
        });
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
    $(function () {
        $('#razorpayform').validate({
            rules: {
                first_name: {
                    required: true,
                    minlength: 3
                },
                last_name: {
                    required: true,
                    minlength: 3
                },
                address: {
                    required: true,
                    minlength: 3
                },
                state_id: {
                    required: true
                },
                country_id: {
                    required: true
                },
                zip_code: {
                    required: true,
                    minlength: 3
                },
                purchase_amount: {
                    required: true
                }
            },
            messages: {
                first_name: {
                    required: "Please enter your first name",
                    minlength: "Your first name must be at least 3 characters long"
                },
                last_name: {
                    required: "Please enter your last name",
                    minlength: "Your last name must be at least 3 characters long"
                },
                address: {
                    required: "Please enter your address",
                    minlength: "Your address must be at least 3 characters long"
                },
                state_id: {
                    required: "Please select your state"
                },
                country_id: {
                    required: "Please select your country"
                },
                zip_code: {
                    required: "Please enter your zip code",
                    minlength: "Your zip code must be at least 3 characters long"
                },
                purchase_amount: {
                    required: "Please enter your purchase amount"
                }
            },
            errorplacement: function (error, element) {
                error.insertAfter(element);
            }
        });
    });
</script>