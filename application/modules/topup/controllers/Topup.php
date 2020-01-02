<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Topup extends MY_Controller
{

 function __construct()
 {
  parent::__construct();
}





function add_topup()
{
  

  $data['_view'] = 'add_topup';
  $this->load->view('index',$data);
}

function task_list()
{
  /*$this->session->f_id="";*/
  /*future use*/
  $f_id=$this->session->f_id;
  $staff_id=$this->session->staff_id;
  $params=array('assign'=>$staff_id);
  $get_data=modules::run('api_call/api_call/call_api',''.api_url().'task/fetchtask',$params,'POST');
    // var_dump($get_data);die;
  if($get_data['status']=='success')
  {
    $data['task']=$get_data['data'];
    $data['_view'] = 'taskList';
    $this->load->view('index',$data);
    
  }
  elseif($get_data['status']=='not found')
  {
    $data['task']=[];
    $data['_view'] = 'taskList';
    $this->load->view('index',$data);
  }
  else
  {
    echo $get_data['error'];
  }

}




function add()
{
  $f_id=$this->session->f_id;
  $topup_name = $this->input->post('name');
  
  $topup_amount= $this->input->post('topup_amount');
  $data_limit = $this->input->post('data_limit');
  // $f_id=$this->session->f_id;

  $params=array(
    'topup_name'=>$topup_name,
    'amount'=>$topup_amount,
    'data_limit'=>$data_limit,
    'created_at'=>date('y-m-d:h-m-s'), 
    'f_id'=>$f_id

  );

  $get_data=modules::run('api_call/api_call/call_api',''.api_url().'topup/addTopup',$params,'POST');
  // var_dump($get_data);die;
  if($get_data['status']=='success')
  {
    $this->session->alerts = array(
      'severity'=> 'success',
      'title'=> 'successfully topup added'
    );
    // redirect('topup/add_task');
    
  }
  else
  {
    $data['error']="TOPUP ADDED FAILED";
    $data['_view'] = 'add_task';
    $this->load->view('index',$data);
  }


}






/*all function end*/
}
?>	