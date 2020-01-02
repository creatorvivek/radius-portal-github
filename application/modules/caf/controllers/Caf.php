<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Caf extends MY_Controller
{

 function __construct()
 {
  parent::__construct();
}



function add_caf()
{
  $data['title']='customer application form'  ;
  if($this->input->get('crn'))
  {
    $data['crn']=$this->input->get('crn');
    $data['mobile']=$this->input->get('mobile');
    $data['name']=$this->input->get('name');
    $data['email']=$this->input->get('email');

  }
  else
  {
     $data['crn']='';
    $data['mobile']='';
    $data['name']='';
    $data['email']='';

  }
  $data['_view'] = 'add';

  $this->load->view('index.php',$data);

}
function add_caf_process()
{
  $fname=$this->input->post('fname',true);
  $lname=$this->input->post('lname',true);
  $name=$fname.' '.$lname;  
  // var_dump($name);die;
  $companyName=$this->input->post('com_name',true);
  ##c for contact
  $contactHome=$this->input->post('c_home',true);
  $contactOffice=$this->input->post('c_office',true);
  $contactMobile=$this->input->post('c_mobile',true);
  $contactAlternate=$this->input->post('c_alternate',true);
  ## i for installaion
  $installaionAddress=$this->input->post('i_address',true);
  $installaionCity=$this->input->post('i_city',true);
  $installaionPincode=$this->input->post('i_pincode',true);
  $installaionLandmark=$this->input->post('i_landmark',true); 
 ## b for billing
  $billingAddress=$this->input->post('b_address',true);
  $billingCity=$this->input->post('b_city',true);
  $billingPincode=$this->input->post('b_pincode',true);
  $billingLandmark=$this->input->post('b_landmark',true); 
  ## p for permanent
  $perAddress=$this->input->post('p_address',true);
  $perCity=$this->input->post('p_city',true);
  $perPincode=$this->input->post('p_pincode',true);
  $perLandmark=$this->input->post('p_landmark',true);

  $primaryEmail=$this->input->post('p_email',true);
  $secondryEmail=$this->input->post('s_email',true);
  $dob=$this->input->post('dob',true);
  $idProof=$this->input->post('id_proof',true);
  $addressProof=$this->input->post('address_proof',true);
  $purpose=$this->input->post('purpose',true);
  $crn_number=$this->input->post('crn_number',true);
  $plan_details=$this->input->post('plan',true);
  $plan_type=$this->input->post('plan_type',true);
  $f_id=$this->session->f_id;
  $planDetails=explode(",",$plan_details);;
  $plan_id=$planDetails[0];
  $plan_amount=$planDetails[1];
  $plan_actual_validity=$planDetails[2];
  $plan_name=$planDetails[3];

   $this->load->library('form_validation');
  
  $this->form_validation->set_rules('fname','First Name','required|trim|alpha_numeric_spaces');
  $this->form_validation->set_rules('dob','date of birth','required|trim');
  $this->form_validation->set_rules('p_email','Primary Email','required|valid_email|trim');
  $this->form_validation->set_rules('s_email','Secondry Email','valid_email|trim');
  $this->form_validation->set_rules('p_address','Address','required|trim');
  $this->form_validation->set_rules('p_city','City','required|trim|alpha');
  $this->form_validation->set_rules('p_pincode','pincode','required|trim|numeric');
  $this->form_validation->set_rules('p_landmark','landmark','trim');

  $this->form_validation->set_rules('b_address','Address','required|trim');
  $this->form_validation->set_rules('b_city','City','required|trim|alpha');
  $this->form_validation->set_rules('b_pincode','pincode','required|trim|numeric');
  $this->form_validation->set_rules('b_landmark','landmark','trim');

   $this->form_validation->set_rules('i_address','Address','required|trim');
  $this->form_validation->set_rules('i_city','City','required|trim|alpha');
  $this->form_validation->set_rules('i_pincode','pincode','required|trim|numeric');
  $this->form_validation->set_rules('i_landmark','landmark','trim');

  $this->form_validation->set_rules('c_home','Mobile number','max_length[10]|numeric');
  $this->form_validation->set_rules('c_office','Mobile number','max_length[10]|numeric');
  $this->form_validation->set_rules('c_alternative','Mobile number','max_length[10]|numeric');
  $this->form_validation->set_rules('c_mobile','Mobile number','required|max_length[10]|numeric');

   $this->form_validation->set_rules('id_proof','id proof','trim');
   $this->form_validation->set_rules('address_proof','address proof','trim');



  if($this->form_validation->run() )     
  {  
  // $username = $this->input->post('username');
  // $password = $this->input->post('password');
  // $encrtyted_password=md5($password);
  $staff_id=$this->session->staff_id;

  $params=array(
    'name'=>$name, 
    'company_name'=>$companyName,
    'contact_mobile'=>$contactMobile,
    'contact_home'=>$contactHome,
    'contact_office'=>$contactOffice,
    'contact_alternate'=>$contactAlternate,

    'installation_address'=>$installaionAddress,
    'i_add_city'=>$installaionCity,
    'i_add_pincode'=>$installaionPincode,
    'i_add_landmark'=>$installaionLandmark,

    'billing_address'=>$billingAddress,
    'b_add_city'=>$billingCity,
    'b_add_pincode'=>$billingPincode,
    'b_add_landmark'=>$billingLandmark,

    'permanent_address'=>$perAddress,
    'p_add_city'=>$perCity,
    'p_add_pincode'=>$perPincode,
    'p_add_landmark'=>$perLandmark,

    'primary_email'=>$primaryEmail,
    'secondry_email'=>$secondryEmail,
    'dob'=>$dob,
    'address_proof'=>$addressProof,
    'id_proof'=>$idProof,
    'connection_purpose'=>$purpose,
    'crn_number'=>$crn_number,
    'f_id'=>$f_id,
    'plan_type'=>$plan_type,
    'caf_plan_id'=>$plan_id,
    'caf_plan_name'=>$plan_name,
    'created_at'=>date('y-m-d H:i:s')

  );
  // echo '<pre>';
  // var_dump($params);die;
  $get_data=modules::run('api_call/api_call/call_api',''.api_url().'caf/addCaf',$params,'POST');
  try
  {
    if($get_data=='')
    {
      throw new Exception("server down", 1);
      log_error("caf/addCaf");
      
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
 
  $frenchiseParam=array('id'=>$f_id);
  ##take short name of frenchise as a prefix in iiiet username credential
  $get_frenchise_short_name=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/listFrenchiseSession',$frenchiseParam,'POST');
  if($get_frenchise_short_name['status']='success'){
    $f_short_name=$get_frenchise_short_name['data'][0]['short_name'];
  }
  else
  {
    $f_short_name=$f_id.'_';
  }
  if($get_data['status']=='success')
  {
    ##randomly generate username and password

    $username=$f_short_name.'_'.time();
    $password=rand(1,1000).rand(1,9000);
    $encrpted_password=md5($password);
    $credentialParams=array(
      'username'=>$username,
      'password'=>$encrpted_password,
      'clear_text'=>$password,
      'f_id'=>$f_id,
      'crn_number'=>$crn_number,
      'caf_id'=>$get_data['last_inserted_id'],
      'authorization_id'=>3,
      'api_key'=>123
    );

    $radiusParams=array(
     'username'=>$username,
     'password'=>$encrpted_password,
     'clear_text'=>$password,
     'caf_id'=>$get_data['last_inserted_id']
   );


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
    $activity='Caf number = '.$get_data['last_inserted_id'].'  generated  ' ;

    $send_log=modules::run('reports/reports/user_log',$crn_number,$f_id,$activity,$staff_id);


##send username and password in credential table
    $resultPortalLogin=modules::run('api_call/api_call/call_api',''.api_url().'crn/insertUserCredential',$credentialParams,'POST');
    $resultRadiusLogin=modules::run('api_call/api_call/call_api',''.api_url().'crn/insertUserCredentialRadius',$radiusParams,'POST');

      ##initiate balance table of customer
    $balanceParams=array(
      'caf_id'=>$get_data['last_inserted_id'],
      'balance'=>0

    );
    $initiateAccount=modules::run('api_call/api_call/call_api',''.api_url().'account/initiateCustomerAccount',$balanceParams,'POST');
       ##assign plan to user 
    /*if($plan_details && $plan_type){
      $planDetails=explode(",",$plan_details);;
      $plan_id=$planDetails[0];
      $plan_amount=$planDetails[1];
      $plan_actual_validity=$planDetails[2];
      $plan_name=$planDetails[3];
      $start_date= date('Y-m-d H:i:s');
      $end_date=date('Y-m-d H:i:s',strtotime($start_date.'+'.$plan_actual_validity.'days'));
      
          // $end_date=$this->input->post('end_date');
          // $plan_name=$this->input->post('plan_name');
          // $plan_cost=$this->input->post('plan_cost');
      $assignPlan=array('plan_id'=>$plan_id,'caf_id'=>$get_data['last_inserted_id'],'start_date'=>$start_date,'end_date'=>$end_date,'recharge_date'=>$start_date,'radius_username'=>$username,'amount'=>$plan_amount,'plan_name'=>$plan_name);
      $initiateAccount=modules::run('api_call/api_call/call_api',''.api_url().'plan/assignPlan',$assignPlan,'POST');
    }*/
    $this->session->alerts = array(
      'severity'=> 'success',
      'title'=> 'successfully caf generated'

    );
    redirect('caf/all_caf_list');

  }
}
else
{

 $data['title']='customer application form'  ;
  if($this->input->get('crn'))
  {
    $data['crn']=$this->input->get('crn');
    $data['mobile']=$this->input->get('mobile');
    $data['name']=$this->input->get('name');
    $data['email']=$this->input->get('email');

  }
  else
  {
     $data['crn']='';
    $data['mobile']='';
    $data['name']='';
    $data['email']='';

  }
  $data['_view'] = 'add';

  $this->load->view('index.php',$data);


}
}
#get id proof and address proof credential (ajax call)
function masterProof()
{
  // $f_id=$this->session->f_id;
  // $params=array('f_id'=>'');
  $get_data=modules::run('api_call/api_call/call_api',''.api_url().'caf/masterProof',0,'GET');
  if($get_data['status']=='success')
  {
    echo json_encode($get_data['data']);
  }

}
function all_caf_list()
{
  $f_id=$this->session->f_id;
  
  if($this->input->get())
  {
    $data['title']='active caf';
    $condition=array('f_id'=>$f_id,'status'=>1);

  }
  else{
    $data['title']='all caf list';
    $condition=array('f_id'=>$f_id);
  }
  $customer= modules::run('api_call/api_call/call_api',''.api_url().'caf/fetchCaf',$condition,'POST');
  
  try
  {
    if($customer=='')
    {
      throw new Exception("server down", 1);
      log_error("group/groupList function error");

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
    $data['caf']=$customer['data'];
  }
  elseif($customer['status']=='not found')
  {
    $data['caf']=[];
    
    
  }
  $data['_view'] = 'allCafList';
  $this->load->view('index',$data);

}

function edit($id)
{
  $data['title']="Edit customer details";
  $params=array('id'=>$id);

    ##details of group 
  $data['caf'] = modules::run('api_call/api_call/call_api',''.api_url().'caf/fetchCaf',$params,'POST');
  try
  {
    if($data['caf']=='')
    {
      throw new Exception("server down", 1);
      

    }
    if(isset($data['caf']['error']))
    {
      throw new Exception($data['caf']['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }
  if(isset($data['caf']['data'][0]['id']))
  {
    $this->load->library('form_validation');


    $this->form_validation->set_rules('fname','Name','required');
    $this->form_validation->set_rules('fname','Name','trim');
    if($this->form_validation->run() )     
    {   



      $fname=$this->input->post('fname',true);
      $lname=$this->input->post('lname',true);
      $name=$fname.' '.$lname;  
  // var_dump($name);die;
      $companyName=$this->input->post('com_name',true);
  ##c for contact
      $contactHome=$this->input->post('c_home',true);
      $contactOffice=$this->input->post('c_office',true);
      $contactMobile=$this->input->post('c_mobile',true);
      $contactAlternate=$this->input->post('c_alternate',true);
  ## i for installaion
      $installaionAddress=$this->input->post('i_address',true);
      $installaionCity=$this->input->post('i_city',true);
      $installaionPincode=$this->input->post('i_pincode',true);
      $installaionLandmark=$this->input->post('i_landmark',true); 
 ## b for billing
      $billingAddress=$this->input->post('b_address',true);
      $billingCity=$this->input->post('b_city',true);
      $billingPincode=$this->input->post('b_pincode',true);
      $billingLandmark=$this->input->post('b_landmark',true); 
  ## p for permanent
      $perAddress=$this->input->post('p_address',true);
      $perCity=$this->input->post('p_city',true);
      $perPincode=$this->input->post('p_pincode',true);
      $perLandmark=$this->input->post('p_landmark',true);

      $primaryEmail=$this->input->post('p_email',true);
      $secondryEmail=$this->input->post('s_email',true);
      $dob=$this->input->post('dob',true);
      $idProof=$this->input->post('id_proof',true);
      $addressProof=$this->input->post('address_proof',true);
      $purpose=$this->input->post('purpose',true);
      $crn_number=$this->input->post('crn_number',true);
      $f_id=$this->session->f_id;
      $params=array(
        'name'=>$name, 
        'company_name'=>$companyName,
        'contact_mobile'=>$contactMobile,
        'contact_home'=>$contactHome,
        'contact_office'=>$contactOffice,
        'contact_alternate'=>$contactAlternate,

        'installation_address'=>$installaionAddress,
        'i_add_city'=>$installaionCity,
        'i_add_pincode'=>$installaionPincode,
        'i_add_landmark'=>$installaionLandmark,

        'billing_address'=>$billingAddress,
        'b_add_city'=>$billingCity,
        'b_add_pincode'=>$billingPincode,
        'b_add_landmark'=>$billingLandmark,

        'permanent_address'=>$perAddress,
        'p_add_city'=>$perCity,
        'p_add_pincode'=>$perPincode,
        'p_add_landmark'=>$perLandmark,

        'primary_email'=>$primaryEmail,
        'secondry_email'=>$secondryEmail,
        'dob'=>$dob,
        'address_proof'=>$addressProof,
        'id_proof'=>$idProof,
        'connection_purpose'=>$purpose,
        'crn_number'=>$crn_number,
        'f_id'=>$f_id,
        'id'=>$data['caf']['data'][0]['id']

      );

      $get_data=modules::run('api_call/api_call/call_api',''.api_url().'caf/updateCaf',$params,'POST');
      // var_dump($get_data);die;

      
      $this->session->alerts = array(
        'severity'=> 'success',
        'title'=> 'succesfully update'

      );
      redirect('caf/all_caf_list');

      



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

function get_caf($id)
{
 $params=array('id'=>$id);

    ##details of group 
 $result = modules::run('api_call/api_call/call_api',''.api_url().'caf/fetchCaf',$params,'POST');
 try
 {
  if($result=='')
  {
    throw new Exception("server down", 1);
    

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
$data['caf']=$result['data'][0];
 //  echo '<pre>';
 // print_r($data['caf']);
 // die;
 // $data['_view'] = 'cafPdf';

$this->load->view('caf_pdf2',$data);



}
function one_time_installment_form()
{
  $data['caf']=$this->uri->segment(3);
  $staff_params=array(
    'f_id'=>''
  );
  $get_payment_mode=modules::run('api_call/api_call/call_api',''.api_url().'recharge/fetchpaymentType',$staff_params,'POST');
  if($get_payment_mode['status']=='success')
  {
    $data['payment_type']=$get_payment_mode['data'];
  }
  else{
   $data['payment_type']=[];
 }
 $data['_view'] = 'installation_form';

 $this->load->view('index.php',$data);

}
function add_installment_fee()
{
  $f_id=$this->session->f_id;

  $caf=$this->input->post('caf');

  $price=$this->input->post('price');
  $item_name=$this->input->post('item_name');
  $policy=$this->input->post('policy');
  $paid=$this->input->post('paid');
  $pay_type=$this->input->post('pay_type');
  $attend_type=$this->input->post('attend_type');
  $item_name_array=explode(",",$item_name);
  $price_array=explode(",",$price);
  $policy_array=explode(",",$policy);
  $length=count($item_name_array);
  for($i=0;$i<$length;$i++)

  {
    $params=array(
      'price'=>$price_array[$i],
      'policy'=>$policy_array[$i],
      'item'=>$item_name[$i],
      'f_id'=>$f_id,
      'caf'=>$caf,
      'date'=>date('y-m-d H:i:s')

    );
  ##modify will ocure in future
    $result = modules::run('api_call/api_call/call_api',''.api_url().'caf/addInstallmentFee',$params,'POST');
  // var_dump($params);
  // var_dump($result);/
  }
  $particularParam=array(
    'particular'=>$item_name_array,
    'price'=> $price_array
  );

  ##fetch user information by caf number
  $cafParams=array('id'=>$caf);
  $cafDetails = modules::run('api_call/api_call/call_api',''.api_url().'caf/fetch_details_by_caf',$cafParams,'POST');
  if($cafDetails['status']='success'){
    $cust_name=$cafDetails['data'][0]['name'];
    $cust_mobile=$cafDetails['data'][0]['contact_mobile'];
    $username=$cafDetails['data'][0]['username'];

  }
  modules::run('account/account/collect_information_invoices',$username,$particularParam);
  if($paid>0)
  {
    $paidParams=array(
      'username'=>$username,
      'name'=>$cust_name,
      'mobile'=>$cust_mobile,
      'paid_amount'=>$paid,
      'pay_type'=>$pay_type,
      'attend_type'=>$attend_type,

    );
    echo modules::run('account/account/reciept',$paidParams);
  }
// ##on caf active status
  $statusParams=array('status'=>1,'caf_id'=>$caf);

  $cafDetails = modules::run('api_call/api_call/call_api',''.api_url().'caf/activeStatus',$statusParams,'POST');

  $this->session->alerts = array(
    'severity'=> 'success',
    'title'=> 'succesfully active this caf id'

  );
  redirect('caf/all_caf_list');
}

function test()   
{
  // show_error('error','404','error');
  show_db($page='error/exception',$log_error='not wwfound');
  // log_message('1',"error found","syntax");
}


function activate_caf($caf_id,$plan_type)
{
// echo $plan_type;
    ##details of group 
  $params=array('id'=>$caf_id);
// $result['data'][0]['plan_type']=3;
  $result = modules::run('api_call/api_call/call_api',''.api_url().'caf/fetchCaf',$params,'POST');
// die;
 // print_r($result);
  try
  {
    if($result=='')
    {
      throw new Exception("server down", 1);
      

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

  if($result['data'][0]['plan_type']==1) 
  {
   $planParams=array('caf_id'=>$caf_id);
         // var_dump($planParams);
   $plan_detail= modules::run('api_call/api_call/call_api',''.api_url().'plan/latest_plan_search',$planParams,'POST');
            // print_r($plan_detail);die;
   if($plan_detail['status']=='not found')
   {
       $this->session->alerts = array(
      'severity'=> 'warning',
      'title'=> 'first assign plan'

    );
     redirect('recharge/recharge_panel/'.$caf_id);
     die;
   }
   else
   {
    $statusParams=array('status'=>1,'caf_id'=>$caf_id);

    $cafDetails = modules::run('api_call/api_call/call_api',''.api_url().'caf/activeStatus',$statusParams,'POST');
  }
} 
if($result['data'][0]['plan_type']==2)
{
  $planParams=array('caf_id'=>$caf_id);
         // var_dump($planParams);
  $plan_detail= modules::run('api_call/api_call/call_api',''.api_url().'plan/latest_plan_search',$planParams,'POST');
            // print_r($plan_detail);die;
  if($plan_detail['status']=='not found')
  {
   $this->session->alerts = array(
    'severity'=> 'warning',
    'title'=> 'first assign plan '

  );
   redirect('plan/assign_plan/'.$caf_id.'/'.$plan_type);
   die;
 }
  $statusParams=array('status'=>1,'caf_id'=>$caf_id);

  $cafDetails = modules::run('api_call/api_call/call_api',''.api_url().'caf/activeStatus',$statusParams,'POST');
}
if($result['data'][0]['plan_type']==3)
{
  $fParams=array('f_id'=>$this->session->f_id);
  $frenchise_account=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/list_frenchise_account',$fParams,'POST');
  try
  {
    if($frenchise_account=='')
    {
      throw new Exception("server down", 1);
      log_error("account/list_frenchise_account function error");

    }
    if(isset($frenchise_account['error']))
    {
      throw new Exception($frenchise_account['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }
  $frenchise_billing_date=$frenchise_account['data'][0]['billing_cycle'];
  $current_date_day=date('d');
    ## search current plan if exists

  $planParams=array('caf_id'=>$caf_id);
         // var_dump($planParams);
  $plan_detail= modules::run('api_call/api_call/call_api',''.api_url().'plan/latest_plan_search',$planParams,'POST');
            // print_r($plan_detail);die;
  if($plan_detail['status']=='not found')
  {
   $this->session->alerts = array(
    'severity'=> 'warning',
    'title'=> 'first assign plan '

  );
   redirect('plan/assign_plan/'.$caf_id.'/'.$plan_type);
   die;
 }
 else
 {
  $plan_monthly_amount=$plan_detail['data']['amount'];
  $date=date('y-m-d');
  // echo '<br>';
  $year=date('Y',strtotime($date));
  $month=date('m',strtotime($date));
  // echo $year;
  $day_in_month=cal_days_in_month(CAL_GREGORIAN,$month,$year);
  // echo $day_in_month;
  $one_day_rate=$plan_monthly_amount/$day_in_month;
  $one_day_rate_int=round($one_day_rate);
  if($frenchise_billing_date>$current_date_day)
  {
  $date1=date_create(date('Y-m-'.$frenchise_billing_date.''));
  }
  else
  {
    $this->load->helper('user_helper');
     $startDate=date_create(date('Y-m-'.$frenchise_billing_date.''));
     // print
    $startDate;  
    $nMonths = 1; // choose how many months you want to move ahead
    $dateOneMonthAhead = endCycle($startDate->date,$nMonths); 
    // print_r($date1);die;//
    $date1=date_create($dateOneMonthAhead);
  }
  $date2=date_create(date('Y-m-'.$current_date_day.''));
  $diff=date_diff($date1,$date2);
  // echo '<pre>';
  // print_r($diff);
  $difference_in_date=$diff->format('%a');
  echo $difference_in_date;
// die;

// echo round($datediff / (60 * 60 * 24));
//  $difference_in_date=7;
 ##fetch username through caf
  $cafParams=array('id'=>$caf_id);
  $caf_details=modules::run('api_call/api_call/call_api',''.api_url().'caf/fetch_details_by_caf',$cafParams,'POST');
    // print_r($caf_details);die;
  try
  {
    if($caf_details=='')
    {
      throw new Exception("server down", 1);
      log_error("account/list_frenchise_account function error");

    }
    if(isset($caf_details['error']))
    {
      throw new Exception($caf_details['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }
  $username=$caf_details['data'][0]['username'];

  echo $partial_invoice_amount=$difference_in_date*$one_day_rate_int;
  $particular=array('particular'=>['advance rental'],'price'=> [$partial_invoice_amount]);

  modules::run('account/account/collect_information_invoices',$username,$particular);
  $statusParams=array('status'=>1,'caf_id'=>$caf_id);

  $cafDetails = modules::run('api_call/api_call/call_api',''.api_url().'caf/activeStatus',$statusParams,'POST');

}
}
$this->session->alerts = array(
  'severity'=> 'success',
  'title'=> 'succesfully activate '

);
redirect('caf/all_caf_list');

}

function deactivate_caf($caf_id)
{
  $statusParams=array('status'=>0,'caf_id'=>$caf_id);

  $cafDetails = modules::run('api_call/api_call/call_api',''.api_url().'caf/activeStatus',$statusParams,'POST');

  $this->session->alerts = array(
    'severity'=> 'success',
    'title'=> 'succesfully deactivated '

  );
  redirect('caf/all_caf_list');
}







function testcaf($id)
{
  $params=array('id'=>$id);

    ##details of group 
 $result = modules::run('api_call/api_call/call_api',''.api_url().'caf/fetchCaf',$params,'POST');
 try
 {
  if($result=='')
  {
    throw new Exception("server down", 1);
    

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
$data['caf']=$result['data'][0];
  $this->load->view('caf_pdf2',$data);
}











/*end of class*/
}
?>	