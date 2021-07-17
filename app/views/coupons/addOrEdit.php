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
                <li><a href="<?php echo URLROOT; ?>/adminmaster/admindashboard"><i class="pe-7s-home"></i> Home</a></li>
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
                    <?php if(isset($data['coupon'])){ $coupon = $data['coupon']; } ?>
                        <form action="<?php echo URLROOT; ?>/coupon/saveCoupon" method="post">
                        <input type="hidden" name="id" id="coupon_id" value="<?php echo (isset($coupon))? $coupon->id : 0; ?>">
                            <div class="col-sm-6 form-group">
                                <label>Coupon Code</label>
                                <input type="text" class="form-control" name="coupon_code" id="coupon_code" <?php if(isset($coupon)): ?> value="<?php echo $coupon->coupon_code; ?>" <?php endif; ?>>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Discount Amount(in %)</label>
                                <input type="text" class="form-control" name="discount" id="discount" <?php if(isset($coupon)): ?> value="<?php echo $coupon->discount; ?>" <?php endif; ?>>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>No of times coupon can be used</label>
                                <input type="text" class="form-control" name="no_of_attempts" id="no_of_attempts" <?php if(isset($coupon)): ?> value="<?php echo $coupon->no_of_attempts; ?>" <?php endif; ?>>
                            </div>
                            <div class="col-sm-6" style="margin-top:25px">
                                <input type="submit" class="btn btn-primary" name="save" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require APPROOT . '/views/admininc/adminfooter.php'; ?>