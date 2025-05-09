<?php require APPROOT . '/views/admininc/adminheader.php'; ?>
<?php require APPROOT . '/views/admininc/adminnavbar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="header-icon">
                            <i class="pe-7s-note2"></i>
                        </div>
                        <div class="header-title">
                            <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>  
                            <h1>Product</h1>
                            <small>Add Product</small>
                            <ol class="breadcrumb hidden-xs">
                                <li><a href="<?php echo URLROOT;?>/adminmaster/admindashboard"><i class="pe-7s-home"></i> Home</a></li>
                                <li class="active">Product</li>
                            </ol>
                        </div>
                    </section>
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <!-- Form controls -->
                            <div class="col-sm-12">
                                <div class="panel panel-bd lobidrag">
                                    
                                    <div class="panel-body">
                                        <form action="<?php echo URLROOT; ?>/AdminProduct/addproduct" method="post" enctype="multipart/form-data" class="col-sm-12" name="addAdminProduct" id="addAdminProduct">
                                        <div class="col-sm-6 form-group">
                                            <label>Select Main Navigation</label>
                                                <select class="form-control" id="" name="mainNavSelect" size="1">
                                                    <option  selected class="test" disabled>Select Main Navigation</option>
                                                    <?php  foreach($data['mainNavlist'] as $nav) : ?>
                                                    
                                                    <option value="<?php echo $nav->main_menu_id?>"><?php echo $nav->main_menu_name; ?></option>

                                                    <?php endforeach; ?>

                                                </select>
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['mainnav_err']; ?></span>
                                            </div>
                                        <div class="col-sm-6 form-group">
                                                 <label>Select Sub Navigation</label>
                                                <select class="form-control" id="" name="subNavSelect" size="1">
                                                    <option  selected class="test" disabled>Select Sub Navigation</option>
                                                    <?php  foreach($data['subnavlist'] as $nav) : ?>
                                                    
                                                    <option value="<?php echo $nav->sub_menu_id?>"><?php echo $nav->sub_menu_name; ?></option>

                                                    <?php endforeach; ?>

                                                </select>
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['subnav_err']; ?></span>
                                             </div>
                                             <div class="col-sm-6 form-group">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter Product Name">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['productname_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Product Description</label>
                                                <textarea name="description" class="form-control" placeholder="Product Description" rows="1"></textarea>
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['productdesc_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Total Price</label>
                                                <input type="text" class="form-control" name="totalprice" placeholder="Enter Total Price">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['totalprice_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Discount Price</label>
                                                <input type="text" class="form-control" name="discountprice" placeholder="Enter Discount Price">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['discountprice_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Product Code</label>
                                                <input type="text" class="form-control" name="code" placeholder="Enter Product Code">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['code_err']; ?></span>
                                            </div>
                                            <h3 style="padding-left:15px;">Product Feature</h3>
                                            <div class="col-sm-6 form-group">
                                                <label>Feature Length</label>
                                                <input type="text" class="form-control" name="length" placeholder="Enter Feature Length">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['length_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Feature Garment Type</label>
                                                <input type="text" class="form-control" name="garment" placeholder="Enter Garment Type">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['garment_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Feature Neck</label>
                                                <input type="text" class="form-control" name="neck" placeholder="Enter Neck">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['neck_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Feature Fabric</label>
                                                <input type="text" class="form-control" name="fabric" placeholder="Enter Fabric">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['fabric_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Feature Occassion</label>
                                                <input type="text" class="form-control" name="occasion" placeholder="Enter Occasion">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['occasion_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Feature Design Type</label>
                                                <input type="text" class="form-control" name="design" placeholder="Enter Design Type">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['design_err']; ?></span>
                                            </div>

                                            <h3 style="padding-left:15px;">Product Details</h3>
                                            <div class="col-sm-6 form-group">
                                                <label>(Details)The Product Price is inclusive of</label>
                                                <input type="text" class="form-control" name="inclusive" placeholder="The Product Price is inclusive of">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['inclusive_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>(Details)The Product Price is not Inclusive of:</label>
                                                <input type="text" class="form-control" name="notinclusive" placeholder="The Product Price is not Inclusive of:">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['notinclusive_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>(Details)Care:</label>
                                                <input type="text" class="form-control" name="care" placeholder="Care">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['care_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>(Details)Style Tip:</label>
                                                <textarea name="style" class="form-control" placeholder="Style Tip" rows="1"></textarea>
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['style_err']; ?></span>
                                            </div>
                                            
                                            
                                            <div class="col-sm-6" style="margin-top:25px">
                                                 <input type="submit" class="btn btn-primary" name="save" value="Add">
                                             </div>
                                         </form>
                                
                                     </div>
                                 </div>

                             </div>
                         </div>
                         
                     </section> <!-- /.content -->
                 </div> <!-- /.content-wrapper -->

<?php require APPROOT . '/views/admininc/adminfooter.php'; ?>
<script>
    $(function () {
        $('#addAdminProduct').validate({
            rules: {
                mainNavSelect: {
                    required: true
                },
                subNavSelect: {
                    required: true
                },
                name: {
                    required: true,
                    minlength: 3
                },
                description: {
                    required: true,
                    minlength: 3
                },
                productprice: {
                    required: true,
                    // minlength: 3
                },
                totalprice: {
                    required: true,
                    // minlength: 3
                },
                discountprice: {
                    required: true,
                    // minlength: 3
                },
                code: {
                    required: true,
                    minlength: 3
                },
                length: {
                    required: true,
                    minlength: 3
                },
                garment: {
                    required: true,
                    minlength: 3
                },
                neck: {
                    required: true,
                    minlength: 3
                },
                fabric: {
                    required: true,
                    minlength: 3
                },
                occasion: {
                    required: true,
                    minlength: 3
                },
                design: {
                    required: true,
                    minlength: 3
                },
                inclusive: {
                    required: true,
                    minlength: 3
                },
                notinclusive: {
                    required: true,
                    minlength: 3
                },
                care: {
                    required: true,
                    minlength: 3
                },
                style: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                mainNavSelect: {
                    required: "Please select a main navigation"
                },
                subNavSelect: {
                    required: "Please select a sub navigation"
                },
                name: {
                    required: "Please enter a product name",
                    minlength: "Your product name must consist of at least 3 characters"
                },
                description: {
                    required: "Please enter a product description",
                    minlength: "Your product description must consist of at least 3 characters"
                },
                productprice: {
                    required: "Please enter a product price",
                    minlength: "Your product price must consist of at least 3 characters"
                },
                totalprice: {
                    required: "Please enter a total price",
                    minlength: "Your total price must consist of at least 3 characters"
                },
                discountprice: {
                    required: "Please enter a discount price",
                    minlength: "Your discount price must consist of at least 3 characters"
                },
                code: {
                    required: "Please enter a code",
                    minlength: "Your code must consist of at least 3 characters"
                },
                length: {
                    required: "Please enter a length",
                    minlength: "Your length must consist of at least 3 characters"
                },
                garment: {
                    required: "Please enter a garment",
                    minlength: "Your garment must consist of at least 3 characters"
                },
                neck: {
                    required: "Please enter a neck",
                    minlength: "Your neck must consist of at least 3 characters"
                },
                fabric: {
                    required: "Please enter a fabric",
                    minlength: "Your fabric must consist of at least 3 characters"
                },
                occasion: {
                    required: "Please enter a occasion",
                    minlength: "Your occasion must consist of at least 3 characters"
                },
                design: {
                    required: "Please enter a design",
                    minlength: "Your design must consist of at least 3 characters"
                },
                inclusive: {
                    required: "Please enter a inclusive",
                    minlength: "Your inclusive must consist of at least 3 characters"
                },
                notinclusive: {
                    required: "Please enter a notinclusive",
                    minlength: "Your notinclusive must consist of at least 3 characters"
                },
                care: {
                    required: "Please enter a care",
                    minlength: "Your care must consist of at least 3 characters"
                },
                style: {
                    required: "Please enter a style",
                    minlength: "Your style must consist of at least 3 characters"
                }
            },
            errorplacement: function (error, element) {
                error.insertAfter(element);
            }
        });
    });
</script>