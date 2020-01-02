<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api_call extends MX_Controller
{

 function __construct()
 {
  parent::__construct();
  $this->load->library('curl');


}


## curl method for call api here api key for security purpose if invalid api key than authentication failed invalid api key eror occure
## $url comes by modules where the url call
function call_api($url,$data,$method){
  try{
    $api_key = isset($this->session->api_key)?$this->session->api_key:123;
   $curl = curl_init();
// return $data;die;
   switch ($method){
    case "POST":
    curl_setopt($curl, CURLOPT_POST,TRUE);
    if ($data)
     curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
   break;
   case "PUT":
   curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
   if ($data)
     curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
   break;
   default:
   if ($data)
     $url = sprintf("%s?%s", $url, http_build_query($data));
 } 

   // OPTIONS:
 curl_setopt($curl, CURLOPT_URL, $url);
   #header should be an array format
$header=array(
 // 'Content-Type: application/x-www-form-urlencoded',
'x-api-key:'.$api_key
);

 curl_setopt($curl, CURLOPT_HTTPHEADER,$header);

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

   // EXECUTE:
 $result = curl_exec($curl);
 // log_error($result);
 var_dump($result);
 // die;
 if(!$result){


  throw new Exception("Connection Failure",1);
}
/*elseif(is_string($result))
{
  
  throw new Exception($result,1);
  // exit();
}*/
else{
curl_close($curl);
// var_dump($result);
 $response=json_decode($result,true);

return $response;
}       // return $result;
}
catch(Exception $e)

{
  die($e->getMessage());
}

}
function try()
{
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, "http://localhost/radiusapi/index.php/curd/test");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_POST, true);

 $data=array(
   'username'=>'vivek sharma',
   'password'=>14442,
   'clear_text'=>12,
   'api_key'=>'1234567'
 );

 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 $output = curl_exec($ch);
 $response = json_decode($output, true);
 var_dump($response);
 $info = curl_getinfo($ch);
 curl_close($ch);
}

function test()
{
 $get_data = $this->call_api('GET', 'https://jsonplaceholder.typicode.com/posts',0);
 $response = json_decode($get_data, true);
 echo '<pre>';
 var_dump($response);
 $errors = $response['response']['errors'];
 print_r($data = $response['response']['data'][0]);
}


}

// }
?>	