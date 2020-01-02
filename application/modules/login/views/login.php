<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/admin/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url()?>assets//admin/plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    body
    {
      background-image: url(<?= base_url()?>assets/admin/dist/img/fiber_internet.jpg);
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>LOGIN PAGE</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
<?php  if (isset($message_display)) {
    echo "<div class='message' style='color:green'>";
    echo $message_display;
    echo "</div>";
    }
    if (isset($message['error_message'])) {
        echo "<div class='error_message' style='color:red;''>";
    echo $message['error_message'];
    }
    ?>
       <?= form_open('login/process') ?>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="username" autocomplete="off" autofocus required>
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <!-- <div class="row">
          <div class="col-4" id="captcha"><div class="form-group has-feedback" ><?= $cap['image'] ?></div></div>
          <div class="col-6">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Captcha" name="captcha" >
        
        </div>
      </div>
      <div class="col-2" data-toggle="tooltip" title="refresh for new captcha" onclick="changeCaptcha();"><i class="fa fa-refresh"></i></div>
    </div>   -->
           
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
       <?= form_close();?>

      
      <!-- /.social-auth-links -->

     <!--  <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="#" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url()?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url()?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })




     function changeCaptcha(){
      console.log('hii');
        $.get('<?php echo base_url().'login/refresh'; ?>', function(data){
          console.log(data);
            $('#captcha').html(data);
        });
    }

</script>





</body>
</html>

