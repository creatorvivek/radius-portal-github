<div algin="center" >  
<?= form_open('crn/add_crn_process',array("class"=>"form-horizontal form_validation")) ?>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title center" >Customer Relationship Number Generate</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <!-- <div class="col-md-9">

            <div class="form-group">
              <label for="search">Search</label>
              <input type="text" class="form-control" id="search" onkeyup="searchResult();" autocomplete="off" data-toggle="dropdown" autofocus>
            </div>

            <ul id="show_search_result" class="dropdown-menu customtable"></ul>
          </div> -->
          
          <div class="col-md-6">
            <div class="form-group">
              <label for="name" class="col-md-4 control-label"><span class="text-danger">*</span>Name</label>
              <input type="text" name="name"  class="form-control" value="<?= $this->input->post("name"); ?>"  id="name" required onkeypress="return isAlpha(event)"  data-parsley-trigger="keyup" autofocus/>
              <span class="text-danger name_error"><?= form_error('name');?></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="mobile" class=" control-label"><span class="text-danger">*</span>Mobile Number</label>
              <input type="text" name="mobile" value="<?php echo $this->input->post("mobile"); ?>" class="form-control" id="mobile" minlength=10 maxlength="10" onkeyup="validateMobile()"  onkeypress="return isNumberKey(event)" required data-parsley-trigger="keyup"/>
              <span class="text-danger mobile_error"><?= form_error('mobile');?></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="nas_id" class="control-label"><span class="text-danger">*</span>Email</label>
              <input type="email" name="email"  class="form-control" id="email" value="<?= $this->input->post("email"); ?>" required data-parsley-type="email" data-parsley-trigger="keyup" />
              <span class="text-danger nas_error"><?= form_error('email');?></span>
            </div>
          </div>
         <!--  <div class="col-md-6">
            <div class="form-group">
              <label for="remark" class="col-md-6 control-label"><span class="text-danger">*</span>Lead</label>
              <select class="form-control" name="lead" id="lead">

               
            </select>
          </div>
        </div> -->
        <div class="col-md-6">
          <div class="form-group">
           <label for="remark" class="col-md-6 control-label"><span class="text-danger">*</span>Type</label>  
           <select class="form-control" name="type" id="type"  required>
             <option value=''>-- Select -- </option>
             <option value="1">customer</option>
             <option value="2">frenchise</option>
             <option value="3">reseller</option>

           </select>
           <span class="text-danger type_error"><?= form_error('type');?></span>
         </div>
       </div>
       <!-- <div class="col-md-12" id="locationField">
        <div class="form-group">
         <label for="location" class="col-md-6 control-label"><span class="text-danger">*</span>Permanent Address</label>
         <input type="text" name="p_address" value="<?php echo $this->input->post('p_address'); ?>" class="form-control"  data-toggle="tooltip" data-placement="top" title="ex 'st 2. samta colony durg'" id="autocomplete" placeholder="" required />
         <span class="text-danger "><?= form_error('p_address');?> </span>
       </div>
     </div> -->
      <div class="col-md-12">
          <label for="task" class="col-md-12 control-label"><span class="text-danger">*</span>Address</label>
          <div class="form-group">
            <textarea row="7" class="form-control" name="p_address" required data-toggle="tooltip" data-placement="top" title="ex 'st 2. samta colony durg'"><?php echo $this->input->post('p_address'); ?></textarea>
            <span class="text-danger"><?= form_error('p_address');?></span>
          </div>
        </div>
      <div class="col-md-6">
            <div class="form-group">
              <label for="pincode" class="col-md-4 control-label"><span class="text-danger">*</span>City</label>
              <input type="text" name="p_city"  class="form-control" id="city" value="<?php echo $this->input->post('p_city'); ?>" required   />
              <span class="text-danger pincode_error"><?= form_error('p_city');?></span>
            </div>
          </div>
     <div class="col-md-6">
            <div class="form-group">    
              <label for="pincode" class="col-md-4 control-label"><span class="text-danger">*</span>Pincode</label>
              <input type="text" name="pincode"  class="form-control" value="<?php echo $this->input->post('pincode'); ?>" id="pincode" required maxlength="6"  onkeypress="return isNumberKey(event)"/>
              <span class="text-danger pincode_error"><?= form_error('pincode');?></span>
            </div>
          </div>
           <div class="col-md-6">
           </div>
     <!-- <div class="col-md-6">
      <div class="form-group">
        <label for="username" class="control-label"><span class="text-danger">*</span>Username</label>
        <input type="text" name="username"  class="form-control" id="username" onfocusout='usernameValidation()' />
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



    <div class="col-md-12 col-sm-12" align="center">
      <div class="form-group">
       <button type="submit" class="btn btn-success save-button"  onclick="validation();">Generate</button>
     </div>
   </div>

 </div>
 <!-- /end row -->



</div>
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
        // alert(data);
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
// console.log(obj);

      },
    })
  }

 function validateMobile()
    {
      var mobile=$('#mobile').val();
      // console.log(mobile);
      // if(mobile=='')
      // {
      //   $('.mobile_error').show();
      //   $('.mobile_error').html('Please fill this field');
      //    $('#mobile').focus();
      // }
      // if(mobile.length!=10)
      // {
      //   $('.mobile_error').html('please write correct mobile number');
      //    $('.mobile_error').css('font-size','14px');
      //   $('#mobile').focus();
      //      $('.save-button').prop("disabled",true);
      // }
      
        $('.mobile_error').hide();
        $('.save-button').prop("disabled",false);
        $.ajax({
      type: "post",
       url: "<?= base_url() ?>crn/mobileCheck",
        data:{mobile:mobile},
      success: function (data) {
        var obj=JSON.parse(data);
        console.log(obj);
        
        if(obj.length>0)
        {
          $('.mobile_error').show();
        $('.mobile_error').html('this mobile number already exist of crn='+obj[0].crn_id+'');
         $('#mobile').focus();
           $('.save-button').prop("disabled",true);
        }
        else
        {

           $('.save-button').prop("disabled",false);
            $('.mobile_error').hide();
        }
      },
    });

    }
  
    

</script>
