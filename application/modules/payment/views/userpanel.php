<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/bootstrap/css/bootstrap.css">
	   <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/dist/css/adminlte.min.css">
	 <html lang="en">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
</head>
<body>

<div class="row">
	<div class="col-md-7">
<div class="card" align="center">
      <div class="card-header">
        <h3 class="card-title">User Information</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body" >
      	<form action="<?= base_url() ?>payment/user_detail" method="post">
      		<div class="col-md-6">
      		<div class="form-group">
	<input type="text" name="username" placeholder="username" class="form-control" required>
	</div>
</div>
<input type="hidden" name="amount" value="<?= $amount ?>">
<input type="hidden" name="plan_id" value="<?= $plan_id ?>">
<input type="hidden" name="plan_name" value="<?= $plan_name ?>">
<input type="hidden" name="duration" value="<?= $duration ?>">
<!-- <input type="hidden" name="duration" value="<?= $duration ?>"> -->
<input type="submit" name="" value="submit" class="btn btn-info">
</form>
</div>
</div>
</div>
</div>
</body>
</html>	