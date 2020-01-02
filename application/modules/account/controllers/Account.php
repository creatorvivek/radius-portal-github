<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'libraries/qr/qrlib.php');
class Account extends MY_Controller
{

 function __construct()
 {
  parent::__construct();
}


function invoice($params,$particular)
{
  // print_r($params);

  $invoice_id=$this->get_invoice_id();

  $f_id=$this->session->f_id;
  $frenchise_info=$this->frenchise_info($f_id);
  // print_r($frenchise_info);
  // die;
##insert particular and amount in master invoice table
  $length=count($particular['particular']);
  $amount=0;
  for($k=0;$k<$length;$k++)
  {
    $masterInvoiceParams=array(
      'invoice_id'=>$invoice_id,
      'particular'=>$particular['particular'][$k],
      'price'=>$particular['price'][$k]


    );
    // var_dump($masterInvoiceParams);
    $amount=$amount+$particular['price'][$k];
    $insertAccountPariculars=modules::run('api_call/api_call/call_api',''.api_url().'account/insertAccountParticular',$masterInvoiceParams,'POST');
  }
## maintain tax of frenchise
  $tax_detail=json_decode($frenchise_info['data']['tax'],true) ;
                        // var_dump($tax);
  $tax_amount=0;
  for($i=0;$i<count($tax_detail);$i++) {




   // ($amount * (array_values($tax_detail[$i]))[0])/100 ;
   $tax_amount= $tax_amount+($amount  * (array_values($tax_detail[$i]))[0])/100 ;


   $taxMaintain=array(

    'invoice_id'=>$invoice_id,
    'f_id'=>$frenchise_info['data']['frenchise_id'],
    'tax_name'=>array_keys($tax_detail[$i])[0],
    'tax_amount'=>round(($amount * (array_values($tax_detail[$i]))[0])/100) 


  ); 

##insert in database
   $insertAccountTransaction=modules::run('api_call/api_call/call_api',''.api_url().'account/insertTaxAmountDetail',$taxMaintain,'POST');

   

 }
##check frenchise have isp licence or not if not have upper frenchise has to pay dot
 $frenchise_id_param=array('f_id'=>$f_id);
    $checkIsp=modules::run('api_call/api_call/call_api',''.api_url().'account/check_isp',$frenchise_id_param,'POST');

    $dotTaxMaintain=array(

    'invoice_id'=>$invoice_id,
    'f_id'=>$checkIsp['data']['frenchise_id'],
    'tax_name'=>'dot',
    'tax_amount'=>($amount * (8)/100) 


  ); 
   $insertAccountTransactionDot=modules::run('api_call/api_call/call_api',''.api_url().'account/insertTaxAmountDetail',$dotTaxMaintain,'POST');
 $total=round($tax_amount)+$amount;
##insert invoice details
 $invoiceParams=array(
  'invoice_id'=>$invoice_id,
  'name'=>$params[0]['name'],
  'f_name'=>$frenchise_info['data']['f_name'],
  'f_mobile'=>$frenchise_info['data']['mobile'],
  'f_email'=>$frenchise_info['data']['email'],
  'f_logo'=>$frenchise_info['data']['logo'],
  'f_id'=>$f_id,
  'email'=>$params[0]['primary_email'],
  'mobile'=>$params[0]['contact_mobile'],
  'address'=>$params[0]['permanent_address'],
  'f_address'=>$frenchise_info['data']['address'],
  'tax'=>$frenchise_info['data']['tax'],
  'created_at'=>date('y-m-d H-i-s'),
  'amount'=>$amount,
  'total'=>$total,
  'username'=>$params[0]['username'],
  'caf_id'=>$params[0]['id']
);
// var_dump($invoiceParams);die;
 $collectUserInformation=modules::run('api_call/api_call/call_api',''.api_url().'account/insert_invoice_information',$invoiceParams,'POST');
 $last_inserted_id=$collectUserInformation['last_inserted_id'];

 $accountTransaction=array(
  'reference_id'=>$last_inserted_id,
  'reference_type'=>1,
  'debit'=>$total,
  'f_id'=>$f_id,
  'invoice_id'=>$invoice_id,
  'username'=>$params[0]['username'],
  'caf_id'=>$params[0]['id'],
  'date'=>date('y-m-d H-i-s')

);
 $insertAccountTransaction=modules::run('api_call/api_call/call_api',''.api_url().'account/insertAccountTransactionInformation',$accountTransaction,'POST');
## get which type of frnchise fix, or revenue
 $frenchise_type=$this->frenchise_type($f_id);
 if($frenchise_type['data'][0]['frenchise_type']==2)
 {
  $frenchiseParams=array(
    'f_id'=>$f_id
  );
  $getFrenchiseWalletAmount=modules::run('api_call/api_call/call_api',''.api_url().'account/getFrenchiseWalletAmount',$frenchiseParams,'POST');
  if($getFrenchiseWalletAmount['status']=='success')
  {
    $wallet_amount=$getFrenchiseWalletAmount['data'][0]['wallet'];
      // echo $wallet_amount;
      // echo $amount;die;
    $updated_wallet_amount=$wallet_amount - $amount;
    $updated_wallet_amount_param=array('wallet'=>$updated_wallet_amount,'f_id'=>$f_id);
    $updateFrenchiseWalletAmount=modules::run('api_call/api_call/call_api',''.api_url().'account/updateFrenchiseWalletAmount',$updated_wallet_amount_param,'POST');

  }


}


##if frenchise type is share revenue then wallet concept is applicable so in every invoice wallet is reduced by base amount


  // var_dump($insertAccountTransaction);
/*----*/
   // updateBalance();
   ##get user balance
$accountBalanceParam=array(
  'f_id'=>$f_id,
  'username'=>$params[0]['username']
);
$customerBalance=modules::run('api_call/api_call/call_api',''.api_url().'account/customerBalance',$accountBalanceParam,'POST');

$updateBalanceParam=array(
  'balance'=>$customerBalance,
  'caf_id'=>$params[0]['id']
);

$update_customer_balance=modules::run('api_call/api_call/call_api',''.api_url().'account/updateBalance',$updateBalanceParam,'POST');



}


function collect_information_invoices($username,$particular)

{

  $user_name=array('username'=>$username);

  $collectUserInformation=modules::run('api_call/api_call/call_api',''.api_url().'account/userInformation',$user_name,'POST');
  // echo '<pre>';
  // var_dump($collectUserInformation);
  
  // die;
  
  $this->invoice($collectUserInformation['data'],$particular);

  
}

function reciept($params)
{
  $f_id=$params['f_id'];
  $reciept_id=$this->get_reciept_id();
  $user_id=array(
    'username'=>$params['username']
  );

 // $getFrenchiseInfo= modules::run('api_call/api_call/call_api',''.api_url().'account/userInformation',$user_id,'POST');
  $frenchise_info=$this->frenchise_info($f_id);
  $recieptParams=array(
    'reciept_id'=>$reciept_id,
    'username'=>$params['username'],


    'customer_name'=>$params['name'],
    'customer_mobile'=>$params['mobile'],

    'paid_amount'=>$params['paid_amount'],
    'pay_type'=>$params['pay_type'],
    'attend_type'=>$params['attend_type'],
    'f_name'=>$frenchise_info['data']['f_name'],
    'f_mobile'=>$frenchise_info['data']['mobile'],
    'f_address'=>$frenchise_info['data']['address'],
    'f_logo' =>$frenchise_info['data']['logo'],
    'f_id'=>$f_id,
    'date'=>date('y-m-d H:i:s')
  );

  $reciept=modules::run('api_call/api_call/call_api',''.api_url().'account/addReciept',$recieptParams,'POST');
## insert reciept information in account transaction
  $accountTransaction=array(
    'reference_id'=>$reciept['last_inserted_id'],
    'reference_type'=>2,
    'credit'=>$params['paid_amount'],
    'f_id'=>$f_id,
    'reciept_id'=>$reciept_id,
    'username'=>$params['username'],
    'caf_id'=>$params['caf_id'],
    'date'=>date('y-m-d H:i:s')

  );

  $insertAccountTransaction=modules::run('api_call/api_call/call_api',''.api_url().'account/insertAccountTransactionInformation',$accountTransaction,'POST');

  // return  $reciept['last_inserted_id'];

 ##search and maintain balance of customer
  $accountBalanceParam=array(
    'f_id'=>$f_id,
    'username'=>$params['username']
  );
  $customerBalance=modules::run('api_call/api_call/call_api',''.api_url().'account/customerBalance',$accountBalanceParam,'POST');

  $updateBalanceParam=array(
    'balance'=>$customerBalance,
    'caf_id'=>$params['caf_id']
  );

  $update_customer_balance=modules::run('api_call/api_call/call_api',''.api_url().'account/updateBalance',$updateBalanceParam,'POST');

 ##maintain status of invoice (paid,pending,partially)'

  $invoiceStatusParam=array(
    'paid'=>$params['paid_amount'],
    'f_id'=>$f_id,
    'caf_id'=>$params['caf_id']

  );
  $maintain_status_invoice=modules::run('api_call/api_call/call_api',''.api_url().'account/invoiceStatusmaintain',$invoiceStatusParam,'POST');



}

private function get_reciept_id()
{
  $f_id=$this->session->f_id;
  $recieptNoParams=array('f_id'=>$f_id);
  $maxRecieptNo=modules::run('api_call/api_call/call_api',''.api_url().'account/getMaxRecieptNo',$recieptNoParams,'POST');
  if($maxRecieptNo['status']=='not found')
  {
    return $reciept_id='reciept'.$f_id.'_00001';
  }
  else if($maxRecieptNo['status']=='success')
  {

    return $reciept_id=$maxRecieptNo['data'];
  }
  else
  {
    try
    {
      if($maxRecieptNo['error'])

        throw new Exception($maxRecieptNo['error'], 1);

    }
    catch(Exception $e)
    {
     echo $e->getMessage();
     exit();
   }     
 }
}

private function get_invoice_id()
{
  $f_id=$this->session->f_id;
  $invoiceNoParams=array('f_id'=>$f_id);
  $maxInvoiceNo=modules::run('api_call/api_call/call_api',''.api_url().'account/get_max_invoice_no',$invoiceNoParams,'POST');
  if($maxInvoiceNo['status']=='not found')
  {
    return $invoice_id='f'.$f_id.'_000001';
  }
  else if($maxInvoiceNo['status']=='success')
  {

   return $invoice_id=$maxInvoiceNo['data'];
 }
 else
 {
  try
  {
    if($maxInvoiceNo['error'])

      throw new Exception($maxInvoiceNo['error'], 1);
    
  }
  catch(Exception $e)
  {
   echo $e->getMessage();
   exit();
 }     
}
}


function get_invoice($invoice_id)
{
  $params=array('invoice_id'=>$invoice_id);
  $getInvoiceData=modules::run('api_call/api_call/call_api',''.api_url().'account/get_invoice_data',$params,'POST');
  // var_dump($getInvoiceData);
  try
  {
    if($getInvoiceData=='')
    {
      throw new Exception("server down", 1);
      log_error("account/getInvoiceData function error");

    }
    if(isset($getInvoiceData['error']))
    {
      throw new Exception($getInvoiceData['error'], 1);
    }
  }
  catch(Exception $e)
  {
    die(show_error($e->getMessage()));
  }

  if($getInvoiceData['status']=='success')
  {
    $data['invoice']=$getInvoiceData['data'][0];
  }
  // var_dump($getInvoiceData['data'][0]['tax']);
  // echo array_keys($getInvoiceData['data'][0]['tax']);
  // die;
  $get_particular_detail= modules::run('api_call/api_call/call_api',''.api_url().'account/getInvoiceParticularData',$params,'POST');
          // var_dump($get_particular_detail['data']);

  $rows = "";
  $no =1;
  $subtotal=0;
  $data['rows']='';
  $length=count($get_particular_detail['data']);
  for($i=0;$i<$length;$i++) {


    $name = $get_particular_detail['data'][$i]["particular"];
    $price = $get_particular_detail['data'][$i]["price"];
    $subtotal = $subtotal + $price;

    if($name!=""){
      $data['rows'] .= "<tr><td>".$no."</td><td>".$name."</td><td>".$price."</td></tr>";
    }
    $no++;


  }
  ##generate qr code
  $data['qr']='amount='.$data['invoice']['amount'].','.'invoice_id='.$data['invoice']['invoice_id'];
  ##generate bar code
  $data['barcode']=$data['invoice']['invoice_id'];


  ##take invoice template to database frenchise basis
  $invoice_template=$this->session->invoice_template;
  if($invoice_template==0){$invoice_template='default';}
  $this->load->view('invoice_template/'.$invoice_template,$data);

}

function get_reciept($id)
{
 $params=array('reciept_id'=>$id);
 $getRecieptData=modules::run('api_call/api_call/call_api',''.api_url().'account/getRecieptData',$params,'POST');
  // var_dump($getInvoiceData);
 try
 {
  if($getRecieptData=='')
  {
    throw new Exception("server down", 1);
    log_error("account/getRecieptData function error");

  }
  if(isset($getRecieptData['error']))
  {
    throw new Exception($getRecieptData['error'], 1);
  }
}
catch(Exception $e)
{
  die(show_error($e->getMessage()));
}

if($getRecieptData['status']=='success')
{
 $data['reciept']=$getRecieptData['data'][0];
 // var_dump($data['reciept']);
}
 // $data['_view'] = 'reciept';

$this->load->view('reciept',$data);
}
function add_wallet()
{
  $wallet=$this->input->post('wallet');
  $f_id=$this->input->post('f_id');
  ##check that wallet already exist in table or not
  $frenchiseParams=array(
    'f_id'=>$f_id
  );
  $getFrenchiseWalletAmount=modules::run('api_call/api_call/call_api',''.api_url().'account/getFrenchiseWalletAmount',$frenchiseParams,'POST');
               try
             {
              if($getFrenchiseWalletAmount=='')
              {
                throw new Exception("server down", 1);
                log_error("account/getRecieptData function error");

              }
              if(isset($getFrenchiseWalletAmount['error']))
              {
                throw new Exception($getFrenchiseWalletAmount['error'], 1);
              }
            }
            catch(Exception $e)
            {
              die(show_error($e->getMessage()));
            }
  if($getFrenchiseWalletAmount['status']=='success')
  {
    $wallet_amount=$getFrenchiseWalletAmount['data'][0]['wallet'];
    $wallet_money=$wallet_amount+$wallet;
    $walletParam=array(
    'wallet'=>$wallet_money,
    'f_id'=>$f_id,
    'date'=>date('y-m-d H:i:s')
  );
    ##update wallet
    $updateFrenchiseWalletAmount=modules::run('api_call/api_call/call_api',''.api_url().'account/updateFrenchiseWalletAmount',$walletParam,'POST');
  }
  else
  {
  $walletParam=array(
    'wallet'=>$wallet,
    'f_id'=>$f_id,
    'date'=>date('y-m-d H:i:s')
  );
  $addWallet= modules::run('api_call/api_call/call_api',''.api_url().'account/addWallet',$walletParam,'POST');
  echo json_encode($addWallet);
  }
  // echo 'success';
}

function invoice_list()
{

  $f_id=$this->session->f_id;
  $invoiceParam=array(
    'f_id'=>$f_id

  );

  $invoice_list= modules::run('api_call/api_call/call_api',''.api_url().'account/invoiceList',$invoiceParam,'POST');
 // var_dump($invoice_list);
  try
  {
    if($invoice_list=='')
    {
      throw new Exception("server down", 1);
      log_error("account/invoiceList function error");

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

  if($invoice_list['status']=='success')
  {
    $data['invoice']=$invoice_list['data'];
  }
  else 
  {
    $data['invoice']=[];
  }
  $data['_view'] = 'invoice_list';

  $this->load->view('index.php',$data);



}
function invoice_list_condition()
{
 $status=$this->input->get('status');
 $f_id=$this->session->f_id;
 $invoiceParam=array(
  'f_id'=>$f_id,
  'status'=>$status

);

 $invoice_list= modules::run('api_call/api_call/call_api',''.api_url().'account/invoiceList',$invoiceParam,'POST');
 try
 {
  if($invoice_list=='')
  {
    throw new Exception("server down", 1);
    log_error("account/invoiceList function error");

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

if($invoice_list['status']=='success')
{
  $data['invoice']=$invoice_list['data'];
}
else 
{
  $data['invoice']=[];
}
$data['_view'] = 'invoice_list';

$this->load->view('index.php',$data);


}
// function test()
// {
// $text = "The quick brown fox jumped over the lazy dog.";
// $newtext = wordwrap($text, 20, "<br />\n");

// echo $newtext;

// }

function postpaid_billing()
{


  $f_id=$this->session->f_id;
  ##get billing date of frenchise
  $fParams=array('f_id'=>$f_id);
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
  $frenchise_billing_cycle=$frenchise_account['data'][0]['billing_cycle'];
  $current_date_day=date('d');
  if($frenchise_billing_cycle==$current_date_day)
  {
    $postpaid_id=2;
    $params=array('f_id'=>$f_id,'plan_type'=>$postpaid_id,'status'=>1);
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
          // var_dump($plan_detail);
        if($plan_detail['status']=='success')
        {     

                   ##convert to array
          $item_array=[$plan_detail['data']['plan_name']];
          $item_cost_array=[$plan_detail['data']['amount']];
          $particular=array('particular'=>$item_array,'price'=>$item_cost_array);  
          ##username is portal username
          $username= $plan_detail['data']['username'];      
          $this->collect_information_invoices($username,$particular);
        }

      }
    }
  }
    // var_dump($caf_list['data'][0]['id']);

  



}

// function autogenerated_username_password($name,$crn_number='',$caf_id='',$authorization_id,$frenchise_id,$api_key,$module,$mobile,$email)
// {
// $f_id=$this->session->f_id;
// $short_name='nav';

// echo $password=rand(1,10000).rand(1,9000);
// echo $encrepted_password=md5($password);
// $name="vivek";
// echo $username=$short_name_.$caf_id.$name;
//  $f_credential=array(

//       'username'=>$username,
//       'password'=>$encrypted_password,
//       'clear_text'=>$password,
//       'crn_number'=>$crn_number,
//       'f_id'=>$frenchise_id,
//       'authorization_id'=>$authorization_id,
//       'api_key'=>$api_key


//     );
//     $insert_credential=modules::run('api_call/api_call/call_api',''.api_url().'crn/insertUserCredential', $f_credential,'POST');

//     if($insert_credential['status']=='success')
//     {
//       #send sms of crendential
//       $templateParams=array('f_id'=>$f_id,'module'=>$module);
//     $fetchtemplateSms=modules::run('api_call/api_call/call_api',''.api_url().'sms/fetchTemplateSms',$templateParams,'POST');

//     $context=$fetchtemplateSms['data'][0]['context'];
//     $contextString=array('{username','{password','{name','}');
//     $ReplaceString=array($username,$password,$name,'');
//     $message=str_replace($contextString,$ReplaceString,$context);
//     $smsParams=array('f_id'=>$f_id,'mobile'=>$mobile,'message'=>$message);
//     $send_data=modules::run('api_call/api_call/call_api',''.api_url().'sms/sendSms',$smsParams,'POST');
//     }



// }
private function frenchise_info($f_id)

{
  $params=array('f_id'=>$f_id);
  return modules::run('api_call/api_call/call_api',''.api_url().'account/checkGst',$params,'POST');
}


function frenchise_dot_license($f_id)
{
$params=array('f_id'=>$f_id);
return modules::run('api_call/api_call/call_api',''.api_url().'account/check_ist',$params,'POST');

}
function frenchise_type($f_id)
{
  $params=array('id'=>$f_id);
 return modules::run('api_call/api_call/call_api',''.api_url().'frenchise/frenchise_type',$params,'POST');
}
// function advance_rental()
// {
//    $f_id=$this->session->f_id;
//   ##get billing date of frenchise
//   $fParams=array('f_id'=>$f_id);
//   $frenchise_account=modules::run('api_call/api_call/call_api',''.api_url().'frenchise/list_frenchise_account',$fParams,'POST');
//   try
//   {
//   if($frenchise_account=='')
//       {
//         throw new Exception("server down", 1);
//         log_error("account/list_frenchise_account function error");

//       }
//       if(isset($frenchise_account['error']))
//       {
//         throw new Exception($frenchise_account['error'], 1);
//       }
//     }
//     catch(Exception $e)
//     {
//       die(show_error($e->getMessage()));
//     }
//    $frenchise_billing_cycle=$frenchise_account['data'][0]['billing_cycle'];
//    $current_date_day=date('d');
//    if($frenchise_billing_cycle==$current_date_day)
//    {

//   $plan_monthly_amount=500;
//   echo $date=date('y-m-d');
//   // echo '<br>';
//   $year=date('Y',strtotime($date));
//   $month=date('m',strtotime($date));

//   $day_in_month=cal_days_in_month(CAL_GREGORIAN,$month,$year);
//   // echo $day_in_month;
//   $one_day_rate=$plan_monthly_amount/$day_in_month;
//  round($one_day_rate, 2);
//   $date1=strtotime(date('y-m-'.$frenchise_billing_date.''));
//  $date2=strtotime(date('y-m-'.$current_date_day.''));
//  // echo $difference_in_date=date_diff('18-12-12 12:2:2',$date2);
//  $difference_in_date=7;
//  echo $partial_invoice_amount=$difference_in_date*$one_day_rate;
// $particular=array('particular'=>['advance rental'],'price'=> [$partial_invoice_amount]);
// $username='surya_1544874923';
// $this->collect_information_invoices($username,$particular);
// }
// else
// {
//   echo "today is not that date";
// }

// }

function advance_rental_billing()
{
  $f_id=$this->session->f_id;
  ##get billing date of frenchise
  $fParams=array('f_id'=>$f_id);
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
  $frenchise_billing_cycle=$frenchise_account['data'][0]['billing_cycle'];
  $current_date_day=date('d');
  if($frenchise_billing_cycle==$current_date_day)
  {
    $rental_id=3;
    $params=array('f_id'=>$f_id,'plan_type'=>$rental_id,'status'=>1);
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
          // var_dump($plan_detail);
        if($plan_detail['status']=='success')
        {     

                   ##convert to array
          $item_array=[$plan_detail['data']['plan_name']];
          $item_cost_array=[$plan_detail['data']['amount']];
          $particular=array('particular'=>$item_array,'price'=>$item_cost_array);  
          $username= $plan_detail['data']['username'];      
          $this->collect_information_invoices($username,$particular);
        }

      }
    }
  }

}




function get_tax()
{
 $f_id=$this->session->f_id;
  ##get billing date of frenchise
 $params=array('f_id'=>$f_id);
 $tax= modules::run('api_call/api_call/call_api',''.api_url().'account/checkGst',$params,'POST');
 if($tax['status']=='success')
 {
  echo ($tax['data']['tax']);
}
} 



function revanue_count()
{
  $f_id=$this->session->f_id;
  $params=array('parent_f_id'=>$f_id,'frenchise_type'=>2);
  $result= modules::run('api_call/api_call/call_api',''.api_url().'frenchise/frenchise_revenue_list',$params,'POST');
  // echo(($result['data'][1]['id']));
  // print_r($result);
 try
    {
      if($result=='')
      {
        throw new Exception("server down", 1);
        log_error("account/invoiceList function error");

      }
      if(isset($result['error']))
      {
        throw new Exception($invoice_list['error'], 1);
      }
    }
    catch(Exception $e)
    {
      die(show_error($e->getMessage()));
    }
  if($result['status']=='not found')
  {
    echo "no revenue type frenchise";
    die;
  }
  for ($i=0; $i< count($result['data']) ; $i++) { 
  # code...
    $invoiceParam=array('f_id'=>$result['data'][$i]['id']);
    $revenue=$result['data'][$i]['revenue_percent']/100;
    $invoice_list= modules::run('api_call/api_call/call_api',''.api_url().'account/invoiceList',$invoiceParam,'POST');
    try
    {
      if($invoice_list=='')
      {
        throw new Exception("server down", 1);
        log_error("account/invoiceList function error");

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
  
    $total=0;
    // $invoice_lists=['100','200','300'];
    // echo $invoice_lists[0];
    if($invoice_list['status']=='success')
    {
    // $invoice_list['data']['amount'];
      for ($j=0; $j < count($invoice_list['data']) ; $j++) { 
      # code...
        $total=$total+ ( $revenue* $invoice_list['data'][$j]['amount'] );
        // $total=$total+ ($revenue * $invoice_lists[$j]);
      }
      echo 'frenchise_id ='.$result['data'][$i]['id'].'&nbsp total revanue= ' . $total;
    // }
  }
  







} 
}

function dot_count()
{
 $f_id=$this->session->f_id;
 $params=array('f_id'=>$f_id);
  ##check isp licence have or not?
 $result= modules::run('api_call/api_call/call_api',''.api_url().'account/check_license',$params,'POST');
 var_dump($result);
 if($result['status']=='success')
 {
    ## get base amount of invoice of this frenchise customer


  $invoice_list= modules::run('api_call/api_call/call_api',''.api_url().'account/invoiceList',$params,'POST');
 // var_dump($invoice_list);
  try
  {
    if($invoice_list=='')
    {
      throw new Exception("server down", 1);
      log_error("account/invoiceList function error");

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
  $total=0;
  if($invoice_list['status']=='success')
  {
    // $invoice_list['data']['amount'];
    for ($i=0; $i < count($invoice_list['data']) ; $i++) { 
      # code...
      $total=$total+(.08)* $invoice_list['data'][$i]['amount'];
    }
    echo $total;
  }

}
}


##show wallet money
function my_wallet()
{
  $f_id=$this->session->f_id;
    $frenchiseParams=array(
    'f_id'=>$f_id
  );
  $getFrenchiseWalletAmount=modules::run('api_call/api_call/call_api',''.api_url().'account/getFrenchiseWalletAmount',$frenchiseParams,'POST');
  if($getFrenchiseWalletAmount['status']=='success')
  {
    echo $wallet_amount=$getFrenchiseWalletAmount['data'][0]['wallet'];

}

}








/*all function end*/
}
?>	