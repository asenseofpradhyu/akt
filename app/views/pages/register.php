<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="page-content">
    <!--Body Container-->
    <!--Breadcrumbs-->
    <div class="breadcrumbs-wrapper">
        <div class="container">
            <div class="breadcrumbs"><a href="<?php echo URLROOT; ?>" title="Back to the home page">Home</a> <span aria-hidden="true">|</span> <span>Create An Account</span></div>
        </div>
    </div>
    <!--End Breadcrumbs-->
    <!--Page Title with Image-->
    <div class="page-title text-center">
        <h2>Create An Account</h2>
    </div>
    <!--End Page Title with Image-->
    <div class="container">
        <!--Main Content-->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 box">
                <div class="mb-4">
                    <h3>Personal Information</h3>
                    <form method="post" id="register_form" action="" accept-charset="UTF-8" class="contact-form" novalidate>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="CustomerFirstName">Name<span class="required">*</span></label>
                                    <input id="CustomerFirstName" type="text" name="Customername" placeholder="" class="" autocorrect="off" autocapitalize="off" autofocus>
                                    <span class="invalid-feedback d-block" style="color: red;"><?php echo $data['name_err']; ?></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="CustomerEmail">Email Address <span class="required">*</span></label>
                                    <input id="CustomerEmail" type="email" name="Customeremail" placeholder="" class="" autocorrect="off" autocapitalize="off" autofocus>
                                    <span class="invalid-feedback d-block" style="color: red;"><?php echo $data['email_err']; ?></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number <span class="required">*</span></label>
                                    <input id="phone" type="text" name="Customerphone" placeholder="" class="" autocorrect="off" autocapitalize="off" autofocus>
                                    <span class="invalid-feedback d-block" style="color: red;"><?php echo $data['phone_err']; ?></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="password">Password<span class="required">*</span></label>
                                    <input id="password" type="password" name="Customerpassword" placeholder="" class="" autocorrect="off" autocapitalize="off" autofocus>
                                    <span class="invalid-feedback d-block" style="color: red;"><?php echo $data['password_err']; ?></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="confpassword">Confirm Password<span class="required">*</span></label>
                                    <input id="confpassword" type="password" name="Customerconfpassword" placeholder="" class="" autocorrect="off" autocapitalize="off" autofocus>
                                    <span class="invalid-feedback d-block" style="color: red;"><?php echo $data['confpassword_err']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group form-check col-12 col-sm-12 col-md-12 col-lg-12">
                                <label class="form-check-label padding-15px-left">
                                    <input type="checkbox" class="form-check-box" value="" name="Customercheck"> &nbsp;I have read and agree to the Terms and Conditions
                                </label>
                                <span class="invalid-feedback d-block" style="color: red;"><?php echo $data['check_err']; ?></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="text-left col-12 col-sm-12 col-md-6 col-lg-6">
                                <input type="submit" class="btn mb-3" value="Submit">
                            </div>
                        </div>
                    </form>
                    <p class="mb-4">
                        <br>
                        <a href="<?php echo URLROOT; ?>./users/login"> Alredy member? Login Here</a>
                    </p>
                </div>
            </div>
        </div>
        <!--End Main Content-->
    </div>
    <!--End Body Container-->

</div>
<!--End Page Wrapper-->

<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
    $(function() {
        $('#register_form').validate({
            rules: {
                Customername: {
                    required: true
                },
                Customeremail: {
                    required: true,
                    email: true
                },
                Customerphone: {
                    required: true,
                    number: true,
                    maxlength: 10,
                    minlength: 10
                },
                Customerpassword: {
                    required: true,
                    minlength: 8,
                },
                Customerconfpassword:{
                    minlength: 8,
                    equalTo: '[name="Customerpassword"]'
                },
                Customercheck:{
                    required: true
                }
            },
            messages: {
                Customername: {
                    required: "Please enter Customer Name"
                },
                Customeremail: {
                    required: "Please enter Customer Email",
                    email: 'Please enter valid email address'
                },
                Customerphone: {
                    required: "Please enter Customer phone number",
                    number: 'Please enter digits only',
                    maxlength: 'Phone Number should be 10 digits',
                    minlength: 'Phone Number should be 10 digits'
                },
                Customerpassword: {
                    required: 'Please enter Password',
                    minlength: 'Password contain atleast 8 characters'
                },
                Customerconfpassword:{
                    minlength: 'Password contain atleast 8 characters',
                    equalTo: 'Confirm Password does not match'
                },
                Customercheck: {
                    required: 'Please accept terms and conditions'
                }
            },
            // errors in the form
            errorPlacement: function(error, element) {
                let type = $(element).attr('type');
                error.insertAfter((type=='checkbox') ? $(element).parent().parent(): element);
            }
        });
    });
</script>