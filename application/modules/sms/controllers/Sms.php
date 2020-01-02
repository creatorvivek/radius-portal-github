<?php


class Sms extends MY_Controller{
  function __construct()
  {
    parent::__construct();
    
  } 


 function index()
 {

  if($this->input->get('mobile'))
  {
    $data['mobile']=$this->input->get('mobile');
  }
  else
  {
    $data['mobile']='';
  }
 $data['_view'] = 'sms_panel';
  $this->load->view('index',$data);


 }
 function send_sms()
 {
  $mobile=$this->input->post('mobile');
  $message=$this->input->post('message');
  $f_id=$this->session->f_id;
  $smsParams=array('mobile'=>$mobile,'message'=>$message,'f_id'=>$f_id);
  $send_data=modules::run('api_call/api_call/call_api',''.api_url().'sms/sendSms',$smsParams,'POST');
  // var_dump($send_data);die;
  if($send_data)
  {

    $this->session->alerts = array(
      'severity'=> 'success',
      'title'=> 'message sent'

    );
    redirect('sms/index');

  }
  else{

    $this->session->alerts = array(
      'severity'=> 'danger',
      'title'=> 'message not sent'

    );
    redirect('sms/index');

  }
  

 }

function send_sms_notification($params)
{


$mobile=$params['mobile'];
$username=$params['username'];
$module=$params['module'];
$password=$params['password'];
$f_id=$params['f_id'];
$url=base_url();
 $templateParams=array('module'=>$module);
    $fetchtemplateSms=modules::run('api_call/api_call/call_api',''.api_url().'sms/fetchTemplateSms',$templateParams,'POST');

    $context=$fetchtemplateSms['data'][0]['context'];
    $contextString=array('{username','{password','{name','{url','}');
    $ReplaceString=array($username,$password,$name,$url,'');
    $message=str_replace($contextString,$ReplaceString,$context);
    $smsParams=array('f_id'=>$f_id,'mobile'=>$mobile,'message'=>$message);
    $send_data=modules::run('api_call/api_call/call_api',''.api_url().'sms/sendSms',$smsParams,'POST');

}










}
?>