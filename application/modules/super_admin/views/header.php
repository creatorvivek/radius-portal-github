<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php echo isset($title) ? $title : 'Admin Panel' ; ?> </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/bootstrap/css/bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/dist/css/adminlte.min.css">
  <!-- <script src="<?= base_url() ;?>assets/admin/dist/js/adminlte.min.js"></script> -->


  <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/datatables/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
  <link href="<?= base_url() ?>assets/admin/plugins/pace/pace.css" rel="stylesheet" />
  <script src="<?= base_url() ;?>assets/admin/plugins/jquery/jquery.min.js"></script>
   <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.css">
   <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker-bs3.css">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/select2/select2.min.css">
   <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- form validator plugin -->
  <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/smokevalidator/smoke.min.css">
  <script src="<?= base_url() ;?>assets/admin/plugins/smokevalidator/smoke.min.js"></script>
   <script src="<?= base_url() ?>assets/admin/dist/js/parsley.min.js"></script>
  <!-- <link rel="stylesheet" href="<?= base_url() ;?>assets/admin/plugins/smokevalidator/smoke.min.js"> -->
  <style type="text/css">
  /* Extra small devices (phones, 600px and down) */
  /*@media only screen and (max-width: 600px) {*/
    /*canvas  {height:1000px;}*/
    /*}*/

    /* Small devices (portrait tablets and large phones, 600px and up) */
    /*@media only screen and (min-width: 600px) {*/
      /*canvas  {height:1000px;}*/
      /*}*/
      .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
        color: #fff;
        background-color: #007bff;
      }

      .navbar-dark .navbar-brand:hover, .navbar-dark .navbar-brand:focus {
        color: #ffffff;
      }

      .navbar-dark .navbar-nav .nav-link {
        color: rgba(255, 255, 255, 0.75);
      }

      .navbar-dark .navbar-nav .nav-link:hover, .navbar-dark .navbar-nav .nav-link:focus {
        color: white;
      }

      .navbar-dark .navbar-nav .nav-link.disabled {
        color: rgba(255, 255, 255, 0.25);
      }

      .navbar-dark .navbar-nav .show > .nav-link,
      .navbar-dark .navbar-nav .active > .nav-link,
      .navbar-dark .navbar-nav .nav-link.show,
      .navbar-dark .navbar-nav .nav-link.active {
        color: #ffffff;
      }
      .fa-trash,.fa-eye,.fa-pencil,.fa-building-o,.fa-reply,.fa-history
      {
        color:white;
      }


      .customtable
      {
        width:100%;
        max-width: 700px;
        min-width: 300px;
        max-height: 400px;
        border-collapse:collapse; 
        background-color: #f8f8f8;
        overflow-y: scroll;

        /*background-color:red;*/
      } 
      .customtable td
      {

        padding:7px; 


      }
      .customtable tr:hover
      {

        background-color:#d2d2d2;


      }
      .customtable tr
      {

        display: block;

      }


      .zoom:hover {
        -ms-transform: scale(2.5); /* IE 9 */
        -webkit-transform: scale(2.5); /* Safari 3-8 */
        transform: scale(2.5); 
        transition: .7s;

      }
      a
      {
        color:black;
      }
      .anchor
      {
        font-size: 13px;


      }
      .anchor a
      {
        color:blue;
      }
      .nas_info{
color:green;
font-size: 13px;

}
.creator_name
{
  color:blue;
  font-size: 14px;

}
.heading
{
  font-family: sans-serif;
  font-size: 17px;
  /*border-bottom: 1px solid;*/


}
.coloumn
{
  /*border-right:1px solid grey;*/
}
 input.parsley-success,
      select.parsley-success,
      textarea.parsley-success {
       /*color: #468847;*/
       /*background-color: #DFF0D8;*/
       border: 1px solid #D6E9C6;
     }

     input.parsley-error,
     select.parsley-error,
     textarea.parsley-error {
       color: #B94A48;
       background-color: #F2DEDE;
       border: 1px solid #EED3D7;
     }

     .parsley-errors-list {
       margin: 2px 0 3px;
       padding: 0;
       list-style-type: none;
       font-size: 0.9em;
       line-height: 0.9em;
       opacity: 0;

       transition: all .3s ease-in;
       -o-transition: all .3s ease-in;
       -moz-transition: all .3s ease-in;
       -webkit-transition: all .3s ease-in;
     }

     .parsley-errors-list.filled {
       opacity: 1;
       color:#B94A48;
     }
    </style>
     <?php if(1==1)
  { ?>
<script type="text/javascript">
  var base_url="<?= base_url() ?>";
var refresh_rate = 5; //<-- In seconds, change to your needs
var last_user_action = 0;
var lost_focus = true;
var focus_margin = 10; // If we lose focus more then the margin we want to refresh
var allow_refresh = false; // on off sort of switch

function keydown(evt) {
    if (!evt) evt = event;
    if (evt.keyCode == 192) {
        // Shift+TAB
        toggle_on_off();
    }
} // function keydown(evt)


function toggle_on_off() {
    if (can_i_refresh) {
        allow_refresh = false;
        // console.log("Auto Refresh Off");
    } else {
        allow_refresh = true;
        // console.log("Auto Refresh On");
       
    }
}

function reset() {
    last_user_action = 0;
    // console.log("Reset");
}

function windowHasFocus() {
    lost_focus = false;
    // console.log(" <~ Has Focus");
}

function windowLostFocus() {
    lost_focus = true;
    // console.log(" <~ Lost Focus");
}

setInterval(function () {
    last_user_action++;
    refreshCheck();
}, 1000);

function can_i_refresh() {
    if (last_user_action >= refresh_rate && lost_focus && allow_refresh) {
        return true;
    }
    return false;
}

function refreshCheck() {
    var focus = window.onfocus;

    if (can_i_refresh()) {
        // window.location.reload(); // If this is called no reset is needed
        // reset(); // We want to reset just to make sure the location reload is not called.
       
         
        window.location.href=base_url+"login/logout";
        
    } else {
        // console.log("Timer");
    }

}
window.addEventListener("focus", windowHasFocus, false);
window.addEventListener("blur", windowLostFocus, false);
window.addEventListener("click", reset, false);
window.addEventListener("mousemove", reset, false);
window.addEventListener("keypress", reset, false);
window.onkeyup = keydown;
</script>
<?php } ?>
<script language="javascript" type="text/javascript">
var base_url="<?= base_url() ?>";
var timeout = setInterval(reloadPage, 555000);    
function reloadPage () {

   <?php 
 // $username=$this->session->username;
   if( (!(isset($_SESSION['username'])))  )
   { ?>
   // redirect('login');

  // window.location.href=base_url+"login/logout";
    



<?php } 
 ?>


  
}
</script> 
  </head>
  <body class="hold-transition sidebar-mini ">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block" style="font-weight: 550;">

          </li>
<!-- <li class="nav-item d-none d-sm-inline-block">
<a href="#" class="nav-link">Contact</a>
</li> -->
</ul> 
<!-- SEARCH FORM -->
<form class="form-inline ml-3">
  <div class="input-group input-group-sm">
    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
      <button class="btn btn-navbar" type="submit">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
</form>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
  <!-- Messages Dropdown Menu -->
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="fa fa-comments-o"></i>
      <span class="badge badge-danger navbar-badge">3</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <a href="#" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
          <img src="<?= base_url() ;?>assets/admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
          <div class="media-body">
            <h3 class="dropdown-item-title">
              Brad Diesel
              <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
            </h3>
            <p class="text-sm">Call me whenever you can...</p>
            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
          </div>
        </div>
        <!-- Message End -->
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <!-- Message Start -->

        <!-- Message End -->
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <!-- Message Start -->

        <!-- Message End -->
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
    </div>
  </li>
  <!-- Notifications Dropdown Menu -->
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="fa fa-bell-o"></i>
      <span class="badge badge-warning navbar-badge">15</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <span class="dropdown-item dropdown-header">15 Notifications</span>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fa fa-envelope mr-2"></i> 4 new messages
        <span class="float-right text-muted text-sm">3 mins</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fa fa-users mr-2"></i> 8 friend requests
        <span class="float-right text-muted text-sm">12 hours</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fa fa-file mr-2"></i> 3 new reports
        <span class="float-right text-muted text-sm">2 days</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
  </li>


  <!-- user section-->

  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="fa fa-user-o"></i>

    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <span class="dropdown-item dropdown-header"><?= $this->session->name ?></span>
      <div class="dropdown-divider"></div>
      <a href="<?= site_url() ?>login/logout" class="dropdown-item">
        <i class="fa fa-sign-out mr-2"></i> Log out
      </a>
    </div>
  </li>

</ul>


</nav>
<!-- /.navbar -->

