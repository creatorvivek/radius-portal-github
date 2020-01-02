<!-- <div class="col-md-5">
  <div class="form-group">
                  <label>Date range:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right active" id="reservation">
                  </div>
              
</div>
</div> -->


<!-- <div class="pull-right">
    <a href="<?php echo site_url('account/add_invoice'); ?>" class="btn btn-success">Add</a>
</div> -->
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Invoice</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
<table id="invoice_table" class="table table-bordered table-striped  table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Invoice Number</th>
        <th>Customer Name</th>
        <th>Base Amount</th>
        <th>Total Amount</th>
        <th>Date</th>
        <th>status</th>
       
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
     <?php   $count=1; ?>
    <?php foreach ($invoice as $row) { ?>
        <tr>
            <td><?=$count++ ?></td>
            <td><?=$row['invoice_id'] ?> </td>
            <td data-toggle="tooltip" data-placement="top" title="click to view"  onclick="userInformation(<?= $row['caf_id']; ?>)" ><?=$row['name'] ?> </td>
             <td><?=$row['amount'] ?></td>
              <td><?=$row['total'] ?></td>
             <!-- <td><?=$row['created_at'] ?></td> -->
            <td class="date"> <?=  date('j F Y ', strtotime( $row['created_at']) ) ; ?><br>
            <?=  date('h :i a', strtotime($row['created_at']) ) ; ?></td>
             <td><span class="badge <?php if($row['status']=='pending'){
              echo 'badge-danger';} else if($row['status']=='partially'){
                echo 'badge-warning';
              } else{
                echo 'badge-success';
              }
                ?>"><?= $row['status'] ?></span></td>
             <td><a href="<?= site_url('account/get_invoice/'.$row['invoice_id']); ?>" class="btn btn-info btn-xs" target="_blank">Get Pdf</a> 
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</div>

<div class="modal" id="user_profile">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" >User Profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body body">
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
</div>
<script>
    $(document).ready( function () {
        $('#invoice_table').DataTable();
    } );

   function showView(student_id) {     
     $.ajax({  
      url:"<?= base_url()?>student/fetchStudentView",  
      method:"post",  
      data:{id:student_id},  
      success:function(data){  
       
        var obj=JSON.parse(data);
   
          if(obj.parent_id)
          {
            var parent_name=obj.parent_name;
          }
          else
          {
            
            var parent_name='<form method="post" action="<?= base_url() ?>parents/add_parent"><button>add </button><input type="hidden" name="studentId" value='+student_id+' ></form>';
          
          }
        $('#student_detail').html('<table class="table table-striped table-bordered table-responsive"><tr><th>Student name</th><th>classes</th><th>Email</th><th>Mobile</th><th>Parent Name</th><th>Permanent Address</th><th>Corresponding Address</th></tr><tr><td>'+obj.name+'</td><td>'+obj.classes+'</td><td>'+obj.email+'</td><td>'+obj.mobile+'</td><td>'+parent_name+'</td><td>'+obj.permanent_address+'</td><td>'+obj.temporary_address+'</td><table>');  
        $('#dataModal').modal("show");  
      }  
    });  
   }
 




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
    var row='<h3 class="profile-username text-center" id="name">'+obj.name+'</h3><hr><strong>Email</strong><p class="text-muted" id="email">'+obj.primary_email+'</p><hr><strong>Mobile</strong><p class="text-muted" id="mobile">'+obj.contact_mobile+'</p><hr><strong>Permanent Location</strong><p class="text-muted" id="p_address">'+obj.permanent_address+'  pincode-: '+obj.p_add_pincode+'</p><hr><strong>Username</strong><strong>Crn number</strong><p class="text-muted" id="crn_number">'+obj.crn_number+'</p><hr><strong>caf id</strong><p class="text-muted" id="caf_id">'+obj.id+'</p>';
    $('.body').html(row);
$('#user_profile').show();
$('#user_profile').modal();
      
// console.log(obj);

},
})
  }
</script>