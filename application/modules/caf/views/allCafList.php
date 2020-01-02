

<div class="row">
  <div class="col-12">
    <!-- Custom Tabs -->
    <div class="card">
      <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">


        </h3>
      </div><!-- /.card-header -->

      <div class="card-body">

<div class="table-responsive">
       <table id ="user_table" class="table table-bordered table-hover">

        <thead>
          <tr>
            <!-- <th>Ticket id</th> -->
            <th>Caf id</th>
            <th>Name</th>
            <th>Crn id</th>
            <!-- <th>Company name</th> -->
            <!-- <th>Contact Home</th> -->
            <th>Contact Mobile</th>
            <!-- <th>Contact Office</th> -->
            <!-- <th>Contact Alternate</th> -->

            <th>Primary Email</th>
            <!-- <th>Secondry Email</th> -->
            <!-- <th>Dob</th> -->
            <th>Permanent Address</th>
            <th>Installation Address</th>
            <th>Billing Address</th>
            <th>Service</th>
            <!-- <th>Id Proof</th> -->
            <!-- <th>Address Proof</th> -->


            <th>Created_at</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach($caf as $row){ ?>
            <tr <?php if($row['status']==1) { ?>   style="background-color:#e6ffee;" <?php } ?> >
             

              <td><?= $row['id']; ?></td>
              <td><?= $row['name']; ?></td>
              <td><?= $row['crn_number']; ?></td>
              <!-- <td><?= $row['company_name']; ?></td> -->
              <!-- <td><?= $row['contact_home']; ?></td> -->
              <td><?= $row['contact_mobile']; ?></td>
              <!-- <td><?= $row['contact_office']; ?></td> -->
              <!-- <td><?= $row['contact_alternate']; ?></td> -->
              <td><?= $row['primary_email']; ?></td>
              <!-- <td><?= $row['secondry_email']; ?></td> -->
              <!-- <td><?= $row['dob']; ?></td> -->
              <td data-toggle="tooltip" title="<?= $row['permanent_address'].' '.$row['p_add_city'].' '.$row['p_add_pincode'].' '.$row['p_add_landmark']?>"><?= substr($row['permanent_address'].' '.$row['p_add_city'].' '.$row['p_add_pincode'].' '.$row['p_add_landmark'],0,10).'.....' ?></td>
              <td data-toggle="tooltip" title="<?= $row['installation_address'].' '.$row['i_add_city'].' '.$row['i_add_pincode'].' '.$row['i_add_landmark'] ?>"><?= substr($row['installation_address'].' '.$row['i_add_city'].' '.$row['i_add_pincode'].' '.$row['i_add_landmark'],0,10).'.....' ?></td>
              <td data-toggle="tooltip" title="<?= $row['billing_address'].' '.$row['b_add_city'].' '.$row['b_add_pincode'].' '.$row['b_add_landmark'] ?>">
                <?= substr($row['billing_address'].' '.$row['b_add_city'].' '.$row['b_add_pincode'].' '.$row['b_add_landmark'],0,10).'.....' ?></td>

                <?php
                  switch($row['plan_type'])
                  {
                    case 1: 
                    $row['plan_types']='prepaid';
                    break;
                    case 2:
                    $row['plan_types']='postpaid';
                    break;
                    case 3:
                    $row['plan_types']='adv. rental';
                    break;
                  }

                
                ?>
              <td><?= $row['plan_types'] ?></td>

              <!-- <td><?= $row['id_proof']; ?></td> -->
              <!-- <td><?= $row['address_proof']; ?></td> -->



              <td>
              <?=  date('j F Y ', strtotime( $row['created_at']) ) ; ?><br>
            <?=  date('h :i a', strtotime($row['created_at']) ) ; ?>
          </td>
              <!-- <br><div class="creator_name"><?= '-'. $row['created_by']; ?></div></td> -->

              <td>
                <div class="btn-group" >

                 
                 <a href="<?= base_url() ?>caf/edit/<?= $row['id'] ?>" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Edit" ><i class="fa fa-pencil"></i></a>
                
                  <a href="<?= base_url() ?>caf/get_caf/<?= $row['id'] ; ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit" target="_blank">get pdf</a>
                 <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>
                <div class="dropdown-menu">
                  <!-- <a class="dropdown-item" href="<?=base_url() ?>plan/assign_plan/<?= $row['id']; ?>" >Assign plan</a> -->
                  <?php if($row['plan_type']==1) { ?>
                  <a class="dropdown-item" href="<?=base_url() ?>recharge/recharge_panel/<?= $row['id']; ?>" >Assign plan</a>
                 <?php } else 
                  {  ?>
                    <a class="dropdown-item" href="<?=base_url() ?>plan/assign_plan/<?= $row['id']; ?>/<?= $row['plan_type'] ?>" >Assign plan</a>
                    <?php      }   ?>
                  <!-- <a class="dropdown-item" href="<?=base_url() ?>plan/change_plan/<?= $row['id']; ?>">Change Plan</a> -->
                  <a class="dropdown-item" href="<?=base_url() ?>reports/user_ledger_report?caf_id=<?= $row['id']?>&customer_name=<?=  $row['name'] ?>">Ledger Report</a>
               <a href="<?= base_url() ?>sms/index?mobile=<?= $row['contact_mobile'] ?>" class="dropdown-item">sms</a>
                <?php if($row['status']==1)
                { ?>
                  
                <a href="<?= base_url() ?>caf/deactivate_caf/<?= $row['id'] ?>" class="dropdown-item">deactivate</a>
                <?php }else 
                {  ?>
                   <a href="<?= base_url() ?>caf/activate_caf/<?= $row['id']?>/<?= $row['plan_type'] ?> " class="dropdown-item">activate</a>

            <?php    }

                          ?>
               <a href=""class="dropdown-item">call</a>
               <!-- <button class="btn btn-danger">Call</button> -->
                </div> 

              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
</div>


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
