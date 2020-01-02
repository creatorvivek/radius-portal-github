<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Plan extends MY_Controller
{

 function __construct()
 {
  parent::__construct();
}





function add_plan()
{
  $data['title']='Add Plan';
  $f_id=$this->session->f_id;
  // $staff_params=array(
  //   'f_id'=>$f_id
  // );
  // $staff_info = modules::run('api_call/api_call/call_api',''.api_url().'staff/fetchstaff',$staff_params,'POST');
  // if($staff_info['status']=='success')
  // {

  //   $data['staff']=$staff_info['data'];

  // }
  $params=array('f_id'=>'');
  $result=modules::run('api_call/api_call/call_api',''.api_url().'plan/planTypeMaster',0,'GET');
  // var_dump($result);die;
  if($result['status']=='success')
  {
    $data['plan_type']=$result['data'];
  }
  else
  {
   $data['plan_type']=[];
 }
 $data['_view'] = 'add_plan3';
 $this->load->view('index',$data);
}

function plan_list()
{

  $f_id=$this->session->f_id;
 ##plan_category 1 for primary plan
  $params=array('frenchise_id'=>$f_id,'plan_category'=>1,'plan_type'=>1);
  $get_plan_list=modules::run('api_call/api_call/call_api',''.api_url().'plan/planList',$params,'POST');
  try
  {
    if($get_plan_list=='')
    {
      throw new Exception("server down", 1);
      log_error("plan/planList function error");

    }
    if(isset($get_plan_list['error']))
    {
      throw new Exception($get_plan_list['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }

  // echo '<pre>';
  // var_dump($get_plan_list);die;
  if($get_plan_list['status']=='success')
  {
    $data['plan_lists']=$get_plan_list['data'];

  }
  else if($get_plan_list['status']=='not found')
  {
   $data['plan_lists']=[];
 }
 


 $data['_view'] = 'plan_list';
 $this->load->view('index',$data);
}


// function secondry_plan_list()
// {
//   $plan_id=$this->uri->segment(3);
//   $params=array('id'=>50);
//   $get_secondry_plan_list=modules::run('api_call/api_call/call_api',''.api_url().'plan/secondryPlanList',$params,'POST');
//   // echo '<pre>';
//   print_r($get_secondry_plan_list);



// }

function delete_plan()
{
  $plan_id=$this->input->post('plan_id');
  $params=array('plan_id'=>$plan_id,'id'=>$plan_id);
 // echo json_encode($params);die;
  $result=modules::run('api_call/api_call/call_api',''.api_url().'plan/deletePlan',$params,'POST');
 // echo '<pre>';
  echo json_encode($result);



}

function add()
{
 // echo '<pre>';
 // print_r($this->input->post());
 // die;
   $f_id=$this->session->f_id;
  $planName = $this->input->post('plan_name',true);
  $planDescription = $this->input->post('plan_description',true);
  
  $planTypes= $this->input->post('plan_type',true);
  /*convert plan type to csv*/
  $planType=implode(",",$planTypes);
  /*end */

  $planStatus= $this->input->post('plan_status',true);
  $uploadSpeed = $this->input->post('upload_speed',true);
  $downloadSpeed = $this->input->post('download_speed',true);
  $transferSpeed = $this->input->post('transfer_speed',true);
  
  $downloadData = $this->input->post('download_data',true);
  $uploadData = $this->input->post('upload_data',true);
  $dataTransfer = $this->input->post('data_transfer',true);
  // $burstLimit = $this->input->post('burst_mode');
  $data_unit = $this->input->post('data_unit',true);
  $speed_unit = $this->input->post('speed_unit',true);
  $priority = $this->input->post('priority',true);
  $vacation_mode = $this->input->post('vacation_mode',true);

  $validity = $this->input->post('validity',true);
  $validity_unit = $this->input->post('validity_unit',true);

  $amount = $this->input->post('amount',true);



  /*time limit*/

  $start_hour = $this->input->post('start_hour',true);
  $start_minute = $this->input->post('start_minute',true);
  $end_hour = $this->input->post('end_hour',true);
  $end_minute = $this->input->post('end_minute',true);
  $sunday = $this->input->post('sunday',true);
  $monday = $this->input->post('monday',true);
  $tuesday = $this->input->post('tuesday',true);
  $wednesday = $this->input->post('wednesday',true);
  $thrusday = $this->input->post('thrusday',true);
  $friday = $this->input->post('friday',true);
  $saturday = $this->input->post('saturday',true);
  $burst_mode=$this->input->post('burst_mode',true);
  $status=$this->input->post('status',true);

  $limit_unit=$this->input->post('limit_unit',true);
  $limit_in_no=$this->input->post('limit_in_no',true);
  $repeat_mode=$this->input->post('repeat_mode',true);
  $burst_time_dl_a = $this->input->post('burst_time_dl',true);
  $burst_time_ul_a = $this->input->post('burst_time_ul',true);
  $burst_limit_ul_a = $this->input->post('burst_limit_ul',true);
  $burst_limit_dl_a = $this->input->post('burst_limit_dl',true);
  $burst_threshold_ul_a = $this->input->post('burst_threshold_ul',true);
  $burst_threshold_dl_a = $this->input->post('burst_threshold_dl',true);
  $burst_priority_a = $this->input->post('burst_priority',true);
  $burst_total_time_a = $this->input->post('total_burst_time',true);
  $burst_total_limit_a = $this->input->post('total_burst_limit',true);
  $burst_total_threshold_a = $this->input->post('total_burst_threshold',true);
   // $burst_mode = $this->input->post('burst_mode');
// echo json_encode($burst_threshold_dl_a);
// echo json_encode($burst_time_ul_a);
// echo json_encode($burst_mode);
 //  if($burst_mode=='disable')
// die;
// die;
 //  {
 //    $burst_limit_ul=0;
 //    $burst_limit_dl=0;
 //    $burst_time_ul=12;
 //    $burst_time_dl=12;
 //    $burst_threshold_ul=0;
 //    $burst_threshold_dl=0;
 //    $burst_priority=8;
 //    $transfer_burst_threshold=0;


 //  }
 //  if($burst_mode=='custom')
 //  {
 //   $burst_time_dl = $this->input->post('burst_time_dl');
 //   $burst_time_ul = $this->input->post('burst_time_ul');
 //   $burst_limit_ul = $this->input->post('burst_limit_ul');
 //   $burst_limit_dl = $this->input->post('burst_limit_dl');
 //   $burst_threshold_ul = $this->input->post('burst_threshold_ul');
 //   $burst_threshold_dl = $this->input->post('burst_threshold_dl');
 //   $burst_priority = $this->input->post('burst_priority');
 //   $transfer_burst_threshold= 10;

 // }


  $last_inserted_id=0;/*for last plan no expiration condition*/
  $length=count($data_unit);
  ##which data format is selected with switch case data is converted to mb
  for($i=$length-1;$i>=0;$i--)
  {
    switch($data_unit[$i])
    {
##kb
      case 1:

      @$upload_data_mb=$uploadData[$i]/1024;
      @$download_data_mb=$downloadData[$i]/1024;
      @$data_transfer_mb=$dataTransfer[$i]/1024;
      break;
  ##mb
      case 2:
      @$upload_data_mb=$uploadData[$i];
      @$download_data_mb=$downloadData[$i];
      @$data_transfer_mb=$dataTransfer[$i];
      break;
   ## gb
      case 3:

      @$upload_data_mb=$uploadData[$i]*1024;
      @$download_data_mb=$downloadData[$i]*1024;
      @$data_transfer_mb=$dataTransfer[$i]*1024;
      break;


    }
##which speed format is selected with switch case speed is converted to kb lowest format
    switch($speed_unit[$i]) {
      /*gb*/
      case 3:
      @$upload_speed_kb=$uploadSpeed[$i]*1024*1024;
      @$download_speed_kb=$downloadSpeed[$i]*1024*1024;
      @$transfer_speed_kb=$transferSpeed[$i]*1024*1024;
      if($burst_mode[$i]==2)
      {
       @$burst_threshold_ul=$uploadSpeed[$i]*1024*1024*2;
       @$burst_threshold_dl=$downloadSpeed[$i]*1024*1024*2;
       @$transfer_burst_threshold=$transferSpeed[$i]*1024*1024*2;
     }
     break;
     case 2:
     /*mb*/
     @$upload_speed_kb=$uploadSpeed[$i]*1024;
     @$download_speed_kb=$downloadSpeed[$i]*1024;
     @$transfer_speed_kb=$transferSpeed[$i]*1024;
  
     break;
##kb
     case 1:
     @$upload_speed_kb=$uploadSpeed[$i];
     @$download_speed_kb=$downloadSpeed[$i];
     @$transfer_speed_kb=$transferSpeed[$i];

     break;
   }
##used to identify which plan is primary and which plan is secondry
   if($i==0)
   {
    $plan_category=1;
  }
  else
  {
    $plan_category=0;
  }

  $planParams=array(
    'name'=>$planName,
    'description'=>$planDescription,
    'plan_type'=>$planType,
    'upload_speed'=>$upload_speed_kb,
    'download_speed'=> $download_speed_kb,
    'transfer_speed'=>$transfer_speed_kb,
    'download_data_limit'=>$download_data_mb,
    'upload_data_limit'=>$upload_data_mb,
    'data_transfer_limit'=>$data_transfer_mb,
    'priority'=>$priority,
    'vacation_mode'=>$vacation_mode,
    'after_expire'=>$last_inserted_id,
    'burst_time_dl'=>$burst_time_dl_a[$i],
    'burst_time_ul'=>$burst_time_ul_a[$i],

    'burst_limit_ul'=>$burst_limit_ul_a[$i],
    'burst_limit_dl'=>$burst_limit_dl_a[$i],

    'burst_threshold_ul'=>$burst_threshold_ul_a[$i],
    'burst_threshold_dl'=>$burst_threshold_dl_a[$i],
    'total_burst_threshold'=>$burst_total_threshold_a[$i],
    'total_burst_limit'=>$burst_total_limit_a[$i],
    'total_burst_time'=>$burst_total_time_a[$i],
  // 'total_burst_threshold'=>$burst_total_thresahold_a,

    'burst_priority'=>$burst_priority_a[$i],
    'burst_mode'=>$burst_mode[$i],
    'status'=>$status,
    'plan_category'=>$plan_category,
    'data_unit'=>$data_unit[$i],
    'speed_unit'=>$speed_unit[$i],
    'limit_unit'=>$limit_unit[$i],
    'limit_in_no'=>$limit_in_no[$i],
    'repeat_mode'=>$repeat_mode[$i]




  );
  // echo json_encode($planParams);
  // die;
  $insert_plan_details = modules::run('api_call/api_call/call_api',''.api_url().'plan/addPlan',$planParams,'POST');
  if($insert_plan_details['status']=='success')
  {
// echo json_encode($planParams);
    $last_inserted_id=$insert_plan_details['last_inserted_id'];
    $planDayLimitParam=array(
      'plan_id'=> $last_inserted_id,
      'sunday'=>$sunday[$i],
      'monday'=>$monday[$i],
      'tuesday'=>$tuesday[$i],
      'wednesday'=>$wednesday[$i],
      'thrusday'=>$thrusday[$i],
      'friday'=>$friday[$i],
      'saturday'=>$saturday[$i]
    );
    if(!($start_hour[$i] && $start_minute[$i])){  $start_time=0 ; }else{  $start_time=$start_hour[$i].':'.$start_minute[$i];   }
    if(!($end_hour[$i] && $end_minute[$i])){  $end_time=0 ; }else{  $end_time=$end_hour[$i].':'.$end_minute[$i];   }
    $planTimeLimitParam=array(
      'start_time'=>$start_time,
      'end_time'=>$end_time,
      'plan_id'=>$last_inserted_id
    );
      ##map frenchise and plan
    $mapFrenchisePlan=array(
      'frenchise_id'=>$f_id,
      'plan_id'=>$last_inserted_id
    );
    // echo json_encode($mapFrenchisePlan);
    $insert_map_frenchise_plan=modules::run('api_call/api_call/call_api',''.api_url().'plan/mapFrenchisePlan',$mapFrenchisePlan,'POST');
    // echo json_encode($insert_map_frenchise_plan);
    $insert_plan_time_limit_details = modules::run('api_call/api_call/call_api',''.api_url().'plan/addPlanTimeLimit',$planTimeLimitParam,'POST');
    $insert_plan_day_limit_details = modules::run('api_call/api_call/call_api',''.api_url().'plan/addPlanDayLimit',$planDayLimitParam,'POST');
    // echo json_encode($insert_plan_time_limit_details);
  }
}
// die; 
$lengthValidity=count($validity);
for($j=0;$j<$lengthValidity;$j++)
{
  switch($validity_unit[$j])
  {
    /*1=days*/
    case 1:
    $validity_in_sec=$validity[$j]*86400;
    $validity_actual=$validity[$j];
    break;
    /*2=week*/
    case 2:
    $validity_in_sec=$validity[$j]*604800;
    $validity_actual=$validity[$j]*7;
    break;
    /*3=month*/
    case 3:
    $validity_in_sec=$validity[$j]*2592000;
    ##not perfect
    $validity_actual=$validity[$j]*30;
    break;
    /*year 365 days*/
    $validity_in_sec=$validity[$j]*31536000;
    $validity_actual=$validity[$j]*365;
  }


  $validityPriceParams=array(
    'plan_id'=>$last_inserted_id,
    'validity'=>$validity_in_sec,
    'amount'=>$amount[$j],
    'validity_type'=>$validity_unit[$j],
    'validity_actual'=>$validity_actual


  );
  $insert_plan_validity_details = modules::run('api_call/api_call/call_api',''.api_url().'plan/planAmountValidity',$validityPriceParams,'POST');

  // echo json_encode($insert_plan_validity_details);


} 

$this->session->alerts = array(
  'severity'=> 'success',
  'title'=> 'successfully added'

);






}



function edit($plan_id)
{


  $data['title']="Edit plan details";
  $params=array('id'=>$plan_id);
  $amountParams=array('plan_id'=>$plan_id);

    ##details of plan 
  $data['plan'] = modules::run('api_call/api_call/call_api',''.api_url().'plan/getPlanById',$params,'POST');
  $data['secondry'] = modules::run('api_call/api_call/call_api',''.api_url().'plan/secondry',$params,'POST');

  // echo '<pre>';
  // print_r($data['secondry']);die;
  $params=array('f_id'=>'');
  $result=modules::run('api_call/api_call/call_api',''.api_url().'plan/planTypeMaster',0,'GET');
 
  if($result['status']=='success')
  {
    $data['plan_type']=$result['data'];
  }
  else
  {
   $data['plan_type']=[];
 }

 /*for amount and validity*/
 $amount = modules::run('api_call/api_call/call_api',''.api_url().'plan/getValidityAmountByPlanId',$amountParams,'POST');
 
 $data['amount_data']=[];
 if($amount['status']=='success')
 {
  for($v=0;$v<count($amount['data']);$v++)
  {
    switch($amount['data'][$v]['validity_type'])
    {
      case 1:
      $amount_array= array(
        'validity' => ($amount['data'][$v]['validity']/86400),
        'validity_type'=>'days',
        'validity_unit'=>1

      );   
      break;
      case 2:
      $amount_array=array(
        'validity'=>$amount['data'][$v]['validity']/604800,
        'validity_type'=>'week',
        'validity_unit'=>2
      );
      break;
      case 3:
      $amount_array=array(
        'validity'=>$amount['data'][$v]['validity']/2592000,
        'validity_type'=>'month',
        'validity_unit'=>3
      );
      break;
      case 4:
      $amount_array=array(
        'validity'=>$amount['data'][$v]['validity']/31536000,
        'validity_type'=>'year',
        'validity_unit'=>4
      );
      break;


    }
    $amount_array['amount']=$amount['data'][$v]['amount'];
    $amount_array['plan_amount_id']=$amount['data'][$v]['plan_amount_id'];

    array_push($data['amount_data'],$amount_array);

  }  

}

  // print_r(  $data['amount']);
 // die;


if(isset($data['plan']['data'][0]['plan_id']))
{
  $this->load->library('form_validation');


  $this->form_validation->set_rules('plan_name','Name','required');
  if($this->form_validation->run() )     
  {   

      // print_r($this->input->post());
      // die;
      



    $planName = $this->input->post('plan_name',true);
    $planDescription = $this->input->post('plan_description',true);

    $planTypes= $this->input->post('plan_type',true);
    /*convert plan type to csv*/
    $planType=implode(",",$planTypes);
    /*end */

    $planStatus= $this->input->post('plan_status',true);
    $priority = $this->input->post('priority',true);
    $vacation_mode = $this->input->post('vacation_mode',true);

    $validity = $this->input->post('validity',true);
    $validity_unit = $this->input->post('validity_unit',true);

    $amount = $this->input->post('amount',true);
    $after_expire = $this->input->post('after_expire',true);
    $status=$this->input->post('status',true);


    
    $uploadSpeed = $this->input->post('upload_speed',true);
    $downloadSpeed = $this->input->post('download_speed',true);
    $transferSpeed = $this->input->post('transfer_speed',true);

    $downloadData = $this->input->post('download_data',true);
    $uploadData = $this->input->post('upload_data',true);
    $dataTransfer = $this->input->post('data_transfer',true);
     
    $data_unit = $this->input->post('data_unit',true);
    $speed_unit = $this->input->post('speed_unit',true);
    $limit_unit=$this->input->post('limit_unit',true);
  
  
    /*time limit*/
    $start_hour = $this->input->post('start_hour',true);
    $start_minute = $this->input->post('start_minute',true);
    $end_hour = $this->input->post('end_hour',true);
    $end_minute = $this->input->post('end_minute',true);
    $sunday = $this->input->post('sunday',true);
    $monday = $this->input->post('monday',true);
    $tuesday = $this->input->post('tuesday',true);
    $wednesday = $this->input->post('wednesday',true);
    $thrusday = $this->input->post('thrusday',true);
    $friday = $this->input->post('friday',true);
    $saturday = $this->input->post('saturday',true);
    $burst_mode=$this->input->post('burst_mode',true);
    $plan_amount_id=$this->input->post('plan_amount_id',true);
    $limit_in_no=$this->input->post('limit_in_no',true);
    $plan_id_all=$this->input->post('plan_id',true);
    $limit_unit=$this->input->post('limit_unit',true);
  $limit_in_no=$this->input->post('limit_in_no',true);
  $repeat_mode=$this->input->post('repeat_mode',true);
  $burst_time_dl_a = $this->input->post('burst_time_dl',true);
  $burst_time_ul_a = $this->input->post('burst_time_ul',true);
  $burst_limit_ul_a = $this->input->post('burst_limit_ul',true);
  $burst_limit_dl_a = $this->input->post('burst_limit_dl',true);
  $burst_threshold_ul_a = $this->input->post('burst_threshold_ul',true);
  $burst_threshold_dl_a = $this->input->post('burst_threshold_dl',true);
  $burst_priority_a = $this->input->post('burst_priority',true);
  $burst_total_time_a = $this->input->post('total_burst_time',true);
  $burst_total_limit_a = $this->input->post('total_burst_limit',true);
  $burst_total_threshold_a = $this->input->post('total_burst_threshold',true);


   $length=count($data_unit);
   for($i=$length-1;$i>=0;$i--)
   {
    if($data_unit[$i]=='1')
    {
      @$upload_data_mb=$uploadData[$i]/1024;
      @$download_data_mb=$downloadData[$i]/1024;
      @$data_transfer_mb=$dataTransfer[$i]/1024;
    }
    else if($data_unit[$i]=='3')
    {
      @$upload_data_mb=$uploadData[$i]*1024;
      @$download_data_mb=$downloadData[$i]*1024;
      @$data_transfer_mb=$dataTransfer[$i]*1024;
    }
    else
    {
     @$upload_data_mb=$uploadData[$i];
     @$download_data_mb=$downloadData[$i];
     @$data_transfer_mb=$dataTransfer[$i];
   }
   switch($speed_unit[$i]) {
    /*gb*/
    case 3:
    @$upload_speed_kb=$uploadSpeed[$i]*1024*1024;
    @$download_speed_kb=$downloadSpeed[$i]*1024*1024;
    @$transfer_speed_kb=$transferSpeed[$i]*1024*1024;

   break;
   case 2:
   /*mb*/
   @$upload_speed_kb=$uploadSpeed[$i]*1024;
   @$download_speed_kb=$downloadSpeed[$i]*1024;
   @$transfer_speed_kb=$transferSpeed[$i]*1024;

  break;

  default:
 @$upload_speed_kb=$uploadSpeed[$i];
  @$download_speed_kb=$downloadSpeed[$i];
  @$transfer_speed_kb=$transferSpeed[$i];

}
/*if new secondry plan is added so this will help to update after expire*/
$after_expire_id=$plan_id_all[$length-1];
/*.........*/
$planParams=array(
  'name'=>$planName,
  'description'=>$planDescription,
  'plan_type'=>$planType,
  'upload_speed'=>$upload_speed_kb,
  'download_speed'=> $download_speed_kb,
  'transfer_speed'=>$transfer_speed_kb,
  'download_data_limit'=>$download_data_mb,
  'upload_data_limit'=>$upload_data_mb,
  'data_transfer_limit'=>$data_transfer_mb,
  'priority'=>$priority,
  'vacation_mode'=>$vacation_mode,
  'burst_priority'=>$burst_priority_a[$i],
  'burst_mode'=>$burst_mode[$i],
  'status'=>$status,

  'data_unit'=>$data_unit[$i],
  'speed_unit'=>$speed_unit[$i],
  'limit_unit'=>$limit_unit[$i],
  'limit_in_no'=>$limit_in_no[$i],
  'repeat_mode'=>$repeat_mode[$i],  
  'plan_id'=>$plan_id_all[$i],
  'burst_time_dl'=>$burst_time_dl_a[$i],
  'burst_time_ul'=>$burst_time_ul_a[$i],

  'burst_limit_ul'=>$burst_limit_ul_a[$i],
  'burst_limit_dl'=>$burst_limit_dl_a[$i],

  'burst_threshold_ul'=>$burst_threshold_ul_a[$i],
  'burst_threshold_dl'=>$burst_threshold_dl_a[$i],
  'total_burst_threshold'=>$burst_total_threshold_a[$i],
  'total_burst_limit'=>$burst_total_limit_a[$i],
  'total_burst_time'=>$burst_total_time_a[$i],
  'burst_priority'=>$burst_priority_a[$i]
  


 


);
  
$update_data = modules::run('api_call/api_call/call_api',''.api_url().'plan/update_plan',$planParams,'POST');
echo json_encode($update_data);
 $planDayLimitParam=array(
    'plan_id'=> $plan_id_all[$i],
    'sunday'=>$sunday[$i],
    'monday'=>$monday[$i],
    'tuesday'=>$tuesday[$i],
    'wednesday'=>$wednesday[$i],
    'thrusday'=>$thrusday[$i],
    'friday'=>$friday[$i],
    'saturday'=>$saturday[$i]
  );
  if(!($start_hour[$i] && $start_minute[$i])){  $start_time=0 ; }else{  $start_time=$start_hour[$i].':'.$start_minute[$i];   }
  if(!($end_hour[$i] && $end_minute[$i])){  $end_time=0 ; }else{  $end_time=$end_hour[$i].':'.$end_minute[$i];   }
  $planTimeLimitParam=array(
    'start_time'=>$start_time,
    'end_time'=>$end_time,
    'plan_id'=>$plan_id_all[$i]
  );
    
  
    // echo json_encode($insert_map_frenchise_plan);
  $update_plan_time_limit_details = modules::run('api_call/api_call/call_api',''.api_url().'plan/update_plan_time_limit',$planTimeLimitParam,'POST');
  $update_plan_day_limit_details = modules::run('api_call/api_call/call_api',''.api_url().'plan/update_plan_day_limit',$planDayLimitParam,'POST');  
     
}
/*for loop end*/


/*if secondry plan is add*/
    $data_unit_sec = $this->input->post('data_unit_sec',true);
    echo json_encode($data_unit_sec);
if($data_unit_sec)
{

$uploadSpeed_sec = $this->input->post('upload_speed_sec',true);
    $downloadSpeed_sec = $this->input->post('download_speed_sec',true);
    $transferSpeed_sec = $this->input->post('transfer_speed_sec',true);

    $downloadData_sec = $this->input->post('download_data_sec',true);
    $uploadData_sec = $this->input->post('upload_data_sec',true);
    $dataTransfer_sec = $this->input->post('data_transfer_sec',true);
     
    $speed_unit_sec = $this->input->post('speed_unit_sec',true);
    $limit_unit_sec=$this->input->post('limit_unit_sec',true);
    $limit_in_no_sec=$this->input->post('limit_in_no_sec',true);
    $repeat_mode_sec=$this->input->post('repeat_mode_sec',true);
    $start_hour_sec = $this->input->post('start_hour_sec',true);
    $start_minute_sec = $this->input->post('start_minute_sec',true);
    $end_hour_sec = $this->input->post('end_hour_sec',true);
    $end_minute_sec = $this->input->post('end_minute_sec',true);
    $sunday_sec = $this->input->post('sunday_sec',true);
    $monday_sec = $this->input->post('monday_sec',true);
    $tuesday_sec = $this->input->post('tuesday_sec',true);
    $wednesday_sec = $this->input->post('wednesday_sec',true);
    $thrusday_sec = $this->input->post('thrusday_sec',true);
    $friday_sec = $this->input->post('friday_sec',true);
    $saturday_sec = $this->input->post('saturday_sec',true);
    $burst_mode_sec=$this->input->post('burst_mode_sec',true);
    $plan_amount_id_sec=$this->input->post('plan_amount_id_sec',true);
    $limit_in_no_sec=$this->input->post('limit_in_no_sec',true);
   
    $limit_unit_sec=$this->input->post('limit_unit_sec',true);
  $limit_in_no_sec=$this->input->post('limit_in_no_sec',true);
  $repeat_mode_sec=$this->input->post('repeat_mode_sec',true);
  $burst_time_dl_a_sec = $this->input->post('burst_time_dl_sec',true);
  $burst_time_ul_a_sec = $this->input->post('burst_time_ul_sec',true);
  $burst_limit_ul_a_sec = $this->input->post('burst_limit_ul_sec',true);
  $burst_limit_dl_a_sec = $this->input->post('burst_limit_dl_sec',true);
  $burst_threshold_ul_a_sec = $this->input->post('burst_threshold_ul_sec',true);
  $burst_threshold_dl_a_sec = $this->input->post('burst_threshold_dl_sec',true);
  $burst_priority_a_sec = $this->input->post('burst_priority_sec',true);
  $burst_total_time_a_sec = $this->input->post('total_burst_time_sec',true);
  $burst_total_limit_a_sec = $this->input->post('total_burst_limit_sec',true);
  $burst_total_threshold_a_sec = $this->input->post('total_burst_threshold_sec',true);

$length=count($data_unit_sec);
   for($a=0;$a<$length;$a++)
   {
    if($data_unit_sec[$a]=='1')
    {
      @$upload_data_mb=$uploadData_sec[$a]/1024;
      @$download_data_mb=$downloadData_sec[$a]/1024;
      @$data_transfer_mb=$dataTransfer_sec[$a]/1024;
    }
    else if($data_unit_sec[$a]=='3')
    {
      @$upload_data_mb=$uploadData_sec[$a]*1024;
      @$download_data_mb=$downloadData_sec[$a]*1024;
      @$data_transfer_mb=$dataTransfer_sec[$a]*1024;
    }
    else
    {
     @$upload_data_mb=$uploadData_sec[$a];
     @$download_data_mb=$downloadData_sec[$a];
     @$data_transfer_mb=$dataTransfer_sec[$a];
   }
   switch($speed_unit_sec[$a]) {
    /*gb*/
    case 3:
    @$upload_speed_kb=$uploadSpeed_sec[$a]*1024*1024;
    @$download_speed_kb=$downloadSpeed_sec[$a]*1024*1024;
    @$transfer_speed_kb=$transferSpeed_sec[$a]*1024*1024;

   break;
   case 2:
   /*mb*/
   @$upload_speed_kb=$uploadSpeed_sec[$a]*1024;
   @$download_speed_kb=$downloadSpeed_sec[$a]*1024;
   @$transfer_speed_kb=$transferSpeed_sec[$a]*1024;

  break;

  default:
  @$upload_speed_kb=$uploadSpeed_sec[$a];
  @$download_speed_kb=$downloadSpeed_sec[$a];
  @$transfer_speed_kb=$transferSpeed_sec[$a];

}

$planParamsSec=array(
  'name'=>$planName,
  'description'=>$planDescription,
  'plan_type'=>$planType,
  'upload_speed'=>$upload_speed_kb,
  'download_speed'=> $download_speed_kb,
  'transfer_speed'=>$transfer_speed_kb,
  'download_data_limit'=>$download_data_mb,
  'upload_data_limit'=>$upload_data_mb,
  'data_transfer_limit'=>$data_transfer_mb,
  'priority'=>$priority,
  'vacation_mode'=>$vacation_mode,
  'burst_priority'=>$burst_priority_a_sec[$a],
  'burst_mode'=>$burst_mode_sec[$a],
  'status'=>$status,
  'plan_category'=>0,
  'data_unit'=>$data_unit_sec[$a],
  'speed_unit'=>$speed_unit_sec[$a],
  'limit_unit'=>$limit_unit_sec[$a],
  'limit_in_no'=>$limit_in_no_sec[$a],
  'repeat_mode'=>$repeat_mode_sec[$a],  
  // 'plan_id'=>$plan_id_all[$a],
  'burst_time_dl'=>$burst_time_dl_a_sec[$a],
  'burst_time_ul'=>$burst_time_ul_a_sec[$a],

  'burst_limit_ul'=>$burst_limit_ul_a_sec[$a],
  'burst_limit_dl'=>$burst_limit_dl_a_sec[$a],
  'after_expire'=>0,
  'burst_threshold_ul'=>$burst_threshold_ul_a_sec[$a],
  'burst_threshold_dl'=>$burst_threshold_dl_a_sec[$a],
  'total_burst_threshold'=>$burst_total_threshold_a_sec[$a],
  'total_burst_limit'=>$burst_total_limit_a_sec[$a],
  'total_burst_time'=>$burst_total_time_a_sec[$a],
  'burst_priority'=>$burst_priority_a_sec[$a],
  'burst_mode'=>$burst_mode_sec[$a],
  'data_unit'=>$data_unit_sec[$a],
  'speed_unit'=>$speed_unit_sec[$a],
  'limit_unit'=>$limit_unit_sec[$a],
  'limit_in_no'=>$limit_in_no_sec[$a],
  'repeat_mode'=>$repeat_mode_sec[$a]


);



// echo json_encode($planParams);die;
/*insert new secondry plan*/
 $insert_plan_details = modules::run('api_call/api_call/call_api',''.api_url().'plan/addPlan',$planParamsSec,'POST');
  if($insert_plan_details['status']=='success')
  {
// echo json_encode($planParams);
    $last_inserted_id=$insert_plan_details['last_inserted_id'];
    $planDayLimitParam=array(
      'plan_id'=> $last_inserted_id,
      'sunday'=>$sunday_sec[$a],
      'monday'=>$monday_sec[$a],
      'tuesday'=>$tuesday_sec[$a],
      'wednesday'=>$wednesday_sec[$a],
      'thrusday'=>$thrusday_sec[$a],
      'friday'=>$friday_sec[$a],
      'saturday'=>$saturday_sec[$a]
    );
    if(!($start_hour[$a] && $start_minute[$a])){  $start_time=0 ; }else{  $start_time=$start_hour[$a].':'.$start_minute[$a];   }
    if(!($end_hour[$a] && $end_minute[$a])){  $end_time=0 ; }else{  $end_time=$end_hour[$a].':'.$end_minute[$a];   }
    $planTimeLimitParam=array(
      'start_time'=>$start_time,
      'end_time'=>$end_time,
      'plan_id'=>$last_inserted_id
    );
      ##map frenchise and plan
    $mapFrenchisePlan=array(
      'frenchise_id'=>$f_id,
      'plan_id'=>$last_inserted_id
    );
    // echo json_encode($mapFrenchisePlan);
    // $insert_map_frenchise_plan=modules::run('api_call/api_call/call_api',''.api_url().'plan/mapFrenchisePlan',$mapFrenchisePlan,'POST');
    // echo json_encode($insert_map_frenchise_plan);
    $insert_plan_time_limit_details = modules::run('api_call/api_call/call_api',''.api_url().'plan/addPlanTimeLimit',$planTimeLimitParam,'POST');
    $insert_plan_day_limit_details = modules::run('api_call/api_call/call_api',''.api_url().'plan/addPlanDayLimit',$planDayLimitParam,'POST');




##update plan with after expire
$planUpdateAfterExpire=array('plan_id'=>$after_expire_id,'after_expire'=>$last_inserted_id);
$updatePlanAfterExpire= modules::run('api_call/api_call/call_api',''.api_url().'plan/update_plan_after_expiry',$planUpdateAfterExpire,'POST');
echo json_encode($updatePlanAfterExpire);

}

}

}
$lengthValidity=count($validity);
for($j=0;$j<$lengthValidity;$j++)
{
  switch($validity_unit[$j])
  {
    /*1=days*/
    case 1:
    $validity_in_sec=$validity[$j]*86400;
    $validity_actual=$validity[$j];
    break;
    /*2=week*/
    case 2:
    $validity_in_sec=$validity[$j]*604800;
    $validity_actual=$validity[$j]*7;
    break;
    /*3=month*/
    case 3:
    $validity_in_sec=$validity[$j]*2592000;
    ##not perfect
    $validity_actual=$validity[$j]*30;
    break;
    /*year 365 days*/
    $validity_in_sec=$validity[$j]*31536000;
    $validity_actual=$validity[$j]*365;
  }


  $validityPriceParams=array(
    'id'=>$plan_amount_id[$j],
    'plan_id'=>$data['plan']['data'][0]['plan_id'],
    'validity'=>$validity_in_sec,
    'amount'=>$amount[$j],
    'validity_type'=>$validity_unit[$j],
    'validity_actual'=>$validity_actual


  );
  // echo json_encode($validityPriceParams); 
  $update_plan_validity_details = modules::run('api_call/api_call/call_api',''.api_url().'plan/update_plan_amount',$validityPriceParams,'POST');
  // echo json_encode($update_plan_validity_details);



} 
/*if extra amount row add then this coding will work*/
 $validity_sec=$this->input->post('validity_sec');
 $validity_unit_sec=$this->input->post('validity_unit_sec');
 $amount_sec=$this->input->post('amount_sec');
 echo json_encode($validity_unit_sec) ;
if($validity_unit_sec)
{
 $length_validity_unit_sec=count($validity_unit_sec);
  for($k=0;$k<$length_validity_unit_sec;$k++)

{
  switch($validity_unit_sec[$k])
  {
    /*1=days*/
    case 1:
    $validity_in_sec=$validity_sec[$k]*86400;
    $validity_actual=$validity_sec[$k];
    break;
    /*2=week*/
    case 2:
    $validity_in_sec=$validity_sec[$k]*604800;
    $validity_actual=$validity_sec[$k]*7;
    break;
    /*3=month*/
    case 3:
    $validity_in_sec=$validity_sec[$k]*2592000;
    ##not perfect
    $validity_actual=$validity_sec[$k]*30;
    break;
    /*year 365 days*/
    $validity_in_sec=$validity_sec[$k]*31536000;
    $validity_actual=$validity_sec[$k]*365;
  }


  $validityPriceParamsSec=array(
   
    'plan_id'=>$data['plan']['data'][0]['plan_id'],
    'validity'=>$validity_in_sec,
    'amount'=>$amount_sec[$k],
    'validity_type'=>$validity_unit_sec[$k],
    'validity_actual'=>$validity_actual


  );
  $insert_plan_validity_details_sec = modules::run('api_call/api_call/call_api',''.api_url().'plan/planAmountValidity',$validityPriceParamsSec,'POST');
  echo json_encode($insert_plan_validity_details_sec);
}
}
$this->session->alerts = array(
  'severity'=> 'success',
  'title'=> 'succesfully updated'

);
     // redirect('plan/plan_list');

}






else
{
  $data['_view'] = 'edit';
  $this->load->view('index',$data);
}
}
else
  show_error('The group you are trying to edit does not exist.');

}

##  ajax call by caf module when plan type is selected (prepaid,postaid) then accoriding to this plan is shown in dropdown
function selectPlan()
{
 $f_id=$this->session->f_id;
 $plan_type=$this->input->post('plan_type');
 $params=array(
  'plan_type'=>$plan_type,
  'f_id'=>$f_id,
  'plan_category'=>1,
  'status'=>1
);
 $result=modules::run('api_call/api_call/call_api',''.api_url().'plan/selectPlan',$params,'POST');
 try
 {
  if($result=='')
  {
    throw new Exception("server down", 1);
    log_error("plan/selectPlan function error");

  }
  if(isset($result['error']))
  {
    throw new Exception($result['error'], 1);
  }
}

catch(Exception $e)
{
  die(show_error($e->getMessage()));
}
if($result['status']=='success')
{
  echo json_encode($result['data']);
}

else
{
  $result['data']=[];
  echo json_encode($result['data']);
}


}

function assign_plan($caf_id,$plan_type)
{
  $data['caf_id']=$caf_id;
 // echo '<br>';
  $data['plan_id']=$plan_type;
// die;
  $f_id=$this->session->f_id;
  $params=array(
    'plan_type'=>$plan_type,
    'f_id'=>$f_id,
    'plan_category'=>1
  );
  $result=modules::run('api_call/api_call/call_api',''.api_url().'plan/selectPlan',$params,'POST');  
   // print_r($result);
   // die;
  try
  {
    if($result=='')
    {
      throw new Exception("server down", 1);
      log_error("plan/selectPlan function error");

    }
    if(isset($result['error']))
    {
      throw new Exception($result['error'], 1);
    }
  }

  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }
  if($result['status']=='success')
  {
    $data['plan']=$result['data'];
  }

  else
  {
    $data['plan']=[];

  }
  $data['_view'] = 'assign_plan';
  $this->load->view('index',$data);
}

function assign()
{
// print_r($this->input->post());

 $plan_details=$this->input->post('plan');
 $caf_id=$this->input->post('caf_id');
 $planDetails=explode(",",$plan_details);
 $plan_id=$planDetails[0];
 $plan_amount=$planDetails[1];
 $plan_actual_validity=$planDetails[2];
 $plan_name=$planDetails[3];
 $start_date= date('Y-m-d H:i:s');
 $end_date=date('Y-m-d H:i:s',strtotime($start_date.'+'.$plan_actual_validity.'days'));
 ##fetch radius username
 $fetchRadiusUsername=array('caf_id'=>$caf_id );
 $initiateAccount=modules::run('api_call/api_call/call_api',''.api_url().'account/fetch_radius_username',$fetchRadiusUsername,'POST');
// var_dump($initiateAccount);
 if(($initiateAccount['status']=='success'))
 {
  $username=$initiateAccount['data'][0]['username'];
}

          // $end_date=$this->input->post('end_date');
          // $plan_name=$this->input->post('plan_name');
          // $plan_cost=$this->input->post('plan_cost');
$assignPlan=array('plan_id'=>$plan_id,'caf_id'=>$caf_id,'start_date'=>$start_date,'end_date'=>$end_date,'recharge_date'=>$start_date,'radius_username'=>$username,'amount'=>$plan_amount,'plan_name'=>$plan_name);
    // print_r($assignPlan);
    // die;
$initiateAccount=modules::run('api_call/api_call/call_api',''.api_url().'plan/assignPlan',$assignPlan,'POST');
$this->session->alerts = array(
  'severity'=> 'success',
  'title'=> 'succesfully plan '.'   '. $plan_name.'  assign to caf id  '.'  '. $caf_id

);
redirect('caf/all_caf_list');
}


function selectPlanType()
{
  $f_id=$this->input->post('f_id');
  $params=array(

    'f_id'=>$f_id
  );

  $result=modules::run('api_call/api_call/call_api',''.api_url().'plan/planTypeMaster',0,'GET');
  if($result['status']=='success')
  {
    echo json_encode($result['data']);
  }


}
## recharge panel search plan used by ajax
function searchPlan()
{
  // $query=$this->input->post('search_query');
 $f_id=$this->session->f_id;
 $search_query=$this->input->post('search_query',1);
 $params=array('query'=>$search_query,
  'f_id'=>$f_id
);
 $data=modules::run('api_call/api_call/call_api',''.api_url().'plan/autoSuggetionsInPlan',$params,'POST');
 if($data['status']=='success')
 {
  echo json_encode($data['data']);
}
else
{
  echo json_encode([]);
}
}

function deactivate_plan()
{

  $plan_id=$this->uri->segment(3);
  $params=array('plan_id'=>$plan_id,'status'=>0);
  $data=modules::run('api_call/api_call/call_api',''.api_url().'plan/change_plan_status',$params,'POST');
  redirect('plan/plan_list');


}

function activate_plan()
{

 $plan_id=$this->uri->segment(3);
 $params=array('plan_id'=>$plan_id,'status'=>1);
 $data=modules::run('api_call/api_call/call_api',''.api_url().'plan/change_plan_status',$params,'POST');
 redirect('plan/plan_list');


}

function secondry_plan_list()
{
$id=$this->input->post('id',true);

$params=array(
'id'=>$id
);
$data=modules::run('api_call/api_call/call_api',''.api_url().'plan/secondry',$params,'POST');

echo json_encode($data);

}
function add_burst()
{
  // echo '<pre>';
  // echo json_encode($this->input->post());die;
  // echo json_encode($this->input->post());
  // die;


  $f_id=$this->session->f_id;
  $planName = $this->input->post('plan_name',true);
  $planDescription = $this->input->post('plan_description',true);
  
  $planTypes= $this->input->post('plan_type',true);
  /*convert plan type to csv*/
  $planType=implode(",",$planTypes);
  /*end */

  $planStatus= $this->input->post('plan_status',true);
  $uploadSpeed = $this->input->post('upload_speed',true);
  $downloadSpeed = $this->input->post('download_speed',true);
  $transferSpeed = $this->input->post('transfer_speed',true);
  
  $downloadData = $this->input->post('download_data',true);
  $uploadData = $this->input->post('upload_data',true);
  $dataTransfer = $this->input->post('data_transfer',true);
  // $burstLimit = $this->input->post('burst_mode');
  $data_unit = $this->input->post('data_unit',true);
  $speed_unit = $this->input->post('speed_unit',true);
  $priority = $this->input->post('priority',true);
  $vacation_mode = $this->input->post('vacation_mode',true);

  $validity = $this->input->post('validity',true);
  $validity_unit = $this->input->post('validity_unit',true);

  $amount = $this->input->post('amount',true);



  /*time limit*/

  $start_hour = $this->input->post('start_hour',true);
  $start_minute = $this->input->post('start_minute',true);
  $end_hour = $this->input->post('end_hour',true);
  $end_minute = $this->input->post('end_minute',true);
  $sunday = $this->input->post('sunday',true);
  $monday = $this->input->post('monday',true);
  $tuesday = $this->input->post('tuesday',true);
  $wednesday = $this->input->post('wednesday',true);
  $thrusday = $this->input->post('thrusday',true);
  $friday = $this->input->post('friday',true);
  $saturday = $this->input->post('saturday',true);
  $burst_mode=$this->input->post('burst_mode',true);
  $status=$this->input->post('status',true);

  $limit_unit=$this->input->post('limit_unit',true);
  $limit_in_no=$this->input->post('limit_in_no',true);
  $repeat_mode=$this->input->post('repeat_mode',true);
  $burst_time_dl_a = $this->input->post('burst_time_dl',true);
  $burst_time_ul_a = $this->input->post('burst_time_ul',true);
  $burst_limit_ul_a = $this->input->post('burst_limit_ul',true);
  $burst_limit_dl_a = $this->input->post('burst_limit_dl',true);
  $burst_threshold_ul_a = $this->input->post('burst_threshold_ul',true);
  $burst_threshold_dl_a = $this->input->post('burst_threshold_dl',true);
  $burst_priority_a = $this->input->post('burst_priority',true);
  $burst_total_time_a = $this->input->post('total_burst_time',true);
  $burst_total_limit_a = $this->input->post('total_burst_limit',true);
  $burst_total_threshold_a = $this->input->post('total_burst_threshold',true);
   // $burst_mode = $this->input->post('burst_mode');
// echo json_encode($burst_threshold_dl_a);
// echo json_encode($burst_time_ul_a);
// echo json_encode($burst_mode);
 //  if($burst_mode=='disable')
// die;
// die;
 //  {
 //    $burst_limit_ul=0;
 //    $burst_limit_dl=0;
 //    $burst_time_ul=12;
 //    $burst_time_dl=12;
 //    $burst_threshold_ul=0;
 //    $burst_threshold_dl=0;
 //    $burst_priority=8;
 //    $transfer_burst_threshold=0;


 //  }
 //  if($burst_mode=='custom')
 //  {
 //   $burst_time_dl = $this->input->post('burst_time_dl');
 //   $burst_time_ul = $this->input->post('burst_time_ul');
 //   $burst_limit_ul = $this->input->post('burst_limit_ul');
 //   $burst_limit_dl = $this->input->post('burst_limit_dl');
 //   $burst_threshold_ul = $this->input->post('burst_threshold_ul');
 //   $burst_threshold_dl = $this->input->post('burst_threshold_dl');
 //   $burst_priority = $this->input->post('burst_priority');
 //   $transfer_burst_threshold= 10;

 // }


  $last_inserted_id=0;/*for last plan no expiration condition*/
  $length=count($data_unit);
  for($i=$length-1;$i>=0;$i--)
  {
    switch($data_unit[$i])
    {
##kb
      case 1:

      @$upload_data_mb=$uploadData[$i]/1024;
      @$download_data_mb=$downloadData[$i]/1024;
      @$data_transfer_mb=$dataTransfer[$i]/1024;
      break;
  ##mb
      case 2:
      @$upload_data_mb=$uploadData[$i];
      @$download_data_mb=$downloadData[$i];
      @$data_transfer_mb=$dataTransfer[$i];
      break;
   ## gb
      case 3:

      @$upload_data_mb=$uploadData[$i]*1024;
      @$download_data_mb=$downloadData[$i]*1024;
      @$data_transfer_mb=$dataTransfer[$i]*1024;
      break;


    }

    switch($speed_unit[$i]) {
      /*gb*/
      case 3:
      @$upload_speed_kb=$uploadSpeed[$i]*1024*1024;
      @$download_speed_kb=$downloadSpeed[$i]*1024*1024;
      @$transfer_speed_kb=$transferSpeed[$i]*1024*1024;
      if($burst_mode[$i]==2)
      {
       @$burst_threshold_ul=$uploadSpeed[$i]*1024*1024*2;
       @$burst_threshold_dl=$downloadSpeed[$i]*1024*1024*2;
       @$transfer_burst_threshold=$transferSpeed[$i]*1024*1024*2;
     }
     break;
     case 2:
     /*mb*/
     @$upload_speed_kb=$uploadSpeed[$i]*1024;
     @$download_speed_kb=$downloadSpeed[$i]*1024;
     @$transfer_speed_kb=$transferSpeed[$i]*1024;
   // if($burst_mode[$i]==2)
   // {
   //   $burst_threshold_ul=$uploadSpeed[$i]*1024*2;
   //   $burst_threshold_dl=$downloadSpeed[$i]*1024*2;
   //   $transfer_burst_threshold=$transferSpeed[$i]*1024*2;
   // }
     break;
##kb
     case 1:
     $upload_speed_kb=$uploadSpeed[$i];
     $download_speed_kb=$downloadSpeed[$i];
     $transfer_speed_kb=$transferSpeed[$i];
  //  if($burst_mode[$i]==2)
  //  {
  //   $burst_threshold_ul=$uploadSpeed[$i]*2;
  //   $burst_threshold_dl=$downloadSpeed[$i]*2;
  //   $transfer_burst_threshold=$transferSpeed[$i]*2;
  // }
     break;
   }
##used to identify which plan is primary and which plan is secondry
   if($i==0)
   {
    $plan_category=1;
  }
  else
  {
    $plan_category=0;
  }
// switch($burst_mode[$i])
// {
//   ##custom
//       case 3:
//       {
//           $burst_limit_ul=$burst_limit_ul_a[$i];
//           $burst_limit_dl=$burst_limit_dl_a[$i];
//           $burst_time_ul=$burst_time_ul_a[$i];
//           $burst_time_dl= $burst_time_dl_a[$i];
//           $burst_threshold_ul=$burst_threshold_ul_a[$i];
//           $burst_threshold_dl=$burst_threshold_dl_a[$i];
//           $burst_priority=$burst_threshold_dl_a[$i];
//           $transfer_burst_threshold=0;
//           break;
//       }
//       ##disable
//       case 1:
//       {
//            $burst_limit_ul=0;
//           $burst_limit_dl=0;
//           $burst_time_ul=12;
//          $burst_time_dl=12;
//         $burst_threshold_ul=0;
//         $burst_threshold_dl=0;
//          $burst_priority=8;
//          $transfer_burst_threshold=0;
//         break;
//       }
//       ##double
//       case 2:
//       {
//          $burst_limit_ul=0;
//          $burst_limit_dl=0;
//      $burst_time_ul=12;
//     $burst_time_dl=12;
//     $burst_priority=4;
//         break;
//       }

// }
//##
// if($burst_mode=='double')
// {
//  $burst_limit_ul=0;
//  $burst_limit_dl=0;
//  $burst_time_ul=12;
//  $burst_time_dl=12;
//  $burst_priority=4;

// }

  $planParams=array(
    'name'=>$planName,
    'description'=>$planDescription,
    'plan_type'=>$planType,
    'upload_speed'=>$upload_speed_kb,
    'download_speed'=> $download_speed_kb,
    'transfer_speed'=>$transfer_speed_kb,
    'download_data_limit'=>$download_data_mb,
    'upload_data_limit'=>$upload_data_mb,
    'data_transfer_limit'=>$data_transfer_mb,
    'priority'=>$priority,
    'vacation_mode'=>$vacation_mode,
    'after_expire'=>$last_inserted_id,
    'burst_time_dl'=>$burst_time_dl_a[$i],
    'burst_time_ul'=>$burst_time_ul_a[$i],

    'burst_limit_ul'=>$burst_limit_ul_a[$i],
    'burst_limit_dl'=>$burst_limit_dl_a[$i],

    'burst_threshold_ul'=>$burst_threshold_ul_a[$i],
    'burst_threshold_dl'=>$burst_threshold_dl_a[$i],
    'total_burst_threshold'=>$burst_total_threshold_a[$i],
    'total_burst_limit'=>$burst_total_limit_a[$i],
    'total_burst_time'=>$burst_total_time_a[$i],
  // 'total_burst_threshold'=>$burst_total_thresahold_a,

    'burst_priority'=>$burst_priority_a[$i],
    'burst_mode'=>$burst_mode[$i],
    'status'=>$status,
    'plan_category'=>$plan_category,
    'data_unit'=>$data_unit[$i],
    'speed_unit'=>$speed_unit[$i],
    'limit_unit'=>$limit_unit[$i],
    'limit_in_no'=>$limit_in_no[$i],
    'repeat_mode'=>$repeat_mode[$i]




  );
  // echo json_encode($planParams);
  // die;
  $insert_plan_details = modules::run('api_call/api_call/call_api',''.api_url().'plan/addPlan',$planParams,'POST');
  if($insert_plan_details['status']=='success')
  {
// echo json_encode($planParams);
    $last_inserted_id=$insert_plan_details['last_inserted_id'];
    $planDayLimitParam=array(
      'plan_id'=> $last_inserted_id,
      'sunday'=>$sunday[$i],
      'monday'=>$monday[$i],
      'tuesday'=>$tuesday[$i],
      'wednesday'=>$wednesday[$i],
      'thrusday'=>$thrusday[$i],
      'friday'=>$friday[$i],
      'saturday'=>$saturday[$i]
    );
    if(!($start_hour[$i] && $start_minute[$i])){  $start_time=0 ; }else{  $start_time=$start_hour[$i].':'.$start_minute[$i];   }
    if(!($end_hour[$i] && $end_minute[$i])){  $end_time=0 ; }else{  $end_time=$end_hour[$i].':'.$end_minute[$i];   }
    $planTimeLimitParam=array(
      'start_time'=>$start_time,
      'end_time'=>$end_time,
      'plan_id'=>$last_inserted_id
    );
      ##map frenchise and plan
    $mapFrenchisePlan=array(
      'frenchise_id'=>$f_id,
      'plan_id'=>$last_inserted_id
    );
    // echo json_encode($mapFrenchisePlan);
    $insert_map_frenchise_plan=modules::run('api_call/api_call/call_api',''.api_url().'plan/mapFrenchisePlan',$mapFrenchisePlan,'POST');
    // echo json_encode($insert_map_frenchise_plan);
    $insert_plan_time_limit_details = modules::run('api_call/api_call/call_api',''.api_url().'plan/addPlanTimeLimit',$planTimeLimitParam,'POST');
    $insert_plan_day_limit_details = modules::run('api_call/api_call/call_api',''.api_url().'plan/addPlanDayLimit',$planDayLimitParam,'POST');
    // echo json_encode($insert_plan_time_limit_details);
  }
}
// die; 
$lengthValidity=count($validity);
for($j=0;$j<$lengthValidity;$j++)
{
  switch($validity_unit[$j])
  {
    /*1=days*/
    case 1:
    $validity_in_sec=$validity[$j]*86400;
    $validity_actual=$validity[$j];
    break;
    /*2=week*/
    case 2:
    $validity_in_sec=$validity[$j]*604800;
    $validity_actual=$validity[$j]*7;
    break;
    /*3=month*/
    case 3:
    $validity_in_sec=$validity[$j]*2592000;
    ##not perfect
    $validity_actual=$validity[$j]*30;
    break;
    /*year 365 days*/
    $validity_in_sec=$validity[$j]*31536000;
    $validity_actual=$validity[$j]*365;
  }


  $validityPriceParams=array(
    'plan_id'=>$last_inserted_id,
    'validity'=>$validity_in_sec,
    'amount'=>$amount[$j],
    'validity_type'=>$validity_unit[$j],
    'validity_actual'=>$validity_actual


  );
  $insert_plan_validity_details = modules::run('api_call/api_call/call_api',''.api_url().'plan/planAmountValidity',$validityPriceParams,'POST');

  // echo json_encode($insert_plan_validity_details);


} 

$this->session->alerts = array(
  'severity'=> 'success',
  'title'=> 'successfully added'

);






}



/*all function end*/
}
?>	