<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="page-content">        
        <!--Body Container-->
        <!--Breadcrumbs-->
        <div class="breadcrumbs-wrapper">
        	<div class="container">
            	<div class="breadcrumbs"><a href="<?php echo URLROOT; ?>" title="Back to the home page">Home</a> <span aria-hidden="true">|</span> <span>Login</span></div>
            </div>
        </div>
        <!--End Breadcrumbs-->
        <!--Page Title with Image-->
       
        <!--End Page Title with Image-->
        <div class="container">
            <div class="row">
				<!--Main Content-->
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 box xs-none">
                	<img src="<?php echo URLROOT; ?>/images/lookbook/featured-img2.jpg">
                </div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 box">
                	<div class="mb-4">
                       <form method="post" action="<?php echo URLROOT; ?>/users/login" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">	
                       <h3>Registered Customers</h3>
						<p>If you have an account with us, please log in.</p>
                          <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerEmail">Email <span class="required">*</span></label>
                                    <input type="email" name="customeremail" placeholder="" id="CustomerEmail" class="" autocorrect="off" autocapitalize="off" autofocus>
                                    <span class="invalid-feedback d-block" style="color: red;"><?php echo $data['email_err']; ?></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Password <span class="required">*</span></label>
                                    <input type="password" value="" name="customerpassword" placeholder="" id="CustomerPassword" class="">
                                    <span class="invalid-feedback d-block" style="color: red;"><?php echo $data['password_err']; ?></span>                        	
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="text-left col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" value="Login">
                                <p class="mb-4">
									<a href="<?php echo URLROOT; ?>/users/resetpassword">Forgot your password?</a> 
								 </p>
                            </div>
                         </div>
                     </form>
    
                       <p class="mb-4">
                       <br>
						    <a href="<?php echo URLROOT; ?>/users/register">Not a member? REGISTER NOW</a> 
						</p>
                     
                    </div>
               	</div>
				<!--End Main Content-->
			</div>
        
        </div><!--End Body Container-->
        
    </div><!--End Page Wrapper-->

    <?php require APPROOT . '/views/inc/footer.php'; ?>