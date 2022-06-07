<?php require APPROOT . '/views/admininc/adminheader.php'; ?>
<?php require APPROOT . '/views/admininc/adminnavbar.php'; ?>
<?php $GetImages = new ProductImage();  ?>

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
            <small>Product List</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="<?php echo URLROOT; ?>/adminmaster/admindashboard"><i class="pe-7s-home"></i> Home</a></li>
                <li class="active">Product</li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="col-sm-12" style="margin-top: 25px;">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>No.</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Main Menu</th>
                            <th>Sub Menu</th>
                            <th>Total Price</th>
                            <th>Discount Price</th>
                            <th>Product Code</th>
                            <th>Stock</th>
                            <!-- <th>Size</th> -->
                            <!-- <th>Color</th> -->
                            <th>Length</th>
                            <th>Garment</th>
                            <th>Neck</th>
                            <th>Fabric</th>
                            <th>Ocassion</th>
                            <th>Design Type</th>
                            <th>Inclusive</th>
                            <th>Not Inclusive</th>
                            <th>Care</th>
                            <th>Style Tip</th>
                            <th>Image Uploaded</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $count = 1;

                        foreach ($data['list'] as $nav) :
                        ?>


                            <tr>
                                <td>
                                    <a class="btn btn-primary btn-xs" href="<?php echo URLROOT; ?>/AdminProduct/editproductdetails/<?php echo $nav->product_id; ?>" style="margin-right:10px;"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>

                                    <a class="btn btn-primary btn-xs" href="<?php echo URLROOT; ?>/AdminProduct/inventoryList/<?php echo $nav->product_id; ?>" style="margin-right:10px;"><i class="fa fa-list" aria-hidden="true"></i></a>
                                </td>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $nav->product_name; ?></td>
                                <?php

                                if (strlen($nav->product_desc) > 50) {
                                    $trimstring = substr($nav->product_desc, 0, 50) . '...';
                                } else {
                                    $trimstring = $nav->product_desc;
                                }

                                ?>
                                <td><?php echo $trimstring; ?></td>
                                <td><?php echo $nav->main_menu_name; ?></td>
                                <td><?php echo $nav->sub_menu_name; ?></td>
                                <td><?php echo $nav->total_price; ?></td>
                                <td><?php echo $nav->discount_price; ?></td>
                                <td><?php echo $nav->product_code; ?></td>
                                <td><?php echo $nav->stock; ?></td>

                                <td><?php echo $nav->length; ?></td>
                                <td><?php echo $nav->garment; ?></td>
                                <td><?php echo $nav->neck; ?></td>
                                <td><?php echo $nav->fabric; ?></td>
                                <td><?php echo $nav->occasion; ?></td>
                                <td><?php echo $nav->design_type; ?></td>
                                <td><?php echo $nav->d_inclusive; ?></td>
                                <td><?php echo $nav->d_not_inclusive; ?></td>
                                <td><?php echo $nav->care; ?></td>
                                <td><?php echo $nav->style_tip; ?></td>
                                <td>

                                    <?php
                                    if ($nav->status == 1) {
                                        echo "Yes";
                                    } else {
                                        echo "No";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $nav->created_date; ?></td>
                            </tr>

                        <?php endforeach;
                        ?>



                    </tbody>
                </table>
            </div>

        </div>


    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->


<?php require APPROOT . '/views/admininc/adminfooter.php'; ?>