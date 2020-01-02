  <!DOCTYPE html>
  <html>
  <head>
  	<title></title>
  	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  	<link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/bootstrap/css/bootstrap.css">
  	<script src="<?= base_url() ;?>assets/admin/plugins/jquery/jquery.min.js"></script>
  	<style type="text/css">
  /*	@page {
  		size: 8.27in 11.69in;
  		margin: 12mm 3mm 10mm 3mm;
  	}*/
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
  	.passport
  	{
  		border:1px solid black;
  		height: 100px;
  		width:100px;
  	}
  	    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
   /* * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }*/
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        /* border: 1px #D3D3D3 solid; */
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        /* padding: 1cm; */
        /* border: 5px red solid; */
        /* height: 257mm; */
        /* outline: 2cm #FFEAEA solid; */
    }
  /* table tr
    {
    	margin-bottom: 40px;
    }*/
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
        .passport
        {
        	float:right;
        }
    }
  </style>
</head>
<body>





		<div class="container">
			<div class="row">
				<div class="col-md-8">
						<div class="logo"><img src="<?= base_url() ?>uploads/logo-2.png" alt="logo"></div>
				</div>
		<div class="col-md-4 float-right" >
			<div class="passport"></div>
		</div>
			<!-- <br><br> -->
			<div class="address">
			<div class="frenchise_detail">
				<address>
				9 yug network info<br>
				charoda<br>
				city-:durg<br>
				Email -:vivek.et1993@gmail.com <br>
				phone -: 987192821
				</address>
			</div>	
			</div>				
			<div class="col-md-12">caf:- <?= $caf['id'] ?></div>		
			<!-- /.col -->
			<div class="col-md-12">
			<div class="card">
				<div class="card-header" align="center">CUSTOMER APPLICATION FORM</div>
				<!-- <div class="card-body"> -->
						<br>
				<table>
					<tr><td> Name :  </td><td> <?= $caf['name'] ?></td></tr>
					<tr><td>Company Name: </td><td> <?= $caf['company_name'] ?></td></tr>
					<!-- <tr><td>Primary Email  :demo@gmail.com</td></tr> -->
					<!-- <tr><td>Secondry Email  :demo@gmail.com</td></tr> -->
					<tr><td>contact Info </td> <td>Home:  <?= $caf['contact_home'] ?>   &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp  Mobile:  <?= $caf['contact_mobile'] ?>   &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp Office:  <?= $caf['contact_office'] ?> </td></tr>
					<tr><td>Installation Address : </td><td> <?= $caf['installation_address'] ?>,  &nbsp City-  <?= $caf['i_add_city'] ?> , &nbsp   pincode- <?= $caf['i_add_pincode'] ?> , &nbsp    Landmark- <?= $caf['i_add_landmark'] ?> </td></tr>
					<tr><td>Billing  Address : </td><td><?= $caf['billing_address'] ?> ,&nbsp City- <?= $caf['b_add_city'] ?>  , &nbsp   pincode-  <?= $caf['b_add_pincode'] ?> , &nbsp   Landmark-:<?= $caf['b_add_landmark'] ?>  </td></tr>


				</table>		
				<br><br>


				<!-- </div> -->
				<div class="card-header" align="center">USER INFORMATION</div>
				<!-- <div class="card-body"> -->
						<br>
				<table>
					<tr><td>Primary Email  :</td><td><?= $caf['primary_email'] ?></td></tr>
					<tr><td>Secondry Email  :</td><td><?= $caf['secondry_email'] ?></td></tr>
					
					<tr><td>Date Of Birth :</td><td><?= $caf['dob'] ?></td></tr>
					<tr><td>Id Proof</td><td>aadhar</td></tr>
					<tr><td>Address Proof</td><td>aadhar</td></tr>
				</table>
				<br><br>

				<div class="card-header" align="center">SERVICE AND PAYMENT DETAILS</div>
				<table>
					<tr><td>Plan Name:</td><td> <?= $caf['caf_plan_name'] ?></td></tr>
				</table>
				<br><br>
				<p>	I hereby confirm my interst with this application for a new connection from ----  after having read and understood, with full knowledge and acceptance of the terms and condition as specified thereof</p>
				<div class="signeture float-right">Signature:</div>
			<!-- </div> -->
			</div>
		</div>
		</div>
		<!-- /.row -->

		<!-- this row will not appear when printing -->
		<!-- <div class="row no-print">
			<div class="col-12">
			
                <button type="button" class="btn btn-primary float-right" onclick="printFunction()" id="printpagebutton" target="_blank" style="margin-right: 5px;">
                	<i class="fa fa-download"></i> Generate PDF
                </button>
            </div>
        </div> -->
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

  $(document).ready(function() {

  	window.print();
  });
</script>
</body>
</html>