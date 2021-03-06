

<div class="row">
  <div class="col-12">
    <!-- Custom Tabs -->
    <div class="card">
      <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">

         <ul class="nav nav-pills ml-auto p-2 pull-left">
          <li class="nav-item"><a class="nav-link active show" href="#tab_1" data-toggle="tab">Customer</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Frenchise</a></li>


        </ul>
      </h3>
    </div><!-- /.card-header -->

    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane active show" id="tab_1">
         <table id ="user_table" class="table table-bordered table-hover">

          <thead>
            <tr>
              <!-- <th>Ticket id</th> -->
              <th>name</th>
              <th>Email</th>

              <th>Mobile</th>
              <th>location</th>
              <!-- <th>leads</th> -->
              <th>Created_at</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach($customer as $row){ ?>
              <tr>
                <!-- <td><a href="<?= base_url()?>ticket/log_ticket_by_ticket_no/<?= $row['ticket_id'] ?>"><?= $row['ticket_id'] ?></a></td> -->

                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>


                <td><?= $row['mobile']; ?></td>
                <td><?= $row['location']; ?></td>
                <!-- <td><?= $row['leads']; ?></td> -->


                <td><?= $row['created_at']; ?>
                <!-- <br><div class="creator_name"><?= '-'. $row['created_by']; ?></div></td> -->

                <td>
                  <div class="btn-group" >

                    <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="generate ticket"><a href="<?= base_url() ?>ticket/add_ticket?crn=<?= $row['crn_id'] ?>&name=<?= $row['name'] ?>&mobile=<?= $row['mobile'] ?>&email=<?= $row['email'] ?>" ><i class="fa fa-eye"></i></a></button>

                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="tab_2">
        <table id ="fren_table" class="table table-bordered table-hover">

          <thead>
            <tr>

              <th>Name</th>
              <th>Email</th>

              <th>Mobile</th>
              <th>Location</th>
              <!-- <th>Description</th> -->
              <th>Created_at</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach($frenchise as $row){ ?>
              <tr>
                <!-- <td><a href="<?= base_url()?>ticket/log_ticket_by_ticket_no/<?= $row['ticket_id'] ?>"><?= $row['ticket_id'] ?></a></td> -->

                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>


                <td><?= $row['mobile']; ?></td>
                <td><?= $row['location']; ?></td>
                <!-- <td><?= $row['leads']; ?></td> -->



                <td><?= $row['created_at']; ?>
                <!-- <br><div class="creator_name"><?= '-'. $row['created_by']; ?></div></td> -->

                <td>
                  <div class="btn-group" >

                    <!--   <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><a href="<?= base_url() ?>admin/listChildUsers/<?= $row['crn_id'] ?>"><i class="fa fa-eye"></i></a></button> -->
                    <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="generate ticket"><a href="<?= base_url() ?>ticket/add_ticket?crn=<?= $row['crn_id'] ?>&name=<?= $row['name'] ?>&mobile=<?= $row['mobile'] ?>&email=<?= $row['email'] ?>" ><i class="fa fa-eye"></i></a></button>

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
  </div><!-- /.card-body -->
</div>
<!-- ./card -->
</div>
<!-- /.col -->
</div>
<script type="text/javascript">
  $(document).ready( function () {
    $('#user_table').DataTable(
    {
      // "processing": true
    });
  } );
</script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#fren_table').DataTable(
    {
      // "processing": true
    });
  } );
</script>