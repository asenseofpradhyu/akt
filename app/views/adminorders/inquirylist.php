<?php require APPROOT . '/views/admininc/adminheader.php'; ?>
<?php require APPROOT . '/views/admininc/adminnavbar.php'; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Report</h1>
            <small>Inquiries List</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="<?php echo URLROOT; ?>/adminmaster/admindashboard"><i class="pe-7s-home"></i> Home</a></li>
                <li class="active">Inquiry Report</li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="col-sm-12" style="margin-top: 25px;">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $count = 1;
                        foreach ($data['inquirylist'] as $inquiry) :
                        ?>
                            <tr>
                                <td><?php echo $count++; ?> </td>
                                <td><?php echo $inquiry->name; ?></td>
                                <td><?php echo $inquiry->email; ?></td>
                                <td><?php echo $inquiry->phone_no; ?></td>
                                <td><?php echo $inquiry->subject; ?></td>
                                <td><?php echo $inquiry->message; ?></td>
                            </tr>

                        <?php endforeach;
                        ?>



                    </tbody>
                </table>
            </div>

        </div>


    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<?php require APPROOT . '/views/admininc/adminfooter.php'; ?>