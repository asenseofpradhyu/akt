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
                            <h1>Navigation</h1>
                            <small>Main Navigation</small>
                            <ol class="breadcrumb hidden-xs">
                                <li><a href="<?php echo URLROOT;?>/adminmaster/admindashboard"><i class="pe-7s-home"></i> Home</a></li>
                                <li class="active">Navigation</li>
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
                                        <form action="<?php echo URLROOT; ?>/navigation/editmainnavigation/<?php echo $data['id']; ?>" method="post" class="col-sm-12">
                                            <div class="col-sm-6 form-group">
                                                <label>Main Navigation</label>
                                                <input type="text" class="form-control" name="mainnav" placeholder="Enter Main Navigation" value="<?php echo $data['mainnav']; ?>" required>
                                                <span class="invalid-feedback" style="color: red;"><?php echo $data['mainnav_err']; ?></span>
                                            </div>
                                            <div class="col-sm-6" style="margin-top:25px">
                                                 <input type="submit" class="btn btn-primary" name="update" value="Update">
                                             </div>
                                         </form>
                                     </div>
                                 </div>

                             </div>
                         </div>
                         
                     </section> <!-- /.content -->
                 </div> <!-- /.content-wrapper -->

<?php require APPROOT . '/views/admininc/adminfooter.php'; ?>