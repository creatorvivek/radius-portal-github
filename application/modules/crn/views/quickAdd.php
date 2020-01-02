
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

<div class="row">
  <div class="col-10">
    <!-- Custom Tabs -->
    <div class="card">
      <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">
        <ul class="nav nav-pills ml-auto p-2 pull-left">
          <li class="nav-item"><a class="nav-link active show" href="#tab_1" data-toggle="tab">Personals Information</a></li>
          <li class="nav-item"><a class="nav-link disabled" href="#tab_2" data-toggle="tab">Installation Information</a></li>
          <li class="nav-item"><a class="nav-link disabled" href="#tab_3" data-toggle="tab">Plan Information</a></li>
        </ul>
        </h3>
        </div><!-- /.card-header -->
        <!-- <a data-toggle="tab" href="#tab_2">Next</a> -->
        <form  method="post" class="form_validations" id="form-id">
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab_1">
                <div class="row">
                  <div class="col-md-5">
                    <label for="name" class="col-md-4 control-label"><span class="text-danger">*</span>First Name</label>
                    <div class="form-group">
                      <input type="text" name="fname"  class="form-control" id="fname" data="f1"  onkeypress="return isAlpha(event)" required autofocus "/>
                      <span class="text-danger name_error"></span>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <label for="name" class="col-md-4 control-label"><span class="text-danger">*</span>Last Name</label>
                    <div class="form-group">
                      <input type="text" name="lname"  class="form-control" id="lname" data="f1"  onkeypress="return isAlpha(event)" required  "/>
                      <span class="text-danger name_error"></span>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <label for="mobile" class=" control-label"><span class="text-danger">*</span>Mobile Number</label>
                    <div class="form-group">
                      <input type="text" name="mobile"  class="form-control" required id="mobile" maxlength="10" data="f1" onfocusout="validateMobile()" onkeypress="return isNumberKey(event)" />
                      <span class="text-danger mobile_error"></span>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <label for="nas_id" class="control-label"><span class="text-danger">*</span>Email</label>
                    <div class="form-group">
                      <input type="email" name="email"  class="form-control" id="email" data="f1" required />
                      <span class="text-danger error_email"></span>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <label  class="control-label"><span class="text-danger">*</span>Date of birth</label>
                    <div class="form-group">
                      <!-- <div class="form-group"> -->
                      <!-- <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div> -->
                      <input type="text" class="form-control datemask" required  data="f1" readonly='true'  name="dob" id="dob">
                    </div>
                    <span class="text-danger dob_error"></span>
                  </div>
                  <div class="col-md-5">
                    <label for="nas_id" class="control-label">Company Name</label>
                    <div class="form-group">
                      <input type="text" name="company_name"  class="form-control" id="company_name" data="f1"    />
                      <span class="text-danger nas_error"></span>
                    </div>
                  </div>
                  <!-- <div class="col-md-12"> <h5><span>Permanent Address</span></h5></div> -->
                  <div class="col-md-10">
                    <label for="description" class="col-md-6 control-label"><span class="text-danger">*</span>Permanent Address</label>
                    <div class="form-group">
                      <textarea class="form-control" rows="2"  name="p_address" data="f1" value="<?php echo $this->input->post('p_address'); ?>" id="p_address"  data-toggle="tooltip" data-placement="top" required  title="address"></textarea>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="p_city" class="col-md-10 control-label"><span class="text-danger">*</span>City</label>
                    <div class="form-group">
                      <input type="text" name="p_city"  class="form-control" id="p_city" data="f1" required   onkeypress="return isAlpha(event)"/>
                      <span class="text-danger p_city_error"></span>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="name" class="col-md-10 control-label"><span class="text-danger">*</span>Pincode</label>
                    <div class="form-group">
                      <input type="text" name="p_pincode"  class="form-control"  maxlength="6" id="p_pincode" data="f1" required  onkeypress="return isNumberKey(event)"/>
                      <span class="text-danger p_pincode_error"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="p_landmark" class="col-md-4 control-label">Landmark</label>
                    <div class="form-group">
                      <input type="text" name="p_landmark"  class="form-control" id="p_landmark"  data="f1" />
                      <span class="text-danger p_landmark_error"></span>
                    </div>
                  </div>
                  <div class="col-sm-offset-4 col-sm-5">
                    <div class="form-group">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-success"   onclick="checkValidationOne('tab_2','f1')">Next</button>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="row">
                  <div class="col-md-6 coloumn">
                    <div class="row">
                      <div class="col-md-6 heading">Installation Address</div>
                      <div class="checkbox col-md-6">
                        <label style="font-weight:400"><input type="checkbox"  name="optradio" id="check">same as permanent </label>
                      </div>
                      <hr>
                      <div class="col-md-5">
                        <label for="remark" class="col-md-12 control-label"><span class="text-danger">*</span>Address proof</label>
                        <div class="form-group">
                          <select class="form-control" name="address_proof_i" id="address_proof" data="f2" autofocus required>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <label for="nas_id" class="control-label">Upload</label>
                        <div class="form-group">
                          <input type="file" name="address_proof"  class="form-control"  />
                          <span class="text-danger nas_error"></span>
                        </div>
                      </div>
                      <div class="col-md-10">
                        <label for="description" class="col-md-12 control-label"><span class="text-danger">*</span>Address</label>
                        <div class="form-group">
                          <textarea class="form-control" rows="2"  name="i_address" value="<?php echo $this->input->post('i_address'); ?>" id="i_address" required data-toggle="tooltip" data-placement="top"  data="f2"></textarea>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="i_city" class="col-md-8 control-label"><span class="text-danger">*</span>City</label>
                        <div class="form-group">
                          <input type="text" name="i_city"  class="form-control" id="i_city" data="f2" required  onkeypress="return isAlpha(event)"/>
                          <span class="text-danger i_city_error"></span>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="name" class="col-md-12 control-label"><span class="text-danger">*</span>Pincode</label>
                        <div class="form-group">
                          <input type="text" name="i_pincode" class="form-control" id="i_pincode" maxlength="6" required data="f2" onkeypress="return isNumberKey(event)"/>
                          <span class="text-danger i_pincode_error"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="i_landmark" class="col-md-12 control-label">Landmark</label>
                        <div class="form-group">
                          <input type="text" name="i_landmark" value="" class="form-control" id="i_landmark"  data="f2"/>
                          <span class="text-danger i_landmark_error"></span>
                        </div>
                      </div>
                    </div>
                    <!-- /row of col-6 -->
                  </div>
                  <div class="col-md-6 coloumn">
                    <div class="row">
                      <div class="col-md-6 heading">Billing Address</div>
                      <div class="checkbox col-md-6">
                        <label style="font-weight:400"><input type="checkbox"  name="optradio" id="checkbilling">same as Installation </label>
                      </div>
                      <div class="col-md-5">
                        <label for="remark" class="col-md-12 control-label"><span class="text-danger">*</span>Address proof</label>
                        <div class="form-group">
                          <select class="form-control" name="address_proof" data="f2" id="id_proof" required>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="nas_id" class="control-label">Upload</label>
                          <input type="file" name="" value="" class="form-control"  data="f2" />
                          <span class="text-danger nas_error"></span>
                        </div>
                      </div>
                      <div class="col-md-10">
                        <label for="description" class="col-md-12 control-label"><span class="text-danger">*</span>Address</label>
                        <div class="form-group">
                          <textarea class="form-control" rows="2" cols="3" name="b_address" value="<?php echo $this->input->post('b_address'); ?>" id="b_address" required  data-toggle="tooltip" data-placement="top"  data="f2"></textarea>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="p_city" class="col-md-8 control-label"><span class="text-danger">*</span>City</label>
                        <div class="form-group">
                          <input type="text" name="b_city"  class="form-control" id="b_city" data="f2" required  onkeypress="return isAlpha(event)" "/>
                          <span class="text-danger b_city_error"></span>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="name" class="col-md-12 control-label"><span class="text-danger">*</span>Pincode</label>
                        <div class="form-group">
                          <input type="text" name="b_pincode"  class="form-control" maxlength="6" id="b_pincode" data="f2" required onkeypress="return isNumberKey(event)" />
                          <span class="text-danger b_pincode_error"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="p_landmark" class="col-md-8  control-label">Landmark</label>
                        <div class="form-group">
                          <input type="text" name="b_landmark"  class="form-control" id="b_landmark"  data="f2"/>
                          <span class="text-danger b_landmark_error"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-offset-4 col-sm-5">
                    <div class="form-group pull-left">
                      <button type="button" class="btn btn-primary" onclick="nextTab('tab_1','f1')">Previous</button>
                    </div>
                  </div>
                  <div class="col-sm-offset-4 col-sm-5">
                    <div class="form-group">
                      <button type="button" class="btn btn-success pull-right" onclick="checkValidationTwo('tab_3','f2')">Next</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="row">
                  <div class="col-md-4">
                    <label for="remark" class="col-md-8 control-label"><span class="text-danger">*</span>Service type</label>
                    <div class="form-group">
                      <select class="form-control" name="type" id="type" autofocus required>
                        <option value="">--select--</option>
                        <option value="1">Broadband</option>
                        <option value="2">Leaseline</option>
                        <!-- <option value="3">reseller</option> -->
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="remark" class="col-md-6 control-label"><span class="text-danger">*</span>Plan Type</label>
                    <div class="form-group">
                      <select class="form-control" name="plan_type" id="plan_type" required>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="remark" class="col-md-6 control-label"><span class="text-danger">*</span>Plan</label>
                    <div class="form-group">
                      <select class="form-control" name="plan" id="plan" required>
                      </select>
                    </div>
                  </div>
                  <input type="hidden" name="start_date" class="start_date">
                  <input type="hidden" name="end_date" class="end_date">
                  <input type="hidden" name="plan_name" class="plan_name">
                  <input type="hidden" name="plan_cost" class="plan_cost">
                  <!--  <div class="col-md-5">
                    <div class="form-group">
                      <label for="username" class="control-label"><span class="text-danger">*</span>Username</label>
                      <input type="text" name="username"  class="form-control" id="username" required onfocusout='usernameValidation()' />
                      <span class="username_error"></span>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
                      <input type="password" name="password"  class="form-control" required id="password" autocomplete="off" />
                      <span class="text-danger password_error"></span>
                    </div>
                  </div> -->
                </div>
                <!-- /row -->
                <div class="row">
                  <div class="col-sm-offset-4 col-sm-5 pull-left">
                    <div class="form-group">
                      <button type="button" class="btn btn-primary" onclick="nextTab('tab_2','f2')">Previous</button>
                    </div>
                  </div>
                  <div class="col-sm-offset-4 col-sm-5">
                    <div class="form-group">
                      <input type="button" class="btn btn-success save-button" value="submit" onclick="submitForm()">
                    </div>
                  </div>
                  </div><!--/row button-->
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </form>
          </div>
          <!-- ./card -->
        </div>
        <!-- /.col -->
      </div>
      <div class="modal" id="user_profile">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" >Confirmation</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body body">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Edit</button>
              <button type="button" class="btn btn-success" onclick="submitFormAction()">Submit</button>
            </div>
          </div>
        </div>
      </div>
<!-- <script src="<?= base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script> -->
<script type="text/javascript" src="<?= base_url() ;?>assets/admin/dist/js/jquery.validate.min.js"> </script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?= base_url() ?>assets/admin/plugins/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript">
  var date="<?= date('d/m/Y') ?>";
  var f_id="<?= $this->session->f_id ?>";
  $(document).ready(function() {

   
      $( "#dob" ).datepicker({
     //    flat: true,
     //   date: '2008-07-31',
     // current: '2008-07-31',
     dateFormat: "dd-mm-yy",
      changeMonth: true,
     changeYear: true,
     yearRange: '1950:2012'
     // maxDate: "+0d",
     // shortYearCutoff: 50
     // minDate: "-2m"
     // constrainInput: false


      });
    $.ajax({
      type: "GET",
      url: "<?= base_url() ?>caf/masterProof",

      success: function (data) {
      // console.log(data);
      var obj=JSON.parse(data);
      // console.log(obj);
      var i;
      var id_proof='<option value="">--select--</option>';
      for (i = 0; i < obj.length; i++) {
       id_proof += '<option value="' + obj[i].id + '">' + obj[i].name + '</option>';
       $('#id_proof').html(id_proof);
       $('#address_proof').html(id_proof);
     }

   },
 });

    plan_type_get();
     //like prepaid and postpaid   
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
           row = '<option value=" ">No Plans</option>';
           $('#plan_type').html(row);
         }
       },
     });
    }
  });
  $('#check').click(function() {

    var p_address=$('#p_address').val();
    var p_pincode=$('#p_pincode').val();
    var p_city=$('#p_city').val();
    var p_landmark=$('#p_landmark').val();

// $("#b_address").val(p_address);
// $("#b_pincode").val(p_pincode);
// $("#b_city").val(p_city);
// $("#b_landmark").val(p_landmark);
$("#i_address").val(p_address);
$("#i_pincode").val(p_pincode);
$("#i_city").val(p_city);
$("#i_landmark").val(p_landmark);
});
  $('#checkbilling').click(function() {
    var i_address=$('#i_address').val();
    var i_pincode=$('#i_pincode').val();
    var i_city=$('#i_city').val();
    var i_landmark=$('#i_landmark').val();

    $("#b_address").val(i_address);
    $("#b_pincode").val(i_pincode);
    $("#b_city").val(i_city);
    $("#b_landmark").val(i_landmark);
  });
  function planDetails(cost,validity,name)
  {

    $('.plan_validity').val(validity);

    $('.plan_name').val(name);
    $('.plan_cost').val(cost);
    var startDateNow= "<?= date('Y-m-d H:i:s') ?>";
    var endDate=getEndDate(startDateNow,validity);
    $('.start_date').val(startDateNow);
    $('.end_date').val(endDate);
    console.log(cost);
// console.log(validity);
// console.log();

}
function validateMobile()
{
  var mobile=$('#mobile').val();
  if(mobile.length==10)
  {
    $('.mobile_error').hide();
    $.ajax({
      type: "post",
      url: "<?= base_url() ?>crn/mobileCheck",
      data:{mobile:mobile},
      success: function (data) {
        console.log(data);
        var obj=JSON.parse(data);
        // console.log(obj);
        // console.log(obj.length);
        if(obj.length>0)
        {
          $('.mobile_error').show();
          $('.mobile_error').html('this mobile number already exist of crn='+obj[0].crn_id+'');
        }
      },
    });
  }
  
}
//like 10gb 20gb
$('#plan_type').change(function(){
  var plan_type=$('#plan_type').val();
  $.ajax({
    type: "POST",
    url: "<?= base_url() ?>plan/selectPlan",
    data:{plan_type:plan_type},
    success: function (data) {
      var obj=JSON.parse(data);
      console.log(obj.length);
      if(obj.length>0)
      { 
        console.log(obj);
        var plans,i;
        var initial='<option value="">--select plan--</option>'
        for(i=0;i<obj.length;i++)
        {
         plans += '<option data-toggle="tooltip" title="'+obj[i].description+'" value="'+obj[i].id+','+obj[i].amount+','+obj[i].validity_actual+',\''+obj[i].name+'\'" >'+obj[i].name+' '+obj[i].amount+'&#8377  /'  +obj[i].validity_actual +'</option>';
         
       }  
       // console.log(plans);
       $('#plan').html(initial+plans);
     }
     else
     {
      plans = '<option value="">No Plans</option>';
      $('#plan').html(initial+plans);
    }

  },
  error:function(error)
  {
   console.log(data);
 },
});
});


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
          $('.save-button').attr("disabled", "disabled");


        }
        else
        {
          $('.username_error').html('This username is available');
          $('.username_error').css('color','green');
          $('.save-button').removeAttr("disabled");
        }
        console.log(obj);

      },
    })
}

function getEndDate(startDate,day)
{
  var result=false;
  $.ajax({
    type: "POST",
    url: "<?= base_url() ?>recharge/get_end_date",
    data: {validity:day,start_date:startDate},

    success: function (data) {

      result=data.trim();

    }, 
    async: false,
    error: function ()
    {
      alert('Error occured');
    }
  });
  return result;
// console.log(result);
}



function checkValidationOne(tab,id)
{
//   var error_email = '';
//   var error_password = '';
//   console.log($('#dob').val());
//   console.log( $('#mobile').val().length);
//   var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//   // console.log('dddd');
//    if($.trim($('#email').val()).length == 0)
//   {
//    error_email = 'Email is required';
//    $('.error_email').text(error_email);
//    // $('#email').addClass('has-error');
//   }
//   else
//   {
//    if (!filter.test($('#email').val()))
//    {
//     error_email = 'Invalid Email';
//     $('.error_email').text(error_email);
//     // $('#email').addClass('has-error');
//    }
//    else
//    {
//       $('.error_email').hide(error_email);
//     // error_email = '';
//     // $('.error_email').text(error_email);
//     // $('#email').removeClass('has-error');
//      if($.trim($('#mobile').val()).length == 0)
//      {
//       $('.mobile_errors').text('mobile number is required');
//      }
//      if(($('#mobile').val().length) != 10)
//          {
//       $('.mobile_error').text('mobile number is invalid');
//      }
//      else
//      {
//       nextTab(tab,id);
//      }

//    }


// }

var form=$('.form_validations');
var dob=$('#dob').val();
var currentdate=new Date();
var dobobj=new Date(dob);
if(dobobj>currentdate)
{

  $('.dob_error').html('Invalid date');
  
}
form.validate({
  errorElement: 'span',
  errorClass: 'help-block',
  highlight: function(element, errorClass, validClass) {
    $(element).closest('.form-group').addClass("has-error");
  },
  unhighlight: function(element, errorClass, validClass) {
    $(element).closest('.form-group').removeClass("has-error");
  },
  rules: {

    firstname: {
      required: true,
      minlength: 3,
    },
    email: {
      required: true,
      minlength: 3,
    },
    mobile:
    {

      minlength: 10,
    },
    p_address:
    {
      required: true,
    }



  },
  messages: {

    firstname: {
      required: "first Name required",
    },
    email: {
      required: "Email required",
    },
    mobile: {
      required: "please enter valid mobile number",
    },
    p_address:{
     required: "address field is required",
   },
 }
});

if (form.valid() === true){

 nextTab(tab,id);

}
}

function checkValidationTwo(tab,id)

{

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
    rules: {

      i_address: {
        required: true,

      },
      b_address:
      {
        required: true,
      }



    },
    messages: {

      i_address: {
        required: "this field is require",
      },
      b_address: {
        required: "this field is require",
      },
                  
                }
              });

  if (form.valid() === true){

   nextTab(tab,id);

 }




}









function nextTab(tab,id) 
{
  // $('a[href="#tab_2"]').tab('show');
  var form = $('[data="'+id+'"]');

  //console.log(form);
  for(var i=0; i < form.length; i++){
    if(form[i].value === '' && form[i].hasAttribute('required') && !form[i].hasAttribute('disabled')){
      alert('There are some required fields!');
      form[i].focus();
        //console.log(form[i]);
        return false;
      }
    }
    $('a').removeClass('disabled');
    $('a[href="#'+tab+'"]').tab('show');
    $('a').addClass('disabled');
  }

  function submitForm()
  {
   var type= $('#type').val();
   var plan_type= $('#plan_type').val();
   var plan= $('#plan').val();
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
    rules: {

      plan: {
        required: true,

      },
      plan_type:
      {
        required: true,
      },

      type:
      {
        required: true,
      },

    },
    messages: {

      plan: {
        required: "this field is require",
      },
      plan_type: {
        required: "this field is require",
      },
      type: {
        required: "please select any field",
      },
    }
  });

   if (form.valid() === true){


     var firstname=$('#fname').val();
     var lastname=$('#lname').val();
     var mobile=$('#mobile').val();
     var email=$('#email').val();
     var dob=$('#dob').val();
     var company_name=$('#company_name').val();
     var p_address=$('#p_address').val();
     var p_city=$('#p_city').val();
     var p_pincode=$('#p_pincode').val();
     var p_landmark=$('#p_landmark').val();
     var i_address=$('#i_address').val();
     var i_city=$('#i_city').val();
     var i_pincode=$('#i_pincode').val();
     var i_landmark=$('#i_landmark').val(); 
     var b_address=$('#b_address').val();
     var b_city=$('#b_city').val();
     var b_pincode=$('#b_pincode').val();
     var b_landmark=$('#b_landmark').val();
     var n_type= $('#type option:selected').text();
     var n_plan_type= $('#plan_type option:selected').text();
     var n_plan= $('#plan option:selected').text();

     var row='<div class="row"><div class="col-md-6"><strong>First name -</strong>'+firstname+'</div><div class="col-md-6"><strong>Last name -</strong>'+lastname+'</div><br><br><div class="col-md-6"><strong>Mobile -</strong>'+mobile+'</div><div class="col-md-6"><strong>Email -</strong>'+email+'</div><hr><br><br><div class="col-md-12"><strong>Permanent address   -</strong>'+p_address+'</div><br><br><div class="col-md-3"><strong>city -</strong>'+p_city+'</div><div class="col-md-3"><strong>pincode -</strong>'+p_pincode+'</div><div class="col-md-3"><strong>landmark</strong>'+p_landmark+'</div><br><br><div class="col-md-12"><strong>Billing address   -</strong>'+b_address+'</div><div class="col-md-3"><strong>city -</strong>'+b_city+'</div><div class="col-md-3"><strong>pincode -</strong>'+b_pincode+'</div><div class="col-md-3"><strong>landmark -</strong>'+b_landmark+'</div><hr><br><br><div class="col-md-12"><strong>Installation address   -</strong>'+i_address+'</div><br><br><div class="col-md-3"><strong>city -</strong>'+i_city+'</div><div class="col-md-3"><strong>pincode -</strong>'+i_pincode+'</div><div class="col-md-3"><strong>landmark -</strong>'+i_landmark+'</div><br><br><hr><div class="col-md-3"></div><br><br><div class="col-md-6"><strong>Dob -</strong>'+dob+'</div><div class="col-md-6"><strong> company name  -</strong>'+company_name+' </div><br><br><div class="col-md-6"><strong> service Type  -</strong>'+n_type+'</div><div class="col-md-6"><strong> Plan Type  -</strong>'+n_plan_type+'</div><br><br><div class="col-md-6"><strong>plan name   -</strong>'+n_plan+'</div>';
     $('.body').html(row);
     $('#user_profile').show();
     $('#user_profile').modal();
     
   }

 }
 function submitFormAction()
 {
   document.getElementById("form-id").action ="<?= base_url() ?>crn/quick_add_process";
   document.getElementById("form-id").submit();
 }
</script>
