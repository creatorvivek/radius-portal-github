<?php include "header.php" ?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <?php  if(isset($this->session->logo)) { ?>
        <img src="<?= base_url(); ?>uploads/frenchise/<?= $this->session->logo ?> " alt=""
        class="brand-image img-circle elevation-3"
        style="opacity: .8" >
        <?php }
        else
        { ?>
        <img src="#"  alt=""
        class="brand-image img-circle elevation-3"
        style="opacity: .8" >
        <?php   } ?>
        <span class="brand-text font-weight-light" style="font-size: 17px"><?php if(isset($this->session->frenchise_name)){echo $this->session->frenchise_name; }else{echo ''; } ?></span>
    </a>
    <!-- Sidebar <-->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="<?= base_url('uploads/') . $this->session->profileImage; ?>" class="img-circle elevation-2"
                alt=""> -->
            </div>
            <div class="info">
                <a href="#" class="d-block"> Username :- <?= $this->session->username ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <!--  <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"> -->
                        <!-- <li class="nav-item has-treeview">
                            <a href="<?= site_url() ?>admin" class="nav-link <?php if($this->uri->segment(1)=="admin"){ ?> active <?php } ?>">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>DASHBOARD</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="<?= site_url() ?>admin/dashboard" class="nav-link">
                                <i class="fa fa-sign-out nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="nas"){ ?> menu-open <?php } ?> ">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="nas"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-mortar-board"></i>
                                <p>
                                    NAS
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>nas/add_nas" class="nav-link">
                                        <!-- <i class="far fa-circle nav-icon"></i> -->
                                          <!-- <i class="far fa-circle nav-icon"></i> -->
                                        <p>
                                            ADD NAS
                                            
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>nas/nas_list" class="nav-link">
                                        <!-- <i class="nav-icon fa fa-th"></i> -->
                                          <!-- <i class="far fa-circle nav-icon"></i> -->
                                        <p>
                                            NAS LIST
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="crn"){ ?> menu-open <?php } ?> ">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="crn"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-mortar-board"></i>
                                <p>
                                    CUSTOMER
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>crn/add_crn" class="nav-link">
                                        <!-- <i class="fa fa-sign-out nav-icon"></i> -->
                                        <p>ADD CRN</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>crn/all_user_list" class="nav-link">
                                        <!-- <i class="fa fa-sign-out nav-icon"></i> -->
                                        <p>CRN LIST</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>crn/quick_add" class="nav-link">
                                        <!-- <i class="fa fa-sign-out nav-icon"></i> -->
                                        <p>QUICK ADD</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if($this->session->authorization_id==1 || $this->session->authorization_id==0)
                        { ?>
                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="frenchise"){ ?> menu-open <?php } ?> ">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="frenchise"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-mortar-board"></i>
                                <p>
                                    FRENCHISE
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>frenchise/add_frenchise" class="nav-link">
                                        <!-- <i class="fa fa-sign-out nav-icon"></i> -->
                                        <p>ADD FRENCHISE</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>frenchise/frenchise_list" class="nav-link">
                                        <!-- <i class="fa fa-sign-out nav-icon"></i> -->
                                        <p>FRENCHISE LIST</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="staff"){ ?> menu-open <?php } ?> ">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="staff"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-mortar-board"></i>
                                <p>
                                    STAFF
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php  if($this->session->authorization_id==1 ){ ?>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>staff/add_staff" class="nav-link">
                                        <!-- <i class="fa fa-sign-out nav-icon"></i> -->
                                        <p>ADD STAFF</p>
                                    </a>
                                </li>
                                <?php } ?>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>staff/staff_list" class="nav-link">
                                        <!-- <i class="fa fa-sign-out nav-icon"></i> -->
                                        <p>STAFF LIST</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                          <!-- <?php  } ?>
                        <?php  if($this->session->authorization_id==1 || $this->session->authorization_id==0){ ?> -->
                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="plan"){ ?> menu-open <?php } ?> ">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="plan"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-mortar-board"></i>
                                <p>
                                    PLAN
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>plan/add_plan" class="nav-link">
                                        <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            ADD PLAN
                                            
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>plan/plan_list" class="nav-link">
                                        <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            PLAN LIST
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php  } ?>
                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="recharge"){ ?> menu-open <?php } ?> ">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="recharge"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-mortar-board"></i>
                                <p>
                                    RECHARGE
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>recharge/recharge_panel" class="nav-link">
                                        <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            ADD RECHARGE
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>recharge/recharge_history" class="nav-link">
                                        <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            RECHARGE HISTORY
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>recharge/bill_paid" class="nav-link">
                                        <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            PAID BILL
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="ticket"){ ?> menu-open <?php } ?> ">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="ticket"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-mortar-board"></i>
                                <p>
                                    TICKET
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>ticket/add_ticket" class="nav-link">
                                        <!-- <i class="fa fa-sign-out nav-icon"></i> -->
                                        <p>TICKET GENERATE</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>ticket/ticket_list" class="nav-link">
                                        <!-- <i class="fa fa-sign-out nav-icon"></i> -->
                                        <p>TICKET LIST</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>ticket/open_ticket" class="nav-link">
                                        <!-- <i class="fa fa-sign-out nav-icon"></i> -->
                                        <p>OPEN TICKET</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                            <a href="<?= base_url() ?>ticket/my_open_ticket" class="nav-link">
                                <!-- <i class="fa fa-sign-out nav-icon"></i> -->
                                <p>MY OPEN TICKET</p>
                            </a>
                        </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="reports"){ ?> menu-open <?php } ?> ">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="reports"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-mortar-board"></i>
                                <p>
                                    REPORTS
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>reports/invoice_report" class="nav-link">
                                        <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            INVOICE REPORTS
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>reports/debit_credit_report" class="nav-link">
                                        <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            DEBIT CREDIT REPORTS
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>reports/user_ledger_report" class="nav-link">
                                        <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            USER LEDGER REPORTS
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>reports/reciept_report" class="nav-link">
                                        <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            RECIEPT REPORTS
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>reports/tax_report" class="nav-link">
                                        <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            TAX REPORTS
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                     <a href="<?= base_url() ?>reports/user_audit" class="nav-link">
                                <!-- <i class="nav-icon fa fa-th"></i> -->
                                <p>USER AUDIT REPORTS</p>
                            </a>
                        </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="group"){ ?> menu-open <?php } ?> ">
                            <a href="#" class="nav-link <?php if($this->uri->segment(1)=="group"){ ?> active <?php } ?>">
                                <i class="nav-icon fa fa-mortar-board"></i>
                                <p>
                                    GROUP
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                         <?php if($this->session->authorization_id==1 || $this->session->authorization_id==0)
                        { ?>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>group/add_group" class="nav-link">
                                        <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            ADD GROUP
                                            
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url() ?>group/all_group_list" class="nav-link">
                                        <!-- <i class="nav-icon fa fa-th"></i> -->
                                        <p>
                                            ALL GROUPS
                                        </p>
                                    </a>
                                </li>
                        <?php  } ?>
                        <li class="nav-item">
                            <a href="<?= site_url() ?>group/my_group" class="nav-link">
                                <i class="fa fa-sign-out nav-icon"></i>
                                <p>MY GROUP</p>
                            </a>
                        </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?= site_url() ?>crn/all_user_list" class="nav-link">
                                <i class="fa fa-sign-out nav-icon"></i>
                                <p>USER LIST</p>
                            </a>
                        </li> -->
                        
                        <!-- <li class="nav-item">
                            <a href="<?= site_url() ?>crn/add_crn" class="nav-link">
                                <i class="fa fa-sign-out nav-icon"></i>
                                <p>ADD CRN</p>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="<?= site_url() ?>account/invoice_list" class="nav-link">
                                <i class="fa fa-sign-out nav-icon"></i>
                                <p>INVOICE LIST</p>
                            </a>
                        </li> -->
                        <?php  if($this->session->authorization_id==1 ){ ?>
                        <li class="nav-item">
                            <a href="<?= site_url() ?>setting/frenchise_setting" class="nav-link">
                                <i class="fa fa-sign-out nav-icon"></i>
                                <p>SETTING</p>
                            </a>
                        </li>
                        <?php  } ?>
                        <li class="nav-item">
                            <a href="<?= site_url() ?>caf/all_caf_list" class="nav-link">
                                <i class="fa fa-sign-out nav-icon"></i>
                                <p>CAF LIST</p>
                            </a>
                        </li>
                        
                        <?php  if($this->session->authorization_id==1 ){ ?>
                        <li class="nav-item">
                            <a href="<?= site_url() ?>task/add_task" class="nav-link">
                                <i class="fa fa-sign-out nav-icon"></i> 
                                <p>ADD TASK</p>
                            </a>
                        </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a href="<?= site_url() ?>task/task_list" class="nav-link">
                                <i class="fa fa-sign-out nav-icon"></i>
                                <p>MY TASK</p>
                            </a>
                        </li>
                        <?php if($this->session->frenchise_type==2 && $this->session->authorization_id==1 )
                        { ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-sign-out nav-icon"></i>
                                <p>MY WALLET  (<?php echo  modules::run('account/account/my_wallet') ?>)</p>
                            </a>
                        </li>
                        <?php } ?>
                        
                        <!-- <li class="nav-item">
                            <a href="<?= base_url() ?>log/user_audit" class="nav-link">
                                <i class="fa fa-sign-out nav-icon"></i>
                                <p>USER AUDIT</p>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            
                            <i class="fa fa-sign-out nav-icon"></i>
                            <p>USER AUDIT</p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="<?= site_url() ?>login/logout" class="nav-link">
                            <i class="fa fa-sign-out nav-icon"></i>
                            <p>LOGOUT</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- </div> -->
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- <h2><?= ucfirst($this->uri->segment(1)) ?></h2> -->
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url()?>admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active"><?= $this->uri->segment(1) ?></li>
                            <!-- <li class="breadcrumb-item active"><?= $this->uri->segment(2) ?></li> -->
                        </ol>
                    </div>
                </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php if (isset($this->session->alerts)) {
                    $alert = $this->session->alerts; ?>
                    <div class="alert alert-<?= $this->session->alerts['severity'] ?> alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fa fa-check"></i> <?= $this->session->alerts['title'] ?>!</h5>
                        <?= isset($this->session->alerts['description'])?$this->session->alerts['description']:'' ?>
                    </div>
                    <?php $this->session->alerts = null; } ?>
                    <?php if (isset($_view) && $_view)
                    $this->load->view($_view);
                    ?>
                    <!-- </div> -->
                    <!-- /.col -->
                    <!-- </div> -->
                    <!-- /.row -->
                    </div><!--/. container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Control Sidebar -->
            <!-- /.control-sidebar -->
            <!-- Main Footer -->
            <script>
            $('.mt-2 ul li').find('a').each(function () {
            if (document.location.href == $(this).attr('href')) {
            $(this).parents().addClass("active");
            $(this).addClass("active");
            // add class as you need ul or li or a
            }
            });
            </script>
            <?php include "footer.php"; ?>