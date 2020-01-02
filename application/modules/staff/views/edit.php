
 <!-- <?php var_dump($staff); ?> -->
 <div class="row">
  
    <div class="col-md-5">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit Staff</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
<?= form_open('staff/update/'.$staff['id'],array("class"=>"form-horizontal form_validation")) ?>
  <div class="col-md-9">
  <label for="name" class="col-md-4 control-label"><span class="text-danger">*</span>Name</label>
<div class="form-group">
    <input type="text" name="name" value="<?= ($this->input->post('name') ? $this->input->post('name') : $staff['name']); ?>" class="form-control" id="name" required autocomplete="off" autofocus onkeypress="return isAlpha(event)"/>
    <span class="text-danger name_error"></span>
  </div>
</div>


  <div class="col-md-9">
  <label for="mobile" class="col-md-5 control-label"><span class="text-danger">*</span>Mobile Number</label>
<div class="form-group">
    <input type="text" name="mobile" value="<?= ($this->input->post('mobile') ? $this->input->post('mobile') : $staff['mobile']); ?>" required class="form-control" id="mobile" maxlength=10 onkeypress="return isNumberKey(event)"  />
    <span class="text-danger mobile_error"></span>
  </div>
</div>


  <div class="col-md-9">
<div class="form-group">
  <label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
    <input type="email" name="email" value="<?= ($this->input->post('email') ? $this->input->post('email') : $staff['email']); ?>" class="form-control" id="email" required data-parsley-type="email" data-parsley-trigger="keyup"  data-toggle="tooltip" data-placement="top" title="example abc@xyz.com"/>
    <span class="text-danger ip_error"> </span>
  </div>
</div>

<!--   <div class="col-md-9">
<div class="form-group">
  <label for="remark" class="col-md-4 control-label"><span class="text-danger">*</span>Group</label>
    <select class="form-control" name="group[]" data-toggle="tooltip" data-placement="top" title="in which group you want to add this member">
      <option value=''>--select--</option>
     <?php for($i=0;$i<count($group);$i++) { ?>
       
     }
      <option value="<?= $group[$i]['group_id'] ?>"><?= $group[$i]['name'] ?></option>
              
           <?php }  ?> 
   
   
    </select>
  </div>
</div>
<div class="col-md-9">
  <label for="mobile" class="col-md-5 control-label"><span class="text-danger">*</span>Username</label>
<div class="form-group">
    <input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username" />
    <span class="text-danger username_error"></span>
  </div>
</div>
<div class="col-md-9">
  <label for="mobile" class="col-md-5 control-label"><span class="text-danger">*</span>Password</label>
<div class="form-group">
    <input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
    <span class="text-danger password_error"></span>
  </div>
</div> -->
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-success" onclick="validation()">update</button>
        </div>
  </div>
  <?= form_close(); ?>
</div>
</div>
</div>