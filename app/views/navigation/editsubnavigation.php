<?php require APPROOT . '/views/admininc/adminheader.php'; ?>
<?php require APPROOT . '/views/admininc/adminnavbar.php'; ?>

<?php echo $data['parentid']; ?>
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
            <small>Sub Navigation</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="<?php echo URLROOT; ?>/adminmaster/admindashboard"><i class="pe-7s-home"></i> Home</a></li>
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
                        <form action="<?php echo URLROOT; ?>/navigation/editsubnavigation/<?php echo $data['id']; ?>" method="post" class="col-sm-12" id="EditSubNavigation" name="EditSubNavigation" novalidate>
                            <div class="col-sm-6 form-group">
                                <label>Sub Navigation</label>
                                <input type="text" class="form-control" name="subnav" placeholder="Enter Sub Navigation" value="<?php echo $data['subnav']; ?>" required>
                                <span class="invalid-feedback" style="color: red;"><?php echo $data['subnav_err']; ?></span>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Select Main Navigation</label>
                                <select class="form-control" id="" name="mainNavSelect" size="1">
                                    <option class="test" disabled>Select Main Navigation</option>
                                    <?php foreach ($data['subnavlist'] as $nav) : ?>

                                        <option value="<?php echo $nav->main_menu_id; ?>" <?php if ($data['mainnavid'] == $nav->main_menu_id) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $nav->main_menu_name; ?></option>

                                    <?php endforeach; ?>

                                </select>
                                <span class="invalid-feedback" style="color: red;"><?php echo $data['mainnav_err']; ?></span>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Select Sub Navigation Title</label>
                                <select class="form-control" id="exampleSelect1" name="parent" size="1">
                                    <option selected class="test" disabled>Select Sub Navigation Title</option>
                                    <?php foreach ($data['list'] as $nav) : ?>
                                        <?php if ($nav->sub_menu_links == 0) { ?>
                                            <option value="<?php echo $nav->sub_menu_id ?>" <?php if ($data['parentid'] == $nav->sub_menu_id) {
                                                                                                echo 'selected';
                                                                                            } ?>><?php echo $nav->sub_menu_name; ?></option>
                                        <?php } ?>
                                    <?php endforeach; ?>

                                </select>

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
<script>
    $(function () {
        $('#EditSubNavigation').validate({
            rules : {
                subnav: {
                    required : true
                },
                mainNavSelect:{
                    required : true
                }
            },
            messages: {
                subnav: {
                    required: "Please enter Sub Navigation"
                },
                mainNavSelect: {
                    required: "Please select Main Navigation"
                }
            },
            // errors in the form
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            }
        });
    });
</script>