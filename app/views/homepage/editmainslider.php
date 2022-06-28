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
                            <small>Main Slider</small>
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
                                        <form action="<?php echo URLROOT; ?>/homepage/editmainslider/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data" class="col-sm-12" id="editMainSlider" name="editMainSlider" novalidate>
                                            <div class="col-sm-6 form-group" style="margin-top:25px">
                                            <label >Slider Image</label>
                                                <input type="file" name="sliderimg" id="picture">
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['img_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6" style="margin-top:25px">
                                                 <label>Select Sub Navigation</label>
                                                <select class="form-control" id="" name="subNavSelect" size="1">
                                                    <option   class="test" disabled>Select Sub Navigation</option>
                                                    <?php  foreach($data['subnavlist'] as $nav) : ?>
                                                    
                                                    <option value="<?php echo $nav->sub_menu_id?>" <?php if($data['subNavSelect'] == $nav->sub_menu_id){ echo "selected";}?> ><?php echo $nav->sub_menu_name; ?></option>

                                                    <?php endforeach; ?>

                                                </select>
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['subNavSelect_err']; ?></span>
                                             </div>
                                             <div class="col-sm-6"></div>
                                            <div class="col-sm-6 float-right" style="margin-top:25px">
                                                 <input type="submit" class="btn btn-primary" style="float:right;" name="save" value="Save">
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
        $('editMainSlider').validate({
            rules: {
                sliderimg: {
                    required: true,
                    accept: "image/*"
                },
                subNavSelect: {
                    required: true
                }
            },
            messages: {
                sliderimg: {
                    required: "Please select an image",
                    accept: "Please select an image"
                },
                subNavSelect: {
                    required: "Please select a sub navigation"
                }
            }
        });
    });
</script>