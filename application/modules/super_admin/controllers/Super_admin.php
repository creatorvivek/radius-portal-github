<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Super_admin extends MY_Controller
{

 function __construct()
 {
  parent::__construct();
}



function dashboard()
{
  $data['_view'] = 'dashbord';
  $this->load->view('sindex',$data);

}
function dashBoardCounting()
{
  $f_id=$this->session->f_id;
  $staff_id=$this->session->staff_id;
  $group_id=$this->session->group_id;
  
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
  $totalFrenchiseCount=modules::run('api_call/api_call/call_api',''.api_url().'Super_admin/frenchiseCount',0,'GET');
  $data['totalFrenchiseCount']=$totalFrenchiseCount['data'];
  $totalCustomerCount=modules::run('api_call/api_call/call_api',''.api_url().'super_admin/customerCount',0,'GET');
  $data['totalCustomerCount']=$totalCustomerCount['data'];
  // var_dump( $data['totalFrenchiseCount']);
//   $totalOpenTicketCount=modules::run('api_call/api_call/call_api',''.api_url().'ticket/countingTickets',$totalOpenTicketParams,'POST');
//   $data['totalOpenTicketCount']=$totalOpenTicketCount['data'];
//   $totalCloseTicketCount=modules::run('api_call/api_call/call_api',''.api_url().'ticket/countingTickets',$totalCloseTicketParams,'POST');
//   $data['totalCloseTicketCount']=$totalCloseTicketCount['data'];
//   $myOpenTicketCount=modules::run('api_call/api_call/call_api',''.api_url().'ticket/myTicketsCount',$MyOpenTicketParams,'POST');
// // $data['myOpenTicketCount']=$myOpenTicketCount['data'];
//   $myOpenTicketCountByGroup=modules::run('api_call/api_call/call_api',''.api_url().'ticket/myTicketsCount',$MyOpenTicketParamsByGroup,'POST');
//   $data['myOpenTicketCount']=$myOpenTicketCount['data']+$myOpenTicketCountByGroup['data'];
//   $myCloseTicketCount=modules::run('api_call/api_call/call_api',''.api_url().'ticket/myTicketsCount',$MyCloseTicketParams,'POST');
//   $data['myCloseTicketCount']=$myCloseTicketCount['data'];
//   ##count number of customer
//   $totalCustomerCount=modules::run('api_call/api_call/call_api',''.api_url().'caf/cafCount',$totalTicketParams,'POST');
//   $data['totalCustomer']=$totalCustomerCount['data'];
//   ##count active customer
//   $activeCustomerCount=modules::run('api_call/api_call/call_api',''.api_url().'caf/cafCount',$activeCustomerParam,'POST');
//   $data['activeCustomer']=$activeCustomerCount['data'];
//   ##total credit
//   $totalCreditCount=modules::run('api_call/api_call/call_api',''.api_url().'account/totalCredit',$totalTicketParams,'POST');
//   $data['total_credit']=$totalCreditCount['data']['credit'];
//   ##number of invoice count
//   $totalInvoiceCount=modules::run('api_call/api_call/call_api',''.api_url().'caf/cafCount',$totalTicketParams,'POST');
//   $data['total_invoices']=$totalInvoiceCount['data'];

//   $totalPendingInvoiceCount=modules::run('api_call/api_call/call_api',''.api_url().'account/countCreditInvoice',$pendingInvoiceCountParams,'POST');
//   $data['total_pending_count']=$totalPendingInvoiceCount['data'];
//   $totalPaidInvoiceCount=modules::run('api_call/api_call/call_api',''.api_url().'account/countCreditInvoice',$paidInvoiceCountParams,'POST');
//   $data['total_paid_count']=$totalPaidInvoiceCount['data'];
//    $totalPartiallyInvoiceCount=modules::run('api_call/api_call/call_api',''.api_url().'account/countCreditInvoice',$partiallyInvoiceCountParams,'POST');
//   $data['total_partially_count']=$totalPartiallyInvoiceCount['data'];
// var_dump($data)
  ##credit in invoice
// $totalPendingInvoiceCredit=modules::run('api_call/api_call/call_api',''.api_url().'account/sumAmountInvoice',$pendingInvoiceCountParams,'POST');
//   $data['total_pending_credit']=$totalPendingInvoiceCredit['data']['amount'];
//   $totalPaidInvoiceCredit=modules::run('api_call/api_call/call_api',''.api_url().'account/sumAmountInvoice',$paidInvoiceCountParams,'POST');
//   $data['total_paid_credit']=$totalPaidInvoiceCredit['data']['amount'];
//    $totalPartiallyInvoiceCredit=modules::run('api_call/api_call/call_api',''.api_url().'account/sumAmountInvoice',$partiallyInvoiceCountParams,'POST');
//   $data['total_partially_credit']=$totalPartiallyInvoiceCredit['data']['amount'];

  echo json_encode($data);
// die;
}

function list_frenchise()
{
$params=array('parent_f_id'=>'');
 $frenchise_list=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/listFrenchise',$params,'POST');
 // echo '<pre>';
 // print_r($frenchise_list);die;
 if($frenchise_list['status']=='success')
 {
  $data['frenchise']=$frenchise_list['data'];
}
else if($frenchise_list['status']=='not found')
{
  $data['frenchise']=[];
}
   // var_dump($frenchise_list);
$data['_view'] = 'super_admin/frenchise_list';
$this->load->view('sindex',$data);

}

function frenchise_tree_view()
{

   $data['_view'] = 'frenchise_tree';
  $this->load->view('sindex',$data);
}


function tree()
{

$this->db->select('*');
$this->db->from('frenchise');
$row=$this->db->get()->result_array();
// var_dump($row);
// echo json_encode($row);
// die;
for($i=0;$i<count($row);$i++)
{
 $sub_data["id"] = $row[$i]["id"];
 $sub_data["name"] = $row[$i]["name"];
 $sub_data["text"] = $row[$i]["name"];
 // $sub_data["email"] = $row[$i]["email"];
 $sub_data["parent_f_id"] = $row[$i]["parent_f_id"];
 $data[] = $sub_data;
}
foreach($data as $key => &$value)
{
 $output[$value["id"]] = &$value;
}
foreach($data as $key => &$value)
{
 if($value["parent_f_id"] && isset($output[$value["parent_f_id"]]))
 {
  $output[$value["parent_f_id"]]["nodes"][] = &$value;
 }
}
foreach($data as $key => $value)
{
 if($value["email"] && isset($output[$value["parent_f_id"]]))
 {
  $output[$value["email"]]["nodes"][] = $value;
 }
}
foreach($data as $key => &$value)
{
 if($value["parent_f_id"] && isset($output[$value["parent_f_id"]]))
 {
  unset($data[$key]);
 }
}
echo json_encode($data);
}
function add_frenchise()
{
 // $function_name=$this->uri->segment(2);
 // $user_id=8;
 // $authorization_id=$this->session->authorization_id;
 
// $auth=$this->Authentication_model->check_authentication($controller_name,$function_name,$user_id,$authorization_id);
// var_dump($auth);die;
  $data['_view'] = 'add_frenchise';


  $this->load->view('sindex',$data);



}
function add()
{
  $config['upload_path']          = './uploads/frenchise';
  $config['allowed_types']        = 'gif|jpg|png';
  $this->load->library('upload', $config);
  $f_id=1;
  $name = $this->input->post('f_name',true);
  
  $email= $this->input->post('email',true);
  $mobile = $this->input->post('mobile',true);
  $crn_number = $this->input->post('crn_number',true);
  // $username = $this->input->post('uname',true);
  // $password = $this->input->post('pw');
  // $encrypted_password=md5($password);
  $f_type = $this->input->post('f_type',true);
  $r_percent = $this->input->post('revenue',true);
  $address = $this->input->post('address',true);
  // $f_id=$this->session->f_id;
 ##check this mobile number crn number exist or not in database
  $mobileParams=array('mobile'=>$mobile,'f_id'=>$f_id);
  $result_mobile_validation= modules::run('api_call/api_call/call_api',''.api_url().'crn/mobileCheck',$mobileParams,'POST');
  try
  {
    if($result_mobile_validation=='')
    {
      throw new Exception("server down", 1);
      log_error("crn/mobilenoCheck error");
      
    }
    if(isset($result_mobile_validation['error']))
    {
      throw new Exception($result_mobile_validation['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }
 
  if($result_mobile_validation['status']=='success')
  {
    // var_dump($result_mobile_validation);
    $crn_number=$result_mobile_validation['data'][0]['crn_id'];

  }
  else
  {

    $crnParams=array(
      'name'=>$name, 
      'mobile'=>$mobile,
      'location'=>$address,
      // 'city'=>$perCity,
      // 'pincode'=>$perPincode,
      // 'landmark'=>$perLandmark,
      'email'=>$email,
      'f_id'=>$f_id,
      'created_at'=>date('y-m-d H:i:s')


    );
  // var_dump($crnParams);
    $get_data=modules::run('api_call/api_call/call_api',''.api_url().'crn/addCrn',$crnParams,'POST');
    if($get_data['status']=='success')
    {
      $crn_number=$get_data['last_inserted_id'];
    }
  }
  $params=array(
    'name'=>$name,
    'email'=>$email,
    'mobile'=>$mobile,
    'frenchise_type'=>$f_type,
    'revenue_percent'=>$r_percent,
    'created_at'=>date('y-m-d H:i:s'), 
    'parent_f_id'=>$f_id,
    'address'=>$address,
    'crn_number'=>$crn_number

  );
  // if($this->upload->do_upload('logo'))
  // {
  //   $data['image'] =  $this->upload->data();
  //   $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
  //   $params['logo']=$image_path;
  // }
  // if($this->upload->do_upload('profile_pic'))
  // {
  //   $data['images'] =  $this->upload->data();
  //   $image_path=$data['images']['raw_name'].$data['images']['file_ext'];
  //   $params['profile_pic']=$image_path;
  //   $staffParams['profile_image']=$image_path;
  // }
##add frenchise
  $insert_data=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/addFrenchise',$params,'POST');
// print_r($params);die;
    if($insert_data['status']=='success')
  {

    $frenchise_id=$insert_data['last_inserted_id'];
##adding in staff list
  $staffParams=array(
    'name'=>$name,
    'email'=>$email,
    'mobile'=>$mobile,
    'created_at'=>date('Y-m-d H:i:s'),
    'f_id'=>$frenchise_id

  );

  $staff_data=modules::run('api_call/api_call/call_api',''.api_url().'staff/addStaff',$staffParams,'POST');
  if($staff_data['status']=='success')
  {
    $staff_id=$staff_data['last_inserted_id'];
  }

  

    #generate username and password
     $password= $frenchise_id.rand(1,100).rand(1,9000);
    $encrypted_password=md5($password);
    $username= $frenchise_id.'_'.time();
  ##add credential of frenchise
    $f_credential=array(

      'username'=>$username,
      'password'=>$encrypted_password,
      'clear_text'=>$password,
      'crn_number'=>$crn_number,
      'f_id'=>$frenchise_id,
      'staff_id'=>$staff_id,
      'authorization_id'=>1,
      'api_key'=>123


    );
    $insert_credential=modules::run('api_call/api_call/call_api',''.api_url().'crn/insertUserCredential', $f_credential,'POST');
    ##send sms to frenchise
    $smsParam=array(
      'mobile'=>$mobile,
      'username'=>$username,
      'password'=>$password,
      'f_id'=>$f_id,
      'module'=>'user credential',
);
    $sms=modules::run('sms/sms/send_sms_notification',$smsParam,'POST');
    ##send email to frenchise
     $emailParam=array(
      'email'=>$email,
      'username'=>$username,
      'password'=>$password,
      'f_id'=>$f_id,
      'module'=>'user credential',
);
     $email=modules::run('email/email/send_email_notification',$emailParam,'POST');
    ##insert blank value in frenchise setting table becaz it is used in update time when frenchise used his panel
    $frenchiseSettingParams=array(
      // 'isp_license'=>'',
      'bank_account'=>'',
      'billing_cycle'=>'',
     
      'terms'=>'',
      'customer_care'=>'',
      'f_id'=>$frenchise_id

    );
    $insert_frenchise_setting_blank=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/insertFrenchiseSetting',$frenchiseSettingParams,'POST');
    /*--*/

     ##insert frenchise id in tax table
    $frenchiseTaxDetailsParams=array('f_id'=>$frenchise_id,'tax'=>'[]');
    $insert_frenchise_setting_blank=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/insertFrenchiseSettingTax',$frenchiseTaxDetailsParams,'POST');
    /*---*/
    
    $this->session->alerts = array(
      'severity'=> 'success',
      'title'=> 'successfully added'
    );
    redirect('super_admin/list_frenchise');

  }
}
function edit($id)
{
  $params=array('id'=>$id);
  $frenchise_credential=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/listFrenchiseSession',$params,'POST');
  // var_dump($frenchise_credential);die;
  if($frenchise_credential['status']=='success')
  {
    $data['frenchise']=$frenchise_credential['data'];
  }
  // print_r($data['frenchise']);die;
  $data['_view'] = 'edit';
  $this->load->view('sindex',$data);

}
function update($id)
{
  // $config['upload_path']          = './uploads/frenchise';
  // $config['allowed_types']        = 'gif|jpg|png';
  // $this->load->library('upload', $config);
  // print_r($this->input->post());
  // die;
  $f_id=$this->session->f_id;
  $name = $this->input->post('f_name',true);
  
  $email= $this->input->post('email',true);
  $mobile = $this->input->post('mobile',true);
  $crn_number = $this->input->post('crn_number',true);
  // $username = $this->input->post('uname');
  // $password = $this->input->post('pw');
  // $encrypted_password=md5($password);
  $f_type = $this->input->post('f_type',true);
  $r_percent = $this->input->post('revenue',true);
  $address = $this->input->post('address',true);

 ##check this mobile number crn number exist or not in database
  $mobileParams=array('mobile'=>$mobile);
  $result_mobile_validation= modules::run('api_call/api_call/call_api',''.api_url().'crn/mobilenoCheck',$mobileParams,'POST');

  $params=array(
    'id'=>$id,
    'name'=>$name,
    'email'=>$email,
    'mobile'=>$mobile,
    // 'frenchise_type'=>$f_type,
    // 'revenue_percent'=>$r_percent,
    
    
    'address'=>$address,
    'short_name'=>''
    // 'crn_number'=>$crn_number

  );

  $result_mobile_validation= modules::run('api_call/api_call/call_api',''.api_url().'frenchise/update_frenchise_details',$params,'POST');
  if($result_mobile_validation['status']=='success')
  {
    $this->session->alerts = array(
    'severity'=> 'success',
    'title'=> 'successfully updated'
  );
  redirect('super_admin/list_frenchise');
  }
  else
  {
      $this->session->alerts = array(
    'severity'=> 'danger',
    'title'=> 'failed in edit'
  );
  redirect('super_admin/list_frenchise');
  }
  // var_dump($result_mobile_validation); 
  // die;
  // var_dump($params['profile_pic']);die;
##add frenchise
 
  
  

}
}
?>	