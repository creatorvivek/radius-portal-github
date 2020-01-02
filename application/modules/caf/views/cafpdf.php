  <!DOCTYPE html>
  <html>
  <head>
  	<title></title>
  	<link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/bootstrap/css/bootstrap.css">
  	<script src="<?= base_url() ;?>assets/admin/plugins/jquery/jquery.min.js"></script>
  	<style type="text/css">
  	@page {
  		size: 8.27in 11.69in;
  		margin: 12mm 3mm 10mm 3mm;
  	}
  	.rectanglespace
  	{
  		height:100px;
  		width:100%;
  		background-color:#e8eaed;

  	}
  	.text_main
  	{
  		/*text-align:center;*/
  		font-weight: 900;
  		font-style: bold;
  		font-size: 20px;
  		position: relative;
  		top: 40%;
  		left:50%;

  	}
  	.personal_detials
  	{
  		text-align: center;
  		border: 1px solid;
  	}
  </style>
</head>
<body>




	<section class="content">
		<div class="container-fluid">
			<div class="row">
				
					<div class="rectanglespace">
						<div class="text_main">CAF</div>
					</div>

					<div class="col-md-4">CRN NUMBER - <?= $caf['crn_number'] ?></div>	
					<div class="col-md-4">CAF NUMBER - <?= $caf['id'] ?></div>	
					<div class="col-md-4">Date - <?= $caf['created_at'] ?></div>	

				</div>
				<br><br>
					<div class="personal_detials">

						USER DETAILS


					</div>	
					<!-- <div class="col-md-3"> -->
						<b>Full Name:</b><?= $caf['name'] ?><br>
						
					<!-- </div> -->
					<!-- <div class="col-md-3"> -->
						<b>Mobile Number:</b><?= $caf['contact_mobile'] ?><br>
						
					<!-- </div> -->

					<!-- <div class="col-md-3"> -->
						<b>Email:</b><?= $caf['primary_email'] ?> <br>
						
					<!-- </div> -->
					<!-- <div> -->
						<b>Permanent Address:</b><?= $caf['permanent_address'] ?> <br>
						
					<!-- </div> -->
					<div class="personal_detials">

						INSTALLING DETAILS


					</div>	
					<div>
						<b>Installation Address :</b><?= $caf['installation_address'].'  '.$caf['i_add_city'].'   '.$caf['i_add_pincode'] ?>
						<br>
						<b>Landmark   :</b>  <?= $caf['i_add_landmark'] ?><br>
						<b>Address Proof   :</b>  AADHAR
					</div>
					<div class="personal_detials">

						BILLING DETAILS


					</div>	
					<div>
						<b>Billing Address :</b><?= $caf['billing_address'].'  '.$caf['b_add_city'].'   '.$caf['b_add_pincode'] ?>
						<br>
						<b>Landmark </b> :<?= $caf['b_add_landmark'] ?><br>
						<b>Address Proof   :</b>  AADHAR
					</div>
					<hr>
					<br>
					<div class="plan">
						<b>plan selected </b>-250mb


					</div>

				</div>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

		<!-- this row will not appear when printing -->
		<div class="row no-print">
			<div class="col-12">
				<!-- <a onclick="printFunction()" id="printpagebutton" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
                 <!--  <button type="button" class="btn btn-success float-right"><i class="fa fa-credit-card"></i> Submit
                    Payment
                </button> -->
                <button type="button" class="btn btn-primary float-right" onclick="printFunction()" id="printpagebutton" target="_blank" style="margin-right: 5px;">
                	<i class="fa fa-download"></i> Generate PDF
                </button>
            </div>
        </div>
    </div>


    <script type="text/javascript">
    	function printFunction()
    	{
    		var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        window.print();
        printButton.style.visibility = 'visible';
    }


</script>
</body>
</html>