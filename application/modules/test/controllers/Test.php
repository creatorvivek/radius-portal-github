<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends MX_Controller
{

 function __construct()
 {
  parent::__construct();
}

function tree()
{

$this->db->select('*');
$this->db->from('frenchise');
$row=$this->db->get()->result_array();
// var_dump($row);
for($i=0;$i<count($row);$i++)
{
 $sub_data["id"] = $row[$i]["id"];
 $sub_data["name"] = $row[$i]["name"];
 $sub_data["text"] = $row[$i]["name"];
 $sub_data["email"] = $row[$i]["email"];
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
// echo '<pre>';
// print_r($data);
// echo '</pre>';








}


function tree_view()
{

   $data['_view'] = 'add_staff';
  $this->load->view('index',$data);
}


function capcha_form()
{
// $this->load->helper('captcha');
// $vals = array(
//         // 'word'          => 'Random word',
//         'img_path'      => './captcha/',
//         'img_url'       => base_url('captcha'),
//         // 'font_path'     => './path/to/fonts/texb.ttf',
//         // 'img_width'     => '150',
//         // 'img_height'    => 30,
//         'expiration'    => 7200,
//         'word_length'   => 4,
//         // 'font_size'     => 19,
//         // 'img_id'        => 'Imageid',
//         'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

//         // White background and border, black text and red grid
//         'colors'        => array(
//                 'background' =>array(255, 255, 255) ,
//                 'border' => array(0, 0, 0),
//                 'text' => array(0, 0, 0),
//                 'grid' => array(255, 40, 40)
//         )
// );

// $data['cap'] = create_captcha($vals);
$data['_view'] = 'capchatest';
  $this->load->view('index',$data);
// print_r($data['cap']);

}

function profiling()
{
  $this->output->enable_profiler(TRUE);
}
function time()
{
  echo time();
  echo '<br>';
  echo date();
}

function check()
{
$f=$this->frenchise_info(12);
if($f['status']=='success')
{
  print_r($f['data']);
}
}


private function frenchise_info($f_id)

{
  $params=array('f_id'=>$f_id);
  return modules::run('api_call/api_call/call_api',''.api_url().'account/checkGst',$params,'POST');
}
function demo()
{
  // $data['_view'] = 'form';
  $this->load->view('form');
}
function form()
{

  
   $frenchise_billing_date=20;
  $current_date_day=date('d');
 
 
  $plan_monthly_amount=500;
  $date=date('y-m-d');
  // echo '<br>';
  $year=date('Y',strtotime($date));
  $month=date('m',strtotime($date));
  // echo $year;
  $day_in_month=cal_days_in_month(CAL_GREGORIAN,$month,$year);
  // echo $day_in_month;
  $one_day_rate=$plan_monthly_amount/$day_in_month;
 round($one_day_rate);
  $date1=date_create(date('Y-m-'.$frenchise_billing_date.''));
  $date2=date_create(date('Y-m-'.$current_date_day.''));
 $diff=date_diff($date1,$date2);
 // echo $difference_in_date=date_diff('18-12-12 12:2:2',$date2);
 $difference=$diff->format('%a');
echo $difference;
// echo round($datediff / (60 * 60 * 24));
//  $difference_in_date=7;
 // echo $partial_invoice_amount=$diff*$one_day_rate;
}
function form2()
{
  $frenchise_billing_date=5;
  $current_date_day=date('d');

  $plan_monthly_amount=500;
  echo $date=date('y-m-d');
  // echo '<br>';
  $year=date('Y',strtotime($date));
  $month=date('m',strtotime($date));
  // echo $year;
  $day_in_month=cal_days_in_month(CAL_GREGORIAN,$month,$year);
  // echo $day_in_month;
  $one_day_rate=$plan_monthly_amount/$day_in_month;
 round($one_day_rate,0);
 $date1=date_create(date('Y-m-'.$frenchise_billing_date.''));
  $date2=date_create(date('Y-m-'.$current_date_day.''));
 $diff=date_diff($date1,$date2);
 $difference_in_date=$diff->format('%a');
  $cafParams=array('id'=>52);
 $caf_details=modules::run('api_call/api_call/call_api',''.api_url().'caf/fetch_details_by_caf',$cafParams,'POST');
 print_r($caf_details);
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
    // die;
    $username=$caf_details['data'][0]['username'];

 echo $partial_invoice_amount=$difference_in_date*$one_day_rate;
$particular=array('particular'=>['advance rental'],'price'=> [$partial_invoice_amount]);
// $username='surya_1544874923';
modules::run('account/account/collect_information_invoices',$username,$particular);
}
function te()
{

$this->load->view('a');
}
function tes()
{
echo $this->session->logo;
  // print_r($this->input->post());
}
function process()
 {
   $data['_view'] = 'validate';
  $this->load->view('index',$data);
  // $this->load->view('validate');
}
function validate()
{
  // $this->load->view('validate');
  // $frenchise_id_param=array('f_id'=>35);
  //   $checkIsp=modules::run('api_call/api_call/call_api',''.api_url().'account/check_isp',$frenchise_id_param,'POST');
  //   print_r($checkIsp);
  //   $dotTaxMaintain=array(

  //   'invoice_id'=>$invoice_id,
  //   'f_id'=>$checkIsp['data']['frenchise_id'],
  //   'tax_name'=>'dot',
  //   'tax_amount'=>($amount * (8)/100) 


  // ); 
  //   print_r($dotTaxMaintain);
}

function ajaxtest()
{
  $id=$this->input->post('parent');

  echo $id;
// $str=            '               welcome to mumbai         ';
// echo json_encode(trim($str));
// echo '<br>';
echo json_encode($id);
}
/*all function end*/
}
?>	