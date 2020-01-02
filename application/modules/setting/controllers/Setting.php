<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends MY_Controller
{

 function __construct()
 {
  parent::__construct();
}





function index()
{
  // $f_id=$this->session->f_id;
  // $staff_params=array(
  //   'f_id'=>$f_id
  // );
  // $staff_info = modules::run('api_call/api_call/call_api',''.api_url().'staff/fetchstaff',$staff_params,'POST');
  // if($staff_info['status']=='success')
  // {

  //   $data['staff']=$staff_info['data'];

  // }

  $data['_view'] = 'setting_form';
  $this->load->view('index',$data);
}





function add()
{

  $f_id=$this->session->f_id;
  $gst_number = $this->input->post('gst_number');
  
  $bank_account= $this->input->post('bank_account');
  $isp_license = $this->input->post('isp_license');
  $billing_cycle = $this->input->post('billing_cycle');
  $tax_name = $this->input->post('tax_name');
  $tax_percent = $this->input->post('tax_percent');
  $terms=$this->input->post('terms');
  // $encodedterms=json_encode($terms);
  $customer_care_number=$this->input->post('customer_care');
 // var_dump( $tax_name);die;   
  $name_array=explode(",",$tax_name);
  $percent_array=explode(",",$tax_percent);
  $length=count($name_array);
// var_dump( $name_array);die;
  $fullTaxArray=[];
  for ($i=0; $i <$length ; $i++) { 
  # code...
    $taxArray = array($name_array[$i] => $percent_array[$i] );
    array_push($fullTaxArray, $taxArray);
  }
// var_dump($full);die;

  $tax=json_encode($fullTaxArray);

  $taxParams=array(
    'f_id'=>$f_id,
    'tax'=>$tax

  );

  $insert_tax=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/addFrenchiseTax',$taxParams,'POST');



  $params=array(
    'isp_license'=>$isp_license,
    'bank_account'=>$bank_account,
    'billing_cycle'=>$billing_cycle,
    'gst_number'=>$gst_number,
    'terms'=>$terms,
    'f_id'=>$f_id,
    'customer_care'=>$customer_care_number

  );
// var_dump($params);die;
  $get_data=modules::run('api_call/api_call/call_api',''.api_url().'setting/add',$params,'POST');
  // var_dump($get_data);die;
  if($get_data['status']=='success')
  {
    $this->session->alerts = array(
      'severity'=> 'success',
      'title'=> 'successfully added'
    );
    redirect('admin/dashboard');
    
  }
  else
  {

  }


}
##will improve
function frenchise_setting()
{
  $f_id=$this->session->f_id;
  $params=array('id'=>$f_id);
 ##details frenchise like name email,mobile
  $frenchise_list=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/listFrenchiseSession',$params,'POST');
  // print_r($frenchise_list);die;
  try
  {
    if($frenchise_list=='')
    {
      throw new Exception("server down", 1);
      log_error("frenchise/listFrenchiseSession error");
      
    }
    if(isset($frenchise_list['error']))
    {
      throw new Exception($frenchise_list['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }
 
  if($frenchise_list['status']=='success')
  {
    $data['frenchise']=$frenchise_list['data'];
  }
  else
  {
    $data['frenchise']=[];
  }
  $taxParams=array('f_id'=>$f_id);
  $frenchise_tax=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/listFrenchiseTax',$taxParams,'POST');
  try
  {
  if($frenchise_tax=='')
    {
      throw new Exception("server down", 1);
      log_error("frenchise/listFrenchiseSession error");
      
    }
    if(isset($frenchise_tax['error']))
    {
      throw new Exception($frenchise_tax['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }
  if($frenchise_tax['status']=='success')
  {
    $tax=json_decode($frenchise_tax['data'][0]['tax'],true);
    $data['tax']=$tax;

  }

  else
  {
    $data['tax']=[];
  }

  $frenchise_account=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/list_frenchise_account',$taxParams,'POST');
// var_dump($frenchise_account);
  if($frenchise_account['status']=='success')
  {
    $data['frenchise_account']=$frenchise_account['data'][0];
  }

  else
  {
    $data['frenchise_account']=[];
  }
// var_dump($frenchise_account);die;
  $data['_view'] = 'setting_edit1';
  $this->load->view('index',$data);

}
function frenchise_setting_edit()
{
  $f_id=$this->uri->segment(3);
  // $config['upload_path']          = './uploads/frenchise';
  // $config['allowed_types']        = 'gif|jpg|png';
  // $this->load->library('upload', $config);
  // $gst_number = $this->input->post('gst_number');
  // echo ($gst_number);
  // if($gst_number=='')
  // {
  //   $gst_number=NULL;
  // }
  // $bank_account= $this->input->post('bank_account');
  // $isp_license = $this->input->post('isp_license');
  // $billing_cycle = $this->input->post('billing_cycle');
  // $recharge_cycle = $this->input->post('recharge_cycle');
  // $tax_name = $this->input->post('tax_name');
  // $tax_percent = $this->input->post('tax_percent');
  // $terms=$this->input->post('terms');
  // $customer_care_number=$this->input->post('customer_care');
  $short_name=$this->input->post('short_name');
  $name = $this->input->post('f_name');
  
  $email= $this->input->post('email');
  $mobile = $this->input->post('mobile');

  $address = $this->input->post('address');
  // $params=array(
  //   'isp_license'=>$isp_license,
  //   'bank_account'=>$bank_account,
  //   'billing_cycle'=>$billing_cycle,
  //   'gst_number'=>$gst_number,
  //   'terms'=>$terms,
  //   'short_name'=>$short_name,
  //   'customer_care'=>$customer_care_number,
  //   'recharge_cycle'=>$recharge_cycle,
  //   'f_id'=>$f_id

  // );

  // $name_array=explode(",",$tax_name);
  // $percent_array=explode(",",$tax_percent);
  // $length=count($name_array);

  // $fullTaxArray=[];
  // for ($i=0; $i <$length ; $i++) { 
  // # code...
  //   $taxArray = array($name_array[$i] => $percent_array[$i] );
  //   array_push($fullTaxArray,$taxArray);
  // }


  // $tax=json_encode($fullTaxArray);

  // $taxParams=array(
  //   'f_id'=>$f_id,
  //   'tax'=>$tax

  // );

  // $update_tax=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/updateTax',$taxParams,'POST');
  // $update_frenchise_account=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/update_frenchise_account',$params,'POST');
  $frenchiseParams=array(
    'id'=>$f_id,
    'name'=>$name,
    'email'=>$email,
    'mobile'=>$mobile,
    
    'address'=>$address,
    'short_name'=>$short_name
  );
// print_r($frenchiseParams);
// echo '<br>';
  $f=$this->security->xss_clean(html_escape($frenchiseParams));
  // print_r($f);
  // die;
  // if($this->upload->do_upload('logo'))
  // {
  //   $data['image'] =  $this->upload->data();
  //   $image_path=$data['image']['raw_name'].$data['image']['file_ext'];
  //   $frenchiseParams['logo']=$image_path;
  // }
  // if($this->upload->do_upload('profile_pic'))
  // {
  //   $data['images'] =  $this->upload->data();
  //   $image_path=$data['images']['raw_name'].$data['images']['file_ext'];
  //   $frenchiseParams['profile_pic']=$image_path;
  // }

##add frenchise
  // var_dump($frenchiseParams);
  $update_data=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/update_frenchise_details',$frenchiseParams,'POST');

// $data['message']='successfully Updated';
// $data['_view'] = 'setting_edit';
  // $this->load->view('index',$data);
  $this->session->alerts = array(
      'severity'=> 'success',
      'title'=> 'successfully updated'
    );
redirect('setting/frenchise_setting');
// var_dump($update_frenchise_account);

}

function initial_setting()
{

  $data['_view'] = 'initial_setting';
  $this->load->view('index',$data);
}

##not apply now
function frnchise_billing_setting()
{
    $gst_number = $this->input->post('gst_number');
  // echo ($gst_number);
  if($gst_number=='')
  {
    $gst_number=NULL;
  }
  $bank_account= $this->input->post('bank_account');
  $isp_license = $this->input->post('isp_license');
  $billing_cycle = $this->input->post('billing_cycle');
  $recharge_cycle = $this->input->post('recharge_cycle');
  $tax_name = $this->input->post('tax_name');
  $tax_percent = $this->input->post('tax_percent');
  $terms=$this->input->post('terms');
  $params=array(
    'isp_license'=>$isp_license,
    'bank_account'=>$bank_account,
    'billing_cycle'=>$billing_cycle,
    'gst_number'=>$gst_number,
    'terms'=>$terms,
    'short_name'=>$short_name,
    'customer_care'=>$customer_care_number,
    'recharge_cycle'=>$recharge_cycle,
    'f_id'=>$f_id

  );
   $name_array=explode(",",$tax_name);
  $percent_array=explode(",",$tax_percent);
  $length=count($name_array);
// var_dump( $name_array);die;
  $fullTaxArray=[];
  for ($i=0; $i <$length ; $i++) { 
  # code...
    $taxArray = array($name_array[$i] => $percent_array[$i] );
    array_push($fullTaxArray,$taxArray);
  }


  $tax=json_encode($fullTaxArray);

  $taxParams=array(
    'f_id'=>$f_id,
    'tax'=>$tax

  );

  $update_tax=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/updateTax',$taxParams,'POST');
  $update_frenchise_account=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/update_frenchise_account',$params,'POST');
}

function setting_billing()
{
$f_id=$this->uri->segment(3);
  
  $gst_number = $this->input->post('gst_number');
  // echo ($gst_number);
  if($gst_number=='')
  {
    $gst_number=NULL;
  }
  $bank_account= $this->input->post('bank_account');
  $isp_license = $this->input->post('isp_license');
  $billing_cycle = $this->input->post('billing_cycle');
  $recharge_cycle = $this->input->post('recharge_cycle');
  $tax_name = $this->input->post('tax_name');
  $tax_percent = $this->input->post('tax_percent');
  $terms=$this->input->post('terms');
  $customer_care_number=$this->input->post('customer_care');
  $short_name=$this->input->post('short_name');
  $name = $this->input->post('f_name');
  
  $email= $this->input->post('email');
  $mobile = $this->input->post('mobile');

  $address = $this->input->post('address');
  $params=array(
    'isp_license'=>$isp_license,
    'bank_account'=>$bank_account,
    'billing_cycle'=>$billing_cycle,
    'gst_number'=>$gst_number,
    'terms'=>$terms,
    'short_name'=>$short_name,
    'customer_care'=>$customer_care_number,
    'recharge_cycle'=>$recharge_cycle,
    'f_id'=>$f_id

  );
 // var_dump( $tax_name);die;   
  $name_array=explode(",",$tax_name);
  $percent_array=explode(",",$tax_percent);
  $length=count($name_array);
// var_dump( $name_array);die;
  $fullTaxArray=[];
  for ($i=0; $i <$length ; $i++) { 
  # code...
    $taxArray = array($name_array[$i] => $percent_array[$i] );
    array_push($fullTaxArray,$taxArray);
  }


  $tax=json_encode($fullTaxArray);

  $taxParams=array(
    'f_id'=>$f_id,
    'tax'=>$tax

  );

  $update_tax=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/updateTax',$taxParams,'POST');
  $update_frenchise_account=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/update_frenchise_account',$params,'POST');
 

// $data['message']='successfully Updated';
// $data['_view'] = 'setting_edit';
  // $this->load->view('index',$data);
  $this->session->alerts = array(
      'severity'=> 'success',
      'title'=> 'successfully updated'
    );
redirect('setting/frenchise_setting');



}

  function file_upload()  
      {  
           if(isset($_FILES["image_file"]["name"]))  
           {  
                $config['upload_path'] = './uploads/frenchise/';  
                $config['allowed_types'] = 'jpg|jpeg|png';  
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('image_file'))  
                {  
                     echo $this->upload->display_errors();  
                }  
                else  
                {  
                     $data = $this->upload->data();  
                     // echo $data["file_name"];
                     // print_r($data);
                     $frenchiseParams=array('f_id'=>$this->session->f_id,'logo'=> $data["file_name"]);
                      $update_data=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/update_frenchise_logo',$frenchiseParams,'POST');
                     //  // echo  json_encode($update_data);
                     echo '<img src="'.base_url().'uploads/frenchise/'.$data["file_name"].'" width="120" height="120"  />';  
                }  
           }  
      }  

/*all function end*/
}
?>	