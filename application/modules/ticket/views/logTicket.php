
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Ticket Log</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">


    <!-- <div id="overlay">loading...</div> -->
    <div class="table-responsive">
    <table id ="group_table" class="table table-bordered table-hover">

      <thead>
        <tr>
          <th>ID</th>
          <th>Issue</th>
          <th>Description</th>

          <th>Reply</th>
          <th>Date</th>
          <th>Last Action By</th>
          <th>Status</th>
          <?php if(!$this->session->crn_number) { ?>
          <th>Actions</th>
        <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php  
        $count=1 ?>
        <?php foreach($ticket_log as $row){ ?>
          <tr>
            <td><?= $count++ ?></td>



            <td><?= $row['comment']; ?></td>
             <?php if(empty($row['description']))
                    {   $row['description']= '-' ;     } ?>
            <td><?= $row['description']; ?></td>

             <?php if(empty($row['reply']))
                    {   $row['reply']= '-' ;     } ?>
            <td><?= $row['reply']; ?></td>
        
            <td ><?= $row['created_at']; ?></td>
            <td style="color:blue"><?= $row['staff_name']; ?></td>
           <td> <span class="badge <?php if($row['status']=='open'){
              echo 'badge-danger';} else if($row['status']=='request to close'){
                echo 'badge-warning';
              } else{
                echo 'badge-success';
              }
                ?>"><?= $row['status'] ?></span></td>
           

            <td>
             <?php if(!$this->session->crn_number) { ?>
              <div class="btn-group" >
                
                
               
                
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                  <span class="caret">status</span>
                </button>

                <div class="dropdown-menu">
                  <a class="dropdown-item" onclick="statusUpdate(<?= $row['id'] ?>,'request to close','<?= $row['ticket_id'] ?>');" href="#" >Request To Close</a>
                  <a class="dropdown-item" onclick="statusUpdate(<?= $row['id'] ?>,'close','<?= $row['ticket_id'] ?>');" href="#" >Close</a>
                
                </div>
                <a href="<?= base_url() ?>ticket/ticket_response/<?= $row['ticket_id'] ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="response"><i class="fa fa-reply"></i></a>
                 <!-- <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><a href="#" id="<?= $row['id']?>" class="view_data"><i class="fa fa-eye"></i></a></button> -->
              </div>
            <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  </div>
</div>
<!-- modal class -->
 <div id="dataModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" >

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body" id="student_detail">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
<!-- /modal class end -->
<script>
  $(document).ready( function () {
    $('#group_table').DataTable(
    {
      "processing": true
    });
  } );


  function statusUpdate($id,$status,$ticket_id)
  {
    console.log($status);
    console.log($id);
    var ticket_id=$ticket_id;
    console.log(ticket_id);
    var status=$status;
    var id=$id;
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>ticket/statusChange",
      data: {
        status:status,id:id,ticket_id:ticket_id
      },

      success: function (data) {

        console.log(data);
        location.reload();
        // var obj=JSON.parse(data);


      }
    });
  }
    </script>
