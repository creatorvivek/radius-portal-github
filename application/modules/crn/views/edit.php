
<?= form_open('crn/edit/'.$customer['data'][0]['crn_id'].'',array("class"=>"form-horizontal form_validation")) ?>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title center" >Edit Customer Details </h3>
      </div>
      <div class="card-body">
        <div class="row">
          
          
          <div class="col-md-6">
            <div class="form-group">
              <label for="mobile" class=" control-label"><span class="text-danger">*</span>Mobile Number</label>
              <input type="text" name="mobile"  class="form-control" id="mobile" value="<?= ($this->input->post('mobile') ? $this->input->post('mobile') : $customer['data'][0]['mobile']); ?>" maxlength="10"   onkeypress="return isNumberKey(event)"  onkeyup="validateMobile()" required />
              <span class="text-danger mobile_error"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="name" class="col-md-4 control-label"><span class="text-danger">*</span>Name</label>
              <input type="text" name="name"  class="form-control" id="name" onkeypress="return isAlpha(event)" value="<?= ($this->input->post('name') ? $this->input->post('name') : $customer['data'][0]['name']); ?>" required  />
              <span class="text-danger name_error"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="nas_id" class="control-label"><span class="text-danger">*</span>Email</label>
              <input type="email" name="email"  class="form-control" id="email" value="<?= ($this->input->post('email') ? $this->input->post('email') : $customer['data'][0]['email']); ?>" required />
              <span class="text-danger nas_error"></span>
            </div>
          </div>
        
        <div class="col-md-6">
          <div class="form-group">
           <label for="remark" class="col-md-6 control-label"><span class="text-danger">*</span>Type</label>
           <select class="form-control" name="type" id="type" onfocusout="validateType()" required>
             <option value=' '>-- Select -- </option>

             <option value="1" <?= ($customer['data'][0]['type'] == '1')?'selected':''?> >customer</option>
             <option value="2" <?= ($customer['data'][0]['type'] == '2')?'selected':''?>>frenchise</option>
             <option value="3" <?= ($customer['data'][0]['type'] == '3')?'selected':''?>>reseller</option>

           </select>
           <span class="text-danger type_error"></span>
         </div>
       </div>
       <!-- <div class="col-md-6" id="locationField">
        <div class="form-group">
         <label for="location" class="col-md-8 control-label"><span class="text-danger">*</span>Permanent Address</label>
         <input type="text" name="p_address"  class="form-control"  required  data-toggle="tooltip" data-placement="top" title="ex 'st 2. samta colony durg'" id="autocomplete" value="<?= ($this->input->post('p_address') ? $this->input->post('p_address') : $customer['data'][0]['location']); ?>" placeholder="" />
         <span class="text-danger ip_error"> </span>
       </div>
     </div> -->

<div class="col-md-12">
          <label for="task" class="col-md-12 control-label"><span class="text-danger">*</span>Address</label>
          <div class="form-group">
            <textarea row="7" class="form-control" name="p_address" required data-toggle="tooltip" data-placement="top" title="ex 'st 2. samta colony durg'"><?= ($this->input->post('p_address') ? $this->input->post('p_address') : $customer['data'][0]['location']); ?></textarea>
            <span class="text-danger"><?= form_error('p_address');?></span>
          </div>
        </div>

     
      <div class="col-md-6">
            <div class="form-group">
              <label for="pincode" class="col-md-4 control-label"><span class="text-danger">*</span>City</label>
              <input type="text" name="p_city"  value="<?= ($this->input->post('p_city') ? $this->input->post('p_city') : $customer['data'][0]['city']); ?>" class="form-control" id="city" required   />
              <span class="text-danger pincode_error"></span>
            </div>
          </div>
     <div class="col-md-6">
            <div class="form-group">
              <label for="pincode" class="col-md-8 control-label"><span class="text-danger">*</span>Pincode</label>
              <input type="text" name="pincode"   class="form-control" id="pincode" required value="<?= ($this->input->post('pincode') ? $this->input->post('pincode') : $customer['data'][0]['pincode']); ?>"  />
              <span class="text-danger pincode_error"></span>
            </div>
          </div>
    <!--  <div class="col-md-6">
      <div class="form-group">
        <label for="username" class="control-label"><span class="text-danger">*</span>Username</label>
        <input type="text" name="username"  class="form-control" id="username" onfocusout='usernameValidation()' value="<?= ($this->input->post('username') ? $this->input->post('username') : $customer['data'][0]['username']); ?>" />
        <span class="username_error"></span>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
        <input type="password" name="password"  class="form-control" id="password" />
        <span class="text-danger password_error"></span>
      </div>
    </div> -->



    <div class="col-md-12" align="center">
      <div class="form-group">
       <button type="submit" class="btn btn-success" onclick="validation();">Update</button>
     </div>
   </div>

 </div>
 <!-- /end row -->



</div>
</div>     
</div>
<?= form_close(); ?>
<script type="text/javascript">
  function usernameValidation()
  {
    var username=$('#username').val();
    $.ajax({
      type: "post",
      url: "<?= base_url() ?>crn/usernameCheck",
      data:{username:username},
      success: function (data) {
        var obj=JSON.parse(data)
        // var result=datas;
       if(obj.length>0)
        {
          
          $('.username_error').html('This username is already exist');
           $('.username_error').css('color','red');
        }
        else
        {
          $('.username_error').html('This username is avilable');
          $('.username_error').css('color','green');
        }
console.log(obj);

      },
    })
  }

 function validateMobile()
    {
      var mobile=$('#mobile').val();
      console.log(mobile);
      if(mobile=='')
      {
        $('.mobile_error').show();
        $('.mobile_error').html('Please fill this field');
         $('#mobile').focus();
      }
      else
      {
        $('.mobile_error').hide();
      }

    }
    

</script>