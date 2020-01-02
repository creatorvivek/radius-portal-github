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
    <?= form_open('caf/edit/'.$caf['data'][0]['id'].'',array('class'=>'form-horizontal')); ?>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title center" >CUSTOMER APPLICATION FORM</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="name" class="control-label">First Name</label>
              <input type="text" class="form-control" id="fname" placeholder="firstname" required value="<?= ($this->input->post('f_name') ? $this->input->post('f_name') : $caf['data'][0]['name']); ?>" name="fname">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="name" class="control-label">Last Name</label>
              <input type="text" class="form-control" id="lname" placeholder="Lastname" value="" name="lname">
            </div>
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

          <div class="form-group">
           <label for="com_name"  class="col-md-6" >Company Name</label>
           <input type="text" class="form-control" id="com_name" name="com_name"  value="<?= ($this->input->post('com_name') ? $this->input->post('com_name') : $caf['data'][0]['company_name']); ?>" >
         </div>

       </div>
       <div class="col-md-12"> <h5><span>Contact Info</span></h5></div>


      <div class="col-md-3">
        <div class="form-group">
          <label for="c_mobile" class="control-label"><span class="text-danger">*</span>Mobile</label>
          <input type="text" name="c_mobile"  class="form-control" id="c_mobile"  onfocusout="validateMobile()" required maxlength="10"  value="<?= ($this->input->post('c_mobile') ? $this->input->post('c_mobile') : $caf['data'][0]['contact_mobile']); ?>">
          <span class="text-danger c_mobile_error"></span>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="c_office" class=" control-label">Office</label>
          <input type="text" name="c_office"  class="form-control" id="c_office" maxlength="10" value="<?= ($this->input->post('c_office') ? $this->input->post('c_office') : $caf['data'][0]['contact_office']); ?>" />
          <span class="text-dangerc_office_error"></span>
        </div>
      </div>
       <div class="col-md-3">
        <div class="form-group">
          <label for="c_home" class=" control-label">Home</label>
          <input type="text" name="c_home"  class="form-control" id="c_home" maxlength="10" value="<?= ($this->input->post('c_home') ? $this->input->post('c_home') : $caf['data'][0]['contact_home']); ?>"   />
          <span class="text-danger c_home_error"></span>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="c_alternate" class="control-label">Alternate contact</label>
          <input type="text" name="c_alternate"  class="form-control" id="c_alternate" maxlength="10" value="<?= ($this->input->post('c_alternate') ? $this->input->post('c_alternate') : $caf['data'][0]['contact_alternate']); ?>" />
          <span class="text-danger c_alternate_error" ></span>
        </div>
      </div>
      <!--  end of contact -->
       <div class="col-md-12"> <h5><span>Permanent Address</span></h5></div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="description" class="col-md-6 control-label">Address</label>
          <textarea class="form-control" rows="2"  name="p_address" value="<?php echo $this->input->post('p_address'); ?>" id="p_address"  data-toggle="tooltip" data-placement="top" title="address" ><?= ($this->input->post('p_address') ? $this->input->post('p_address') : $caf['data'][0]['permanent_address']); ?></textarea>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="p_city" class="col-md-8 control-label"><span class="text-danger">*</span>City</label>
          <input type="text" name="p_city"  class="form-control" id="p_city" required value="<?= ($this->input->post('p_city') ? $this->input->post('p_city') : $caf['data'][0]['p_add_city']); ?>" />
          <span class="text-danger p_city_error"></span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="name" class="col-md-8 control-label"><span class="text-danger">*</span>Pincode</label>
          <input type="text" name="p_pincode"  class="form-control"  maxlength="6" id="p_pincode" required value="<?= ($this->input->post('c_office') ? $this->input->post('c_office') : $caf['data'][0]['p_add_pincode']); ?>"  "/>
          <span class="text-danger p_pincode_error"></span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="p_landmark" class="col-md-8 control-label">Landmark</label>
          <input type="text" name="p_landmark"  class="form-control" id="p_landmark"  value="<?= ($this->input->post('p_landmark') ? $this->input->post('p_landmark'):$caf['data'][0]['p_add_landmark']); ?>"/>
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
        <div class="form-group">
          <label for="description" class="col-md-12 control-label">Address</label>
          <textarea class="form-control" rows="2"  name="i_address"  id="i_address"  data-toggle="tooltip" data-placement="top" title="address" readonly><?= ($this->input->post('i_address') ? $this->input->post('i_address'):$caf['data'][0]['installation_address']); ?></textarea>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="i_city" class="col-md-4 control-label"><span class="text-danger">*</span>City</label>
          <input type="text" name="i_city"  class="form-control" id="i_city" value="<?= ($this->input->post('i_city') ? $this->input->post('i_city') : $caf['data'][0]['i_add_city']); ?>" readonly "/>
          <span class="text-danger i_city_error"></span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="name" class="col-md-5 control-label"><span class="text-danger">*</span>Pincode</label>
          <input type="text" name="i_pincode"  class="form-control" id="i_pincode" maxlength="6" value="<?= ($this->input->post('i_pincode') ? $this->input->post('i_pincode') : $caf['data'][0]['i_add_pincode']); ?>"  disabled  "/>
          <span class="text-danger i_pincode_error"></span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="i_landmark" class="col-md-5 control-label">Landmark</label>
          <input type="text" name="i_landmark"  class="form-control" id="i_landmark" value="<?= ($this->input->post('c_landmark') ? $this->input->post('c_landmark'):$caf['data'][0]['i_add_landmark']); ?>" disabled  "/>
          <span class="text-danger i_landmark_error"></span>
        </div>
      </div>
      <!-- start installation -->
      <div class="col-md-12"> <h5><span>Billing Address</span></h5></div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="description" class="col-md-12 control-label">Address</label>
          <textarea class="form-control" rows="2" cols="3" name="b_address"  id="b_address"  data-toggle="tooltip" data-placement="top" title="address"><?= ($this->input->post('b_address') ? $this->input->post('b_address'):$caf['data'][0]['billing_address']); ?></textarea>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="p_city" class="col-md-4 control-label"><span class="text-danger">*</span>City</label>
          <input type="text" name="b_city"  class="form-control" id="b_city" value="<?= ($this->input->post('b_city') ? $this->input->post('b_city'):$caf['data'][0]['b_add_city']); ?>" required  "/>
          <span class="text-danger b_city_error"></span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="name" class="col-md-5 control-label"><span class="text-danger">*</span>Pincode</label>
          <input type="text" name="b_pincode"  class="form-control" maxlength="6" id="b_pincode" value="<?= ($this->input->post('b_pincode') ? $this->input->post('b_pincode') : $caf['data'][0]['b_add_pincode']); ?>" required  "/>
          <span class="text-danger b_pincode_error"></span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="p_landmark" class="col-md-5 control-label">Landmark</label>
          <input type="text" name="b_landmark"  class="form-control" id="b_landmark" value="<?= ($this->input->post('b_landmark') ? $this->input->post('b_landmark') : $caf['data'][0]['b_add_city']); ?>"  "/>
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
        <div class="form-group">
          <label for="p_email" class="control-label"><span class="text-danger">*</span>Primary Email</label>
          <input type="email" name="p_email"  class="form-control" required id="p_email" value="<?= ($this->input->post('p_email') ? $this->input->post('p_email'):$caf['data'][0]['primary_email']); ?>" />
          <span class="text-danger p_email_error"></span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="nas_id" class="control-label">Secondry Email</label>
          <input type="email" name="s_email"  class="form-control" id="email" value="<?= ($this->input->post('s_email') ? $this->input->post('s_email'):$caf['data'][0]['secondry_email']); ?>" />
          <span class="text-danger s_email_error"></span>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label>Date Of Birth</label>

          <div class="input-group">
                    <!-- <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div> -->
                    <input type="text" class="form-control datemask"  required name="dob" id="dob" value="<?= ($this->input->post('dob') ? $this->input->post('dob') : $caf['data'][0]['dob']); ?>">
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
           
                <input type="hidden" name="crn_number" value="<?= ($this->input->post('crn_number') ? $this->input->post('crn_number'):$caf['data'][0]['crn_number']); ?>" >
             
              <div class="col-md-3">
                <div class="form-group">
                  <label for="remark" class="col-md-8 control-label"><span class="text-danger">*</span>Id proof</label>
                  <select class="form-control" name="id_proof" id="id_proof" required>

                    <option value="">select</option>

                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="nas_id" class="control-label">upload</label>
                  <input type="file" name="uploadIdProof" value="" class="form-control" id="email" />
                  <span class="text-danger nas_error"></span>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="remark" class="col-md-12 control-label"><span class="text-danger">*</span>Address proof</label>
                  <select class="form-control" name="address_proof" id="address_proof" required>



                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="nas_id" class="control-label">upload</label>
                  <input type="file" name="" value="" class="form-control" id="" />
                  <span class="text-danger nas_error"></span>
                </div>
              </div>

             <!--  <div class="col-md-4">
                <div class="form-group">
                  <label for="remark" class="col-md-8 control-label"><span class="text-danger">*</span>Service type</label>
                  <select class="form-control" name="type">
                    <option value="">--select--</option>
                    <option value="1">Broadband</option>
                    <option value="2">Leaseline</option>
                   

                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="remark" class="col-md-6 control-label"><span class="text-danger">*</span>Plan</label>
                  <select class="form-control" name="type">
                    <option value="">--select--</option>
                    <option value="1">250mb</option>
                    <option value="2">1gb</option>
                  

                  </select>
                </div>
              </div>
 -->

              <div class="col-sm-offset-4 col-sm-5">
                <div class="form-group">
                 <button type="submit" class="btn btn-success">Update Caf</button>
               </div>
             </div>

           </div>



         </div>
       </div>     
     </div>
     <!-- /end row -->
     <!-- main coloumn -->
     
   </div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?= base_url() ?>assets/admin/plugins/jqueryui/jquery-ui.min.js"></script>
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

  });

   $('#check').click(function() {

    var p_address=$('#p_address').val();
    var p_pincode=$('#p_pincode').val();
    var p_city=$('#p_city').val();
    var p_landmark=$('#p_landmark').val();
// console.log(p_pin_code);
// console.log(p_landmark);
$("#b_address").val(p_address);
// $("#i_address").val(p_address);
// $("#i_pincode").val(p_pincode);
$("#b_pincode").val(p_pincode);
// $("#i_city").val(p_city);
$("#b_city").val(p_city);
// $("#i_landmark").val(p_landmark);
$("#b_landmark").val(p_landmark);
});




    //Datemask dd/mm/yyyy
    

  </script>
  <script type="text/javascript">
   $(document).ready(function() {
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
         id_proof += '<option value="' + obj[i].id + '">' + obj[i].name + '</option>';
         $('#id_proof').html(id_proof);
         $('#address_proof').html(id_proof);
       }

     },
   });

   });

 </script>
