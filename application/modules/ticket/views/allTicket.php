<div class="row">
  <div class="col-12">
    <!-- Custom Tabs -->
    <div class="card">
      <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">Ticket</h3>
      </div><!-- /.card-header -->
      <ul class="nav nav-pills ml-auto p-2 pull-left">
        <li class="nav-item"><a class="nav-link active show" href="#tab_1" data-toggle="tab">Customer</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Frenchise</a></li>


      </ul>
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active show" id="tab_1">
            <div class="table-responsive">
           <table id ="ticket_table" class="table table-bordered table-hover">

            <thead>
              <tr>
                <th>Ticket id</th>
                <th>name</th>
                <th>Email</th>

                <th>Mobile</th>
                <th>Comment</th>
                <th>Description</th>
                <th>Assign</th>
                <th>Attend type</th>
                <th>Created_at</th>
                <th>status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach($customer as $row){ ?>
                <tr>
                  <td><a href="<?= base_url()?>ticket/log_ticket_by_ticket_no/<?= $row['ticket_id'] ?>"><?= $row['ticket_id'] ?></a></td>

                  <td><?= $row['name']; ?></td>
                  <td><?= $row['email']; ?></td>


                  <td><?= $row['mobile']; ?><br><button class="btn btn-info"><a href="<?= base_url() ?>sms/index?mobile=<?= $row['mobile'] ?>" style="color:white">sms</a></button><button class="btn btn-danger">Call</button></td>
                  <td><?= $row['comment']; ?></td>
                  <?php if(empty($row['description']))
                    {   $row['description']= '-' ;     }
                   ?>
                    
                  <td><?= $row['description']; ?></td>
                  <?php if($row['assign'] ==NULL)
                  { ?>
                    <td style="color:red">unassigned<br><div class="anchor">
                    <a href="<?= base_url()?>ticket/ticket_response/<?= $row['ticket_id'] ?>">click to assign</a></div></td>
                  <?php  } else { ?>
                    <td style="color:green">assign</td>
                  <?php } ?>

                  <td><?= $row['attend_type']; ?></td>
                  <td><?= $row['created_at']; ?><br><div class="creator_name"><?= '-'. $row['staff_name']; ?></div></td>
                  <td><span class="badge <?php if($row['status']=='open'){
              echo 'badge-danger';} else if($row['status']=='request to close'){
                echo 'badge-warning';
              } else{
                echo 'badge-success';
              }
                ?>"><?= $row['status']; ?></span></td>

                  <td>
                    <div class="btn-group" >

                    <a href="<?= base_url()?>ticket/log_ticket_by_ticket_no/<?= $row['ticket_id'] ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="ticket Log"><i class="fa fa-history"></i></a>
                      <a href="<?= base_url() ?>ticket/ticket_response/<?= $row['ticket_id'] ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Reply"><i class="fa fa-reply"></i></a>

                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        </div>

        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
          <table id ="ticket_table" class="table table-bordered table-hover">

            <thead>
              <tr>
                <th>Ticket id</th>
                <th>name</th>
                <th>Email</th>

                <th>Mobile</th>
                <th>Comment</th>
                <th>Description</th>
                <th>Assign</th>

                <th>Created_at</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach($frenchise as $row){ ?>
                <tr>
                  <td><a href="<?= base_url()?>ticket/log_ticket_by_ticket_no/<?= $row['ticket_id'] ?>"><?= $row['ticket_id'] ?></a></td>

                  <td><?= $row['name']; ?></td>
                  <td><?= $row['email']; ?></td>


                  <td><?= $row['mobile']; ?></td>
                  <td><?= $row['comment']; ?></td>
                  <td><?= $row['description']; ?></td>
                  <?php if($row['assign'] ==null)
                  { ?>
                    <td style="color:red">unassigned<br>
                     <div class="anchor"> <a href="">click to assign</a></div>
                    </td>
                  <?php  } else { ?>
                    <td style="color:green">assign</td>
                  <?php } ?>

                  
                  <td><?= date('j F Y ', strtotime($row['created_at'])); ?><br><div class="creator_name"><?= '-'. $row['created_by']; ?></div></td>

                  <td>
                    <div class="btn-group">

                     <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="ticket Log"><a href="<?= base_url()?>ticket/log_ticket_by_ticket_no/<?= $row['ticket_id'] ?>"><i class="fa fa-history"></i></a></button>
                      <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Reply"><a href="<?= base_url() ?>ticket/ticket_response/<?= $row['ticket_id'] ?>"><i class="fa fa-reply"></i></a></button>

                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.tab-pane -->

        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
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
    </div><!-- /.card-body -->
  </div>
  <!-- ./card -->
</div>
<!-- /.col -->
</div>
<script type="text/javascript">
  $(document).ready( function () {
    $('#ticket_table').DataTable(
    {
      "processing": true
    });
  } );
</script>