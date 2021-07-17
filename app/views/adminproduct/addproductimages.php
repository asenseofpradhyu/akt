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
            <small>Add Product Images</small>
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
                        <form action="<?php echo URLROOT; ?>/adminproduct/addproductimages" method="post" enctype="multipart/form-data" class="col-sm-12">
                            <div class="col-sm-6 form-group">
                                <label>Select Product</label>
                                <select class="form-control" id="" name="product" size="1">
                                    <option selected class="test" disabled>Select Product</option>
                                    <?php foreach ($data['productlist'] as $nav) : ?>

                                        <option value="<?php echo $nav->product_id ?>"><?php echo $nav->product_name; ?></option>

                                    <?php endforeach; ?>

                                </select>
                                <span class="invalid-feedback" style="color: red;"><?php echo $data['product_err']; ?></span>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Select Color</label>
                                <select class="form-control" id="" name="color" size="1">
                                    <option selected class="test" disabled>Select Color</option>
                                    <?php foreach ($data['colorlist'] as $nav) : ?>

                                        <option value="<?php echo $nav->color_id ?>"><?php echo $nav->color; ?></option>

                                    <?php endforeach; ?>

                                </select>
                                <span class="invalid-feedback" style="color: red;"><?php echo $data['color_err']; ?></span>
                            </div>
                            <div class="col-sm-6 form-group custom-file">
                                <label>Select Product Images</label>
                                <input type="file" name="file[]" class="custom-file-input" id="file" multiple>
                                <span class="invalid-feedback" style="color: red;"><?php echo $data['img_err']; ?></span>
                            </div>

                            <div class="col-sm-6" style="margin-top:25px">
                                <input type="submit" class="btn btn-primary" name="save" value="Add">
                            </div>
                            <div class="col-sm-12">
                                <span class="invalid-feedback" style="color: red;"><?php echo $data['img_err']; ?></span>
                                <span class="invalid-feedback" style="color: red;"><?php echo $data['type']; ?></span>
                                <span class="invalid-feedback" style="color: green;"><?php echo $data['success']; ?></span>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>


        <div class="col-sm-12" style="margin-top: 25px;">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Product Name</th>
                            <th>Product Color</th>
                            <th>Product Images</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $count = 1;

                        foreach ($data['list'] as $nav) :
                        ?>


                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $nav->product_name; ?></td>
                                <td><?php echo $nav->color; ?></td>

                                <td>

                                    <?php
                                    $resultData = $GetImages->colorProductImg($nav->product_id, $nav->color_id);
                                    foreach ($resultData as $img) : ?>
                                        <img src="<?php echo URLROOT; ?><?php echo $img['images']; ?>" alt="<?php echo $nav->product_name; ?>" data-id="<?php echo $img['image_id']; ?>" data-img="<?php echo URLROOT; ?><?php echo $img['images']; ?>" style="width:auto; height:50px; cursor:pointer;" data-toggle="modal" data-target="#myModal">
                                    <?php endforeach; ?>
                                </td>
                            </tr>

                        <?php endforeach;
                        ?>



                    </tbody>
                </table>
            </div>

        </div>


    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Product Image</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo URLROOT; ?>/adminproduct/updateproductimages" method="post" enctype="multipart/form-data" class="product-img-action">
                    <div class="col-sm-6 form-group custom-file">
                        <label>Select Product Images</label>
                        <input type="file" name="file[]" class="custom-file-input" id="file">
                        <span class="invalid-feedback" style="color: red;"><?php echo $data['img_err']; ?></span>
                    </div>

                    <img class="img-update" src="" alt="" srcset="" style="width:auto; height:200px;">

            </div>
            <div class="modal-footer" style="border:none;">
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <form style="display:inline-block;" class="product-img-del" action="<?php echo URLROOT; ?>/adminproduct/deleteproductimage" method="post">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </div>
        </div>
    </div>
</div>




<?php require APPROOT . '/views/admininc/adminfooter.php'; ?>