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

</style>

<!-- <div id="error" class="alert alert-success"></div> -->
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title center" >Ticket Generate</h3>
			</div>
			<div class="card-body">
        <form id="form_validation" class="form_validation" method="post">
          <div class="row">
           <div class="col-md-9">

            <div class="form-group">
             <label for="search">Search</label>
             <input type="text" class="form-control" id="search" onkeyup="searchResult();" autocomplete="off" data-toggle="dropdown" autofocus>
           </div>

           <ul id="show_search_result" class="dropdown-menu customtable"></ul>
         </div>
         <div class="col-md-3">

          <div class="form-group">
           <label for="crn">Crn</label>
           <input type="text"  name="crn" class="form-control" id="crn"  readonly value="<?= $crn ?>">
         </div>

       </div>

       <div class="col-md-6">
        <div class="form-group">
         <label for="mobile" class="control-label"><span class="text-danger">*</span>Mobile Number</label>
         <input type="text" name="mobile" value="<?= $mobile ?>" class="form-control" id="mobile" maxlength="10" required onkeypress="return isNumberKey(event)"  onfocusout="validateMobile()" />
         <span class="text-danger mobile_error"><?= form_error('mobile') ?></span>
       </div>
     </div>
     <div class="col-md-6">
      <div class="form-group">
       <label for="name" class="col-md-4 control-label"><span class="text-danger">*</span>Name</label>
       <input type="text" name="name" value="<?= $name ?>" class="form-control" id="name" onkeypress="return isAlpha(event)" required data-parsley-trigger="keyup" />
       <span class="text-danger name_error"><?= form_error('name') ?></span>
     </div>
   </div>
   <div class="col-md-6">
    <div class="form-group">
     <label for="nas_id" class="control-label">Email</label>
     <input type="email" name="email" value="<?= $email ?>" class="form-control" id="email" data-parsley-type="email" data-parsley-trigger="keyup" />
     <span class="text-danger nas_error"><?= form_error('email') ?></span>
   </div>
 </div>
 <div class="col-md-6">
  <div class="form-group">
   <label for="remark" class="col-md-6 control-label"><span class="text-danger">*</span>Lead</label>
   <select class="form-control" name="lead" id="lead" required>

    <option value="">select</option>
								<!-- <option value="1">broadband</option>
								<option value="2">cctv</option>
								<option value="3">software</option>
								<option value="4">other</option>
             -->
           </select>
         </div>
       </div>
       <div class="col-md-6">
        <div class="form-group">
         <label for="remark" class="col-md-6 control-label"><span class="text-danger">*</span>Type</label>
         <select class="form-control" name="type" id="type"  required>
           <option value=' '>-- Select -- </option>
           <option value="1">customer</option>
           <option value="2">frenchise</option>
           <!-- <option value="3">reseller</option> -->
           <option value="4">Customer new connection</option>

         </select>
         <span class="text-danger type_error"><?= form_error('type') ?></span>
       </div>
     </div>
     <div class="col-md-6" id="locationField">
      <div class="form-group">
       <label for="location" class="col-md-6 control-label"><span class="text-danger">*</span>Location</label>
       <input type="text" name="location" value="<?php echo $this->input->post('location'); ?>" class="form-control"  data-toggle="tooltip" data-placement="top"  id="autocomplete" onFocus="geolocate()"/>
       <span class="text-danger"><?= form_error('location') ?> </span>
     </div>
   </div>
   <div class="col-md-6">
    <div class="form-group">
     <label for="remark" class="col-md-6 control-label"><span class="text-danger">*</span>Priority</label>
     <select class="form-control" name="priority" id="priority" required>
      <option value=''>--Select Priority-- </option>
      <option value="high">high</option>
      <option value="low">low</option>
      <!-- <option value="3">reseller</option> -->

    </select>
    <span class="text-danger"><?= form_error('priority') ?> </span>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
   <label for="remark" class="col-md-6 control-label"><span class="text-danger">*</span>Comment</label>
   <input type="text" name="comment" value="<?php echo $this->input->post('comment'); ?>" class="form-control" id="comment" data-toggle="tooltip" data-placement="top" required/>
   <span class="text-danger"> </span>
 </div>
</div>
<!-- <div class="col-md-12">
  <div class="form-group">
   <label for="description" class="col-md-6 control-label">Description</label>
   <input type="text" name="description" value="<?php echo $this->input->post('description'); ?>" class="form-control" id="description"  data-toggle="tooltip" data-placement="top" title=""/>
   <span class="text-danger ip_error"> </span>
 </div>
</div> -->
<div class="col-md-6">
  <div class="form-group">
   <label for="description" class="col-md-6 control-label">Description</label>
   <textarea class="form-control" rows="3"  name="description" value="<?php echo $this->input->post('description'); ?>" id="description"  data-toggle="tooltip" data-placement="top" title=""></textarea>
 </div>
</div>
<div class="col-md-6">
  <label for="attend_type" class="col-md-9 control-label"><span class="text-danger">*</span>Attend Type</label>
  <div class="form-group">

    <select name="attend_type" id="attend_type" class="form-control" required >
      <option value="">---select---</option>

      <option value="sms">Sms</option>
      <option value="call">Call</option>
      <option value="email">Email</option>
      <option value="office">Office</option>

    </select>
    <span class="text-danger"><?= form_error('attend_type') ?> </span>



  </div>
</div>  
<div class="col-md-6">
  <div class="form-group">
   <label for="assign" class="col-md-6 control-label">Assign To</label>
   <select class="form-control" name="assign" id="assignType" onchange="selectAssignType();" >
    <option value=''>----select-----</option>
    <option value="1">indivisual</option>
    <option value="2">group</option>


  </select>
</div>
</div>
<!-- use for sending ticket number if ticket already creaded ,for update existing option -->
<input type="hidden" name="ticket_no" id="ticket_no">
<!-- /end -->
<div class="col-md-6"> 
  <div class="form-group" id="assignIndivisual" >
    <label for="assign" class="col-md-6 control-label">Indivisual</label>
    <select class="form-control select2" name="assign_indivisual[]" id="assign" multiple  style="width: 100%;">
      <?php for($i=0;$i<count($staff);$i++) { ?>


        <option value="<?= $staff[$i]['id'] ?>"><?= $staff[$i]['name'] ?></option>
      <?php  }  ?> 
    </select>
  </div>
  <div class="form-group" id="assignGroup">
    <label for="group" class="col-md-6 control-label">Group</label>
    <select class="form-control select2" name="assign_group[]" id="group" multiple style="width: 100%;" >
      <?php for($i=0;$i<count($group);$i++) { ?>


        <option value="<?= $group[$i]['group_id'] ?>"><?= $group[$i]['name'] ?></option>

      <?php }  ?> 
    </select>
  </div>
</div>
<div class="col-sm-offset-4 col-sm-5">
  <div class="form-group">
   <button type="submit" class="btn btn-success"  onclick="submitWithValidation();">Generate new ticket</button>
   <!-- <input type="button" name="" value="Generate new ticket"  onclick="submitWithValidation();" > -->
 </div>
</div>
<div class="col-sm-offset-4 col-sm-5">
  <div class="form-group">
   <button type="submit" class="btn btn-success"  onclick="submitWithValidationExisting()">Update Existing ticket</button>
 </div>
</div>
</div>
<!-- /end row -->


</form>
</div>
</div>     
</div>
<!-- main coloumn -->
<div class="col-md-5">
  <div class="card ticketLog">
   <div class="card-header">
    <h3 class="card-title center">Ticket Log</h3>
  </div>
  <div class="card-body" style="max-height:300px;overflow-y: scroll">
    <table  class="table table-border table-stripped" id="ticket_log" ></table>
    <!-- <table id="ticket_log"></table> -->
  </div>
</div>
</div>
</div>
<script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
      	street_number: 'short_name',
      	route: 'long_name',
      	locality: 'long_name',
      	administrative_area_level_1: 'short_name',
      	country: 'long_name',
      	postal_code: 'short_name',
      };

      

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        $('.ticketLog').hide();
        $('#assignGroup').hide();
        $('#assignIndivisual').hide();
        $('#error').hide();



        autocomplete = new google.maps.places.Autocomplete(
        	/** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
        	{types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        
        // console.log(place.geometry.location.lat());
        // console.log(place.geometry.location.lng());

        for (var component in componentForm) {
        	document.getElementById(component).value = '';
        	document.getElementById(component).disabled = false;
        }

        document.getElementById('lat').value = place.geometry.location.lat().toString();
        document.getElementById('lng').value = place.geometry.location.lng().toString();

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
        	var addressType = place.address_components[i].types[0];
        	if (componentForm[addressType]) {
        		var val = place.address_components[i][componentForm[addressType]];
        		document.getElementById(addressType).value = val;
        	}
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
      	if (navigator.geolocation) {
      		navigator.geolocation.getCurrentPosition(function(position) {
      			var geolocation = {
      				lat: position.coords.latitude,
      				lng: position.coords.longitude
      			};
      			var circle = new google.maps.Circle({
      				center: geolocation,
      				radius: position.coords.accuracy
      			});
      			autocomplete.setBounds(circle.getBounds());
      		});
      	}
      }
     /* function submitForm(action) {
      	var form = document.getElementById('formEnquiry');
      	form.action = action;
      	form.submit();
      }*/

    </script>
    <script type="text/javascript">
     function searchResult() {

    // $("#country").keyup(function () {
    	var searchkeyword = $('#search').val();
    	var min_length = 1;

    	if (searchkeyword.length >= min_length) {
         // console.log(keyword);
         // var keyword = $('#search').val();
         // console.log(keyword);
         // if (e.keyCode == 13) {

         	$.ajax({
         		type: "POST",
         		url: "<?= base_url() ?>ticket/getSearchResult",
         		data: {
         			search_query: searchkeyword
         		},

         		success: function (data) {
         			// console.log(data);

         			var obj=JSON.parse(data);
         			// console.log(obj.length);
         			if(obj.length==0)
         			{
         				$('#show_search_result').hide();
         			}

         			else
         			{
         				var i,searchdata;
              // console.log(obj[0].student_name);
              for(i=0;i<obj.length;i++)
              {
                // tabledata+='<tr onclick="getRow('+obj[i].enquiry_id+')"><td>'+obj[i].customer_name+'</td><td>'+obj[i].username+'</td><td>'+obj[i].mobile+'</td><td>'+obj[i].comments+'</td></tr>'
                searchdata+= '<tr onclick="getRow('+obj[i].crn_id+')"><td>'+obj[i].name+' <br><div class="list_design">'+obj[i].mobile+'&nbsp&nbsp crn number &nbsp'+obj[i].crn_id+'</div><td></tr>'
              }
              $('#show_search_result').show();
              $('#show_search_result').html(searchdata);

            }

          }
        });
         }
       }
       function getRow(id) {
        $.ajax({
         type: "POST",
         url: "<?= base_url() ?>ticket/autofill",
         data: {
          id: id
        },

        success: function (data) {

          var obj=JSON.parse(data);
          // console.log(obj);


          $('#name').val(obj[0].name );
          $('#crn').val(obj[0].crn_id );
          $('#mobile').val(obj[0].mobile );
          $('#email').val(obj[0].email );
          $('#ticket_no').val(obj[0].ticket_id);
          //change in future
           
          // $('#search').val( " " );
          $('#show_search_result').hide();
          var i,log;
            log='<tr><th>issue</th><th>description</th><th>status</th><th>date</th></tr>';
          if(obj[0].ticket_id)
          {
          for(i=0;i<obj.length;i++)
          {

          	log+='<tr><td><a href="<?=base_url() ?>ticket/log_ticket_by_ticket_no/'+obj[0].ticket_id+'">'+obj[i].comment+'</a></td><td>'+obj[i].description+'</td><td>'+obj[i].status+'</td><td>'+obj[i].created_at+'</td></tr>'
          }
          // console.log(log);
          $('.ticketLog').show();
          $('#ticket_log').show();
          $('#ticket_log').html(log);
        }
        }

      });
      }
      function submitForm(event)
      {
        // event.preventDefault();
        var name  = $('#name').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var lead = $('#lead').val();
        var assign = $('#assignType').val();
        var assign_group = $('#group').val();
        var assign_indivisual = $('#assign').val();
        var comment = $('#comment').val();
        var description = $('#description').val();
        var type  = $('#type').val();
        var crn = $('#crn').val();
        var priority = $('#priority').val();
        var location = $('#autocomplete').val();
        var attend_type = $('#attend_type').val();
        // console.log(assign_group); 
         // console.log(attend_type);
         bootbox.confirm("click ok generate ticket  ?", function(result) {
          if(result)
          {
            $.ajax({
             type: "POST",
             url: "<?= base_url() ?>ticket/add",
             data: {
              name:name,email:email,mobile:mobile,lead:lead,comment:comment,description:description,type:type,crn:crn,location:location,assign:assign,assign_indivisual:assign_indivisual,assign_group:assign_group,priority:priority,attend_type:attend_type
            },

            success: function (data) {
              console.log(data);
              document.location.reload();
              // alert("successfully ticket generate");

            }
          });/*ajax close*/
          }/*if close*/
        });/*bootbox close*/
       }
     //   function existingSubmitForm()
     //   {
     //    var name  = $('#name').val();
     //    var ticket_no = $('#ticket_no').val();
     //    var email = $('#email').val();
     //    var mobile = $('#mobile').val();
     //    var lead = $('#lead').val();
     //    var comment = $('#comment').val();
     //    var assign_group = $('#group').val();
     //    var assign_indivisual = $('#assign').val();
     //    var description = $('#description').val();
     //    var type  = $('#type').val();
     //    var assign = $('#assigntype').val();
     //    var attend_type = $('#attend_type').val();
     // 	// var crn = $('#crn').val();
     // 	var location = $('#autocomplete').val();
     //   bootbox.confirm("click ok generate ticket  ?", function(result) {
     //    if(result)
     //    {
     //      $.ajax({
     //       type: "POST",
     //       url: "<?= base_url() ?>ticket/existing_add",
     //       data: {
     //        name:name,email:email,mobile:mobile,lead:lead,comment:comment,description:description,type:type,location:location,assign:assign,ticket_no:ticket_no,assign_indivisual:assign_indivisual,assign_group:assign_group,attend_type:attend_type
     //      },

     //      success: function (data) {
     //        $('#error').show();
     //        $('#error').html('successfully ticket generated');
     //        document.location.reload();

     //       // alert("successfully ticket generate");
     //     },
     //   });

     //    }
     //  });
     // }

      function submitWithValidationExisting(event)

      {

         if($('.form_validation').parsley().isValid())
        {
          // $('.submit').
          // event.preventDefault();
          document.forms["form_validation"].submit();
      document.getElementById("form_validation").action = "<?= base_url() ?>ticket/existing_add";
         }

      }











     function selectAssignType()
     {
      var assign_type=$('#assignType').val();
      // console.log(assign_type);
      if(assign_type==1)
      {
        $('#assignGroup').hide();
        $('#assignIndivisual').show();
      }
      else if(assign_type==2)
      {
        $('#assignIndivisual').hide();
        $('#assignGroup').show();
      }
      else
      {
        $('#assignIndivisual').hide();
        $('#assignGroup').hide();
      }


    }
    function submitWithValidation(event)
    {
      // event.preventDefault();
     if($('.form_validation').parsley().isValid())
     {
      document.forms["form_validation"].submit();
      document.getElementById("form_validation").action = "<?= base_url() ?>ticket/add";
    }
  }


  function validateType()
  {
    var type=$('#type').val();
    // console.log(type);
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
    // console.log(mobile);
    if(mobile=='')
    {
      $('.mobile_error').show();
      // $('.mobile_error').html('Please fill this field');
      // $('#mobile').focus();
    }
    else
    {
      $('.mobile_error').hide();
    }
    var mobile=$('#mobile').val();
    var length=mobile.length;
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
    $('.save-button').prop("disabled",false);
     $('.mobile_error').hide();
  }

  }


 $(document).ready(function() {
   $('.select2').select2();
   $("#show_search_result").hide();
   $.ajax({
    type: "GET",
    url: "<?= base_url() ?>category/categoryTree",
       /* data: {
          name:name,email:email,mobile:mobile,lead:lead,comment:comment,description:description,type:type,location:location,assign:assign,ticket_no:ticket_no,assign_indivisual:assign_indivisual
        },
        */
        success: function (data) {
          // console.log(data);

           var option='<option value="">--select--</option>';
          $('#lead').html(option+data);
           // alert("successfully ticket generate");
              // location.reload();
            },
          });

 });

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwBQKHT1VzQEI4EE0YHUOEUhYcOqutJX4&libraries=places&callback=initAutocomplete"
async defer></script>
