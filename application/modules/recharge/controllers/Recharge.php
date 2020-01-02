<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Recharge extends MY_Controller
{

 function __construct()
 {
  parent::__construct();
}





function recharge_panel()
{
  $f_id=$this->session->f_id;
  $staff_params=array(
    'f_id'=>''
  );
  $get_payment_mode=modules::run('api_call/api_call/call_api',''.api_url().'recharge/fetchpaymentType',$staff_params,'POST');
  try
  {
    if($get_payment_mode=='')
    {
      throw new Exception("server down", 1);
      log_error("recharge/rechargeHistory function error");

    }
    if(isset($get_payment_mode['error']))
    {
      throw new Exception($get_payment_mode['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }
 
  if($get_payment_mode['status']=='success')
  {
    $data['payment_type']=$get_payment_mode['data'];
  }
  else{
   $data['payment_type']=[];
 }
  
  if($this->uri->segment(3))
  {

    $data['caf_id']=$this->uri->segment(3);
  
  }




 // var_dump($data['payment_type']);die;
 $data['_view'] = 'add_recharge';
 $this->load->view('index',$data);
}




function add_recharge()
{
  // echo '<pre>';
  // print_r($this->input->post());

  $hstartdate=$this->input->post('hstart_date');
  $henddate=$this->input->post('hend_date');
  $hplan_cost=$this->input->post('hplan_cost');
  $hplan_name=$this->input->post('hplan_name');
  $hplan_id=$this->input->post('hplan_id');
  $start_date_array=explode(",",$hstartdate);
  $end_date_array=explode(",",$henddate);
  $plan_cost_array=explode(",",$hplan_cost);
  $plan_name_array=explode(",",$hplan_name);
  $plan_id_array=explode(",",$hplan_id);
   // print_r($name_array);die;
  // $name_array=explode(",",$schedule);
   // print_r(is_array($plan_name_array));

  // var_dump($name_array);die;
  $radius_username=$this->input->post('radius_username',true);
  $f_id=$this->session->f_id;
  $staff_id=$this->session->staff_id;
  $username=$this->input->post('username',true);
  $name=$this->input->post('name',true);
  $mobile=$this->input->post('mobile',true);
  $payer_name=$this->input->post('payer_name',true);
  $payer_mobile=$this->input->post('payer_mobile',true);
  $item=$this->input->post('item',true);
  $item_cost=$this->input->post('cost',true);
  $total_amount=$this->input->post('total_amount',true);
  $discount=$this->input->post('discount',true);
  $paid_amount=$this->input->post('paid_amount',true);
  $pay_type=$this->input->post('pay_type',true);
  $attend_type=$this->input->post('attend_type',true);
  $balance=$this->input->post('balance',true);
  $total_amount=$this->input->post('total_amount',true);
  $caf_id=$this->input->post('caf_id',true);
  $plan_id=$this->input->post('plan_id',true);
  $crn_number=$this->input->post('crn_number',true);
  $sms=$this->input->post('sms',true);
  $email=$this->input->post('email',true);
   $this->load->library('form_validation');
  
  $this->form_validation->set_rules('username','username','required|trim');
  $this->form_validation->set_rules('name','Name','required|trim|alpha_numeric_spaces');
  $this->form_validation->set_rules('mobile','Mobile number','required|max_length[10]|numeric');
  $this->form_validation->set_rules('pay_type','Customer Type','required|trim');
  // $this->form_validation->set_rules('email','Email','required|valid_email|trim');
  $this->form_validation->set_rules('total_amount','total amount','trim|numeric');
  $this->form_validation->set_rules('attend_type','Attend type','required|trim');
  $this->form_validation->set_rules('paid_amount','paid_amount','numeric|trim');
  // $this->form_validation->set_rules('pincode','Address','required|trim|numeric');
  // $this->form_validation->set_rules('pincode','Address','required|trim|numeric');

  if($this->form_validation->run() )     
  {  
  $rechargeParams=array(
    'username'=>$username,
    'name'=>$name,
    'mobile'=>$mobile,
    'plan'=>$item,
    'payer_name'=>$payer_name,
    'payer_mobile'=>$payer_mobile,
    'plan_amount'=>$item_cost,
    'paid_amount'=>$paid_amount,
    'pay_type'=>$pay_type,
    'attend_type'=>$attend_type,
    'f_id'=>$f_id,
    'caf_id'=>$caf_id,
    'total_amount'=>$total_amount,
    'balance'=>$balance,
    'staff_id'=>$staff_id,
    'date'=>date('Y-m-d H:i:s')
  );

// var_dump($rechargeParams);die;
  $get_data=modules::run('api_call/api_call/call_api',''.api_url().'recharge/addRecharge',$rechargeParams,'POST');
  
   ##convert to array
  ##it means if customer only pay amount in this case no invoice is created
  if($plan_name_array[0] && $plan_cost_array[0])
  { 
    $item_array=$plan_name_array;
    $item_cost_array=$plan_cost_array;
##create invoice of recharge

    $particularParam=array(
      'particular'=>$item_array,
      'price'=> $item_cost_array
    );
   // var_dump($particularParam);die;
    modules::run('account/account/collect_information_invoices', $username,$particularParam);
    $length=count($plan_name_array);
    for($i=0;$i<$length;$i++)
    {
     $userPlanParam=array(
      'caf_id'=>$caf_id,
      'plan_name'=>$plan_name_array[$i],
      'plan_id'=>$plan_id_array[$i],
      'amount'=>$plan_cost_array[$i],
      'start_date'=>$start_date_array[$i],
      'end_date'=>$end_date_array[$i],
      'recharge_date'=>date('y-m-d H:i:s'),
      'radius_username'=>$radius_username

    );
     $user_plan_assign=modules::run('api_call/api_call/call_api',''.api_url().'plan/assignPlan',$userPlanParam,'POST');

   }
 }

  ## assign plan to user
 //  $userPlanParam=array(
 //    'caf_id'=>$caf_id,
 // 'plan_name'=>$item,
 //      'plan_id'=>$plan_id,
 //      'amount'=>$item_cost,
 //      'recharge_date'=>date('y-m-d H:m:s')
 //    );

 if($paid_amount>0)
  {
  echo modules::run('account/account/reciept',$rechargeParams);
  }

if($sms)
{    

  $templateParams=array('f_id'=>$f_id,'module'=>'recharge');
  $fetchtemplateSms=modules::run('api_call/api_call/call_api',''.api_url().'sms/fetchTemplateSms',$templateParams,'POST');

  $context=$fetchtemplateSms['data'][0]['context'];
  $contextString=array('{username','{plan_name','{amount','{name','}');
  $ReplaceString=array($username,$item,$total_amount,$name,'');
  $message=str_replace($contextString,$ReplaceString,$context);
  $smsParams=array('f_id'=>$f_id,'mobile'=>$mobile,'message'=>$message);
  $send_data=modules::run('api_call/api_call/call_api',''.api_url().'sms/sendSms',$smsParams,'POST');
}
if($email)
{
  $templateParamsEmail=array('f_id'=>$f_id,'module'=>'recharge');
  $fetchtemplateEmail=modules::run('api_call/api_call/call_api',''.api_url().'email/fetchTemplateEmail',$templateParamsEmail,'POST');

  $context=$fetchtemplateEmail['data'][0]['context'];
  $contextString=array('{username','{plan_name','{amount','{name','}');
  $ReplaceString=array($username,$item,$total_amount,$name,'');
  $message=str_replace($contextString,$ReplaceString,$context);
  $emailParams=array('f_id'=>$f_id,'to'=>$email,'body'=>$message,'attachment'=>'','subject'=>'Recharge');
  $send_data=modules::run('api_call/api_call/call_api',''.api_url().'email/sendMail',$emailParams,'POST');
}

if($get_data['status']=='success')
{

    ##send log
// $logParams=array(
// 'crn_number'=>3,
// 'f_id'=>$f_id,
// 'activity'=>'done recharge,paid'.$paid_amount.' '
// );

  $activity='Recharge Done by plan_name <b>'.$hplan_name.'</b>  Total rs  <b>'. $total_amount.'</b>  and paid  <b>' .$paid_amount.'</b> ';
  $send_log=modules::run('reports/reports/user_log',$crn_number,$f_id,$activity,$staff_id);
  $this->session->alerts = array(
    'severity'=> 'success',
    'title'=> 'successfully recharge'

  );
  redirect('recharge/recharge_panel');
}
}
else
{
  $f_id=$this->session->f_id;
  $staff_params=array(
    'f_id'=>''
  );
  $get_payment_mode=modules::run('api_call/api_call/call_api',''.api_url().'recharge/fetchpaymentType',$staff_params,'POST');
  try
  {
    if($get_payment_mode=='')
    {
      throw new Exception("server down", 1);
      log_error("recharge/rechargeHistory function error");

    }
    if(isset($get_payment_mode['error']))
    {
      throw new Exception($get_payment_mode['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }
 
  if($get_payment_mode['status']=='success')
  {
    $data['payment_type']=$get_payment_mode['data'];
  }
  else{
   $data['payment_type']=[];
 }
  
  if($this->uri->segment(3))
  {

    $data['caf_id']=$this->uri->segment(3);
  
  }
  $data['_view'] = 'add_recharge';
 $this->load->view('index',$data);
}
}

function auto_suggestion_in_recharge()
{
  $f_id=$this->session->f_id;
  $search_query=$this->input->post('search_query',true);
  $params=array('query'=>$search_query,
    'f_id'=>$f_id,
    ''
  );
  $data=modules::run('api_call/api_call/call_api',''.api_url().'recharge/autoSuggetionsInRecharge',$params,'POST');
  if($data['status']=='success')
  {
    echo json_encode($data['data']);
  }
}
function auto_suggestion_in_recharge_other()
{
  $f_id=$this->session->f_id;
  
  $search_query=$this->input->post('search_query',true);
  $plan_type=2;
  $params=array('query'=>$search_query,
    'f_id'=>$f_id,
    'plan_type'=>$plan_type
  );
  $data=modules::run('api_call/api_call/call_api',''.api_url().'recharge/auto_suggetion_in_recharge_other',$params,'POST');
  // print_r($data);
  if($data['status']=='success')
  {
    echo json_encode($data['data']);
  }

}
##used to autofill value after click in search suggestion

function autofill()
{
  $id=$this->input->post("id",true);
  $params=array('id'=>$id);
  $data=modules::run('api_call/api_call/call_api',''.api_url().'recharge/auto_fill_in_recharge',$params,'POST');
   // print_r($data);
  if($data['status']=='success')
  {
    echo json_encode($data['data']);
  }
}
function recharge_history()
{
  $f_id=$this->session->f_id;
  $params=array('f_id'=>$f_id);
  $getdata=modules::run('api_call/api_call/call_api',''.api_url().'recharge/rechargeHistory',$params,'POST');
  try
  {
    if($getdata=='')
    {
      throw new Exception("server down", 1);
      log_error("recharge/rechargeHistory function error");

    }
    if(isset($getdata['error']))
    {
      throw new Exception($getdata['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }
  
  if($getdata['status']=='success')
  {
    $data['recharge_history']=$getdata['data'];
  }
  else if($getdata['status']=='not found')
  {
   $data['recharge_history']=[];
 }

 $data['_view'] = 'recharge_history';
 $this->load->view('index',$data);

}
function attend_type()
{

  $getdata=modules::run('api_call/api_call/call_api',''.api_url().'recharge/attendType',0,'GET');
  if($getdata['status']=='success')
  {
    echo json_encode($getdata['data']);
  }


}
function get_end_date()
{

  $validity=$this->input->post('validity');
  $date=$this->input->post('start_date');

  echo date('Y-m-d H:i:s',strtotime($date.'+'.$validity.'days'));
}


function bill_paid()
{
  $staff_params=array(
    'f_id'=>''
  );
  $get_payment_mode=modules::run('api_call/api_call/call_api',''.api_url().'recharge/fetchpaymentType',$staff_params,'POST');
  try
  {
    if($get_payment_mode=='')
    {
      throw new Exception("server down", 1);
      log_error("recharge/rechargeHistory function error");

    }
    if(isset($get_payment_mode['error']))
    {
      throw new Exception($get_payment_mode['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }
  

  if($get_payment_mode['status']=='success')
  {
    $data['payment_type']=$get_payment_mode['data'];
  }
  else
  {
   $data['payment_type']=[];
 }
 $data['_view'] = 'paid';
 $this->load->view('index',$data);

}
function bill_paid_process()
{
  $hstartdate=$this->input->post('hstart_date',true);
  $henddate=$this->input->post('hend_date',true);
  $hplan_cost=$this->input->post('hplan_cost',true);
  $hplan_name=$this->input->post('hplan_name',true);
  $hplan_id=$this->input->post('hplan_id');
  $start_date_array=explode(",",$hstartdate);
  $end_date_array=explode(",",$henddate);
  $plan_cost_array=explode(",",$hplan_cost);
  $plan_name_array=explode(",",$hplan_name);
  $plan_id_array=explode(",",$hplan_id);
   // print_r($name_array);die;
  // $name_array=explode(",",$schedule);
  // var_dump($name_array);die;
  $radius_username=$this->input->post('radius_username',true);
  $f_id=$this->session->f_id;
  $staff_id=$this->session->staff_id;
  $username=$this->input->post('username',true);
  $name=$this->input->post('name',true);
  $mobile=$this->input->post('mobile',true);
  $payer_name=$this->input->post('payer_name',true);
  $payer_mobile=$this->input->post('payer_mobile',true);
  $item=$this->input->post('item',true);
  $item_cost=$this->input->post('cost',true);
  $total_amount=$this->input->post('total_amount',true);
  $discount=$this->input->post('discount',true);
  $paid_amount=$this->input->post('paid_amount',true);
  $pay_type=$this->input->post('pay_type',true);
  $attend_type=$this->input->post('attend_type',true);
  $balance=$this->input->post('balance',true);
  $total_amount=$this->input->post('total_amount',true);
  $caf_id=$this->input->post('caf_id',true);
  $plan_id=$this->input->post('plan_id',true);
  $crn_number=$this->input->post('crn_number',true);
  $sms=$this->input->post('sms',true);
  $email=$this->input->post('email',true);
  $this->form_validation->set_rules('username','username','required|trim');
  $this->form_validation->set_rules('name','Name','required|trim|alpha_numeric_spaces');
  $this->form_validation->set_rules('mobile','Mobile number','required|max_length[10]|numeric');
  $this->form_validation->set_rules('pay_type','Customer Type','required|trim');
  // $this->form_validation->set_rules('email','Email','required|valid_email|trim');
  $this->form_validation->set_rules('total_amount','total amount','trim|numeric');
  $this->form_validation->set_rules('attend_type','Attend type','required|trim');
   if($this->form_validation->run() )     
  {  
  $rechargeParams=array(
    'username'=>$username,
    'name'=>$name,
    'mobile'=>$mobile,
    'plan'=>$item,
    'payer_name'=>$payer_name,
    'payer_mobile'=>$payer_mobile,
    'plan_amount'=>$item_cost,
    'paid_amount'=>$paid_amount,
    'pay_type'=>$pay_type,
    'attend_type'=>$attend_type,
    'f_id'=>$f_id,
    'caf_id'=>$caf_id,
    'total_amount'=>$total_amount,
    'balance'=>$balance,
    'staff_id'=>$staff_id,
    'date'=>date('Y-m-d H:i:s')
  );


 if($paid_amount>0)
 {
  echo modules::run('account/account/reciept',$rechargeParams);
}

if($sms)
{    

  $templateParams=array('f_id'=>$f_id,'module'=>'recharge');
  $fetchtemplateSms=modules::run('api_call/api_call/call_api',''.api_url().'sms/fetchTemplateSms',$templateParams,'POST');

  $context=$fetchtemplateSms['data'][0]['context'];
  $contextString=array('{username','{plan_name','{amount','{name','}');
  $ReplaceString=array($username,$item,$total_amount,$name,'');
  $message=str_replace($contextString,$ReplaceString,$context);
  $smsParams=array('f_id'=>$f_id,'mobile'=>$mobile,'message'=>$message);
  $send_data=modules::run('api_call/api_call/call_api',''.api_url().'sms/sendSms',$smsParams,'POST');
}
if($email)
{
  $templateParamsEmail=array('f_id'=>$f_id,'module'=>'recharge');
  $fetchtemplateEmail=modules::run('api_call/api_call/call_api',''.api_url().'email/fetchTemplateEmail',$templateParamsEmail,'POST');

  $context=$fetchtemplateEmail['data'][0]['context'];
  $contextString=array('{username','{plan_name','{amount','{name','}');
  $ReplaceString=array($username,$item,$total_amount,$name,'');
  $message=str_replace($contextString,$ReplaceString,$context);
  $emailParams=array('f_id'=>$f_id,'to'=>$email,'body'=>$message,'attachment'=>'','subject'=>'Recharge');
  $send_data=modules::run('api_call/api_call/call_api',''.api_url().'email/sendMail',$emailParams,'POST');
}



    ##send log
// $logParams=array(
// 'crn_number'=>3,
// 'f_id'=>$f_id,
// 'activity'=>'done recharge,paid'.$paid_amount.' '
// );

$activity=''.$hplan_name.'</b>  Total rs  <b>'. $total_amount.'</b>  and paid  <b>' .$paid_amount.'</b> ';
  // $send_log=modules::run('log/log/user_log',$crn_number,$f_id,$activity,$staff_id);
$this->session->alerts = array(
  'severity'=> 'success',
  'title'=> 'successfully recharge'

);
    redirect('recharge/bill_paid');
  }
  else
  {
    $staff_params=array(
    'f_id'=>''
  );
  $get_payment_mode=modules::run('api_call/api_call/call_api',''.api_url().'recharge/fetchpaymentType',$staff_params,'POST');
  try
  {
    if($get_payment_mode=='')
    {
      throw new Exception("server down", 1);
      log_error("recharge/fetchpaymentType function error");

    }
    if(isset($get_payment_mode['error']))
    {
      throw new Exception($get_payment_mode['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }
  

  if($get_payment_mode['status']=='success')
  {
    $data['payment_type']=$get_payment_mode['data'];
  }
  else{
   $data['payment_type']=[];
 }
 $data['_view'] = 'paid';
 $this->load->view('index',$data);
    
  }

}

function recharge_advance_rental()
{
  $f_id=$this->session->f_id;
  $advance_rental_id=3;
  $params=array('f_id'=>$f_id,'plan_type'=>$advance_rental_id);
  $caf_list= modules::run('api_call/api_call/call_api',''.api_url().'caf/fetchCaf',$params,'POST');
  // echo '<pre>';
  // print_r($caf_list);
  if($caf_list['status']=='success')
  {
    $length=count($caf_list['data']);
        // echo $length;
    for($i=0;$i<$length;$i++)
    {
          #search current plan in base of caf_id 
      $planParams=array('caf_id'=>$caf_list['data'][$i]['id']);
          // var_dump($planParams);
      $plan_detail= modules::run('api_call/api_call/call_api',''.api_url().'plan/latest_plan_search',$planParams,'POST');
      // echo '<pre>';
      // print_r($plan_detail);
      if($plan_detail['status']=='success')
      {     
        $start_date=date('Y-m-d H:i:s');

        
        if($plan_detail['data']['end_date']<= $start_date)
        {
        if(!$plan_detail['data']['start_date'])
        {
          // echo 'hii';
          $start_date=date('y-m-d H:i:s');

          $year=date('Y',strtotime($start_date)); 
          $month=date('m',strtotime($start_date));

          $day_in_month=cal_days_in_month(CAL_GREGORIAN,$month,$year);

          $end_date= date('Y-m-d H:i:s',strtotime($start_date.'+'.$day_in_month.'days'));
        }
        else
        {
          // echo 'yes';
          $start_date=$plan_detail['data']['end_date'];
           $year=date('Y',strtotime($start_date)); 
          $month=date('m',strtotime($start_date));

          $day_in_month=cal_days_in_month(CAL_GREGORIAN,$month,$year);
          $end_date= date('Y-m-d H:i:s',strtotime($start_date.'+'.$day_in_month.'days'));




        }
                   ##convert to array
                  // $item_array=[$plan_detail['data']['plan_name']];
                  // $item_cost_array=[$plan_detail['data']['amount']];
        // $particular=array('particular'=>$item_array,'price'=>$item_cost_array);  
        $userPlanParam=array(
          'caf_id'=>$caf_list['data'][$i]['id'],
          'plan_name'=>$plan_detail['data']['plan_name'],
          'plan_id'=>$plan_detail['data']['plan_id'],
          'amount'=>$plan_detail['data']['amount'],
          'start_date'=>$start_date,
          'end_date'=>$end_date,
          'recharge_date'=>date('y-m-d H:i:s'),
          'radius_username'=>'tt'

        );
        ##radius_username will be change
        $user_plan_assign=modules::run('api_call/api_call/call_api',''.api_url().'plan/assignPlan',$userPlanParam,'POST');
      }
    }

    }
  }
}
function recharge_postpaid()
{
  $f_id=$this->session->f_id;
  $advance_rental_id=2;
  $params=array('f_id'=>$f_id,'plan_type'=>$advance_rental_id);
  $caf_list= modules::run('api_call/api_call/call_api',''.api_url().'caf/fetchCaf',$params,'POST');
  // echo '<pre>';
  // print_r($caf_list);
  // die;
  if($caf_list['status']=='success')
  {
    $length=count($caf_list['data']);
        // echo $length;
    for($i=0;$i<$length;$i++)
    {
          #search current plan in base of caf_id 
      $planParams=array('caf_id'=>$caf_list['data'][$i]['id']);
          // var_dump($planParams);
      $plan_detail= modules::run('api_call/api_call/call_api',''.api_url().'plan/latest_plan_search',$planParams,'POST');
      echo '<pre>';
      // print_r($plan_detail);
      if($plan_detail['status']=='success')
      {     
        $start_date=date('Y-m-d H:i:s');
        // echo $start_date;
        ##check end date of pospaid plan
        if($plan_detail['data']['end_date']<= $start_date)
        {
        if(!$plan_detail['data']['start_date'])
        {
          // echo 'hii';
          $start_date=date('y-m-d H:i:s');

          $year=date('Y',strtotime($start_date)); 
          $month=date('m',strtotime($start_date));

          $day_in_month=cal_days_in_month(CAL_GREGORIAN,$month,$year);

          $end_date= date('Y-m-d H:i:s',strtotime($start_date.'+'.$day_in_month.'days'));
          // print_r($end_date);
        }
        else
        {
          // echo 'yes';
          $start_date=$plan_detail['data']['end_date'];
           $year=date('Y',strtotime($start_date)); 
          $month=date('m',strtotime($start_date));

          $day_in_month=cal_days_in_month(CAL_GREGORIAN,$month,$year);
          $end_date= date('Y-m-d H:i:s',strtotime($start_date.'+'.$day_in_month.'days'));
          // print_r($end_date);



        }
                   ##convert to array
                  // $item_array=[$plan_detail['data']['plan_name']];
                  // $item_cost_array=[$plan_detail['data']['amount']];
        // $particular=array('particular'=>$item_array,'price'=>$item_cost_array);  
        $userPlanParam=array(
          'caf_id'=>$caf_list['data'][$i]['id'],
          'plan_name'=>$plan_detail['data']['plan_name'],
          'plan_id'=>$plan_detail['data']['plan_id'],
          'amount'=>$plan_detail['data']['amount'],
          'start_date'=>$start_date,
          'end_date'=>$end_date,
          'recharge_date'=>date('y-m-d H:i:s'),
          'radius_username'=>'tt'

        );
        // print_r($userPlanParam);
        // die;
        $user_plan_assign=modules::run('api_call/api_call/call_api',''.api_url().'plan/assignPlan',$userPlanParam,'POST');
      }
    }

    }
  }
}


/*all function end*/
}
?>	