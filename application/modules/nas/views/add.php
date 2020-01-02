
<div class="col-md-5">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add Nas</h3>
      </div>

<?php echo form_open('nas/add',array("class"=>"form-horizontal form_validation")); ?>
<div class="form-group">
  <label for="parent_Name" class="col-md-12 control-label"><span class="text-danger">*</span>Name</label>
  <div class="col-md-10">
    <input type="text" name="name" value="<?php echo $this->input->post('parent_Name'); ?>" class="form-control" id="name" required    autofocus/>
    <span class="text-danger name_error"></span>
  </div>
</div>


<div class="form-group">
  <label for="nas_id" class="col-md-12 control-label"><span class="text-danger">*</span>Nas ID</label>
  <div class="col-md-10">
    <input type="text" name="nas_id" required value="<?php echo $this->input->post('nas_id'); ?>" class="form-control" id="nas_id"  />
    <span class="text-danger nas_error"></span>
  </div>
</div>

<div class="form-group">
  <label for="mac_address" class="col-md-12 control-label"><span class="text-danger">*</span>Mac Address</label>
  <div class="col-md-10">
    <input type="text" name="mac_address" value="<?php echo $this->input->post('mac_address'); ?>" class="form-control"  id="mac_address" required />
    <span class="text-danger"><?php echo form_error('mac_address');?></span>
  </div>
</div>
<div class="form-group">
  <label for="ip_address" class="col-md-12 control-label"><span class="text-danger">*</span>Ip Address</label>
  <div class="col-md-10">
    <input type="text" name="ip_address" value="<?php echo $this->input->post('ip_address'); ?>"  required class="form-control" id="ip_address" onkeyup="ip()" data-toggle="tooltip" data-placement="top" data-inputmask="'alias': 'ip'" data-mask  title="ex- 192.168.0.1"/>
    <span class="text-danger ip_error"> </span>
  </div>
</div>
<div class="form-group">
  <label for="port" class="col-md-12 control-label"><span class="text-danger">*</span>Port</label>
  <div class="col-md-10">
    <input type="text" name="port" value="<?php echo $this->input->post('port'); ?>" class="form-control" id="port" required />
    <span class="text-danger"><?php echo form_error('port');?></span>
  </div>
</div>
<div class="form-group">
  <label for="type" class="col-md-12 control-label"><span class="text-danger">*</span>Type</label>
  <div class="col-md-10">
    <input type="text" name="type" value="<?php echo $this->input->post('type'); ?>" class="form-control" id="type" required />
    <span class="text-danger"><?php echo form_error('type');?></span>
  </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-12 col-sm-10 col-md-12" align="center">
      <button type="submit" class="btn btn-success save" onclick="validation()">Save</button>
    </div>
  </div>

  <?php echo form_close(); ?>
</div>
</div>

<script src="<?= base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.js"></script>
<!-- <script src="<?= base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script> -->
<script src="<?= base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <script type="text/javascript">
$(document).ready(function() {
      $('[data-mask]').inputmask()
    });
    function ip()
  {
    
   
 var ip_address = $('#ip_address').val();
 // console.log(ip_address);                
 // if(!ip_address)
 // {
 //   $('.ip_error').html("ip address can not be empty");
 //   $('#ip_address').focus();
 // }
    // validateIp();
    
    // function validateIp() {     
      $.ajax({  
        url:"<?= base_url()?>nas/validateIpAddress",  
        method:"post",  
        data:{ip:ip_address},  
        success:function(data){ 
          console.log(data);
          $('.ip_error').html(data); 
          if(data=="Invalid ip address")
          {
            $('.save').prop("disabled",true);
           $('#ip_address').focus();
          }
          else
          {
             $('.save').prop("disabled",false);
            
          }
        }
      });
    // }
  }
  
//   function validationNas()
//   {
   
//  var nas_id = $('#nas_id').val();
//  // console.log(nas_id);                
//  if(!nas_id)
//  {
//    $('.nas_error').html("nas id can not be empty");
//    $('#nas_id').focus();
//  }
//  else
//  {
//   $('.nas_error').hide();
//  }
// }
//  function validationNasName()
//   {
   
//  var name= $('#name').val();
//  // console.log(nas_id);                
//  if(!name)
//  {
//    $('.name_error').html("nas name can not be empty");
//    $('#name').focus();
//  }
//  else
//  {
//   $('.name_error').hide();
//  }
// }
  </script>