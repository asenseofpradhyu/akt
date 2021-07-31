<?php require APPROOT . '/views/inc/header.php'; ?>


<div id="page-content">
    <!--Body Container-->
    <!--Breadcrumbs-->
    <div class="breadcrumbs-wrapper">
        <div class="container">
            <div class="breadcrumbs"><a href="index.html" title="Back to the home page">Home</a> <span aria-hidden="true">|</span> <span>Your Cart</span></div>
        </div>
    </div>
    <!--End Breadcrumbs-->

    <div class="container">
        <div class="row">
            <!--Main Content-->
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col">
                <form id="cartForm" action="<?php echo URLROOT; ?>/product/checkout/<?php echo $_SESSION['customer_id']; ?>" method="post" class="cart style2">
                    <table>
                        <thead class="cart__row cart__header">
                            <tr>
                                <th colspan="2" class="text-center">Product</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-right">Total</th>
                                <th class="action">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $subtotal = 0;
                            foreach ($data['img'] as $nav) :
                                $subtotal += ($nav->discount_price * $nav->qnty);
                            ?>

                                <tr class="cart__row border-bottom line1 cart-flex border-top">
                                    <td class="cart__image-wrapper cart-flex-item">
                                        <a href="#"><img class="cart__image" src="<?php echo URLROOT; ?><?php echo $nav->images; ?>" alt="<?php echo $nav->product_name; ?>"></a>
                                    </td>
                                    <td class="cart__meta small--text-left cart-flex-item">
                                        <div class="list-view-item__title">
                                            <a href="#"><?php echo $nav->product_name; ?></a>
                                        </div>
                                        <div class="cart__meta-text">
                                            Color: <?php echo $nav->color ?><br>Size: Small<br>
                                        </div>
                                    </td>
                                    <td class="cart__price-wrapper cart-flex-item">
                                        <span class="money"><?php echo $nav->discount_price; ?></span>
                                    </td>
                                    <td class="cart__update-wrapper cart-flex-item text-right">
                                        <span class="money"><?php echo $nav->qnty; ?></span>
                                    </td>
                                    <td class="text-right small--hide cart-price">
                                        <div><span class="money"><?php echo ($nav->discount_price * $nav->qnty); ?></span></div>
                                    </td>
                                    <td class="text-center small--hide">
                                        <a href="javascript:void(0);" class="btn btn--secondary cart__remove" data-id="<?php echo $nav->product_id; ?>" title="Remove item"><i class="icon icon anm anm-times-l"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-left"><a href="" class="btn--link cart-continue"><i class="icon icon-arrow-circle-left"></i> Continue shopping</a></td>
                                <td colspan="3" class="text-right"><button type="submit" name="update" class="btn--link cart-update"><i class="fa fa-refresh"></i> Update</button></td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="currencymsg">We processes all orders in USD. While the content of your cart is currently displayed in USD, the checkout will use USD at the most current exchange rate.</div>
                    <hr>
                    <input type="hidden" name="coupon_id" id="coupon_id">
                </form>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                <div class="solid-border">
                    <div class="row border-bottom pb-2">
                        <span class="text-center pb-2"><strong>Enter Coupon Code:</strong></span>
                        <input type="text" class="form-control pt-2 pb-2" name="coupon_code" id="coupon_code">
                        <button type="button" id="apply_coupon" class="btn pb-2 w-100">Apply Coupon Code</button>
                    </div>
                    <div class="row border-bottom pb-2 pt-2">
                        <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
                        <span class="col-12 col-sm-6 text-right"><span class="money"><?php echo $subtotal; ?></span></span>
                    </div>
                    <div class="row border-bottom pb-2 pt-2">
                        <span class="col-12 col-sm-6 cart__subtotal-title">Shipping Charges</span>
                        <?php $shipping_charges = (($subtotal > 500)? 0 : 60); ?>
                        <span class="col-12 col-sm-6 text-right"><?php echo $shipping_charges; ?></span>
                    </div>
                    <div class="row border-bottom pb-2 pt-2">
                        <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Grand Total</strong></span>
                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money"><?php echo $subtotal + $shipping_charges; ?></span></span>
                    </div>


                    <a href="javascript:void(0);" onclick="submitCartForm()" class='btn btn--small-wide checkout w-100'>Proceed To Checkout</a>
                    <div class="paymnet-img"><img src="<?php echo URLROOT; ?>/images/payment-img.jpg" alt="Payment"></div>



                </div>

            </div>
            <!--End Main Content-->
        </div>

    </div>
    <!--End Body Container-->

</div>
<!--End Page Wrapper-->
<?php require APPROOT . '/views/inc/footer.php'; ?>