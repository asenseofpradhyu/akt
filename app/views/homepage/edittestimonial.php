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
                            <small>Sale Collection</small>
                            <ol class="breadcrumb hidden-xs">
                                <li><a href="<?php echo URLROOT;?>/adminmaster/admindashboard"><i class="pe-7s-home"></i> Home</a></li>
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
                                        <form action="<?php echo URLROOT; ?>/homepage/edittestimonial/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data" class="col-sm-12">
                                        <div class="col-sm-6 form-group" style="margin-top:25px">
                                                <label>Testimonial Description</label>
                                                <textarea class="form-control" name="descp"><?php echo $data['descp']?></textarea>
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['descp_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group" style="margin-top:25px">
                                                <label>Testimonial Person Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Testimonial Person Name" value="<?php echo $data['name']; ?>" >
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['name_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group" style="margin-top:25px">
                                            <label>Testimonial Image</label>
                                                <input type="file" name="gridimg" id="picture">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['img_err']; ?></span>
                                            </div>
                                             
                                            <div class="col-sm-6 float-right" style="margin-top:25px">
                                                 <input type="submit" class="btn btn-primary" style="float:right;" name="save" value="Update">
                                             </div>
                                         </form>
                                     </div>
                                 </div>

                             </div>
                         </div>
                         
                     </section> <!-- /.content -->
                 </div> <!-- /.content-wrapper -->

<?php require APPROOT . '/views/admininc/adminfooter.php'; ?>