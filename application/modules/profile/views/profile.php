<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title><?php echo isset($title) ? $title : 'user profile' ; ?> </title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/bootstrap/css/bootstrap.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ;?>assets/admin/dist/css/adminlte.min.css">
	<!-- <script src="<?= base_url() ;?>assets/admin/dist/js/adminlte.min.js"></script> -->


	<!-- <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/datatables/dataTables.bootstrap4.css"> -->
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" /> -->

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
	<link href="<?= base_url() ?>assets/admin/plugins/pace/pace.css" rel="stylesheet" />
	<script src="<?= base_url() ;?>assets/admin/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap time Picker -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.css"> -->
	<!-- daterange picker -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker-bs3.css"> -->

	<!-- Select2 -->
	<!-- <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/select2/select2.min.css"> -->
	<!-- bootstrap wysihtml5 - text editor -->
	<!-- <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->



	<div class="row">


		<div class="col-md-3">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Personal Information</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">

					<div class="text-center">
						<!-- <?php if($this->session->profile_pic) { ?>
							<img class="profile-user-img img-fluid img-circle"
							src="<?= base_url() ?>uploads/<?= $this->session->profile_pic ?>"
							alt="profile picture">
						<?php } 

						else
							{  ?>
								<img class="profile-user-img img-fluid img-circle"
								src=""
								alt="">
							<?php 	}


							?> -->
						<div id="profile_image"></div>
						</div>
						<h3 class="profile-username text-center" id="name"></h3>


						<hr>

						<strong>Email</strong>

						<p class="text-muted" id="email"></p>

						<hr>

						<strong>Mobile</strong>

						<p class="text-muted" id="mobile"></p>
						<hr>
						<strong>Permanent Location</strong>

						<p class="text-muted" id="p_address"></p>
						<hr>
						<strong>Pincode</strong>

						<p class="text-muted" id="pincode"></p>
						<hr>

						<strong>Username</strong>

						<p class="text-muted" id="username"><?= $this->session->username ?></p>
						<hr>

						<strong>Crn number</strong>

						<p class="text-muted" id="crn_number"><?= $this->session->crn_number ?></p>
						<hr>

						<strong>caf id</strong>

						<p class="text-muted" id="caf_id"><?= $this->session->caf_id ?></p>



					</div>
					
					<!-- /.card-body -->
				</div><!-- /.card -->


			</div>



			<div class="col-md-8">
				<!-- Custom Tabs -->
				<div class="card">
					<div class="card-header d-flex p-0">
						<h3 class="card-title p-3">

							<ul class="nav nav-pills ml-auto p-2 pull-left">
								<li class="nav-item"><a class="nav-link active show" href="#tab_1" data-toggle="tab">Service Information</a></li>
								<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Ticket</a></li>
								<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Change Password</a></li>
								<li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Caf Information</a></li>
								<li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Ledger Details</a></li>
								<li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">Edit</a></li>
								<li class="nav-item"><a class="nav-link" href="<?=base_url()?>profile/user_logout" >logout</a></li>


							</ul>
						</h3>
					</div><!-- /.card-header -->


					<div class="card-body">
						<div class="tab-content">
							<div class="tab-pane active show" id="tab_1">






								<div class="row">
									<div class="col-md-5">
										<div class="card">
											<div class="card-header">
												<h3 class="card-title">Group Information</h3>
											</div>
											<!-- /.card-header -->
											<div class="card-body">	
												<table class="table table-bordered table-hover">
													<tr>
														<th>Status </th>
														<td>software</td>
													</tr>
													<tr>
														<th>Live From </th>
														<td>9yug</td>
													</tr>
													<tr>
														<th>Current Dl </th>
														<td>all software problem will be solve by this group</td>
													</tr>
													<tr>
														<th>Current Ul </th>
														<td>globus soft</td>
													</tr>
													<tr>
														<th>Ip Address </th>
														<td>software</td>
													</tr>
												</table>
											</div>
											<!-- /card body -->
										</div>
										<!-- /card -->
									</div>
									<!-- /col -->

									<div class="col-md-5">
										<div class="card">
											<div class="card-header">
												<h3 class="card-title">Plan Information</h3>
											</div>
											<!-- /.card-header -->
											<div class="card-body">	
												<table class="table table-bordered table-hover">
													<tr>
														<th>Plan Name </th>
														<td><div class="plan_name"></div></td>
													</tr>
													<tr>
														<th>Ul/Dl </th>
														<td>9yug</td>
													</tr>
													<tr>
														<th>Data </th>
														<td>100gb</td>
													</tr>
													<tr>
														<th>Price </th>
														<td><div class="amount"></div></td>
													</tr>

												</table>
											</div>
											<!-- /card body -->
										</div>
										<!-- /card -->
									</div>
									<!-- /col -->
									<div class="col-md-5">
										<div class="card">
											<div class="card-header">
												<h3 class="card-title">Data Information</h3>
											</div>
											<!-- /.card-header -->
											<div class="card-body">	
												<table class="table table-bordered table-hover">
													<tr>
														<th>Avilable Data</th>
														<td>software</td>
													</tr>
													<tr>
														<th>Total Downloaded </th>
														<td>10gb</td>
													</tr>
													<tr>
														<th>Total Uploaded </th>
														<td>20 gb</td>
													</tr>
													<tr>
														<th>Expiration </th>
														<td>globus soft</td>
													</tr>

												</table>
											</div>
											<!-- /card body -->
										</div>
										<!-- /card -->
									</div>
									<!-- /col -->
								</div><!-- row -->
							</div><!-- /tab1 -->



							<div class="tab-pane" id="tab_2">
								<table id ="ticket_table" class="table table-bordered table-hover">

									<thead>
										<tr>
											<th>Ticket id</th>
											<th>name</th>
											<th>Email</th>

											<th>Mobile</th>
											<th>Comment</th>
											<th>Description</th>
											<th>Created_at</th>

										</tr>
									</thead>
									<tbody>

										<?php foreach($customer as $row){ ?>
											<tr>
												<td><a href="#"><?= $row['ticket_id'] ?></a></td>

												<td><?= $row['name']; ?></td>
												<td><?= $row['email']; ?></td>


												<td><?= $row['mobile']; ?></td>
												<td><?= $row['comment']; ?></td>
												<td><?= $row['description']; ?></td>


												<td><?= $row['created_at']; ?><br><div class="creator_name"><?= '-'. $row['created_by']; ?></div></td>


											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div><!-- /end of tab2 -->
							<div class="tab-pane" id="tab_3">
								<div class="col-md-5">
									<!-- <div class="card card-primary"> -->

										<!-- /.card-header -->
										<!-- <div class="card-body"> -->


											<div class="post">
												<!-- action="<?= base_url() ?>profile/changePassword" -->
												<!-- <form> -->
													<div class="card-body">
														<div class="form-group">
															<label for="exampleInputEmail1">Enter Password</label>
															<input type="password" class="form-control" id="password"  placeholder="Enter current password" required >
														</div>
														<div id="error_dbmatch" style="color:red"></div>
														<div class="form-group">
															<label for="exampleInputPassword1">New Password</label>
															<input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="New Password" required>
														</div>
														<div id="error" style="color:red"></div>
														<div class="form-group">
															<label for="exampleInputPassword1">Confirm Password</label>
															<input type="password" class="form-control" id="cpassword" placeholder="Confirm Password"  required>
														</div>
														<div id="error_match" style="color:red"></div>
														<!-- <input type="hidden" name="user_id" value="<?= $userdata->auth_id ?>"> -->


													</div>
													<!-- /.card-body -->

													<div class="card-footers">
														<button type="submit" class="btn btn-primary submitpassword">Submit</button>
													</div>
													<!-- </form> -->
													<div id="successpw" style="color:green"></div>



												</div>


												<!-- </div> -->
												<!-- /.card-body -->
												<!-- </div> --><!-- /.card -->


											</div><!-- /col -->
										</div><!-- /tab content -->
										<div class="tab-pane" id="tab_4">

											<table id ="ticket_table" class="table table-bordered table-hover">

												<thead>
													<tr>
														<th>Caf Id</th>
														<th>Crn Number</th>
														<th>Installation Address</th>

														<th>Mobile</th>
														<!-- <th>Invoice Details</th> -->
									<!-- <th>Comment</th>
									<th>Description</th>
									<th>Created_at</th> -->

								</tr>
							</thead>
							<tbody>

								<tr id="caf_detail">




								</tr>

							</tbody>
						</table>

					</div><!-- /tab_4 -->

					<div class="tab-pane" id="tab_5">
						<table id="show_ledger" class="table" style="max-height: 800px;overflow:scroll;"></table>
						<div id="balance"></div>
					</div>
					<div class="tab-pane" id="tab_6">
						<?= form_open_multipart('profile/update_profile',array("class"=>"form-horizontal")); ?>
						<div class="form-group">
							<label for="email" class="col-md-4 control-label">Name</label>
							<div class="col-md-5">
								<input type="text" name="name" maxlength="13" value="<?= ($this->input->post('name') ? $this->input->post('name') : ''); ?>" class="form-control" id="e_name" />
								<span class="text-danger"><?= form_error('email');?></span>
							</div>
						</div>
						<div class="form-group" id="email">
							<label for="email" class="col-md-4 control-label">Email</label>
							<div class="col-md-5">
								<input type="text" name="email"   class="form-control" id="e_email" />
								<span class="text-danger"><?= form_error('email');?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="mobile" class="col-md-4 control-label">Mobile</label>
							<div class="col-md-5" >
								<input type="text" name="mobile"  class="form-control" id="e_mobile" maxlength="13" onkeypress="return isNumberKey(event)" />
								<span class="text-danger"><?= form_error('mobile');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="profile_image" class="col-md-4 control-label">Profile Image</label>
							<div class="col-md-5">
								<input type="file" name="profile_image"  class="form-control" />
								<span class="text-danger"><?= form_error('profile_image');?></span>
								<?php if (isset($error)) { ?>
									<span class="text-danger"><?= $error ?></span>

								<?php }  ?>
							</div>
						</div>
						<input type="hidden" name="caf_id" value="<?= $this->session->caf_id ?>" >
						<!-- <input type="hidden" name="user_id" value="<?= $userdata->user_id ?>" > -->
						<div class="form-group">
							<label for="address" class="col-md-4 control-label"><span class="text-danger">*</span>Permanent Address</label>
							<div class="col-md-5">
								<textarea name="paddress" class="form-control" id="e_address"></textarea>
								<span class="text-danger"><?= form_error('paddress');?></span>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-5">
								<button type="submit" class="btn btn-success">Save</button>
							</div>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>







		</div>
	</div>
</div>
</div>

<!-- <script>
	$(document).ready( function () {
		$('#ticket_table').DataTable(
		{
			"processing": true
		});
	} );
</script> -->
<script type="text/javascript">
	var crn_num="<?= $this->session->crn_number ?>";
	var caf_id="<?= $this->session->caf_id ?>";
	$(document).ready( function () {	
		userDetails();
		cafDetails();
		ledgerInformation();
		getPlanUser();
		function userDetails()
		{
			$.ajax({
				method: "POST",
				url:" <?= base_url() ?>profile/user_details_in_profiles_by_caf", 
				data: {
					caf_id:caf_id
				},
				success: function(response) {
					var obj=JSON.parse(response);
					console.log(obj);
					$('#name').html(obj.name);
					$('#email').html(obj.primary_email);
					$('#p_address').html(obj.permanent_address);
					$('#mobile').html(obj.contact_mobile);
					$('#pincode').html(obj.p_add_pincode);
					// $('#username').html(obj.username);
					// $('#crn_number').html(obj.crn_id);
					// $('#caf_id').html(obj.caf_id);

					// $('#name').html(obj.name);
					// $('#email').html(obj.email);
					// $('#p_address').html(obj.location);
					// $('#mobile').html(obj.mobile);
					// $('#pincode').html(obj.pincode);
					// $('#username').html(obj.username);
					$('#crn_number').html(obj.crn_id);
					// $('#caf_id').html(obj.caf_id);

					$('#e_name').val(obj.name);
					$('#e_email').val(obj.primary_email);
					$('#e_address').val(obj.permanent_address);
					$('#e_mobile').val(obj.contact_mobile);
					$('#e_pincode').val(obj.p_add_pincode);
					$('#profile_image').html('<img class="profile-user-img img-fluid img-circle"  src="<?= base_url() ?>uploads/'+obj.profile_pic+'" alt=" ">');
    	// $('#name').html(obj.name);


    },
});
		}
		function cafDetails()
		{
			// var crn_num="<?= $this->session->crn_number ?>";
			$.ajax({
				method: "POST",
				url:" <?= base_url() ?>profile/user_caf", 
				data: {
					crn_number:crn_num
				},
				success: function(response) {
						// console.log(response);
						var obj=JSON.parse(response);
						// console.log(obj);
						var row,i=0;
						for(i;i<obj.length;i++)
						{
							row	+='<td>'+obj[i].id+'</td><td>'+obj[i].crn_number+'</td><td>'+obj[i].installation_address+'</td><td>'+obj[i].contact_mobile+'</td>';
						}
						$('#caf_detail').html(row);
					// $('#name').html(obj.name);
					// $('#email').html(obj.email);
					// $('#p_address').html(obj.location);
					// $('#mobile').html(obj.mobile);
					// $('#pincode').html(obj.pincode);
    	// $('#name').html(obj.name);


    },
});

		}

		$(".submitpassword").click(function(event) {
			event.preventDefault();
			var password = $('#password').val();
			var newpassword = $('#newpassword').val();
			var cpassword = $('#cpassword').val();
			$.ajax({
				method: "POST",
				url:" <?= base_url() ?>profile/check_password", 
				data: {
					password:password,caf_id:caf_id
				},
				success: function(responseObject) {
     			  // console.log(responseObject);	
     			  var obj=JSON.parse(responseObject); 
     			  console.log(obj);
      // console.log(obj);
      if(password=='')
      {
      	$('#error_dbmatch').html("password cannot be empty");
      }
      else if(obj.length==0)
      {
      	$('#error_dbmatch').html("please write correct password");
      }
      else if(newpassword=='' || newpassword== null)
      {
      	$('#error').html("Password field cannot be empty");
      }
      else if(obj!=password)
      {
      	$('#error_dbmatch').html("please write correct password");
      }
      else if(newpassword!=cpassword)
      {
          // var msg="please fill all the field";
          $('#error_match').html("new password and confirm should be same");

          // $('#error_username').show();

      }
      else
      {
      	$.ajax({
      		method: "POST",
      		url:" <?= base_url() ?>profile/change_password", 
      		data: {
      			newpassword:newpassword,caf_id:caf_id
      		},
      		success: function(response) {
      			if(response=='success')
      			{
      				$('#successpw').html("Your password is successfully changed");
      				$('#error_dbmatch').hide();
      				$('#error_match').hide();
      				$('#error').hide();
      				$('#password').val('');
      				$('#nepassword').val('');
      				$('#cpassword').val('');
      			}
      			else
      			{
      				$('#successpw').html("Your password is not updated");
      			}


      		}
      	});
      }
  }
});
		});


		function ledgerInformation()
		{

			$.ajax({
				method: "POST",
				url:" <?= base_url() ?>profile/user_ledger", 
				data: {
					caf_id:caf_id
				},
				success: function(response) {
					var obj=JSON.parse(response);
					console.log(obj);
					var result,i;
					var debit=0;
					var credit=0;
					var heading='<tr><th>invoice id</th><th>reciept id</th><th>debit</th><th>credit</th><th>date</th></tr>';
					for(i=0;i<obj.length;i++)
					{	
							if(!obj[i].reciept_id)	
							{
								obj[i].reciept_id='-';
							}
							if(!obj[i].invoice_id)	
							{
								obj[i].invoice_id='-';
							}
						result+='<tr><td>'+obj[i].invoice_id+'</td><td>'+obj[i].reciept_id+'</td><td>'+obj[i].debit+'</td><td>'+obj[i].credit+'</td><td>'+obj[i].date+'</td></tr>';
						debit=debit+parseInt(obj[i].debit);
						credit=credit+parseInt(obj[i].credit);
					}
					var final=heading+result;
					var balance=debit-credit;
					console.log(balance);
					// console.log(credit+''+debit);
					// console.log(balance);
					$('#show_ledger').html(final);
					$('#balance').html('<h5>Balance -:  '+balance+'</h5>');

				},

      		});
		}
		function getPlanUser()
		{
				$.ajax({
				method: "POST",
				url:" <?= base_url() ?>profile/get_plan_user", 
				data: {
					caf_id:caf_id
				},
				success: function(response) {
					var obj=JSON.parse(response);
					// console.log(obj);
					// var result,i;
					$('.plan_name').html(obj.plan_name);
					$('.amount').html(obj.amount);
					// $('.amount').html(obj.amount);
					// var heading='<tr><th>invoice id</th><th>reciept id</th><th>debit</th><th>credit</th><th>date</th></tr>';
					// for(i=0;i<obj.length;i++)
					// {		
					// 	result+='<tr><td>'+obj[i].invoice_id+'</td><td>'+obj[i].reciept_id+'</td><td>'+obj[i].debit+'</td><td>'+obj[i].credit+'</td><td>'+obj[i].date+'</td></tr>';
					// }
					// var final=heading+result;
					// $('#show_ledger').html(final);

				},

      		});
		}
	});

</script>
<script type="text/javascript">
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
		});
	}, 4000);


	function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : evt.keyCode;
  // Added to allow decimal, period, or delete
  if (charCode == 110 || charCode == 190 || charCode == 46) 
  	return true;
  
  if (charCode > 31 && (charCode < 48 || charCode > 57)) 
  	return false;
  
  return true;
} // isNumberKey
</script>
<script src="<?= base_url() ;?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/pace/pace.min.js"></script>
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/bootstrap/js/bootstrap.js"></script> -->
<!-- AdminLTE App -->

<script src="<?= base_url() ;?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- <script src="<?= base_url() ;?>assets/admin/build/js/Treeview.js"></script> -->

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url() ;?>assets/admin/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script> -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/popper/popper.min.js"></script> -->

<!-- SlimScroll 1.3.0 -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script> -->
<!-- ChartJS 1.0.2 -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/chartjs-old/Chart.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script> -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/select2/select2.full.min.js"></script> -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/datatables/jquery.dataTables.js"></script> -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/datatables/dataTables.bootstrap4.js"></script> -->
<!-- <script src="<?= base_url() ;?>assets/common.js"></script> -->
<script src="<?= base_url() ;?>assets/admin/dist/js/plugins/bootbox.min.js"></script>
<script src="<?= base_url() ;?>assets/admin/plugins/fastclick/fastclick.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script> -->

<!-- <script src="<?= base_url() ;?><assets/admin/dist/js/pages/dashboard2.js"></script> -->
<!-- date-range-picker -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script> -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script> -->

<!-- bootstrap time picker -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script> -->

</body>
</html>