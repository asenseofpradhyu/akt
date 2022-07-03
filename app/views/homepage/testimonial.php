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
            <small>Accessories</small>
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
                        <form action="<?php echo URLROOT; ?>/homepage/testimonial" method="post" enctype="multipart/form-data" class="col-sm-12" id="addTestimonials" name="addTestimonials" novalidate>
                            <div class="col-sm-6 form-group" style="margin-top:25px">
                                <label>Testimonial Description</label>
                                <textarea class="form-control" name="descp"></textarea>
                                <span class="invalid-feedback" style="color: red;"><?php echo $data['descp_err']; ?></span>
                            </div>
                            <div class="col-sm-6 form-group" style="margin-top:25px">
                                <label>Testimonial Person Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Testimonial Person Name" value="">
                                <span class="invalid-feedback" style="color: red;"><?php echo $data['name_err']; ?></span>
                            </div>
                            <div class="col-sm-6 form-group" style="margin-top:25px">
                                <label>Testimonial Image</label>
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
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $count = 1;
                                        foreach ($data['list'] as $nav) : ?>

                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo $nav->testi_name; ?></td>
                                                <td><?php echo $nav->testi_desc; ?></td>
                                                <td><img src="<?php echo $nav->testi_img; ?>" alt="" style="width:200px; height:200px;"></td>

                                                <td>
                                                    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/homepage/edittestimonial/<?php echo $nav->testimonial_id; ?>" style="margin-right:10px;"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                                    <form style="display:inline-block;" action="<?php echo URLROOT; ?>/homepage/deletetestimonial/<?php echo $nav->testimonial_id; ?>" method="post">
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
<script>
    $(function () {
        $('#addTestimonials').validate({
            rules: {
                descp: {
                    required: true,
                    minlength: 10
                },
                name: {
                    required: true,
                    minlength: 3
                },
                gridimg: {
                    required: true,
                    extension: "jpg|jpeg|png|gif"
                }
            },
            messages: {
                descp: {
                    required: "Please enter a description",
                    minlength: "Description must be at least 10 characters long"
                },
                name: {
                    required: "Please enter a name",
                    minlength: "Name must be at least 3 characters long"
                },
                gridimg: {
                    required: "Please upload an image",
                    extension: "Please upload a valid image"
                }
            }
        });
    });
</script>