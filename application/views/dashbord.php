
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
         <a href="<?= base_url() ?>ticket/ticket_list" data-toggle="tooltip" data-placement="top" title="click here for more information">  
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total ticket</span>
              <span class="info-box-number total_ticket">
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
        <a href="<?= base_url() ?>ticket/close_ticket" data-toggle="tooltip" data-placement="top" title="click here for more information">  
          <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-child"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Close Ticket</span>
              <span class="info-box-number total_close_ticket">
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
              </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
         <a href="<?= base_url() ?>ticket/open_ticket" data-toggle="tooltip" data-placement="top" title="click here for more information">  
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Open Ticket</span>
              <span class="info-box-number total_open_ticket">
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
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </a>
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
       <a href="<?= base_url() ?>ticket/my_open_ticket" data-toggle="tooltip" data-placement="top" title="click here for more information">  
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">My Open Ticket</span>
            <span class="info-box-number my_open_ticket">
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


    <div class="col-12 col-sm-6 col-md-3">
       <a href="<?= base_url() ?>ticket/my_close_ticket" data-toggle="tooltip" data-placement="top" title="click here for more information">  
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">My Close Ticket</span>
            <span class="info-box-number my_close_ticket">
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
    <div class="col-12 col-sm-6 col-md-3">
       <a href="<?= base_url() ?>caf/all_caf_list" data-toggle="tooltip" data-placement="top" title="click here for more information">  
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
    <div class="col-12 col-sm-6 col-md-3">
       <a href="<?= base_url() ?>caf/all_caf_list?status" data-toggle="tooltip" data-placement="top" title="click here for more information">  
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Active Customer</span>
            <span class="info-box-number active_customer">
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
     <div class="col-12 col-sm-6 col-md-3">
       <a href="#" data-toggle="tooltip" data-placement="top" title="click here for more information">  
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Credit</span>
            <span class="info-box-number total_credit">
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
		<div class="col-md-4 col-xl-4">
    	<div class="card">
              <div class="card-header">
                <h3 class="card-title">Invoice Details</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
              	 <!-- <div class="ajax_loading">       -->
              	<div class="overlay">
                <i class="fa fa-refresh fa-spin ajax_loading"></i>
                <table class="table">
                	<tr>
                	<th>Invoice Status</th>
                	<th>Count</th>
                	<th>Amount</th>
                	<th>Details</th>
                	</tr>
                	<tr>
                		<td>Pending</td>
                		<td><div class="total_pending_count"></div></td>
                		<td><div class="total_pending_credit"></div></td>
                		<td><a href="<?=base_url() ?>account/invoice_list_condition?status=pending"><i class="fa fa-list"></i></a></td>
                		

                	</tr>
                	<tr>
                		<td>partially</td>
                		<td><div class="total_partially_count"></div></td>
                		<td><div class="total_partially_credit"></div></td>
                		<td><a href="<?=base_url() ?>account/invoice_list_condition?status=partially"><i class="fa fa-list"></i></a></td>

                	</tr>
                	<tr>
                		<td>paid</td>
                		<td><div class="total_paid_count"></div></td>
                		<td><div class="total_paid_credit"></div></td>
                		<td data-toggle="tooltip" title="invoice list view"><a href="<?=base_url() ?>account/invoice_list_condition?status=paid"><i class="fa fa-list"></i></a></td>

                	</tr>
                	<!-- <tr>
                		<td>Total</td>
                		<td><div class="total_count"></div></td>
                		<td><div class="total_credit"></div></td>

                	</tr> -->
                </table>
              </div>
          <!-- </div> -->
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-8">
          <div class="card">
          <div class="card-header">
            <h5 class="card-title">Monthly Sales Report</h5>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
              <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu" x-placement="bottom-end" style="position: absolute; transform: translate3d(45px, 31px, 0px); top: 0px; left: 0px; will-change: transform;">
                      <a href="#" onclick="" class="dropdown-item">Previous One Month</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
              <button type="button" class="btn btn-tool" data-widget="remove">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           
                <div class="chart res">
                  <!-- Sales Chart Canvas -->
                  <!--  <canvas id="salesChart" height="180" style="height: 180px;"></canvas> -->
                  <canvas id="line-charts" style="height: 150px; width: 756px;" width="756" height="368"></canvas>
                   <div class="ajax_loading">         
                <div class="col-md-3">



                  <div class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                  </div>
                  <!-- end loading -->
                </div>
                <!-- /.card -->
              </div>
                   <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fa fa-square text-primary"></i> Credit
                  </span>

                  <span>
                    <i class="fa fa-square text-secondary"></i> Debit
                  </span>
                </div>
                </div>
        
            <!-- /.row -->
          </div>
          <!-- ./card-body -->
         </div>
        </div>



  </div>
    <!-- /.row -->
    
    
          </div>
          <!-- /.col -->
</div>
 </div>
  <!-- </div> -->
  <!-- /.row -->
  <!--/. container-fluid -->








<script type="text/javascript">
 $(document).ready(function(){
   
   $('.ajax_loading').show();
   sales_chart();
   $.ajax({
    url: "<?= base_url()?>admin/dashboardCounting", method:"GET", success: function(result){
     var obj=JSON.parse(result);
// console.log(obj);
     $('.total_ticket').html(obj.totalTicketCount);
     $('.total_close_ticket').html(obj.totalCloseTicketCount);
     $('.total_open_ticket').html(obj.totalOpenTicketCount);
     $('.my_open_ticket').html(obj.myOpenTicketCount);
     $('.my_close_ticket').html(obj.myCloseTicketCount);
     $('.total_customer').html(obj.totalCustomer);
     $('.active_customer').html(obj.activeCustomer);
     $('.total_credit').html(obj.total_credit);
     $('.total_invoices').html(obj.total_invoices);
     $('.total_pending_count').html(obj.total_pending_count);
     $('.total_partially_count').html(obj.total_partially_count);
     $('.total_paid_count').html(obj.total_paid_count);
     $('.total_paid_credit').html(obj.total_paid_credit);
     $('.total_partially_credit').html(obj.total_partially_credit);
     $('.total_pending_credit').html(obj.total_pending_credit);
     $('.total_count').html(obj.total_invoices);
     $('.ajax_loading').hide();
   }});

 });

 function sales_chart()
 {
 $.ajax({url: "<?= base_url() ?>admin/salesChart",method:"GET", success: function(result){
     // $('.ajax_loading').hide();
     console.log(result);
     var obj=JSON.parse(result);


     // console.log(obj);
     var credit=[];
     var month =[];
     var debit =[];
     for (var i in obj)
     {
      debit.push(obj[i].debit);
      month.push(obj[i].month);
      credit.push(obj[i].credit);

    }
// console.log(debit);
// console.log(month);
// console.log(credit);
    var areaChartCanvas = $('#line-charts').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : month,
      datasets: [
        {
          label               : 'Debit',
          fillColor           : '#dee2e6',
        strokeColor         : '#ced4da',
        pointColor          : '#ced4da',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgb(220,220,220)',
          data                : debit
        },
        {
          label               : 'Credit',
         fillColor           : 'rgba(0, 123, 255, 0.9)',
        strokeColor         : 'rgba(0, 123, 255, 1)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(0, 123, 255, 1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(0, 123, 255, 1)',
          data                : credit
        }
      ]
    }
 
    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)
    }
});
}
</script>

