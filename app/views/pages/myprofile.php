<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="page-content">        
        <!--Body Container-->
        <!--Breadcrumbs-->
        <div class="breadcrumbs-wrapper">
        	<div class="container">
            	<div class="breadcrumbs"><a href="<?php echo URLROOT; ?>" title="Back to the home page">Home</a> <span aria-hidden="true">|</span> <span>My Account</span></div>
            </div>
        </div>
        <!--End Breadcrumbs-->
        <div class="container">
        	<div class="page-title text-center"><h2>My Account</h2></div>
            <div class="dashboard-upper-info">
            	<div class="row align-items-center no-gutters">
                <div class="col-xl-3 col-lg-3 col-md-12">
                    <div class="d-single-info">
                        <p class="user-name">Hello <span class="font-weight-600"><?php echo $data['user']->customer_name; ?></span></p>
                        
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="d-single-info">
                        <p>Need Assistance? Customer service at.</p>
                        <p><a href="mailto:Support@aktwear.com" class="__cf_email__" data-cfemail="a4c5c0c9cdcae4ddcbd1d6d7cdd0c18ac7cbc98a">Support@aktwear.com</a></p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-12">
                    <div class="d-single-info">
                        <p>E-mail them at </p>
                        <p><a href="mailto:info@aktwear.com" class="__cf_email__" data-cfemail="ef9c9a9f9f809d9baf96809a9d9c869b8ac18c8082">info@aktwear.com</a></p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-12">
                    <div class="d-single-info text-lg-center">
                        <a class="view-cart" href="<?php echo URLROOT; ?>/product/cart/<?php echo $_SESSION['customer_id'];?>"><i class="icon anm anm-bag-l"></i> View Cart</a>
                    </div>
                </div>
            </div>
	        </div>
            <div class="row mb-5">
                <div class="col-xl-2 col-lg-2 col-md-12 md-margin-20px-bottom">
                    <!-- Nav tabs -->
                    <ul class="nav flex-column dashboard-list" role="tablist">
                        <li><a class="nav-link active" data-toggle="tab" href="#Profile">Profile</a></li>
                         <li><a class="nav-link" data-toggle="tab" href="#address"> My Addresses</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#orders" onclick="displayUserOrders();">My Orders</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#wishlist">My Wishlist</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#changepasssword">Change Password</a></li>
                    </ul>
                    <!-- End Nav tabs -->
                </div>

                <div class="col-xs-10 col-lg-10 col-md-12">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard-content padding-30px-all md-padding-15px-all" style="">
                        <!-- Dashboard -->
                        <div id="Profile" class="tab-pane fade active show">
                            <h3>Account details </h3>
                            <div class="account-login-form bg-light-gray padding-20px-all">
                                <form action="<?php echo URLROOT;?>/users/updateprofile" method="post">
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-lastname">Name <span class="required-f">*</span></label>
                                                <input name="name" value="<?php echo $data['user']->customer_name;?>" id="input-lastname" class="form-control" type="text">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-email">E-Mail <span class="required-f">*</span></label>
                                                <input name="email" value="<?php echo $data['user']->customer_email;?>" id="input-email" class="form-control" type="email">
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-telephone">Telephone <span class="required-f">*</span></label>
                                                <input name="telephone" value="<?php echo $data['user']->customer_phone; ?>" id="input-telephone" class="form-control" type="tel">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label>Birthdate</label>
                                                <input name="birthdate" value="<?php echo $data['user']->customer_bday;?>" max="3000-12-31" min="1000-01-01" class="form-control" type="date">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <button type="submit" class="btn margin-15px-top btn-primary">Save</button>
                                </form>

                            </div>

                        </div>
                        <!-- End Dashboard -->

                        <!-- Orders -->
                        <div id="address" class="product-order tab-pane fade">
                             <p class="xs-fon-13 margin-10px-bottom">The following addresses will be used on the checkout page by default.</p>
                            <h4 class="billing-address">Billing address</h4>
                            <a class="view margin-5px-bottom" href="#">edit</a>
                            <p>No 40 Baria Sreet <br> 133/2 NewYork City, <br> NY, United States.</p>
                            
                        </div>
                        <!-- End Orders -->
                          <!-- Orders -->
                        <div id="orders" class="product-order tab-pane fade">
                            <h3>Downloads</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Quantity</th>
                                            <th>Purchase date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userOrdersRows">
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <!-- End Orders -->

                                           <!-- Address -->
                        <div id="wishlist" class="address tab-pane">
                          <form action="#">
                        <div class="wishlist-table table-content table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    	<th class="product-name text-center alt-font">Remove</th>
                                        <th class="product-price text-center alt-font">Images</th>
                                        <th class="product-name alt-font">Product</th>
                                        <th class="product-price text-center alt-font">Price</th>
                                        <th class="stock-status text-center alt-font">Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php   foreach($data['wishlist'] as $nav) : ?>
                                    <tr>
                                    	<td class="product-remove text-center" valign="middle"><a href="javascript:void(0);" class="btn btn--secondary wish__remove" data-id="<?php echo $nav->product_id; ?>" title="Remove tem"><i class="icon icon anm anm-times-l"></i></a></td>
                                        <td class="product-thumbnail text-center">
                                            <a href="#"><img src="<?php echo URLROOT; ?><?php echo $nav->images; ?>" alt="" title=""></a>
                                        </td>
                                        <td class="product-name"><h4 class="no-margin"><a href="<?php echo URLROOT;?>/product/productdetail/<?php echo $nav->product_id; ?>"><?php echo $nav->product_name; ?></a></h4></td>
                                        <td class="product-price text-center"><span class="amount"><?php echo "₹".$nav->discount_price; ?></span></td>
                                        <td class="stock text-center">
                                        <?php if($nav->stock != 0){
                                            echo '<span class="in-stock">In Stock</span>';
                                        } else {
                                            echo '<span class="out-stock">Out Of Stock</span>';
                                        }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </form>
                        </div>
                        <!-- End Address -->

                        <!-- Account Details -->
                        <div id="changepasssword" class="tab-pane fade">
                            <h3>Change Password </h3>
                            <div class="account-login-form bg-light-gray padding-20px-all">
                                <form action="<?php echo URLROOT;?>/users/updatepassword" method="post">
                                    <fieldset>
                                        <p></p>

                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-telephone">Old Password <span class="required-f">*</span></label>
                                                <input name="old" value="" id="input-telephone" class="form-control" type="password">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-firstname">New Password <span class="required-f">*</span></label>
                                                <input name="new" value="" id="input-firstname" class="form-control" type="password">
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-lastname">Conform Password <span class="required-f">*</span></label>
                                                <input name="con" value="" id="input-lastname" class="form-control" type="password">
                                            </div>
                                        </div>
                                              </fieldset>

                                    <button type="submit" class="btn margin-15px-top btn-primary">Update Password</button>
                                </form>

                            </div>

                        </div>
                        <!-- End Account Details -->
                    </div>
                    <!-- End Tab panes -->
                </div>
            </div>
        </div><!--End Body Container-->
    </div><!--End Page Wrapper-->

<?php require APPROOT . '/views/inc/footer.php'; ?>