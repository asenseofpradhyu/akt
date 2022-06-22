<footer class="main-footer">
        <div class="pull-right hidden-xs"> <b>Version</b> 1.0</div>
        <strong>Copyright &copy; 2016-2017 <a href="#">Thememinister</a>.</strong> All rights reserved.
</footer>
</div> <!-- ./wrapper -->
<!-- ./wrapper -->
<!-- Start Core Plugins
        =====================================================================-->
<!-- jQuery -->
<script src="<?php echo URLROOT; ?>/admin/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
<!-- jquery-ui -->
<script src="<?php echo URLROOT; ?>/admin/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="<?php echo URLROOT; ?>/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- lobipanel -->
<script src="<?php echo URLROOT; ?>/admin/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
<!-- Pace js -->
<script src="<?php echo URLROOT; ?>/admin/plugins/pace/pace.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo URLROOT; ?>/admin/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="<?php echo URLROOT; ?>/admin/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- Hadmin frame -->
<script src="<?php echo URLROOT; ?>/admin/dist/js/custom1.js" type="text/javascript"></script>
<!-- End Core Plugins
        =====================================================================-->
<!-- Start Page Lavel Plugins
        =====================================================================-->
<!-- Toastr js -->
<script src="<?php echo URLROOT; ?>/admin/plugins/toastr/toastr.min.js" type="text/javascript"></script>
<!-- Sparkline js -->
<script src="<?php echo URLROOT; ?>/admin/plugins/sparkline/sparkline.min.js" type="text/javascript"></script>
<!-- Data maps js -->
<script src="<?php echo URLROOT; ?>/admin/plugins/datamaps/d3.min.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/admin/plugins/datamaps/topojson.min.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/admin/plugins/datamaps/datamaps.all.min.js" type="text/javascript"></script>
<!-- Counter js -->
<script src="<?php echo URLROOT; ?>/admin/plugins/counterup/waypoints.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/admin/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<!-- ChartJs JavaScript -->
<script src="<?php echo URLROOT; ?>/admin/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/admin/plugins/emojionearea/emojionearea.min.js" type="text/javascript"></script>
<!-- Monthly js -->
<script src="<?php echo URLROOT; ?>/admin/plugins/monthly/monthly.js" type="text/javascript"></script>
<!-- Data maps -->
<script src="<?php echo URLROOT; ?>/admin/plugins/datamaps/d3.min.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/admin/plugins/datamaps/topojson.min.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/admin/plugins/datamaps/datamaps.all.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/js/jquery.validate.min.js" type="text/javascript"></script>

<!-- End Page Lavel Plugins
        =====================================================================-->
<!-- Start Theme label Script
        =====================================================================-->
<!-- Dashboard js -->
<script src="<?php echo URLROOT; ?>/admin/dist/js/custom.js" type="text/javascript"></script>
<script>
        $(document).ready(function() {
                $('#dataTable').DataTable();
        });

        $('#myModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var img = button.data('img');
                var id = button.data('id');
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                $('.img-update').attr('src', img);
                $('.product-img-action').attr('action', '<?php echo URLROOT; ?>/AdminProduct/updateproductimages/' + id);
                $('.product-img-del').attr('action', '<?php echo URLROOT; ?>/AdminProduct/deleteproductimage/' + id);
        });
</script>
</body>

<!-- Mirrored from healthadmin.thememinister.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Jul 2017 05:30:46 GMT -->

</html>