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
  		height:40px;
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
  		top: 30%;
  		left:50%;

  	}
  	.personal_detials
  	{
  		text-align: center;
  		/*border: 1px solid;*/
  	}
  	.image_plug
  	{
  		border: 1px solid black;
  		width: 90px;
  		height: 100px;
  	}
  </style>
</head>
<body>




	<section class="content">
		<div class="container-fluid">
			<div class="row">
				
					<div class="rectanglespace">
						<div class="text_main">CAF</div>
					<div >Date - <?= $caf['created_at'] ?></div>	
					</div><br><br><br>
					<div class="col-md-12">
						<div class="image_plug "></div>
					</div>		
					<div class="col-md-4"><h6>CAF NUMBER - <?= $caf['id'] ?></h6></div>	
					<div class="col-md-4">CRN NUMBER - <?= $caf['crn_number'] ?></div>	
					<!-- <div class="col-md-4">Date - <?= $caf['created_at'] ?></div>	 -->

				</div>
				<br><br>
					<div class="personal_detials">

						USER DETAILS


					</div>	
					<hr>
					<!-- <div class="row"> -->
					<!-- <div class="col-md-6"> -->
						<b>Full Name:</b>&nbsp&nbsp&nbsp&nbsp&nbsp<?= $caf['name'] ?><br>
						
					<!-- </div> -->
					<!-- <div class="col-md-6"> -->
						<b>Mobile Number:</b><?= $caf['contact_mobile'] ?><br>
						
					<!-- </div> -->

					<!-- <div class="col-md-3"> -->
						<b>Email:</b><?= $caf['primary_email'] ?> <br>
						
					<!-- </div> -->
					<!-- <div> -->
						<b>Permanent Address:</b><?= $caf['permanent_address'] ?> <br>
						<!-- </div> -->	
					<!-- </div> -->
					<div class="personal_detials">

						INSTALLING DETAILS


					</div>	
					<hr>
					<div>
						<b>Installation Address :</b><?= $caf['installation_address'].'  '.$caf['i_add_city'].'   '.$caf['i_add_pincode'] ?>
						<br>
						<b>Landmark   :</b>  <?= $caf['i_add_landmark'] ?><br>
						<b>Address Proof   :</b>  AADHAR
					</div>
					<div class="personal_detials">

						BILLING DETAILS


					</div>	
					<hr>
					<div>
						<b>Billing Address :</b><?= $caf['billing_address'].'  '.$caf['b_add_city'].'   '.$caf['b_add_pincode'] ?>
						<br>
						<b>Landmark </b> :<?= $caf['b_add_landmark'] ?><br>
						<b>Address Proof   :</b>  AADHAR
					</div>
					<hr>
					<br>
					<div class="plan">
						<b>plan selected </b>-<?= $caf['caf_plan_name'] ; ?>


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