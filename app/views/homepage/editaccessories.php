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
                                        <form action="<?php echo URLROOT; ?>/homepage/editaccessories/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data" class="col-sm-12" id="editAccessories" name="editAccessories" novalidate>
                                        <div class="col-sm-6 form-group" style="margin-top:25px">
                                                <label>Image Title</label>
                                                <input type="text" class="form-control" name="imgtitle" placeholder="Enter Image Title" value="<?php echo $data['title']?>" >
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['title_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6 form-group" style="margin-top:25px">
                                                 <label>Select Sub Navigation</label>
                                                <select class="form-control" id="" name="subNavSelect" size="1">
                                                    <option  selected class="test" disabled>Select Sub Navigation</option>
                                                    <?php  foreach($data['subnavlist'] as $nav) : ?>
                                                    
                                                    <option value="<?php echo $nav->sub_menu_id?>" <?php if($data['subNavSelect'] == $nav->sub_menu_id){ echo "selected";}?>><?php echo $nav->sub_menu_name; ?></option>

                                                    <?php endforeach; ?>

                                                </select>
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['subNavSelect_err']; ?></span>
                                             </div>
                                            <div class="col-sm-6 form-group" style="margin-top:25px">
                                            <label >Grid Image</label>
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
<script>
    $(function () {
        $('#editAccessories').validate({
            rules: {
                imgtitle: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                subNavSelect: {
                    required: true,
                    minlength: 1,
                    maxlength: 50
                },
                gridimg: {
                    required: true,
                    minlength: 1,
                    maxlength: 50
                }
            },
            messages: {
                imgtitle: {
                    required: "Please enter a image title",
                    minlength: "Image title must be at least 3 characters long",
                    maxlength: "Image title cannot be more than 50 characters long"
                },
                subNavSelect: {
                    required: "Please select a sub navigation",
                    minlength: "Sub navigation must be at least 1 characters long",
                    maxlength: "Sub navigation cannot be more than 50 characters long"
                },
                gridimg: {
                    required: "Please select a grid image",
                    minlength: "Grid image must be at least 1 characters long",
                    maxlength: "Grid image cannot be more than 50 characters long"
                }
            }
        });
    });
</script>