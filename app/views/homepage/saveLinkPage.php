<?php require APPROOT . '/views/admininc/adminheader.php'; ?>
<?php require APPROOT . '/views/admininc/adminnavbar.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Homepage</h1>
            <small>Miscellaneous links</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="<?php echo URLROOT; ?>/adminmaster/admindashboard"><i class="pe-7s-home"></i> Home</a></li>
                <li class="active">Miscellaneous links</li>
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
                        <div class="col-sm-12" style="margin-top: 25px;">
                        <?php extract($data); ?>
                        <form action="<?php echo URLROOT; ?>/homepage/saveMiscLink/<?php echo (!empty($link_obj))? $link_obj->id : 0 ?>" method="post" class="col-sm-12">
                            <div class="col-sm-4 form-group" style="margin-top:25px">
                                <label>Offer Link:</label>
                                <input type="hidden" name="id" value="<?php echo (!empty($link_obj))? $link_obj->id : 0 ?>">
                                <input type="text" class="form-control" name="offer_link_text" placeholder="Enter Offer Link text" value="<?php echo (!empty($link_obj))? $link_obj->content : "" ?>">
                                <span class="invalid-feedback" style="color: red;"></span>
                            </div>
                            <div class="col-sm-4 form-group" style="margin-top:25px">
                            <label>Offer Link:</label>
                            <input type="text" class="form-control" name="offer_link_url" placeholder="Enter Offer Link text" value="<?php echo (!empty($link_obj))? $link_obj->link_url : "" ?>">
                            </div>

                            <div class="col-sm-2 float-right" style="margin-top:25px">
                                <input type="submit" class="btn btn-primary" style="float:right;" name="save" value="Save">
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /.content -->
</div> 
<?php require APPROOT . '/views/admininc/adminfooter.php'; ?>