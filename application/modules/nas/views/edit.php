
<div class="col-md-5">
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit Nas</h3>
	</div>
	<div class="card-body">
<?= form_open('nas/edit/'.$data[0]['id'],array("class"=>"form-horizontal form_validation")); ?>

	<div class="form-group">
		<label for="nas_Name" class="col-md-10 control-label"><span class="text-danger">*</span>nas Name</label>
		<div class="col-md-10">
			<input type="text" name="name" value="<?= ($this->input->post('name') ? $this->input->post('name') : $data[0]['name']); ?>" class="form-control"   autofocus />
			<span class="text-danger"><?= form_error('nas_Name');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="qualification" class="col-md-10 control-label"><span class="text-danger">*</span>Nas id</label>
		<div class="col-md-10">
			<input type="text" name="nas_id" value="<?= ($this->input->post('nas_id') ? $this->input->post('nas_id') : $data[0]['nas_id']); ?>" class="form-control" id="qualification" />
			<span class="text-danger"><?= form_error('qualification');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="mac_address" class="col-md-10 control-label">Mac Address</label>
		<div class="col-md-10">
			<input type="text" name="mac_address" maxlength="13" value="<?= ($this->input->post('mac_address') ? $this->input->post('mac_address') : $data[0]['mac_address']); ?>" class="form-control" id="mac_address" />
			<span class="text-danger"><?= form_error('mac_address');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="ip_address" class="col-md-10 control-label">Ip Address</label>
		<div class="col-md-10">
			<input type="text" name="ip_address" value="<?= ($this->input->post('ip_address') ? $this->input->post('ip_address') :$data[0]['ip_address']); ?>" class="form-control" id="ip_address" data-inputmask="'alias': 'ip'" data-mask onkeyup="ip()" />
			<span class="text-danger"><?= form_error('ip_address');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="port" class="col-md-10 control-label">Port</label>
		<div class="col-md-10">
			<input type="text" name="port" value="<?= ($this->input->post('port') ? $this->input->post('port') :$data[0]['port']); ?>" class="form-control" id="port" />
			<span class="text-danger"><?= form_error('port');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="type" class="col-md-10 control-label">Type</label>
		<div class="col-md-10">
			<input type="text" name="type" value="<?= ($this->input->post('type') ? $this->input->post('type') :$data[0]['type']); ?>" class="form-control" id="type" />
			<span class="text-danger"><?= form_error('type');?></span>
		</div>
	</div>
	
	
	
	<div class="form-group">
		<div class="col-sm-offset-10 col-sm-10">
			<button type="submit" class="btn btn-success" onclick="validation()">update</button>
        </div>
	</div>
	
<?= form_close(); ?>
</div>
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
 if(!ip_address)
 {
   $('.ip_error').html("ip address can not be empty");
   $('#ip_address').focus();
 }
else{
    validateIp();
    function validateIp() {     
      $.ajax({  
        url:"<?= base_url()?>nas/validateIpAddress",  
        method:"post",  
        data:{ip:ip_address},  
        success:function(data){ 
          console.log(data);
          $('.ip_error').html(data); 
          if(data=="Invalid ip address")
          {
            $('.save').prop("disabled","disabled");
          $('#ip_address').focus();
          }
          else
          {
             $('.save').prop("disabled",false);
          }
        }
      });
    }
  }
  }



</script>