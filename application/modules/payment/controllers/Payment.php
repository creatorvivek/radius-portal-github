<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MX_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');       
  }
//  public function index(){
//     $this->load->view('form1');
//  }
//  public function check(){

//      // all values are required
//     $amount =  $this->input->post('payble_amount');
//     $product_info = $this->input->post('product_info');
//     $customer_name = $this->input->post('customer_name');
//     $customer_emial = $this->input->post('customer_email');
//     $customer_mobile = $this->input->post('mobile_number');
//     $customer_address = $this->input->post('customer_address');

//     //payumoney details


//         $MERCHANT_KEY = "sBWOAiVv"; //change  merchant with yours
//         $SALT = "VDWgaYEGs3";  //change salt with yours 

//         $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
//         //optional udf values 
//         $udf1 = '';
//         $udf2 = '';
//         $udf3 = '';
//         $udf4 = '';
//         $udf5 = '';

//          $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_emial . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
//          $hash = strtolower(hash('sha512', $hashstring));
//           // $hashstring =  $data['key'] . '|' .  $data['txnid'] . '|' . $data['amount'] . '|' . $data['productinfo'] . '|' . $data['firstname'] . '|' . $data['email'] . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' .  $data['salt'];
//           //    $data['hash'] = strtolower(hash('sha512', $hashstring));
//        $success = base_url().'payment/payment_response' ;  
//         $fail = base_url() .'payment/payment_response';
//         $cancel = base_url() . 'Status';


//          $data = array(
//             'mkey' => $MERCHANT_KEY,
//             'tid' => $txnid,
//             'hash' => $hash,
//             'amount' => $amount,           
//             'name' => $customer_name,
//             'productinfo' => $product_info,
//             'mailid' => $customer_emial,
//             'phoneno' => $customer_mobile,
//             'address' => $customer_address,
//             'action' => "https://sandboxsecure.payu.in", //for live change action  https://secure.payu.in
//             'success' => $success,
//             'failure' => $fail,
//             'cancel' => $cancel            
//         );
//         $this->load->view('confirmation', $data);   
//      }
//    function generate_hash()
//    {
//     // $input=$this->input->post('key');
//     $data=array(
//         'key'=>$this->input->post('key'),
//         'salt'=>$this->input->post('salt'),
//         'txnid'=>$this->input->post('txnid'),
//         'amount'=>$this->input->post('amount'),
//         'pinfo'=>$this->input->post('pinfo'),
//         'fname'=>$this->input->post('fname'),
//         'email'=>$this->input->post('email'),
//         'mobile'=>$this->input->post('mobile'),
//         'udf5'=>$this->input->post('udf5')


// );

//     // $data = json_decode($input);
//             $hash=hash('sha512', $data['key'].'|'.$data['txnid'].'|'.$data['amount'].'|'.$data['pinfo'].'|'.$data['fname'].'|'.$data['email'].'|||||'.$data['udf5'].'||||||'.$data['salt']);
//         $json=array();
//         $json['success'] = $hash;
//         echo json_encode($json['success']);
//    }
//      function response()
//    {
//     $data['key']                =   $this->input->post('key');
//     $data['salt']               =   $this->input->post('salt');
//     $data['txnid']              =   $this->input->post('txnid');
//     $data['amount']             =   $this->input->post('amount');
//     $data['productInfo']        =   $this->input->post('productinfo');
//     $data['firstname']          =   $this->input->post('firstname');
//     $data['email']              =   $this->input->post('email');
//     $data['udf5']               =   $this->input->post('udf5');
//     $data['mihpayid']           =   $this->input->post('mihpayid');
//     $data['status']             =   $this->input->post('status');
//     $data['resphash']               =   $this->input->post('hash');
//      $this->load->view('response',$data);
//    }



//     function payment_int()
//     {
//         $data['key']                = "gtKFFx"  ;
//     $data['salt']               =   "eCwWELxi";
//     $data['txnid']              = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
//     $data['amount']             =   500;
//     $data['productinfo']        =   "books";
//     $data['firstname']          =  "vivek";
//     $data['phone']          =  "7828161459";
//     $data['email']              =   "vivek.coool15@gmail.com";
//     $data['surl']=base_url().'payment/response';
//     // $data['udf5']               =   $this->input->post('udf5');
//     // $data['mihpayid']           =   $this->input->post('mihpayid');
//     // $data['status']             =   $this->input->post('status');
//     // $data['resphash']               =   $this->input->post('hash');
//      $udf1 = '';
//             $udf2 = '';
//             $udf3 = '';
//             $udf4 = '';
//             $udf5 = '';
//             // echo  $data['key'];
//              $hashstring =  $data['key'] . '|' .  $data['txnid'] . '|' . $data['amount'] . '|' . $data['productinfo'] . '|' . $data['firstname'] . '|' . $data['email'] . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' .  $data['salt'];
//              $data['hash'] = strtolower(hash('sha512', $hashstring));
//     $this->load->view('index2',$data);
//     }


  function online()
  {
    $data['amount']=$this->input->get('amount');
    $data['plan_id']=$this->input->get('plan_id');
    $data['plan_name']=$this->input->get('plan_name');
    $data['duration']=$this->input->get('duration');
    $this->load->view('userpanel',$data);


  }

  function user_detail()
  {

    $data['plan_amount']=$this->input->post('amount');
    $data['plan_id']=$this->input->post('plan_id');
    $data['duration']=$this->input->post('duration');
    $data['username']=$this->input->post('username');
    $data['plan_name']=$this->input->post('plan_name');
    ## fetch information by username
    $params=array('username'=>$data['username']);
    $user_info=modules::run('api_call/api_call/call_api',''.api_url().'account/user_complete_information',$params,'POST');
    $data['start_date']=$user_info['data']['start_date'];
    $data['end_date']=$user_info['data']['end_date'];
    $data['balance']=$user_info['data']['balance'];
    $data['radius_username']= $user_info['data']['radius_username'];
    $data['f_id']= $user_info['data']['f_id'];
    $data['productinfo']        =   "online recharge";
    $data['firstname']          =  $user_info['data']['name'];
    $data['phone']          =  $user_info['data']['contact_mobile'];
    $data['email']              =  $user_info['data']['primary_email'];
    $data['caf_id']              =  $user_info['data']['id'];
    // print_r($data);die;
    // $data['surl']=base_url().'payment/response';
    $this->load->view('user_payment',$data);





  }


  function payment_response()
  {
    $status=$this->input->post("status");
    $firstname=$this->input->post("firstname");
    $amount=$this->input->post("amount");
    $txnid=$this->input->post("txnid");
    $posted_hash=$this->input->post("hash");
    $key=$this->input->post("key");
    $productinfo=$this->input->post("productinfo");
    $email=$this->input->post("email");
    $username=$this->input->post("udf2");
    $caf_id=$this->input->post('udf1');
    $mobile=$this->input->post('phone');
    $salt="VDWgaYEGs3";
    $radius_username= $this->input->post('radius_username');
    $f_id= $this->input->post('udf3');
// Salt should be same Post Request 

    If (isset($_POST["additionalCharges"])) {
     $additionalCharges=$_POST["additionalCharges"];
     $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
   } else {
    $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  }
  $hash = hash("sha512", $retHashSeq);
  if ($hash != $posted_hash) {
   echo "Invalid Transaction. Please try again";
 } else {

  $params=array('name'=>$firstname,'amount'=>$amount,'txnid'=>$txnid,'status'=>'success');
    modules::run('api_call/api_call/call_api',''.api_url().'account/insert_transaction',$params,'POST');
 //  $rechargeParams=array(
 //   'username'=>$username,
 //   'name'=>$firstname,
 //   'mobile'=>$mobile,

 //   'caf_id'=>$caf_id,

 //   'paid_amount'=>$amount,
 //   'pay_type'=>"online",
 //   'attend_type'=>"online",

 //   'plan'=>'',
 //   'payer_name'=>$firstname,
 //   'payer_mobile'=>$mobile,
 //   'plan_amount'=>'',
   
   
 //   'f_id'=>$f_id,
 //   'caf_id'=>$caf_id,
 //   'total_amount'=>'',
 //   'balance'=>'',
 //   'staff_id'=>'payumoney',
 //   'date'=>date('Y-m-d H:i:s')
 // );
 //  print_r($params);
 //  echo '<br>';
  // print_r($rechargeParams);
  // die;
  // echo modules::run('account/account/reciept',$rechargeParams);
  echo "<h3>Thank You. Your order status is ". $status .".</h3>";
  echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
  echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
}
}
function failure()
{
  $status=$_POST["status"];
  $firstname=$_POST["firstname"];
  $amount=$_POST["amount"];
  $txnid=$_POST["txnid"];
  $posted_hash=$_POST["hash"];
  $key=$_POST["key"];
  $productinfo=$_POST["productinfo"];
  $email=$_POST["email"];
  $salt="VDWgaYEGs3";
  $params=array('name'=>$firstname,'amount'=>$amount,'txnid'=>$txnid,'status'=>'failed');
  modules::run('api_call/api_call/call_api',''.api_url().'account/insert_transaction',$params,'POST');
  redirect("plan/plan_list");
}



function online_payumoney()
{
  $data['amount']=$this->input->post('amount');
  $data['email']=$this->input->post('email');
  $data['phone']=$this->input->post('phone');
  $data['username']=$this->input->post('username');
  $data['caf_id']=$this->input->post('caf_id');
  $data['radius_username']= $this->input->post('radius_username');
  $data['f_id']= $this->input->post('f_id');
  $data['key']                = "sBWOAiVv" ;
  $data['salt']               = "VDWgaYEGs3";

  $data['txnid']              = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

  $data['productinfo']        =   "online recharge";
  $data['firstname']          =  $this->input->post('firstname');

  $data['surl']=base_url().'payment/payment_response';
  $data['furl']=base_url().'payment/failure';
    // $data['udf5']               =   $this->input->post('udf5');
    // $data['mihpayid']           =   $this->input->post('mihpayid');
    // $data['status']             =   $this->input->post('status');
    // $data['resphash']               =   $this->input->post('hash');
  $udf1 ='';
  $udf2 ='';
  $udf3 ='';
  $udf4 ='';
  $udf5 ='';
            // echo  $data['key'];
  $hashstring =  $data['key'] . '|' .  $data['txnid'] . '|' . $data['amount'] . '|' . $data['productinfo'] . '|' . $data['firstname'] . '|' . $data['email'] . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' .  $data['salt'];
  $data['hash'] = strtolower(hash('sha512', $hashstring));
  // print_r($data);die;
  $this->load->view('test',$data);


}









}
