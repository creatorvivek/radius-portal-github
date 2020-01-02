<html>  
    <head>  
        <title>PHP Form Validation using Parsleys.js Library</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  			<!-- <script src="http://parsleyjs.org/dist/parsley.js"></script> -->
  			<script src="<?= base_url() ?>assets/admin/dist/js/parsley.min.js"></script>

 			 <link rel="stylesheet" type="text/css" href="parsley-style.css">
    </head>
 
    <body>  
        <div class="container">  
            <br />  
            <br />
   <br />
   <div class="table-responsive">  
    <h3 align="center">PHP Form Validation using Parsleys.js Library</h3><br />
    <div class="box">
     <form id="validate_form" action="<?= base_url() ?>/test/process">
      <div class="row">
       <div class="col-xs-6">
        <div class="form-group">
         <label>First Name</label>
         <input type="text" name="first_name" id="first_name" placeholder="Enter First Name" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" class="form-control" />
        </div>
       </div>
       <div class="col-xs-6">
        <div class="form-group">
         <label>Last Name</label>
         <input type="text" name="last_name" id="last_name" placeholder="Last Name" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" class="form-control" />
        </div>
       </div>
      </div>
      <div class="form-group">
       <label for="email">Email</label>
       <input type="text" name="email" id="email" placeholder="Email" required data-parsley-type="email" data-parsley-trigger="keyup" class="form-control" />
      </div>
      <div class="form-group">
       <label for="password">Password</label>
       <input type="password" name="password" id="password" placeholder="Password" required data-parsley-length="[1, 14]" data-parsley-trigger="keyup" class="form-control" />
      </div>
      <div class="form-group">
       <label for="cpassword">Confirm Password</label>
       <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"data-parsley-equalto="#password" data-parsley-trigger="keyup" required class="form-control" />
      </div>
      <div class="form-group">
       <label for="cpassword">Website</label>
       <input type="text" id="website" name="website" required placeholder="Website URL "   
type="range" data-parsley-range="[6, 10]" class="form-control" />
      </div>
      <div class="form-group">
       <div class="checkbox">
        <label><input type="checkbox" id="check_rules" name="check_rules" required /> I Accept the Terms & Conditions</label>
       </div>
      </div>
      <div class="form-group">
       <!-- <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-success" /> -->
       <button type="submit" id="submit" name="submit" class="btn btn-success" onclick="redirection()">submit</button>
      </div>
     </form>
    </div>
   </div>  
  </div>
    </body>  
</html>  
<!-- <script>  
$(document).ready(function(){  
    $('#validate_form').parsley();
 
 $('#validate_form').on('submit', function(event){
  event.preventDefault();
  if($('#validate_form').parsley().isValid())
  {
	 // alert($(this).serialize()); 
    // document.getElementById("validate_form").submit();
    document.forms["validate_form"].submit();
   // $.ajax({
   //  url:"action.php",
   //  method:"POST",
   //  data:$(this).serialize(),
   //  beforeSend:function(){
   //   $('#submit').attr('disabled','disabled');
   //   $('#submit').val('Submitting...');
   //  },
   //  success:function(data)
   //  {
   //   $('#validate_form')[0].reset();
   //   $('#validate_form').parsley().reset();
   //   $('#submit').attr('disabled',false);
   //   $('#submit').val('Submit');
   //   alert(data);
   //  }
   // });
  }
 });
});  
</script> -->
<script type="text/javascript">
	function redirection()
	{
		 if($('#validate_form').parsley().isValid())
 			 {
		  document.forms["validate_form"].submit();
			}
	}


</script>