<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body onload="load()">


<form action="https://sandboxsecure.payu.in/_payment" id="payment_submit" name="payment_submit" method="post">
<input type="hidden" name="key" value="<?php echo $key ?>" />
<input type="hidden" name="hash" value="<?php echo $hash ?>"/>
 <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
<input type="hidden" name="amount" value="<?php echo $amount ?>">
<!-- <input type="hidden" name="balance" value="<?= $balance ?>"> -->
<!-- <input type="hidden" name="total_amount" value="500"> -->

        
          <input name="firstname" id="firstname" value="<?= $firstname ?>"  type="hidden" /> 
          <!-- <input name="username"  value="<?= $username ?>"  type="hidden" /> -->
      
          <input name="email"  value="<?= $email ?>" type="hidden" />
        
          <input name="phone" value="<?= $phone ?>" type="hidden" />
          <input name="productinfo" value="<?= $productinfo ?>" type="hidden" />
          <!-- <input type="hidden" name="caf_id" value="<?= $caf_id ?>" /> -->
      
     
          <input type="hidden" name="surl" value="<?= base_url() ?>payment/payment_response"  />
      
          <input type="hidden" name="furl" value="<?= base_url() ?>payment/failure"  />
     
          <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
          <!-- <input type="hidden" name="f_id" value="<?= $f_id ?>" /> -->
         <input type="hidden" name="radius_username" value="<?= $radius_username ?>" />
         <!-- <input type="hidden" name="udf1" value="<?=  $caf_id  ?>" /> -->
         <!-- <input type="hidden" name="udf2" value="<?=  $username  ?>" /> -->
         <!-- <input type="hidden" name="udf3" value="<?=  $f_id  ?>" /> -->
     
<!-- <input type="submit" name="" value="submit">  -->
<!-- <a href="JavaScript:payumoney()"">pay by pau u money</a> -->
<!-- <a href="JavaScript:payu()"> <img src="./img/payumoney.png" alt="Submit"></a> -->


</form>
</body>
</html>
<script type="text/javascript">
    

function load() {
      
    document.getElementById("payment_submit").submit();
    
}

</script>