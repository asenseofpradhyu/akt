<?php require APPROOT . '/views/admininc/adminheader.php'; ?>
<?php require APPROOT . '/views/admininc/adminnavbar.php'; ?>

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
            <h1>Report</h1>
            <small>Product Purchases List</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="<?php echo URLROOT; ?>/adminmaster/admindashboard"><i class="pe-7s-home"></i> Home</a></li>
                <li class="active">Purchase Report</li>
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
                            <th>No.</th>
                            <th>Product Name</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Customer Phone</th>
                            <th>Purchase Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $count = 1;
                        foreach ($data['purchasereport'] as $product) :
                        ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $product->product_name; ?></td>
                                
                                <td><?php echo $product->color; ?></td>
                                <td><?php echo $product->size; ?></td>
                                <td><?php echo $product->quantity; ?></td>
                                <td><?php echo $product->customer_name; ?></td>
                                <td><?php echo $product->customer_email; ?></td>
                                <td><?php echo $product->customer_phone; ?></td>
                                <td><?php echo $product->purchase_date; ?></td>
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