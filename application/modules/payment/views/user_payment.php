
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	  <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/bootstrap/css/bootstrap.css">

 
  <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/dist/css/adminlte.min.css">
</head>
<body>

<div class="row" align="center">
  
    <div class="col-md-5">
    <div class="card" align="center">
      <div class="card-header">
        <h3 class="card-title">User Information</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="<?= base_url() ?>payment/online_payumoney" id="payment_submit" name="payment_submit" method="post">
	
<!-- <input type="hidden" name="plan_amount" value="<?= $amount ?>"> -->
<input type="hidden" name="balance" value="<?= $balance ?>">
<input type="hidden" name="total_amount" value="500">
 <input type="hidden" name="firstname" id="firstname" value="<?= $firstname ?>" />
 <input type="hidden" name="email" id="email" value="<?= $email ?>" />
  <input type="hidden" name="phone" value="<?= $phone ?>" />
  <input type="hidden" name="username" value="<?= $username ?>" />
  <input type="hidden" name="caf_id" value="<?= $caf_id ?>" />
  <input type="hidden" name="f_id" value="<?= $f_id ?>" />
  <input type="hidden" name="radius_username" value="<?= $radius_username ?>" />
  <h4>username -:  <?= $username ?></h4>
  <p>previous balance -:<?= $balance ?></p>
  <p>plan Name :- <?= $plan_name ?>    <p>
  <p>plan amount -: <?= $plan_amount ?></p>
  <p>plan start date :<b><?= $start_date ?></b>  &nbsp  plan end date :<b> <?= $end_date ?></b>
  <p>Total Amount -:<?php echo  $total=($balance)+($plan_amount) ?> </p>
  <input type="hidden" name="amount" value="<?= $total ?>">
  <p>Recharge schedule</p>
  <div class="checkbox">
  <label><input type="checkbox" value="">Auto</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" value="">Now</label>
</div>
<input type="submit" name="" value="submit" class="btn btn-info"> 
<!-- <a href="JavaScript:payumoney()"">pay by pau u money</a> -->
<!-- <a href="JavaScript:payu()"> <img src="./img/payumoney.png" alt="Submit"></a> -->


</form>
      </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>
<script src="<?= base_url()?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
function payumoney()
{
	document.getElementById("payment_submit").submit();
}
// $(document).ready(function() {
      
//    	document.getElementById("payment_submit").submit();
   	
// });

</script>