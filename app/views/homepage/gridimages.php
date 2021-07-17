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

            <h1>Homepage</h1>
            <small>Grid Images</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="<?php echo URLROOT; ?>/adminmaster/admindashboard"><i class="pe-7s-home"></i> Home</a></li>
                <li class="active">Homepage</li>
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
                        <form action="<?php echo URLROOT; ?>/homepage/gridimages" method="post" enctype="multipart/form-data" class="col-sm-12">
                            <div class="col-sm-6 form-group" style="margin-top:25px">
                                <label>Image Title</label>
                                <input type="text" class="form-control" name="imgtitle" placeholder="Enter Image Title" value="">
                                <span class="invalid-feedback" style="color: red;"><?php echo $data['title_err']; ?></span>
                            </div>
                            <div class="col-sm-6 form-group" style="margin-top:25px">
                                <label>Select Sub Navigation</label>
                                <select class="form-control" id="" name="subNavSelect" size="1">
                                    <option selected class="test" disabled>Select Sub Navigation</option>
                                    <?php foreach ($data['subnavlist'] as $nav) : ?>

                                        <option value="<?php echo $nav->sub_menu_id ?>"><?php echo $nav->sub_menu_name; ?></option>

                                    <?php endforeach; ?>

                                </select>
                                <span class="invalid-feedback" style="color: red;"><?php echo $data['subNavSelect_err']; ?></span>
                            </div>
                            <div class="col-sm-6 form-group" style="margin-top:25px">
                                <label>Grid Image</label>
                                <input type="file" name="gridimg" id="picture">
                                <span class="invalid-feedback" style="color: red;"><?php echo $data['img_err']; ?></span>
                            </div>

                            <div class="col-sm-6 float-right" style="margin-top:25px">
                                <input type="submit" class="btn btn-primary" style="float:right;" name="save" value="Save">
                            </div>
                        </form>

                        <div class="col-sm-12" style="margin-top: 25px;">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Submenu</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $count = 1;
                                        foreach ($data['gridimagelist'] as $nav) : ?>

                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo $nav->img_title; ?></td>
                                                <td><img src="<?php echo $nav->grid_img; ?>" alt="" style="width:200px; height:200px;"></td>
                                                <td><?php echo $nav->sub_menu_name; ?></td>
                                                <td>
                                                    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/homepage/editgridimages/<?php echo $nav->gridimages_id; ?>" style="margin-right:10px;"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                                    <form style="display:inline-block;" action="<?php echo URLROOT; ?>/homepage/deletegridimages/<?php echo $nav->gridimages_id; ?>" method="post">
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>



                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<?php require APPROOT . '/views/admininc/adminfooter.php'; ?>