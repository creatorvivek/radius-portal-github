 <footer class="main-footer" id="footer">
    <!-- To the right -->
    <div class="float-right d-sm-none d-md-block">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017-2018 <a href="https://9yug.net">9YUG.NET</a>.</strong> All rights reserved.
  </footer>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
<script type="text/javascript">
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);

 function validation() {


   if($('.form_validation').parsley().isValid())
   {
    document.forms["form_validation"].submit();
  }
}
  function isNumberKey(evt) {
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  // Added to allow decimal, period, or delete
  if (charCode == 110 || charCode == 190 || charCode == 46) 
    return true;
  
  if (charCode > 31 && (charCode < 48 || charCode > 57)) 
    return false;
  
  return true;
} // isNumberKey

/*use to make whole project autocomplete off*/
$(document).ready(function(){ 
    $("input").attr("autocomplete", "off");
}); 
/*/---*/
</script>
<script src="<?= base_url() ;?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- page loading effect -->
<script src="<?= base_url() ?>assets/admin/plugins/pace/pace.min.js"></script>
<!-- / -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/bootstrap/js/bootstrap.js"></script> -->
<!-- AdminLTE App -->

<script src="<?= base_url() ;?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- <script src="<?= base_url() ;?>assets/admin/build/js/Treeview.js"></script> -->

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url() ;?>assets/admin/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script> -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/popper/popper.min.js"></script> -->

<!-- SlimScroll 1.3.0 -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script> -->
<!-- ChartJS 1.0.2 -->
<script src="<?= base_url() ;?>assets/admin/plugins/chartjs-old/Chart.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script> -->
<script src="<?= base_url() ;?>assets/admin/plugins/select2/select2.full.min.js"></script>
<script src="<?= base_url() ;?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ;?>assets/admin/plugins/datatables/dataTables.bootstrap4.js"></script>
 <!-- <script src="<?= base_url() ;?>assets/common.js"></script> -->
 <script src="<?= base_url() ;?>assets/admin/dist/js/plugins/bootbox.min.js"></script>
 <script src="<?= base_url() ;?>assets/admin/plugins/fastclick/fastclick.js"></script>
     <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  -->
     
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script> -->

 <!-- <script src="<?= base_url() ;?><assets/admin/dist/js/pages/dashboard2.js"></script> -->
 <!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?= base_url() ;?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>

<!-- bootstrap time picker -->
<script src="<?= base_url() ;?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
 
</body>
</html>