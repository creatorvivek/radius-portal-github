<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crn extends MY_Controller
{

 function __construct()
 {
  parent::__construct();
}



function add_crn()
{
  $data['title']="add customer relationship number";
  
  $data['_view'] = 'add';

  $this->load->view('index.php',$data);

}
function add_crn_process()
{
  $f_id=$this->session->f_id;
  $staff_id=$this->session->staff_id;
  $name = $this->input->post('name',true);
  $type=$this->input->post('type',true);
  $email = $this->input->post('email',true);
  $mobile = $this->input->post('mobile',true);
  $city = $this->input->post('p_city',true);
  
  $location = $this->input->post('p_address',true);
  $pincode = $this->input->post('pincode',true);
  // $username = $this->input->post('username',true);
  // $password = $this->input->post('password',true);
   $this->load->library('form_validation');
  
  $this->form_validation->set_rules('name','Name','required|trim|alpha_numeric_spaces');
  $this->form_validation->set_rules('type','Customer Type','required|trim');
  $this->form_validation->set_rules('email','Email','required|valid_email|trim');
  $this->form_validation->set_rules('p_address','Address','required|trim');
  $this->form_validation->set_rules('p_city','City','required|trim|alpha');
  $this->form_validation->set_rules('pincode','Address','required|trim|numeric');

  $this->form_validation->set_rules('mobile','Mobile number','required|max_length[10]|numeric');
  if($this->form_validation->run() )     
  {  
  $encrtyted_password=md5($password);
  $date=date('y-m-d H:i:s');
  $crnParams=array(

    'name' => $name,
    'type'=>$type,
    'email' =>$email,
    'mobile' => $mobile,
    'location' => $location,
    'pincode'=>$pincode,
    'f_id'=>$f_id,
    'city'=>$city,
    'created_at'=>$date
  );
  // var_dump($crnParams);
  $get_data=modules::run('api_call/api_call/call_api',''.api_url().'crn/addCrn',$crnParams,'POST');
  // if($get_data['status']=='success')
  // {
  //   $credentialParams=array(
  //     'username'=>$username,
  //     'password'=>$encrtyted_password,
  //     'clear_text'=>$password,
  //     'f_id'=>$f_id,
  //     'crn_number'=>$get_data['last_inserted_id'],
  //     'authorization_id'=>3,
  //     'api_key'=>123
  //   );
##send username and password in credential table
    // $result=modules::run('api_call/api_call/call_api',''.api_url().'crn/insertUserCredential',$credentialParams,'POST');
  if($get_data['status']=='success')
  {
    $activity='crn number = '.$get_data['last_inserted_id'].'  generated  ' ;
    $crn_number=$get_data['last_inserted_id'];
    $send_log=modules::run('reports/reports/user_log',$crn_number,$f_id,$activity,$staff_id);


    $this->session->alerts = array(
      'severity'=> 'success',
      'title'=> 'succesfully add'

    );
    redirect('crn/all_user_list');
  }
}
else
{
   $data['_view'] = 'add';

  $this->load->view('index.php',$data);
}
}


function all_user_list()
{

  $f_id=$this->session->f_id;
  $condition=array('f_id'=>$f_id,'type'=>1);
  $customer= modules::run('api_call/api_call/call_api',''.api_url().'crn/crnList',$condition,'POST');
  // var_dump($customer);die;
  try
  {
    if($customer=='')
    {
      throw new Exception("Server down", 1);
      log_error("caf/addCaf");

    }
    if(isset($customer['error']))
    {
      throw new Exception($customer['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }

  if($customer['status']=='success')
  {
    $data['customer']=$customer['data'];
    // $data['_view'] = 'allUsersList';
  // $this->load->view('index',$data);
  }
  elseif($customer['status']=='not found')
  {
    $data['customer']=[];
    
  }

  $condition=array('f_id'=>$f_id,'type'=>2);
  $frenchise= modules::run('api_call/api_call/call_api',''.api_url().'crn/crnList',$condition,'POST');
  // var_dump($frenchise);
  if($frenchise['status']=='success')
  {
    $data['frenchise']=$frenchise['data'];
    // $data['_view'] = 'allUsersList';
  // $this->load->view('index',$data);
  }
  elseif($frenchise['status']=='not found')
  {
    $data['frenchise']=[];
    // $data['_view'] = 'allUsersList';
  // $this->load->view('index',$data);
  }

  $data['_view'] = 'allUsersList';
  $this->load->view('index',$data);
}


function usernameCheck()
{
  $username=$this->input->post('username');
  $params=array('username'=>$username);
  $result= modules::run('api_call/api_call/call_api',''.api_url().'crn/usernameCheck',$params,'POST');
  if($result['status']=='success')
  {
    echo json_encode($result['data']);
  }
  elseif($result['status']=='not found')
  {
    $result['data']=[];
    echo json_encode($result['data']);
  }
}
function edit($id)
{

  $data['title']="Edit customer details";
  $params=array('crn_id'=>$id);

    ##details of group 
  $data['customer'] = modules::run('api_call/api_call/call_api',''.api_url().'crn/crnList',$params,'POST');
    // var_dump($get_data['group']['data'][0]['id']);die;
  if(isset($data['customer']['data'][0]['crn_id']))
  {
    $this->load->library('form_validation');


    $this->form_validation->set_rules('name','Name','required');
    if($this->form_validation->run() )     
    {   
      $f_id=$this->session->f_id;
      $name = $this->input->post('name',true);
      $type=$this->input->post('type',true);
            // 'username'=>$this->input->post('username'),
      $email = $this->input->post('email',true);
      $mobile = $this->input->post('mobile',true);
      $city = $this->input->post('p_city',true);

      $location = $this->input->post('p_address',true);
      $pincode = $this->input->post('pincode',true);
      // $username = $this->input->post('username');
      // $password = $this->input->post('password');
      $encrtyted_password=md5($password);
      $updateCrnParams=array(
        'crn_id'=>$data['customer']['data'][0]['crn_id'],
        'name' => $name,
        'type'=>$type,
        'email' =>$email,
        'mobile' => $mobile,
        'location' => $location,
        'pincode'=>$pincode,
        'f_id'=>$f_id,
        'city'=>$city
        
      );
        // var_dump($data['customer']['data'][0]['username']);die;
      $update_data = modules::run('api_call/api_call/call_api',''.api_url().'crn/updateCrn',$updateCrnParams,'POST');
      // var_dump($update_data);die;

      // $credentialParams=array(
      //   'username'=>$username,
      //   'password'=>$encrtyted_password,
      //   'clear_text'=>$password,
      //   'f_id'=>$f_id,
      //   'crn_number'=>$data['customer']['data'][0]['crn_id'],
      //   'authorization_id'=>3,
      //   'api_key'=>123
      // );
##send username and password in credential table
 ##if username is avilable so in edit username update but if username is null so new row created in authentiction table    
      // if(is_null($data['customer']['data'][0]['username']))   
      // { 
      //   $result=modules::run('api_call/api_call/call_api',''.api_url().'crn/insertUserCredential',$credentialParams,'POST');
      // }
      // else
      // {
      //     ##find id through username 
      //   $currentUsername=$data['customer']['data'][0]['username'];
      //   $uparams=array(
      //     'username'=>$currentUsername
      //   );
      //   $fetchuserid=modules::run('api_call/api_call/call_api',''.api_url().'crn/usernameCheck',$uparams,'POST');
      //   if($fetchuserid['status']=='success')
      //   {
      //    $credentialParamswithId=array(
      //     'username'=>$username,
      //     'password'=>$encrtyted_password,
      //     'clear_text'=>$password,
      //     'f_id'=>$f_id,
      //     'crn_number'=>$data['customer']['data'][0]['crn_id'],
      //     'authorization_id'=>3,
      //     'api_key'=>123,
      //     'id'=>$fetchuserid['data'][0]['id']
      //   );

      //    $result=modules::run('api_call/api_call/call_api',''.api_url().'crn/updateUserCredential',$credentialParamswithId,'POST');
         // var_dump($result);



      $this->session->alerts = array(
        'severity'=> 'success',
        'title'=> 'succesfully updated'

      );
      redirect('crn/all_user_list');





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

function quick_add()
{
 $data['_view'] = 'quickAdd';

 $this->load->view('index.php',$data);
 // $this->load->view('quickAdd');
}
function mobileCheck()
{
  $mobile=$this->input->post('mobile');
  $f_id=$this->session->f_id;
  $params=array('mobile'=>$mobile,'f_id'=>$f_id);
  $result= modules::run('api_call/api_call/call_api',''.api_url().'crn/mobileCheck',$params,'POST');
  if($result['status']=='success')
  {
    echo json_encode($result['data']);
  }
  else if($result['status']=='not found')
  {
   echo json_encode($result=[]);
 }

}
function quick_add_process()
{

  $fname=$this->input->post('fname',1);
  $lname=$this->input->post('lname',1);
  $name=$fname.' '.$lname;  
  // var_dump($name);die;
  $companyName=$this->input->post('company_name',1);
  ##c for contact
  // $contactHome=$this->input->post('c_home');
  // $contactOffice=$this->input->post('c_office');
  // $contactAlternate=$this->input->post('c_alternate');
  ## i for installaion
  $installaionAddress=$this->input->post('i_address',1);
  $installaionCity=$this->input->post('i_city',1);
  $installaionPincode=$this->input->post('i_pincode',1);
  $installaionLandmark=$this->input->post('i_landmark',1); 
 ## b for billing
  $billingAddress=$this->input->post('b_address',1);
  $billingCity=$this->input->post('b_city',1);
  $billingPincode=$this->input->post('b_pincode',1);
  $billingLandmark=$this->input->post('b_landmark',1); 
  ## p for permanent
  $perAddress=$this->input->post('p_address',1);
  $perCity=$this->input->post('p_city',1);
  $perPincode=$this->input->post('p_pincode',1);
  $perLandmark=$this->input->post('p_landmark',1);

  $primaryEmail=$this->input->post('email',1);
  // $secondryEmail=$this->input->post('s_email');
  $dob=$this->input->post('dob',1);
  $idProof=$this->input->post('id_proof',1);
  $addressProof=$this->input->post('address_proof',1);
  // $purpose=$this->input->post('purpose');
  $crn_number=$this->input->post('crn_number',1);
  $f_id=$this->session->f_id;
  // $username = $this->input->post('username',1);
  // $password = $this->input->post('password',1);
  // $encrtyted_password=md5($password);
  $contactMobile=$this->input->post('mobile',1);
  $plan_details=$this->input->post('plan',1);
  $plan_type=$this->input->post('plan_type',1);
  $planDetails=explode(",",$plan_details);;
  $plan_id=$planDetails[0];
  $plan_amount=$planDetails[1];
  $plan_actual_validity=$planDetails[2];
  $plan_name=$planDetails[3];
  $staff_id=$this->session->staff_id;
  ##check this mobile number crn number exist or not in database
  $mobileParams=array('mobile'=>$contactMobile,'f_id'=>$f_id);
  $result_mobile_validation= modules::run('api_call/api_call/call_api',''.api_url().'crn/mobileCheck',$mobileParams,'POST');
  // var_dump($result_mobile_validation);die;
  // print_r($plan_details);
  // $e=explode(",",$plan_details);
  // print_r($e);
  // $plan_details=[1,2,3,4];
  //  if($plan_details && $plan_type){

  //         $planDetails=explode(",",$plan_details);;
  //         $plan_id=$planDetails[0];
  //         $plan_amount=$planDetails[1];
  //         $plan_actual_validity=$planDetails[2];
  //         $plan_name=$planDetails[3];
  //         $start_date= date('Y-m-d H:i:s');
  //         $end_date=date('Y-m-d H:i:s',strtotime($start_date.'+'.$plan_actual_validity.'days'));

  //         // $end_date=$this->input->post('end_date');
  //         // $plan_name=$this->input->post('plan_name');
  //         // $plan_cost=$this->input->post('plan_cost');
  //   $assignPlan=array('plan_id'=>$plan_id,'caf_id'=>$result_caf['last_inserted_id'],'start_date'=>$start_date,'end_date'=>$end_date,'recharge_date'=>$start_date,'radius_username'=>$username,'amount'=>$plan_amount,'plan_name'=>$plan_name);
  //   // print_r($assignPlan);die;
  // }
  if($result_mobile_validation['status']=='success')
  {
    // var_dump($result_mobile_validation);
    $crn_number=$result_mobile_validation['data'][0]['crn_id'];

  }
  else
  {

    $crnParams=array(
      'name'=>$name, 
      'mobile'=>$contactMobile,
      'location'=>$perAddress,
      'city'=>$perCity,
      'pincode'=>$perPincode,
      'landmark'=>$perLandmark,
      'email'=>$primaryEmail,
      'f_id'=>$f_id,
      'type'=>1,
      'created_at'=>date('y-m-d H:i:s')


    );
  // var_dump($crnParams);
    $get_data=modules::run('api_call/api_call/call_api',''.api_url().'crn/addCrn',$crnParams,'POST');
    if($get_data['status']=='success')
    {
      $crn_number=$get_data['last_inserted_id'];
    }
  }
  $cafParams=array(
    'name'=>$name, 
    'company_name'=>$companyName,

    // 'contact_home'=>$contactHome,
    // 'contact_office'=>$contactOffice,
    // 'contact_alternate'=>$contactAlternate,
    'primary_email'=>$primaryEmail,
    'installation_address'=>$installaionAddress,
    'i_add_city'=>$installaionCity,
    'i_add_pincode'=>$installaionPincode,
    'i_add_landmark'=>$installaionLandmark,

    'billing_address'=>$billingAddress,
    'b_add_city'=>$billingCity,
    'b_add_pincode'=>$billingPincode,
    'b_add_landmark'=>$billingLandmark,
    'f_id'=>$f_id,
    'contact_mobile'=> $contactMobile,
    'permanent_address'=>$perAddress,
    'p_add_city'=>$perCity,
    'p_add_pincode'=>$perPincode,
    'p_add_landmark'=>$perLandmark,
    'dob'=>$dob,
    'address_proof'=>$addressProof,
    'id_proof'=>$idProof,
    'caf_plan_id'=> $plan_id,
    'caf_plan_name'=>$plan_name,
    
    'crn_number'=>$crn_number,
    'plan_type'=>$plan_type
  );
  $result_caf=modules::run('api_call/api_call/call_api',''.api_url().'caf/addCaf',$cafParams,'POST');
  $frenchiseParam=array('id'=>$f_id);
  $get_frenchise_short_name=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/listFrenchiseSession',$frenchiseParam,'POST');
  if($get_frenchise_short_name['status']='success'){
    $f_short_name=$get_frenchise_short_name['data'][0]['short_name'];
  }
  else
  {
   $f_short_name= $f_id;
 }
  ##randomly generate username and password

 $username=$f_short_name.'_'.time();
 $password=rand(1,1000).rand(1,9000);
 $encrtyted_password=md5($password);
 if($result_caf['status']=='success')
 {
  $credentialParams=array(
    'username'=>$username,
    'password'=>$encrtyted_password,
    'clear_text'=>$password,
    'f_id'=>$f_id,
    'crn_number'=>$crn_number,
    'caf_id'=>$result_caf['last_inserted_id'],
    'authorization_id'=>3,
    'api_key'=>123
  );

  $radiusParams=array(
   'username'=>$username,
   'password'=>$encrtyted_password,
   'clear_text'=>$password,
   'caf_id'=>$result_caf['last_inserted_id']
 );
##send username and password in credential table
  $resultPortalLogin=modules::run('api_call/api_call/call_api',''.api_url().'crn/insertUserCredential',$credentialParams,'POST');
  $resultRadiusLogin=modules::run('api_call/api_call/call_api',''.api_url().'crn/insertUserCredentialRadius',$radiusParams,'POST');

     ##send sms to frenchise
  $smsParam=array(
    'mobile'=>$contactMobile,
    'username'=>$username,
    'password'=>$password,
    'f_id'=>$f_id,
    'module'=>'ieee user credential',
  );
  $sms=modules::run('sms/sms/send_sms_notification',$smsParam,'POST');
    ##send email to frenchise
  $emailParam=array(
    'email'=>$primaryEmail,
    'username'=>$username,
    'password'=>$password,
    'f_id'=>$f_id,
    'module'=>'ieee user credential',
  );
  $email=modules::run('email/email/send_email_notification',$emailParam,'POST');

     ##send log
  $activity='Caf number = '.$result_caf['last_inserted_id'].' & crn number = '.$crn_number.'  generated by quick add   ' ;

  $send_log=modules::run('reports/reports/user_log',$crn_number,$f_id,$activity,$staff_id);
  /*--/log--*/
      ##initiate balance table of customer
  $balanceParams=array(
    'caf_id'=>$result_caf['last_inserted_id'],
    'balance'=>0

  );
  $initiateAccount=modules::run('api_call/api_call/call_api',''.api_url().'account/initiateCustomerAccount',$balanceParams,'POST');
         ##assign plan to user 
  // if($plan_details && $plan_type){
  //   if($plan_type==1)
  //   {
  //     $planDetails=explode(",",$plan_details);;
  //     $plan_id=$planDetails[0];
  //     $plan_amount=$planDetails[1];
  //     $plan_actual_validity=$planDetails[2];
  //     $plan_name=$planDetails[3];
  //         $start_date= date('Y-m-d H:i:s');
  //         $end_date=date('Y-m-d H:i:s',strtotime($start_date.'+'.$plan_actual_validity.'days'));

  //         $end_date=$this->input->post('end_date');
  //         $plan_name=$this->input->post('plan_name');
  //         $plan_cost=$this->input->post('plan_cost');
  //   $assignPlan=array('plan_id'=>$plan_id,'caf_id'=>$result_caf['last_inserted_id'],'start_date'=>$start_date,'end_date'=>$end_date,'recharge_date'=>$start_date,'radius_username'=>$username,'amount'=>$plan_amount,'plan_name'=>$plan_name);
  //   $initiateAccount=modules::run('api_call/api_call/call_api',''.api_url().'plan/assignPlan',$assignPlan,'POST');
  //   }
  // }
  $this->session->alerts = array(
    'severity'=> 'success',
    'title'=> 'succesfully registered'

  );
  redirect('crn/quick_add');

}

  // echo '<pre>';
  // var_dump($crnParams);
}

function getCrnNumber()

{
  $f_id=$this->session->f_id;
  $condition=array('f_id'=>$f_id);
  $customer= modules::run('api_call/api_call/call_api',''.api_url().'crn/crnList',$condition,'POST');
  echo json_encode($customer['data']);

}







}
?>	