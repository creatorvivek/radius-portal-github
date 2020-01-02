<style type="text/css">
#show_search_result{
  background-color: #Fffffe;
  list-style-type:none;
}
#show_search_result li:hover
{
  background-color:grey;
  /*color:white;*/
}
.list_design
{
  font-size: 12px;
  color:blue;
}
h5 {
  position: relative;
  text-align: center;
}

h5 span {
  background: #fff;
  padding: 0 15px;
  position: relative;
  z-index: 1;
}

h5:before {
  background: #ddd;
  content: "";
  display: block;
  height: 1px;
  position: absolute;
  top: 50%;
  width: 100%;
}
h5:before {
  left: 0;
}

</style>

<!-- <div id="error" class="alert alert-success"></div> -->
<div class="row">
  <div class="col-md-8">
   
    <form class="form-horizontal form_validations" method="post" id="form-id">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title center">CUSTOMER APPLICATION FORM</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
              <label for="name" class="control-label">First Name</label>
            <div class="form-group">
              <input type="text" class="form-control" id="fname" placeholder="firstname"  value="<?= ($this->input->post('f_name') ? $this->input->post('f_name') : $name); ?>"  name="fname"  onkeypress="return isAlpha(event)"  >
            </div>
             <span class="text-danger f_name"><?= form_error('fname') ?></span>
          </div>
          <div class="col-md-3">
              <label for="name" class="control-label">Last Name</label>
            <div class="form-group">
              <input type="text" class="form-control" id="lname" placeholder="Lastname"  name="lname"  onkeypress="return isAlpha(event)" >
            </div>
            <span class="text-danger f_name"><?= form_error('lname') ?></span>
          </div>
          <!-- <div class="col-md-3">
            <div class="form-group">
              <label for="remark" class="col-md-1 control-label"><span class="text-danger">*</span>Gender</label>
              <select class="form-control" name="gender" id="gender" onfocusout="validateTypes()">
                <option value=''>-- Select -- </option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              <span class="text-danger type_error"></span>
            </div>
          </div> -->
          <div class="col-md-6">
              <label for="com_name"  class="col-md-6" >Company Name</label>
            <div class="form-group">
              <input type="text" class="form-control" id="com_name" name="com_name"  >
            </div>
            <span class="text-danger f_name"><?= form_error('com_name') ?></span>
          </div>
          <div class="col-md-12"> <h5><span>Contact Info</span></h5></div>
          <div class="col-md-3">
              <label for="c_mobile" class="control-label"><span class="text-danger">*</span>Mobile</label>
            <div class="form-group">
              <input type="text" name="c_mobile"  class="form-control" id="c_mobile" value="<?= ($this->input->post('c_mobile') ? $this->input->post('c_mobile') : $mobile); ?>" onkeypress="return isNumberKey(event)"  onfocusout="validateMobile()" maxlength="10" required/>
              <span class="text-danger c_mobile_error"><?= form_error('c_mobile') ?></span>
            </div>
          </div>
          <div class="col-md-3">
              <label for="c_office" class=" control-label">Office</label>
            <div class="form-group">
              <input type="text" name="c_office"  class="form-control" id="c_office" maxlength="10" onkeypress="return isNumberKey(event)" />
              <span class="text-dangerc_office_error"><?= form_error('c_office') ?></span>
            </div>
          </div>
          <div class="col-md-3">
              <label for="c_home" class=" control-label">Home</label>
            <div class="form-group">
              <input type="text" name="c_home"  class="form-control" id="c_home" maxlength="10" onkeypress="return isNumberKey(event)"   />
              <span class="text-danger c_home_error"><?= form_error('c_home') ?></span>
            </div>
          </div>
          <div class="col-md-3">
              <label for="c_alternate" class="control-label">Alternate contact</label>
            <div class="form-group">
              <input type="text" name="c_alternate"  class="form-control" id="c_alternate" maxlength="10"  onkeypress="return isNumberKey(event)" />
              <span class="text-danger c_alternate_error"><?= form_error('c_alternate') ?></span>
            </div>
          </div>
          <!--  end of contact -->
          <div class="col-md-12"> <h5><span>Permanent Address</span></h5></div>
              <label for="description" class="col-md-6 control-label">Address</label>
          <div class="col-md-12">
            <div class="form-group">
              <textarea class="form-control" rows="2"  name="p_address" value="<?php echo $this->input->post('p_address'); ?>" id="p_address"  data-toggle="tooltip" data-placement="top"  required></textarea>
            </div>
          </div>
          <div class="col-md-4">
              <label for="p_city" class="col-md-8 control-label"><span class="text-danger">*</span>City</label>
            <div class="form-group">
              <input type="text" name="p_city"  class="form-control" id="p_city" required onkeypress="return isAlpha(event)" />
              <span class="text-danger p_city_error"><?= form_error('p_city') ?></span>
            </div>
          </div>
          <div class="col-md-4">
              <label for="name" class="col-md-8 control-label"><span class="text-danger">*</span>Pincode</label>
            <div class="form-group">
              <input type="text" name="p_pincode"  class="form-control"  maxlength="6" id="p_pincode" required onkeypress="return isNumberKey(event)" />
              <span class="text-danger p_pincode_error"><?= form_error('p_pincode') ?></span>
            </div>
          </div>
          <div class="col-md-4">
              <label for="p_landmark" class="col-md-8 control-label">Landmark</label>
            <div class="form-group">
              <input type="text" name="p_landmark"  class="form-control" id="p_landmark"   "/>
              <span class="text-danger p_landmark_error"></span>
            </div>
          </div>
          <!-- /end permanent -->
          <div class="checkbox">
            <label style="font-weight:400"><input type="checkbox"  name="optradio" id="check">&nbsp     If Installation and billing Address is same as permanent address so click here </label>
          </div>
          <!-- start billing -->
          <div class="col-md-12"> <h5><span>Installation Address</span></h5></div>
          <div class="col-md-12">
              <label for="description" class="col-md-12 control-label">Address</label>
            <div class="form-group">
              <textarea class="form-control" rows="2"  name="i_address" value="<?php echo $this->input->post('i_address'); ?>" id="i_address"  data-toggle="tooltip" data-placement="top"  required></textarea>
            </div>
          </div>
          <div class="col-md-4">
              <label for="i_city" class="col-md-4 control-label"><span class="text-danger">*</span>City</label>
            <div class="form-group">
              <input type="text" name="i_city"  class="form-control" id="i_city" required "  onkeypress="return isAlpha(event)"/>
              <span class="text-danger i_city_error"><?= form_error('i_city') ?></span>
            </div>
          </div>
          <div class="col-md-4">
              <label for="name" class="col-md-5 control-label"><span class="text-danger">*</span>Pincode</label>
            <div class="form-group">
              <input type="text" name="i_pincode"  class="form-control" id="i_pincode" maxlength="6" required  onkeypress="return isNumberKey(event)" />
              <span class="text-danger i_pincode_error"><?= form_error('i_pincode') ?></span>
            </div>
          </div>
          <div class="col-md-4">
              <label for="i_landmark" class="col-md-5 control-label">Landmark</label>
            <div class="form-group">
              <input type="text" name="i_landmark"  class="form-control" id="i_landmark"   "/>
              <span class="text-danger i_landmark_error"></span>
            </div>
          </div>
          <!-- start installation -->
          <div class="col-md-12"> <h5><span>Billing Address</span></h5></div>
          <div class="col-md-12">
              <label for="description" class="col-md-12 control-label">Address</label>
            <div class="form-group">
              <textarea class="form-control" rows="2" cols="3" name="b_address" value="<?php echo $this->input->post('b_address'); ?>" id="b_address"  data-toggle="tooltip" data-placement="top"  required></textarea>
            </div>
          </div>
          <div class="col-md-4">
              <label for="p_city" class="col-md-4 control-label"><span class="text-danger">*</span>City</label>
            <div class="form-group">
              <input type="text" name="b_city"  class="form-control" id="b_city" required  onkeypress="return isAlpha(event)"  />
              <span class="text-danger b_city_error"><?= form_error('b_city') ?></span>
            </div>
          </div>
          <div class="col-md-4">
              <label for="name" class="col-md-5 control-label"><span class="text-danger">*</span>Pincode</label>
            <div class="form-group">
              <input type="text" name="b_pincode" value="" class="form-control" maxlength="6" id="b_pincode" required onkeypress="return isNumberKey(event)"  />
              <span class="text-danger b_pincode_error"><?= form_error('b_pincode') ?></span>
            </div>
          </div>
          <div class="col-md-4">
              <label for="p_landmark" class="col-md-5 control-label">Landmark</label>
            <div class="form-group">
              <input type="text" name="b_landmark" value="" class="form-control" id="b_landmark" />
              <span class="text-danger b_landmark_error"></span>
            </div>
          </div>
          </div><!-- /row -->
          </div><!-- /card_body -->
          </div><!-- /card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title center" >USER INFORMATION</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                    <label for="p_email" class="control-label"><span class="text-danger">*</span>Primary Email</label>
                  <div class="form-group">
                    <input type="email" name="p_email"  class="form-control" value="<?= ($this->input->post('p_email') ? $this->input->post('p_email') : $email); ?>"  id="p_email" required />
                    <span class="text-danger p_email_error"><?= form_error('p_email') ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                    <label  class="control-label">Secondry Email</label>
                  <div class="form-group">
                    <input type="email" name="s_email"  class="form-control" id="s_email" />
                    <span class="text-danger s_email_error"><?= form_error('s_amail') ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                    <label>Date Of Birth</label>
                  <div class="form-group">
                    <div class="input-group">
                      <!-- <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div> -->
                      <input type="text" class="form-control datemask" required data-inputmask="'alias': 'dd/mm/yyyy'" data="f1" data-mask name="dob" id="dob">
                      <span class="text-danger dob_error"><?= form_error('dob') ?></span>
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
                <!--  <div class="col-md-4">
                  <div class="form-group">
                    <label>Purpose Of Connection</label>
                    <label class="radio-inline">
                      <input type="radio" name="purpose" >Home
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="purpose">Office
                    </label>
                  </div>
                </div> -->
                <?php if(isset($crn)){ ?>
                <input type="hidden" name="crn_number" value="<?= $crn ?>" >
                <?php } ?>
                <div class="col-md-3">
                    <label for="remark" class="col-md-8 control-label"><span class="text-danger">*</span>Id proof</label>
                  <div class="form-group">
                    <select class="form-control" name="id_proof" id="id_proof" required>
                      <option value="">select</option>
                    </select>
                    <span class="text-danger id_proof_error"><?= form_error('id_proof') ?></span>
                  </div>
                </div>
                <div class="col-md-3">
                    <label for="nas_id" class="control-label">upload</label>
                  <div class="form-group">
                    <input type="file" name="email" value="" class="form-control"  />
                    <span class="text-danger nas_error"></span>
                  </div>
                </div>
                <div class="col-md-3">
                    <label for="remark" class="col-md-12 control-label"><span class="text-danger">*</span>Address proof</label>
                  <div class="form-group">
                    <select class="form-control" name="address_proof" id="address_proof" required>
                    </select>
                    <span class="text-danger id_proof_error"><?= form_error('address_proof') ?></span>
                  </div>
                </div>
                <div class="col-md-3">
                    <label for="nas_id" class="control-label">upload</label>
                  <div class="form-group">
                    <input type="file" name="email"  class="form-control"  />
                    <span class="text-danger nas_error"></span>
                  </div>
                </div>
                <div class="col-md-4">
                    <label for="remark" class="col-md-8 control-label"><span class="text-danger">*</span>Service type</label>
                  <div class="form-group">
                    <select class="form-control" name="service_type" required >
                      <option value="">--select--</option>
                      <option value="1">Broadband</option>
                      <option value="2">Leaseline</option>
                      <!-- <option value="3">reseller</option> -->
                    </select>
                    <span class="text-danger service_error"><?= form_error('service_type') ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                    <label for="plan_type" class="col-md-6 control-label"><span class="text-danger">*</span>Plan Type</label>
                  <div class="form-group">
                    <select class="form-control" name="plan_type" id="plan_type" required >
                      
                      
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                    <label for="plan" class="col-md-6 control-label"><span class="text-danger">*</span>Plan</label>
                  <div class="form-group">
                    <select class="form-control" name="plan" id="plan" required>
                    </select>
                  </div>
                </div>
                <!-- <div class="col-md-5">
                  <div class="form-group">
                    <label for="username" class="control-label"><span class="text-danger">*</span>Username</label>
                    <input type="text" name="username"  class="form-control" id="username" onfocusout='usernameValidation()' />
                    <span class="username_error"></span>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
                    <input type="password" name="password"  class="form-control" id="password" autocomplete="off" />
                    <span class="text-danger password_error"></span>
                  </div>
                </div> -->
                <div class="col-md-12" align="center">
                  <div class="form-group">
                    <button type="submit" class="btn btn-success save-button" onclick="formValidation()">Generate Caf</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        </div>
        <!-- /end row -->
        <!-- main coloumn -->
        
      </div>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?= base_url() ?>assets/admin/plugins/jqueryui/jquery-ui.min.js"></script>
   <script type="text/javascript" src="<?= base_url() ;?>assets/admin/dist/js/jquery.validate.min.js"> </script>

   <script>
    function validateType()
    {
      var type=$('#type').val();
      console.log(type);
      if(type==' ')
      {
        $('.type_error').show();
        $('.type_error').html('please select any field');
        $('#type').focus();
      }
      else
      {
        $('.type_error').hide();
      }

    }
    function validateMobile()
    {
      var mobile=$('#c_mobile').val();
      console.log(mobile);
      if(mobile=='')
      {
        $('.c_mobile_error').show();
        $('.c_mobile_error').html('this field is mendatory');
        $('#c_mobile').focus();
      }
      else if(mobile.length!=10)
      {
        $('.c_mobile_error').html('please write correct mobile number');
         $('.c_mobile_error').css('font-size','14px');
        $('#c_mobile').focus();
           $('.save-button').prop("disabled",true);
      }
      else
      {
        $('.save-button').prop("disabled",false);
        $('.c_mobile_error').hide();
      }

    }

  </script>
  <script type="text/javascript">

      var f_id="<?= $this->session->f_id ?>";
   $(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2();
    $( "#dob" ).datepicker({
     //    flat: true,
     //   date: '2008-07-31',
     // current: '2008-07-31',
     dateFormat: "dd-mm-yy",
      changeMonth: true,
     changeYear: true,
     yearRange: '1950:2012'
   });
    plan_type_get();
    masterProof();
          });
      function plan_type_get()
        {
          $.ajax({
              type: "POST",
              url: "<?= base_url() ?>plan/selectPlanType",
              data:{f_id:f_id},
               success: function (data) {
                console.log(data);
                var obj=JSON.parse(data);
                var length=obj.length;
                  if(length>0)
                   { 
                var row;
                var selectoption= '<option value="">--select--</option>';
                for(var i=0;i<length;i++)
                {
                row +='<option value="'+obj[i].id+'">'+obj[i].type+'</option>';
                 }
                 $('#plan_type').html(selectoption+row);
               }
               else
               {
               row = '<option value="" >No Plans</option>';
                  $('#plan_type').html(row);
               }
               },
             });
        }

   $('#check').click(function() {

    var p_address=$('#p_address').val();
    var p_pincode=$('#p_pincode').val();
    var p_city=$('#p_city').val();
    var p_landmark=$('#p_landmark').val();
// console.log(p_pin_code);
console.log(p_landmark);
$("#b_address").val(p_address);
$("#i_address").val(p_address);
$("#i_pincode").val(p_pincode);
$("#b_pincode").val(p_pincode);
$("#i_city").val(p_city);
$("#b_city").val(p_city);
$("#i_landmark").val(p_landmark);
$("#b_landmark").val(p_landmark);
});

   $('#plan_type').change(function(){
    var plan_type=$('#plan_type').val();
    console.log(plan_type);
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>plan/selectPlan",
      data:{plan_type:plan_type},
      success: function (data) {
        var obj=JSON.parse(data);
        console.log(obj.length);
        if(obj.length>0)
        { 
          // console.log(obj);
            var initial='<option value="">--select plan--</option>';
          var plans,i;
          for(i=0;i<obj.length;i++)
          {
           // plans += '<option value="'+obj[i].id+'">'+obj[i].name+'</option>';
            plans += '<option data-toggle="tooltip" title="'+obj[i].description+'" value="'+obj[i].id+','+obj[i].amount+','+obj[i].validity_actual+',\''+obj[i].name+'\'" >'+obj[i].name+' '+obj[i].amount+'&#8377  /'  +obj[i].validity_actual +'</option>';
         }  
       // console.log(plans);
       $('#plan').html(initial+plans);
     }
     else
     {
      plans = '<option value="" >No Plans</option>';
      $('#plan').html(plans);
    }

  },
  error:function(error)
  {
   console.log(data);
 },
});
  });
function formValidation()
{
  var dob=$('#dob').val();
var currentdate=new Date();
var dobobj=new Date(dob);
if(dobobj>currentdate)
{
  console.log(dobObj);
  $('.dob_error').text('Invalid date');
  
}
else
{
  // if($('.form_validation').parsley().isValid())
  //  {
  //   document.forms["form_validation"].submit();
  // }

 var form=$('.form_validations');
   form.validate({
    errorElement: 'span',
    errorClass: 'help-block',
    highlight: function(element, errorClass, validClass) {
      $(element).closest('.form-group').addClass("has-error");
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).closest('.form-group').removeClass("has-error");
    },
    // rules: {

    //   plan: {
    //     required: true,

    //   },
    //   plan_type:
    //   {
    //     required: true,
    //   },

    //   type:
    //   {
    //     required: true,
    //   },

    // },
    // messages: {

    //   plan: {
    //     required: "this field is require",
    //   },
    //   plan_type: {
    //     required: "this field is require",
    //   },
    //   type: {
    //     required: "please select any field",
    //   },
    // }
  });

   if (form.valid() === true){


    document.getElementById("form-id").action ="<?= base_url() ?>caf/add_caf_process";
   document.getElementById("form-id").submit();







}
}
}


    //Datemask dd/mm/yyyy
    

 
function masterProof(){
     $.ajax({
      type: "GET",
      url: "<?= base_url() ?>caf/masterProof",
      
      success: function (data) {
        console.log(data);
        var obj=JSON.parse(data);
        // console.log(obj);
        var i;
        var id_proof='<option value="">--select--</option>';
        for (i = 0; i < obj.length; i++) {
         id_proof += '<option value="' + obj[i].name + '">' + obj[i].name + '</option>';
         $('#id_proof').html(id_proof);
         $('#address_proof').html(id_proof);
       }

     },
   });

   }
  

</script>
