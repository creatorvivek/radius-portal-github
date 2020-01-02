<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller
{

 function __construct()
 {
  parent::__construct();
}

function check_password()
{
  $password=$this->input->post('password');
  $caf_id=$this->input->post('caf_id');
  $params=array('caf_id'=>$caf_id,'password'=>$password);
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
    $caf_id=$this->input->post('caf_id');
    $newpasswordMd5=md5($this->input->post('newpassword'));
    $newpassword=$this->input->post('newpassword');
    ##change in future
    $changepw=array(
      'caf_id'=>$caf_id,
      'password'=>$newpassword,
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
    echo 'failed';
  }
    
  }
function dashboard()
{
// $data['_view'] = 'ticketResponse';

 $crn_number=$this->session->crn_number;
 $condition=array(
  'crn_number'=>$crn_number
);
 
 
 $customerTicket= modules::run('api_call/api_call/call_api',''.api_url().'ticket/fetch_ticket_customer',$condition,'POST');
 // print_r($customerTicket);die;
try
    {
      if($customerTicket=='')
      {
        throw new Exception("server down", 1);
        log_error(" function error");
        
      }
      if(isset($customerTicket['error']))
      {
        throw new Exception($customerTicket['error'], 1);
      }
     
      
    }
    catch(Exception $e)
    {
      die(show_error($e->getMessage()));
    }
 
 if($customerTicket['status']=='success')
 {
              // $data['userdata']  =$customerDetails['data'][0];
  $data['customer']=$customerTicket['data'];
  // $data['_view'] = 'profile';
  $this->load->view('profile',$data);
}
elseif($customerTicket['status']=='not found')
{
  // $data['userdata']  =$customerDetails['data'][0];
  $data['customer']=[];
  // $data['_view'] = 'profile';
  $this->load->view('profile',$data);
} 



}

function user_details_in_profiles()
{
  $crn_number=$this->input->post('crn_number');
  $conditionCrn=array(
    'crn_id'=>$crn_number
  );

  $customerDetails= modules::run('api_call/api_call/call_api',''.api_url().'crn/crnList',$conditionCrn,'POST');
  // var_dump($customerDetails['data'][0]);
  if($customerDetails['status']=='success')
  {
    echo json_encode($customerDetails['data'][0]);
  }
  else
  {
   $data['userdata']=[];
 }
}
function user_details_in_profiles_by_caf()
{
  $caf_id=$this->input->post('caf_id');
  $condition=array(
    'id'=>$caf_id
  );

  $customerDetails= modules::run('api_call/api_call/call_api',''.api_url().'caf/fetchCaf',$condition,'POST');
  // var_dump($customerDetails['data'][0]);
  if($customerDetails['status']=='success')
  {
    echo json_encode($customerDetails['data'][0]);
  }
  else
  {
   $data['userdata']=[];
 }
}

function user_caf()
{

   // $crn_number=$this->input->post('crn_number');
  $crn_number=$this->session->crn_number;
  $conditionCrn=array(
    'crn_number'=>$crn_number
  );

  $cafDetails= modules::run('api_call/api_call/call_api',''.api_url().'caf/fetchCaf',$conditionCrn,'POST');
  // var_dump($cafDetails['data']);
  if($cafDetails['status']=='success')
  {
    echo json_encode($cafDetails['data']);
  }
  else
  {
   $data['userdata']=[];
 }
}
##for user
##user invoice through caf
function invoice_list_user()
{
  $caf_id=$this->input->get('caf_id');
   $invoiceParam=array(
    'caf_id'=>$caf_id
    

  );

  $invoice_list= modules::run('api_call/api_call/call_api',''.api_url().'account/invoiceList',$invoiceParam,'POST');
 var_dump($invoice_list);
  if($invoice_list['status']=='success')
  {
    $data['invoice']=$invoice_list['data'];
  }
  else 
  {
    $data['invoice']=[];
  }
  $data['_view'] = 'invoice_list';

  $this->load->view('../index.php',$data);



}


function user_ledger()
{
   $caf_id=$this->input->post('caf_id');  
  $ledgerParam=array(
    'caf_id'=>$caf_id,
 
    'start_date'=>'',
    'end_date'=>''
 );
   $ledgerResults =modules::run('api_call/api_call/call_api',''.api_url().'account/ledgerReportoUser',$ledgerParam,'POST');
    if($ledgerResults['status']=='success')
   {
    echo json_encode($data['ledger']=$ledgerResults['data']);
   }
   else
   {
    $data['ledger']=[];
    echo json_encode($data['ledger']);
    $data['message']='NO DATA AVILABLE FOR THIS DATE RANGE';
   }
}
function update_profile()
{
   $config['upload_path']          = './uploads/';
   $config['allowed_types']        = 'gif|jpg|png';
    $this->load->library('upload', $config);
    $name=$this->input->post('name');
    $mobile=$this->input->post('mobile');
    $email=$this->input->post('email');
    $p_address=$this->input->post('p_address');
    $caf_id=$this->input->post('caf_id');
    $params=array(
        'name'=>$name,
        'contact_mobile'=>$mobile,
        'primary_email'=>$email,
        'permanent_address'=>$p_address,
        'caf_id'=>$caf_id

    );
    if($this->upload->do_upload('profile_image'))
  {
    $data['image'] =  $this->upload->data();
    $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
    $params['profile_image']=$image_path;
  }
    // var_dump($params['profile_image']);
    // var_dump($params);die;
$password_change= modules::run('api_call/api_call/call_api',''.api_url().'profile/updateProfile',$params,'POST');
if($password_change['status']=='success')
{
  redirect('profile/dashboard');
}
else
{
   redirect('profile/dashboard');
}
}

function get_plan_user()
{
  $caf_id=$this->input->post('caf_id',1);
  $param=array('caf_id'=>$caf_id);
  $results =modules::run('api_call/api_call/call_api',''.api_url().'plan/latest_plan_search',$param,'POST');
  // var_dump($results);
  if($results['status']=='success')
  {
    echo json_encode($results['data']);
  }
  else
  {
    echo json_encode([]);
  }

  
}

function username_change()
{
   $data['_view'] = 'ch_username';
    $this->load->view('index',$data);

}

function check_username()
  {

    $username=$this->input->post('username',1);
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
  function change_username()
  {
    $username=$this->input->post('username',1);
    $user_id=$this->input->post('user_id',1);
    // $username='surya@cyber';

    $params=array('username'=>$username,'user_id'=>$user_id);
       $result=modules::run('api_call/api_call/call_api',''.api_url().'profile/change_username',$params,'POST');
    // print_r($result);
    if($result['status']=='success')
    {
      echo "1";
    }
    
  }    


function user_logout()
{
  $this->session->unset_userdata('username');
      $this->session->unset_userdata('api_key');
      $this->session->unset_userdata('crn_number');
      $this->session->unset_userdata('caf_id');
      $this->session->unset_userdata('authorization_id');
     

      $this->session->sess_destroy();
      redirect('login');
}


/*all function end*/
}
?>	