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
                        <form action="<?php echo URLROOT; ?>/navigation/subnavigation" method="post" class="col-sm-12">
                            <div class="col-sm-6 form-group">
                                <label>Sub Navigation</label>
                                <input type="text" class="form-control" name="subnav" placeholder="Enter Sub Navigation" value="<?php echo $data['subnav']; ?>">
                                <span class="invalid-feedback" style="color: red;"><?php echo $data['subnav_err']; ?></span>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Select Main Navigation</label>
                                <select class="form-control" id="exampleSelect1" name="mainNavSelect" size="1">
                                    <option selected class="test" disabled>Select Main Navigation</option>
                                    <?php foreach ($data['mainNavlist'] as $nav) : ?>
                                        <option value="<?php echo $nav->main_menu_id ?>"><?php echo $nav->main_menu_name; ?></option>

                                    <?php endforeach; ?>

                                </select>
                                <span class="invalid-feedback" style="color: red;"><?php echo $data['mainNavSelect_err']; ?></span>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Select Sub Navigation Title</label>
                                <select class="form-control" id="exampleSelect1" name="parent" size="1">
                                    <option selected class="test" disabled>Select Sub Navigation Title</option>
                                    <?php foreach ($data['subNavlist'] as $nav) : ?>
                                        <?php if ($nav->sub_menu_links == 0) { ?>
                                            <option value="<?php echo $nav->sub_menu_id ?>" data-parent_id="<?php echo $nav->main_menu_id; ?>"><?php echo $nav->sub_menu_name; ?></option>
                                        <?php } ?>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label>Is Title ?</label>
                                    <input type="checkbox" class="form-control" name="check" placeholder="Enter Sub Navigation" value="0">
                                    <p><span class="invalid-feedback" style="color: red;">Note:- </span>When Check no need to select sub navigation title.</p>
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
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
                                            <th>Sub Menu Name</th>
                                            <th>Main Menu Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $count = 1;
                                        foreach ($data['subNavlist'] as $nav) : ?>

                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo $nav->sub_menu_name; ?></td>
                                                <td><?php echo $nav->main_menu_name; ?></td>
                                                <td>
                                                    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/navigation/editsubnavigation/<?php echo $nav->sub_menu_id; ?>" style="margin-right:10px;"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                                    <form style="display:inline-block;" action="<?php echo URLROOT; ?>/navigation/subdelete/<?php echo $nav->sub_menu_id; ?>" method="post">
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