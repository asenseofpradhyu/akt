<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="page-content">
    <!--Body Container-->
    <!--Breadcrumbs-->
    <div class="breadcrumbs-wrapper">
        <div class="container">
            <div class="breadcrumbs"><a href="<?php echo URLROOT; ?>" title="Back to the home page">Home</a> <span aria-hidden="true">|</span> <span>Forgot Your Password</span></div>
        </div>
    </div>
    <!--End Breadcrumbs-->
    <!--Page Title with Image-->
    <div class="page-title text-center">
        <h2>Forgot Your Password</h2>
    </div>
    <!--End Page Title with Image-->
    <div class="container">
        <div class="row">
            <!--Main Content-->
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 box offset-3">
                <div class="mb-4">
                    <form method="post" action="<?php echo URLROOT; ?>/users/postForgotPassword" accept-charset="UTF-8" class="contact-form">
                        <h3>Retrieve your password here</h3>
                        <p>Please enter your email address below. You will receive a link to reset your password.</p>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="email">Email Address <span class="required">*</span></label>
                                    <input type="email" name="email" placeholder="" id="email" class="" autocorrect="off" autocapitalize="off" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-left col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" value="Submit">
                                <p class="mb-4">
                                    <a href="<?php echo URLROOT; ?>/users/login">« Back To Login Page</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--End Main Content-->
        </div>

    </div>
    <!--End Body Container-->

</div>
<!--End Page Wrapper-->

<?php require APPROOT . '/views/inc/footer.php'; ?>