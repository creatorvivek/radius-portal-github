
<style type="text/css">
	.card .overlay, .overlay-wrapper .overlay {
    z-index: 50;
    background: rgba(255,255,255,.7);
    border-radius: .25rem;
}
</style>


<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper"> -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
 
    <!-- <div class="container-fluid"> -->
      <!-- Info boxes -->
     <div class="container-fluid"> 
      <div class="row">

        <div class="col-12 col-sm-6 col-md-3">
         <a href="<?= base_url() ?>super_admin/list_frenchise" data-toggle="tooltip" data-placement="top" title="click here for more information">  
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Frenchise</span>
              <span class="info-box-number total_frenchise">
                <div class="ajax_loading">         
                  <div class="col-md-3">


                    <!-- Loading (remove the following to stop the loading)-->
                    <div class="overlay">
                      <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <!-- end loading -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- <small>%</small> -->
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </a>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
     
    <div class="col-12 col-sm-6 col-md-3">
       <a href="#" data-toggle="tooltip" data-placement="top" title="click here for more information">  
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Customer</span>
            <span class="info-box-number total_customer">
              <div class="ajax_loading">         
                <div class="col-md-3">



                  <div class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                  </div>
                  <!-- end loading -->
                </div>
                <!-- /.card -->
              </div>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
      </a>
      <!-- /.info-box -->
    </div>

   <!--   <div class="col-12 col-sm-6 col-md-3">
       <a href="<?= base_url() ?>account/invoice_list" data-toggle="tooltip" data-placement="top" title="click here for more information">  
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Invoices</span>
            <span class="info-box-number total_invoices">
              <div class="ajax_loading">         
                <div class="col-md-3">



                  <div class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                  </div>
               
                </div>
                              </div>
            </span>
          </div>
        
        </div>
      </a>
   
    </div>
-->




  </div>
    <!-- /.row -->
    
    
          </div>
          <!-- /.col -->
</div>
 </div>
  <!-- </div> -->
  <!-- /.row -->
  <!--/. container-fluid -->




<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->



<script type="text/javascript">
 $(document).ready(function(){
   $('.ajax_loading').show();
   $.ajax({url: "<?= base_url()?>super_admin/dashboardCounting",method:"get", success: function(result){
     $('.ajax_loading').hide();
     var obj=JSON.parse(result);
console.log(obj);
     $('.total_frenchise').html(obj.totalFrenchiseCount);
     $('.total_customer').html(obj.totalCustomerCount);
     // $('.total_open_ticket').html(obj.totalOpenTicketCount);
     // $('.my_open_ticket').html(obj.myOpenTicketCount);
     // $('.my_close_ticket').html(obj.myCloseTicketCount);
     // $('.total_customer').html(obj.totalCustomer);
     // $('.active_customer').html(obj.activeCustomer);
     // $('.total_credit').html(obj.total_credit);
     // $('.total_invoices').html(obj.total_invoices);
     // $('.total_pending_count').html(obj.total_pending_count);
     // $('.total_partially_count').html(obj.total_partially_count);
     // $('.total_paid_count').html(obj.total_paid_count);
     // $('.total_paid_credit').html(obj.total_paid_credit);
     // $('.total_partially_credit').html(obj.total_partially_credit);
     // $('.total_pending_credit').html(obj.total_pending_credit);
     // $('.total_count').html(obj.total_invoices);
   }});

 });
</script>

