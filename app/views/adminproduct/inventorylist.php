<?php require APPROOT . '/views/admininc/adminheader.php'; ?>
<?php require APPROOT . '/views/admininc/adminnavbar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <a href="<?php echo URLROOT . '/AdminProduct/modifyInventoryView/' . $data['product_id']; ?>" class="btn btn-primary pull-right m-t-md">Add New</a>
            <div class="header-title">
                <h1>Inventory</h1>
                <small>Inventory List</small>

                <!-- <ol class="breadcrumb">
                    <li><a href="<?php echo URLROOT; ?>/admin"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Inventory</li>
                </ol> -->
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
                                <th>Color</th>
                                <th>Size</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['inventorylist'] as $product) : ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo URLROOT; ?>/adminproduct/editInventory/<?php echo $product->id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo URLROOT; ?>/adminproduct/deleteInventory/<?php echo $product->id; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                    <td><?php echo $product->color; ?></td>
                                    <td><?php echo $product->size; ?></td>
                                    <td><?php echo $product->stock; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



<?php require APPROOT . '/views/admininc/adminfooter.php'; ?>