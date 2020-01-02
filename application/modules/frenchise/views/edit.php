 <!-- <?php var_dump($frenchise) ; ?> -->

<div class="row ">

  <div class="col-md-5">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit Frenchise</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <?= form_open('frenchise/update/'.$frenchise[0]['f_id'],array("class"=>"form-horizontal form_validation")) ?>
        <div class="row"> 
        <div class="col-md-5">
          <label for="ticket" class="col-md-12 control-label"><span class="text-danger">*</span>Frenchise name</label>
          <div class="form-group">
            <input type="text" name="f_name" value="<?= ($this->input->post('f_name') ? $this->input->post('f_name') : $frenchise[0]['name']); ?>" class="form-control" id="f_name" required  autofocus />
            <span class="text-danger f_name_error"></span>
          </div>
        </div>

        <div class="col-md-5">
          <label for="task" class="col-md-12 control-label"><span class="text-danger">*</span>Mobile Number</label>
          <div class="form-group">
            <input type="text" name="mobile" readonly  maxlength=10  class="form-control" id="mobile" onkeypress="return isNumberKey(event)" onkeyup="validateMobile()" value="<?= ($this->input->post('mobile') ? $this->input->post('mobile') : $frenchise[0]['mobile']); ?>"  />
            <span class="text-danger col-md-12 mobile_error"></span>
          </div>
        </div>

        <div class="col-md-5">
          <label for="task" class="col-md-12 control-label">Crn Number</label>
          <div class="form-group">
            <input type="text" name="crn_number" disabled  class="form-control" id="crn_number"  value="<?= ($this->input->post('crn_number') ? $this->input->post('crn_number') : $frenchise[0]['crn_number']); ?>" />
            <span class="text-danger nas_error"></span>
          </div>
        </div>
        <div class="col-md-5">
          <label for="task" class="col-md-12 control-label"><span class="text-danger">*</span>Email</label>
          <div class="form-group">
            <input type="email" name="email"  class="form-control" id="email" value="<?= ($this->input->post('email') ? $this->input->post('email') : $frenchise[0]['email']); ?>"   required data-parsley-type="email"   />
            <span class="text-danger nas_error"></span>
          </div>
        </div>
        <div class="col-md-10">
          <label for="task" class="col-md-12 control-label"><span class="text-danger">*</span>Address</label>
          <div class="form-group">
            <textarea row="7" class="form-control" required name="address"><?= ($this->input->post('address') ? $this->input->post('address') : $frenchise[0]['address']); ?></textarea>
            <span class="text-danger nas_error"></span>
          </div>
        </div>
       <!--  <div class="col-md-5">
          <label for="task" class="col-md-12 control-label">Upload Logo</label>
          <div class="form-group">
            <input type="file" name="logo"  class="form-control"   />
            <span class="text-danger nas_error"></span>
          </div>
        </div>
        <div class="col-md-5">
          <label for="task" class="col-md-12 control-label">Upload Profile Picture</label>
          <div class="form-group">
            <input type="file" name="profile_pic"  class="form-control"   />
            <span class="text-danger nas_error"></span>
          </div>
        </div> -->
       <!--  <div class="col-md-5">
          <label for="task" class="col-md-12 control-label"><span class="text-danger">*</span>Username</label>
          <div class="form-group">
            <input type="text" name="uname" value="<?= ($this->input->post('username') ? $this->input->post('username') : $frenchise[0]['username']); ?>" class="form-control" id="uname"  />
            <span class="text-danger nas_error"></span>
          </div>
        </div>
        <div class="col-md-5">
          <label for="task" class="col-md-12 control-label"><span class="text-danger">*</span>Password</label>
          <div class="form-group">
            <input type="password" name="pw"value="<?= ($this->input->post('pw') ? $this->input->post('pw') : $frenchise[0]['clear_text']); ?>" class="form-control" id="pw"  />
            <span class="text-danger nas_error"></span>
          </div>
        </div> -->
       
        <div class="col-md-5">
          <label for="task" class="col-md-12 control-label"><span class="text-danger">*</span>Frenchise Type</label>
          <select class="form-control" id="f_type" name="f_type" readonly>
            <option value="">--Select--</option>
            <option value="1" <?= ($frenchise[0]['frenchise_type'] == '1')?'selected':''?> >Fix capacity</option>
            <option value="2" <?= ($frenchise[0]['frenchise_type'] == '2')?'selected':''?> >Share Revenue</option>
          </select>
        </div>

        <?php if($frenchise[0]['frenchise_type'] == '2') 
        { ?>
        <div id="revenue_persent"  class="col-md-5">
          <label for="task" class="col-md-12 control-label"><span class="text-danger">*</span>Revenue %</label>
          <div class="form-group">
          <input type="text" name="r_persent" class="form-control" readonly value="<?= ($this->input->post('email') ? $this->input->post('email') : $frenchise[0]['revenue_percent']); ?>">
        </div>
        </div>
      <?php  } ?>
        </div>



  <div class="col-sm-offset-4 col-sm-5 col-md-12" >
<div class="form-group">
    <button type="submit" class="btn btn-success save-button">Update</button>
  </div>
</div>
<?= form_close(); ?>
</div>
</div>
</div>
<script type="text/javascript">
  $('#f_type').change(function(){
var f_type=$('#f_type').val();
if(f_type==2)
{
  $('#revenue_persent').show();

}
else
{
  $('#revenue_persent').hide();
}

  });
function validateMobile()
 {
  var mobile=$('#mobile').val();
   var mobile=$('#mobile').val();
  var length=$('#mobile').val().length;
 // console.log(length);
 var orignal=10;
  if(mobile=='')
  {
    $('.mobile_error').show();
    $('.mobile_error').html('Please fill this field');
    $('#mobile').focus();
  }
  
  else if(length!=orignal)
  {
    $('.mobile_error').html('please write valid mobile number');
    $('.mobile_error').css('font-size','14px');
    $('.mobile_error').show();
    $('#mobile').focus();
    $('.save-button').prop("disabled",true);

  }
  else
  {
    $('.mobile_error').hide();
    $.ajax({
      type: "post",
      url: "<?= base_url() ?>crn/mobileCheck",
      data:{mobile:mobile},
      success: function (data) {
        // console.log(data);
        var obj=JSON.parse(data);
        // console.log(obj);
        // console.log(obj.length);
        if(obj.length>0)
        {
          $('.mobile_error').show();
          // $('.mobile_error').html('mobile number with crn='+obj[0].crn_id+'');
          $('#crn_number').val(obj[0].crn_id);
        }
        else
        {
          $('#crn_number').val(' ');
        }
      },
    });

  }
}
</script>