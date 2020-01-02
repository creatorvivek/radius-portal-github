<?php


class Log extends MY_Controller{
	function __construct()
	{
		parent::__construct();

		$this->load->model('Log_model');

	} 


function user_log($crn_number,$f_id,$activity,$staff_id)
{
$params=array(
'crn_number'=>$crn_number,
'f_id'=>$f_id,
'activity'=>$activity,
'staff_id'=>$staff_id
);
$this->Log_model->insert_log($params);

}

function user_audit()
{	

	$f_id=$this->session->f_id;
  	$condition=array('f_id'=>$f_id);
 	 $customer= modules::run('api_call/api_call/call_api',''.api_url().'crn/crnList',$condition,'POST');
 	 $data['customer']=$customer['data'];
 	 // print_r($data['customer']);
	if($this->input->post('crn_number'))
	{
		$crn_number=$this->input->post('crn_number',1);
		$data['audit']=$this->Log_model->select_log($crn_number);
		$data['crn_number_post']=$crn_number;
		// print_r($data);die;
	}
	else
	{	
		$crn_number='';
		$data['audit']=[];
	}
	 	$data['_view'] = 'audit';
		 $this->load->view('index',$data);
}



}
?>