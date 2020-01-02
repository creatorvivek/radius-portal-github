<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="content-header head">
  <h1>Tax Report</h1>
</section>
<form name="form" method="post" action="<?php base_url()?>tax_report">                  <!-- Date range -->

 <div class="row">
  <div class="col-md-12">
    <div class="card card-danger card-outline">
      <div class="card-body">
        <div class="row">
          
         <div class="col-md-3">
           <div class="input-group">
          <span class="input-group-text">Tax name</span>
              <input type="text" class="form-control" name="tax_name">
                          
          </div><!-- /.form group -->
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <!-- <label>dfsdf </label> -->
            <input type="submit" name="dat_range" value="Search"  class="btn btn-primary form-control" >
          </div>
        </div>
      
     </div>
   </div>
 </div>
</div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">

     <section class="content">
      <div class="row">
       <div class="col-md-12">
        <div class="card">
          <div class="card-body" id="colvis">    
          <div class="table-responsive">                                             
           <table id="example" class="table table-bordered table-striped">
            <thead>
              <tr>
               
               <th>Invoice Number</th>
               <th>Tax Name</th>
               <th>Tax Amount</th>
               <!-- <th>Total Amount</th>
               <th>Date</th>
               <th>status</th> -->

               <th>Actions</th>
             </tr>
           </thead>
           <tbody>
            <?php   $count=1;
            $amount=0; ?>
            <?php foreach ($tax as $row) { ?>
              <?php 

              $amount +=round($row['tax_amount']); ?>
              <tr>
                <!-- <td><?=$count++ ?></td> -->
                <td><a href="<?= site_url('account/get_invoice/'.$row['invoice_id']); ?>"  target="_blank"><?=$row['invoice_id']; ?></a> </td>
                <!-- <td data-toggle="tooltip" data-placement="top" title="click to view"  onclick="userInformation(<?= $row['caf_id']; ?> )"><?=$row['name'] ?> </td> -->
                <td><?=$row['tax_name'] ?></td>
                <td><?= round($row['tax_amount']) ?></td>

             <!--  -->
                    <td><a href="<?= site_url('account/get_invoice/'.$row['invoice_id']); ?>" class="btn btn-info btn-xs" target="_blank">Get Pdf</a> 
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <td>Total </td>
                 
                  <td>&nbsp;</td>
                  <td><strong><?php echo $amount;?></strong></td>
                  <td>&nbsp;</td> 
                  <td>&nbsp;</td> 
                  <!-- <td class="text-right"><b>Total:</b></td> -->
                  <!-- <td></td> -->
                </tr>
              </tfoot>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</div>

</div>

<script>
  $(function () {

    $('#daterange').daterangepicker(
    {
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate: moment()
    },
    function (start, end) {
      $('#daterange').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
    }
    );
  });
  



  $(document).ready(function() {
    var table = $('#example').DataTable( { 
      "lengthMenu": [[25, 50,100,-1], [25 , 10,50,100,"All"]]
    } );

      // for each column in header add a togglevis button in the div
      $("#example thead th").each( function ( i ) {
        var name = table.column( i ).header();
        var spanelt = document.createElement( "button" );
        spanelt.innerHTML = name.innerHTML;           
    
        $(spanelt).addClass("colvistoggle");
        $(spanelt).addClass("btn btn-info");
        $(spanelt).attr("colidx",i);    // store the column idx on the button
    
        $(spanelt).on( 'click', function (e) {
        e.preventDefault(); 
        // Get the column API object
        var column = table.column( $(this).attr('colidx') );
        // Toggle the visibility
        column.visible( ! column.visible() );
        if($(spanelt).hasClass('btn-danger'))
          $(spanelt).removeClass('btn-danger');
        else
        $(spanelt).addClass("btn btn-danger");
      });
        $("#colvis").append($(spanelt));
    });
    } );
  

  function userInformation(caf_id)
  {
    // console.log(caf_id);
    $.ajax({
      type: "post",
      url: "<?= base_url() ?>profile/user_details_in_profiles_by_caf",
      data:{caf_id:caf_id},
      success: function (data) {
        // alert(data);
        // console.log(data);
        var obj=JSON.parse(data)
        // var result=datas;
    var row='<h3 class="profile-username text-center" id="name">'+obj.name+'</h3><hr><strong>Email</strong><p class="text-muted" id="email">'+obj.primary_email+'</p><hr><strong>Mobile</strong><p class="text-muted" id="mobile">'+obj.contact_mobile+'</p><hr><strong>Permanent Location</strong><p class="text-muted" id="p_address">'+obj.permanent_address+'  pincode-: '+obj.p_add_pincode+'</p><hr><strong>Username</strong><p class="text-muted" id="username"></p><hr><strong>Crn number</strong><p class="text-muted" id="crn_number">'+obj.crn_number+'</p><hr><strong>caf id</strong><p class="text-muted" id="caf_id">'+obj.id+'</p>';
    $('.body').html(row);
$('#user_profile').show();
$('#user_profile').modal();
      
// console.log(obj);

},
})
  }

  </script>

