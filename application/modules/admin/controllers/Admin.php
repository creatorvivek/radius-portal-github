<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller
{

 function __construct()
 {
  parent::__construct();
}



function dashboard()
{
  $data['_view'] = 'dashbord';
  $this->load->view('../index',$data);
  // $this->output->enable_profiler(TRUE);

}
function dashBoardCounting()
{
  $f_id=$this->session->f_id;
  $staff_id=$this->session->staff_id;
  $group_id=$this->session->group_id;
  $totalTicketParams=array(
    'f_id'=>$f_id,
  );
  $totalOpenTicketParams=array(
    'f_id'=>$f_id,
    'status'=>'open'
  );
  $totalCloseTicketParams=array(
    'f_id'=>$f_id,
    'status'=>'close'
  );
  $MyCloseTicketParams=array(
    'f_id'=>$f_id,
    'assign_id'=>$staff_id,
    'status'=>'close'
  );
  $MyOpenTicketParams=array(
    'f_id'=>$f_id,
    'assign_id'=>$staff_id,
    'status'=>'open'
  );
  $MyOpenTicketParamsByGroup=array(
    'f_id'=>$f_id,
    'assign_id'=>$group_id,
    'status'=>'open'
  );
  $activeCustomerParam=array(

    'status'=>1,
    'f_id'=>$f_id
  );
  $pendingInvoiceCountParams=array(
    'f_id'=>$f_id,
    'status'=>'pending'
  );
   $paidInvoiceCountParams=array(
    'f_id'=>$f_id,
    'status'=>'paid'
  );
    $partiallyInvoiceCountParams=array(
    'f_id'=>$f_id,
    'status'=>'partially'
  );
  $totalTicketCount=modules::run('api_call/api_call/call_api',''.api_url().'ticket/countingTickets',$totalTicketParams,'POST');
  $data['totalTicketCount']=$totalTicketCount['data'];
  $totalOpenTicketCount=modules::run('api_call/api_call/call_api',''.api_url().'ticket/countingTickets',$totalOpenTicketParams,'POST');
  $data['totalOpenTicketCount']=$totalOpenTicketCount['data'];
  $totalCloseTicketCount=modules::run('api_call/api_call/call_api',''.api_url().'ticket/countingTickets',$totalCloseTicketParams,'POST');
  $data['totalCloseTicketCount']=$totalCloseTicketCount['data'];
  $myOpenTicketCount=modules::run('api_call/api_call/call_api',''.api_url().'ticket/myTicketsCount',$MyOpenTicketParams,'POST');
// $data['myOpenTicketCount']=$myOpenTicketCount['data'];
  $myOpenTicketCountByGroup=modules::run('api_call/api_call/call_api',''.api_url().'ticket/myTicketsCount',$MyOpenTicketParamsByGroup,'POST');
  $data['myOpenTicketCount']=$myOpenTicketCount['data']+$myOpenTicketCountByGroup['data'];
  $myCloseTicketCount=modules::run('api_call/api_call/call_api',''.api_url().'ticket/myTicketsCount',$MyCloseTicketParams,'POST');
  $data['myCloseTicketCount']=$myCloseTicketCount['data'];
  ##count number of customer
  $totalCustomerCount=modules::run('api_call/api_call/call_api',''.api_url().'caf/cafCount',$totalTicketParams,'POST');
  $data['totalCustomer']=$totalCustomerCount['data'];
  ##count active customer
  $activeCustomerCount=modules::run('api_call/api_call/call_api',''.api_url().'caf/cafCount',$activeCustomerParam,'POST');
  $data['activeCustomer']=$activeCustomerCount['data'];
  ##total credit
  $totalCreditCount=modules::run('api_call/api_call/call_api',''.api_url().'account/totalCredit',$totalTicketParams,'POST');
  $data['total_credit']=$totalCreditCount['data']['credit'];
  ##number of invoice count
  $totalInvoiceCount=modules::run('api_call/api_call/call_api',''.api_url().'caf/cafCount',$totalTicketParams,'POST');
  $data['total_invoices']=$totalInvoiceCount['data'];

  $totalPendingInvoiceCount=modules::run('api_call/api_call/call_api',''.api_url().'account/countCreditInvoice',$pendingInvoiceCountParams,'POST');
  $data['total_pending_count']=$totalPendingInvoiceCount['data'];
  $totalPaidInvoiceCount=modules::run('api_call/api_call/call_api',''.api_url().'account/countCreditInvoice',$paidInvoiceCountParams,'POST');
  $data['total_paid_count']=$totalPaidInvoiceCount['data'];
   $totalPartiallyInvoiceCount=modules::run('api_call/api_call/call_api',''.api_url().'account/countCreditInvoice',$partiallyInvoiceCountParams,'POST');
  $data['total_partially_count']=$totalPartiallyInvoiceCount['data'];
// var_dump($data)
  ##credit in invoice
$totalPendingInvoiceCredit=modules::run('api_call/api_call/call_api',''.api_url().'account/sumAmountInvoice',$pendingInvoiceCountParams,'POST');
  $data['total_pending_credit']=$totalPendingInvoiceCredit['data']['total'];
  $totalPaidInvoiceCredit=modules::run('api_call/api_call/call_api',''.api_url().'account/sumAmountInvoice',$paidInvoiceCountParams,'POST');
  $data['total_paid_credit']=$totalPaidInvoiceCredit['data']['total'];
   $totalPartiallyInvoiceCredit=modules::run('api_call/api_call/call_api',''.api_url().'account/sumAmountInvoice',$partiallyInvoiceCountParams,'POST');
  $data['total_partially_credit']=$totalPartiallyInvoiceCredit['data']['total'];

  echo json_encode($data);
// die;
}

// function listUsers()
// {
//   // $id=$this->session->id;
//   $id=1;
//   $params=array(
//     'parent_id'=>$id

//   );
//   $get_data=modules::run('api_call/api_call/call_api',''.api_url().'admin/listChild',$params,'POST');
//     // var_dump($get_data);
//   if($get_data['status']=='success')
//   {
//     $data['users']=$get_data['data'];
//     $data['_view'] = 'userList';
//     $this->load->view('index',$data);
//   }
//   else
//   {
//     echo ($get_data['error']);
//   }

// }
// ##if 4 franchizy under 1 so by using parent id this will fetch all 4 
// function listChildUsers($id)
// {

//   $params=array(
//     'parent_id'=>$id

//   );
//   $get_data=modules::run('api_call/api_call/call_api',''.api_url().'admin/listChild',$params,'POST');
//     // var_dump($get_data);
//   if($get_data['status']=='success')
//   {
//     $data['users']=$get_data['data'];
//     $data['_view'] = 'userList';
//     $this->load->view('index',$data);
//   }
//   else
//   {
//     echo($get_data['error']);
//   }
// }
function listCustomers()
{
  $f_id=$this->session->f_id;
  /*future use*/
  $params=array('type'=>'customer','f_id'=>$f_id);
  $get_data=modules::run('api_call/api_call/call_api',''.api_url().'crn/crnList',$params,'POST');
    try
    {
      if($get_data=='')
      {
        throw new Exception("server down", 1);
        log_error("crn/crnList function error");
        
      }
      if(isset($get_data['error']))
      {
        throw new Exception($get_data['error'], 1);
      }
    }
    catch(Exception $e)
    {
      die(show_error($e->getMessage()));
    }
    catch(Exception $e)
    {
      die(show_error($e->getMessage()));
    }
  if($get_data['status']=='success')
  {
    $data['users']=$get_data['data'];
    $data['_view'] = 'customerList';
    $this->load->view('index',$data);
  }
  else
  {
    echo($get_data['error']);
  }

}





function salesChart()
{
$f_id=$this->session->f_id;
$salesParam=array('f_id'=>$f_id);
$results =modules::run('api_call/api_call/call_api',''.api_url().'admin/salesChartData',$salesParam,'POST');
// var_dump($ledgerResults);
    if($results['status']=='success')
    {
      echo json_encode($results['data']);
    }
    else
    {
       echo json_encode([]);
    }
}



function change()
{
 $data['_view'] = 'profile';
    $this->load->view('index',$data);

}

function check_password()
{
  $password=$this->input->post('password');
  $staff_id=$this->input->post('staff_id');
  $params=array('staff_id'=>$staff_id,'password'=>md5($password));
  $password_check= modules::run('api_call/api_call/call_api',''.api_url().'profile/check_password',$params,'POST');
  if($password_check['status']=='success')
  {
    echo json_encode($password_check['data'][0]['password']);
    // echo json_encode($this->load->Profile_model->check_password($password));
  }
  else
  {
    echo json_encode([]);
  }
}

function change_password()
  { 
    $user_id=$this->input->post('user_id');
    $newpasswordMd5=md5($this->input->post('newpassword'));
    $newpassword=$this->input->post('newpassword');
    ##change in future
    $changepw=array(
      'id'=>$user_id,
      'password'=>$newpasswordMd5,
      'clear_text'=>$newpassword
    );
    $password_change= modules::run('api_call/api_call/call_api',''.api_url().'profile/changePassword',$changepw,'POST');
  if($password_change['status']=='success')
  {
    echo 'success';
    // echo json_encode($this->load->Profile_model->check_password($password));
  }
  else
  {
   
  }
    
  }





}
?>	