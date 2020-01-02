<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends MY_Controller
{

 function __construct()
 {
  parent::__construct();
  $this->load->helper('user_helper');
}





function invoice_report()
{

  if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $date_range = explode(' - ',$this->input->post('date_range'));
    $start_date = date_change_db($date_range[0]);
    if($date_range[1])

      $end_date = date_change_db($date_range[1]);
    // }
    $f_id=$this->session->f_id;

    $invoice_status= $this->input->post('invoice_status');

    $invoiceReportParams=array(
      'f_id'=>$f_id,
      'start_date'=>$start_date,
      'end_date'=>$end_date,
      'invoice_status'=>$invoice_status

    );
// var_dump($invoiceReportParams);
    $invoices =modules::run('api_call/api_call/call_api',''.api_url().'account/invoiceReport',$invoiceReportParams,'POST');
    try
    {
      if($invoices=='')
      {
        throw new Exception("server down", 1);
        log_error("staff/fetchstaff function error");

      }
      if(isset($invoices['error']))
      {
        throw new Exception($invoices['error'], 1);
      }
    }
    catch(Exception $e)
    {
      die(show_error($e->getMessage()));
    }
   
    if($invoices['status']=='success')
    {
      $data['invoices']=$invoices['data'];
    }
    else{
      $data['invoices']=[];
    }
    $data['_view'] = 'invoice_report';

    $this->load->view('index.php',$data);
  }
  else 
  {
   $f_id=$this->session->f_id;
   $invoiceParam=array(
    'f_id'=>$f_id

  );


   $invoice_list= modules::run('api_call/api_call/call_api',''.api_url().'account/invoiceList',$invoiceParam,'POST');
   try
   {
    if($invoice_list=='')
    {
      throw new Exception("server down", 1);
      log_error("account/invoiceList error");

    }
    if(isset($invoice_list['error']))
    {
      throw new Exception($invoice_list['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }
  
   // var_dump($invoice_list['data'][0]['caf_id']);
  if($invoice_list['status']=='success')
  {
    $data['invoices']=$invoice_list['data'];
  }
  else 
  {
    $data['invoices']=[];
  }
  $data['_view'] = 'invoice_report';

  $this->load->view('index.php',$data);
}
}


function debit_credit_report()
{

 if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
  $date_range = explode(' - ',$this->input->post('date_range'));
  $start_date = date_change_db($date_range[0]);
  

  $end_date = date_change_db($date_range[1]);
    // }
  $f_id=$this->session->f_id;



  $creditReportParams=array(
    'f_id'=>$f_id,
    'start_date'=>$start_date,
    'end_date'=>$end_date,

    'reference_type'=>1

  );
  $debitReportParams=array(
    'f_id'=>$f_id,
    'start_date'=>$start_date,
    'end_date'=>$end_date,

    'reference_type'=>2

  );
// var_dump($creditReportParams);
  $debitResults =modules::run('api_call/api_call/call_api',''.api_url().'account/accountTransactionDebitReport', $creditReportParams,'POST');
  $creditResults =modules::run('api_call/api_call/call_api',''.api_url().'account/accountTransactionDebitReport', $debitReportParams,'POST');
  try
  {
    if($debitResults==''  &&  $creditResults==''  )
    {
      throw new Exception("server down", 1);
      log_error("account error");

    }
    if(isset($debitResults['error']) && isset($creditResults['error']) )
    {
      throw new Exception('error', 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }
 
  if($debitResults['status']=='success')
  {
    $data['debits']=$debitResults['data'];
  }
  else{
    $data['debits']=[];
  }
  if($creditResults['status']=='success')
  {
    $data['credits']=$creditResults['data'];
  }
  else{
    $data['credits']=[];
  }
  $data['_view'] = 'ledger_report';

  $this->load->view('index.php',$data);
}
else 
{
 $f_id=$this->session->f_id;



 $creditReportParams=array(
  'f_id'=>$f_id,
  'start_date'=>'',
  'end_date'=>'',

  'reference_type'=>1

);
 $debitReportParams=array(
  'f_id'=>$f_id,
  'start_date'=>'',
  'end_date'=>'',

  'reference_type'=>2

);
// var_dump($creditReportParams);
 $debitResults =modules::run('api_call/api_call/call_api',''.api_url().'account/accountTransactionDebitReport', $creditReportParams,'POST');
 $creditResults =modules::run('api_call/api_call/call_api',''.api_url().'account/accountTransactionDebitReport', $debitReportParams,'POST');
 try
 {
  if($debitResults==''  &&  $creditResults==''  )
  {
    throw new Exception("server down", 1);
    log_error("account error");

  }
  if(isset($debitResults['error']) && isset($creditResults['error']) )
  {
    throw new Exception('error', 1);
  }
}
catch(Exception $e)
{
  die(show_error($e->getMessage()));
}

  if($debitResults['status']=='success')
  {
    $data['debits']=$debitResults['data'];
  }
  else{
    $data['debits']=[];
  }
  if($creditResults['status']=='success')
  {
    $data['credits']=$creditResults['data'];
  }
  else{
    $data['credits']=[];
  }

  $data['_view'] = 'ledger_report';

  $this->load->view('index.php',$data);
}
}

function user_ledger_report()
{
  if($this->input->get('caf_id'))
  {
    $f_id=$this->session->f_id;
    $caf_id=$this->input->get('caf_id');  
    $data['customer_name']=$this->input->get('customer_name');  

    $ledgerParam=array(
      'caf_id'=>$caf_id,
      'f_id'=>$f_id,
      'start_date'=>'',
      'end_date'=>''
    );
    $ledgerResults =modules::run('api_call/api_call/call_api',''.api_url().'account/ledgerReportoUser',$ledgerParam,'POST');
   
    if($ledgerResults['status']=='success')
    {
      $data['ledger']=$ledgerResults['data'];
    }
    else
    {
      $data['ledger']=[];
      $data['message']='NO DATA AVILABLE FOR THIS DATE RANGE';
    }

    $data['_view'] = 'user_ledger';

    $this->load->view('index.php',$data);
  }
  else if($_SERVER['REQUEST_METHOD'] == 'POST' )
  {
    $date_range = explode(' - ',$this->input->post('date_range'));
    $start_date = date_change_db($date_range[0]);


    $end_date = date_change_db($date_range[1]);
    // }
    $f_id=$this->session->f_id;
    $caf_id=$this->input->post('caf_id');
    $ledgerParam=array(
      'caf_id'=>$caf_id,
      'f_id'=>$f_id,
      'start_date'=>$start_date,
      'end_date'=>$end_date
    );
  // var_dump($ledgerParam);
  // die;
    $ledgerResults =modules::run('api_call/api_call/call_api',''.api_url().'account/ledgerReportoUser',$ledgerParam,'POST');
   // var_dump($ledgerResults);
    if($ledgerResults['status']=='success')
    {
      $data['ledger']=$ledgerResults['data'];
    }
    else
    {
      $data['ledger']=[];
      $data['message']='NO DATA AVILABLE FOR THIS DATE RANGE';
    }

    $data['_view'] = 'user_ledger';

    $this->load->view('index.php',$data);
  }
  else
  {
   $data['_view'] = 'user_ledger';
   $data['ledger']=[];
   $this->load->view('index.php',$data);
 }



}

function reciept_report()
{
   // $data['reciepts']=[];
  $f_id=$this->session->f_id;
  $recieptsReportParams=array('f_id'=>$f_id);
  $reciepts =modules::run('api_call/api_call/call_api',''.api_url().'account/recieptReport',$recieptsReportParams,'POST');
  try
    {
      if($reciepts=='')
      {
        throw new Exception("server down", 1);
        log_error("task/addtask function error");

      }
      if(isset($reciepts['error']))
      {
        throw new Exception($reciepts['error'], 1);
      }
    }
    catch(Exception $e)
    {
      die(show_error($e->getMessage()));
    }
   // print_r($reciepts);
  if($reciepts['status']=='success')
  {
    $data['reciepts']=$reciepts['data'];
  }
  else
  {
    $data['reciepts']=[];
  }
  $data['_view'] = 'reciept_report';
  $this->load->view('index.php',$data);
}

function tax_report()
{


  if ($_SERVER['REQUEST_METHOD'] == 'POST' ) 


  {
     $f_id=$this->session->f_id;
     $tax_name=$this->input->post('tax_name');
  $taxReportParams=array('f_id'=>$f_id,'tax_name'=>$tax_name);
  $tax =modules::run('api_call/api_call/call_api',''.api_url().'account/tax_report',$taxReportParams,'POST');
  // echo '<pre>';
  // print_r($tax);die;
  try
    {
      if($tax=='')
      {
        throw new Exception("server down", 1);
        log_error("task/addtask function error");

      }
      if(isset($tax['error']))
      {
        throw new Exception($tax['error'], 1);
      }
    }
    catch(Exception $e)
    {
      die(show_error($e->getMessage()));
    }
   // print_r($tax);
  if($tax['status']=='success')
  {
    $data['tax']=$tax['data'];
  }
  else
  {
    $data['tax']=[];
  }
  $data['_view'] = 'tax_report';
  $this->load->view('index.php',$data);
  }

else
{

  $f_id=$this->session->f_id;
  $taxReportParams=array('f_id'=>$f_id);
  $tax =modules::run('api_call/api_call/call_api',''.api_url().'account/tax_report',$taxReportParams,'POST');
  // echo '<pre>';
  // print_r($tax);die;
  try
    {
      if($tax=='')
      {
        throw new Exception("server down", 1);
        log_error("task/addtask function error");

      }
      if(isset($tax['error']))
      {
        throw new Exception($tax['error'], 1);
      }
    }
    catch(Exception $e)
    {
      die(show_error($e->getMessage()));
    }
   // print_r($tax);
  if($tax['status']=='success')
  {
    $data['tax']=$tax['data'];
  }
  else
  {
    $data['tax']=[];
  }
  $data['_view'] = 'tax_report';
  $this->load->view('index.php',$data);
}
}


function user_log($crn_number,$f_id,$activity,$staff_id)
{

  
$params=array(
'crn_number'=>$crn_number,
'f_id'=>$f_id,
'activity'=>$activity,
'staff_id'=>$staff_id
);
$this->Reports_model->insert_log($params);

}

function user_audit()
{ 

  $f_id=$this->session->f_id;
    $condition=array('f_id'=>$f_id);
   $customer= modules::run('api_call/api_call/call_api',''.api_url().'crn/crnList',$condition,'POST');
   $data['customer']=$customer['data'];
   // print_r($data['customer']);
  if($this->input->post('crn_number'))
  {
    $crn_number=$this->input->post('crn_number',1);
    $data['audit']=$this->Reports_model->select_log($crn_number);
    $data['crn_number_post']=$crn_number;
    // print_r($data);die;
  }
  else
  { 
    $crn_number='';
    $data['audit']=[];
  }
    $data['_view'] = 'audit';
     $this->load->view('index',$data);
}






















/*all function end*/
}
?>	