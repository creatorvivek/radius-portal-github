  
<?php if(isset($error)) { ?>
<div class="alert alert-danger col-md-5"> <?= $error ?></div>
<?php } ?>
 <div class="row">
  
    <div class="col-md-5">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add task</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
<?= form_open('task/add',array("class"=>"form-horizontal form_validation")) ?>
  <div class="col-md-9">
  <label for="ticket" class="col-md-4 control-label">Ticket id (optional)</label>
<div class="form-group">
    <input type="text" name="ticket" value="<?php echo $this->input->post('ticket'); ?>" class="form-control" id="ticket"  autofocus />
    <span class="text-danger name_error"></span>
  </div>
</div>


  <div class="col-md-9">
  <label for="task" class="col-md-5 control-label"><span class="text-danger">*</span>Task</label>
<div class="form-group">
    <input type="text" name="task" value="<?php echo $this->input->post("task"); ?>" class="form-control" id="task" required    />
    <span class="text-danger nas_error"></span>
  </div>
</div>


<!--   <div class="col-md-9">
<div class="form-group">
  <label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
    <input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" onfocusout="ip();" data-toggle="tooltip" data-placement="top" title="ex- 192.168.0.1"/>
    <span class="text-danger ip_error"> </span>
  </div>
</div> -->

  <div class="col-md-9">
<div class="form-group">
  <label for="remark" class="col-md-4 control-label"><span class="text-danger">*</span>Assign To</label>
    <select class="form-control "  data-placeholder="Select a member" name="assign"
            style="width: 100%;" required data-parsley-trigger="keyup">
        <option value="">---select---</option>
               <?php for($i=0;$i<count($staff);$i++) { ?>
              
            <option value="<?= $staff[$i]['id'] ?>"><?= $staff[$i]['name'] ?></option>
    <?php  }  ?> 

            
          </select>
  </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-success" id="btnEmpty" onclick="validation()">Save</button>
        </div>
  </div>
  <?= form_close(); ?>
</div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Datemask dd/mm/yyyy
    
  });


  function validation() {
    
  
     if($('.form_validation').parsley().isValid())
       {
      document.forms["form_validation"].submit();
      }
  }



</script>