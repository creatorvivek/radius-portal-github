<?php


class Email extends MY_Controller{
  function __construct()
  {
    parent::__construct();
    
  } 


 

function send_email_notification($params)
{


$email=$params['email'];
$username=$params['username'];
$module=$params['module'];
$password=$params['password'];
$f_id=$params['f_id'];
$url=base_url();
 $templateParams=array('f_id'=>$f_id,'module'=>$module);
    $fetchtemplateSms=modules::run('api_call/api_call/call_api',''.api_url().'email/fetchTemplateEmail',$templateParams,'POST');

    $context=$fetchtemplateSms['data'][0]['context'];
    $contextString=array('{username','{password','{name','{url','}');
    $ReplaceString=array($username,$password,$name,$url,'');
    $message=str_replace($contextString,$ReplaceString,$context);
    $emailParams=array('f_id'=>$f_id,'to'=>$email,'body'=>$message,'attachment'=>'','subject'=>'user Credential');
    $send_data=modules::run('api_call/api_call/call_api',''.api_url().'email/sendMail',$emailParams,'POST');

}










}
?>