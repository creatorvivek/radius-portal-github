<style type="text/css">
  
/*  .form-group {
  position: relative;
  margin-bottom: 1.5rem;
}
*/
.form-control-placeholder {
  position: absolute;
  top: 0;
  padding: 7px 0 0 13px;
  transition: all 200ms;
  opacity: 0.5;
}

.form-control:focus + .form-control-placeholder,
.form-control:valid + .form-control-placeholder {
  font-size: 75%;
  transform: translate3d(0, -100%, 0);
  opacity: 1;
}

</style>




      <div class="form-group">
        <input type="text" id="name" class="form-control" required>
        <label class="form-control-placeholder" for="name">Name</label>
      </div>
      <div class="form-group">
        <input type="password" id="password" class="form-control" required>
        <label class="form-control-placeholder" for="password">Password</label>
      </div>


<!-- <?php var_dump($group); ?> -->
 <div class="row">
  
    <div class="col-md-5">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add Staff</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">

<form action="<?= base_url() ?>staff/add" class="form-horizontal form_validation" id="form_validation" method="post"> 
  <div class="col-md-9">
  <label for="name" class="col-md-4 control-label"><span class="text-danger">*</span>Name</label>
<div class="form-group">
    <input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" required onkeypress="return isAlpha(event)" autocomplete="off" autofocus />
    <span class="text-danger name_error"><?= form_error('name');?></span>
  </div>
</div>


  <div class="col-md-9">
  <!-- <label for="mobile" class="col-md-5 control-label"><span class="text-danger">*</span>Mobile Number</label> -->
  <div class="form-group">
    <input type="text" name="mobile" value="<?php echo $this->input->post('mobile'); ?>" class="form-control" id="mobile" maxlength=10 data-toggle="tooltip" title="plan name" onkeypress="return isNumberKey(event)" onkeyup="validationMobile();"/>
    <label class="form-control-placeholder" for="name">Name</label>
    <span class="text-danger mobile_error"><?= form_error('mobile');?></span>
  </div>
</div>


  <div class="col-md-9">
<div class="form-group">
  <label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
    <input type="email" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" required data-parsley-type="email" data-parsley-trigger="keyup" data-toggle="tooltip" data-placement="top" title="example abc@xyz.com"/>
    <span class="text-danger email_error"> <?= form_error('email');?></span>
  </div>
</div>

  <div class="col-md-9">
<div class="form-group">
  <label for="remark" class="col-md-4 control-label">Group</label>
    <select class="form-control" name="group[]" data-toggle="tooltip" data-placement="top" title="in which group you want to add this member">
      <option value=''>--select--</option>
     <?php for($i=0;$i<count($group);$i++) { ?>
       
     }
      <option value="<?= $group[$i]['group_id'] ?>"><?= $group[$i]['name'] ?></option>
              
           <?php }  ?> 
 
   
    </select>
  </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <input type="submit" class="btn btn-success save-button"  value="save">
        </div>
  </div>
  <!-- <?= form_close(); ?> -->
</form>
</div>
</div>
</div>


