<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Nas extends MY_Controller
{

	function __construct()
	{
		parent::__construct();


	}


	function add_nas()
	{
		$data['_view'] = 'add';
		$this->load->view('index',$data);

	}
	function add()
	{
		
		// $authenticateParam=array(
		// 	'function_name'=>'add',
		// 	'api_key'=>'123'	
		// );
		$f_id=$this->session->f_id;
		$api_key=md5(microtime().rand());
		$params = array(

			'name' => $this->input->post('name',true),
			'nas_id' => $this->input->post('nas_id',true),
			'mac_address' => $this->input->post('mac_address',true),
			'ip_address' => $this->input->post('ip_address',true),

			'port' => $this->input->post('port',true),
			'type' => $this->input->post('type',true),
			'api_key'=>$api_key,
			'f_id'=>$f_id

		);
		// $d=json_encode($params);
		// $get_data = modules::run('api_call/api_call/call_api','POST','http://localhost/radius/nas/testtwo',$d);
		$get_data = modules::run('api_call/api_call/call_api',''.api_url().'nas/insertNas',$params,'POST');
		try
		{
			if($get_data=='')
			{
				throw new Exception("server down", 1);
				log_error("account/getInvoiceData function error");

			}
			if(isset($get_data['error']))
			{
				throw new Exception($get_data['error'], 1);
			}
		}
		catch(Exception $e)
		{
			die(show_error($e->getMessage()));
		}
		
		if($get_data['status']=='success')
		{
		// var_dump($get_data);
			$this->session->alerts = array(
				'severity'=> 'success',
				'title'=> 'successfully added'
			);
			redirect('nas/nas_list');
		}
		elseif($get_data['status']=='fail')
		{
			echo 'operation fail';
		}
		
		// $response = json_decode($get_data, true);
		// var_dump($response);


	}
	function nas_list()
	{
		$f_id=$this->session->f_id;
		$params=array('f_id'=>$f_id);
		$get_data = modules::run('api_call/api_call/call_api',''.api_url().'nas/nasList',$params,'POST');
				try
				{
					if($get_data=='')
					{
						throw new Exception("server down", 1);
						log_error("nas/nasList error");

					}
					if(isset($get_data['error']))
					{
						throw new Exception($get_data['error'], 1);
					}
				}
				catch(Exception $e)
				{
					die(show_error($e->getMessage()));
				}
				
		if($get_data['status']=='success')
		{
			$data['nas'] =$get_data['data'];
			
			

		}
		else if($get_data['status']=='not found')
		{
				
			$data['nas']=[];
			
		}

		$data['_view'] = 'nasList';
			$this->load->view('index',$data);


	}



	function remove($ids)
	{
		$id=array('id'=>$ids);
		$get_data = modules::run('api_call/api_call/call_api',''.api_url().'nas/delete',$id,'POST');
		redirect('nas/nas_list');
	}

	function edit_view($id)

	{
		$params=array('id'=>$id);
		$data = modules::run('api_call/api_call/call_api',''.api_url().'nas/fetchNasData',$params,'POST');
			 // var_dump($data);die;
		$data['_view'] = 'edit';
		$this->load->view('index',$data);

	}
	function edit($id)
	{

		$params = array(

			'name' => $this->input->post('name'),
			'nas_id' => $this->input->post('nas_id'),
			'mac_address' => $this->input->post('mac_address'),
			'ip_address' => $this->input->post('ip_address'),

			'port' => $this->input->post('port'),
			'type' => $this->input->post('type'),
			'id'=>$id


		);

		$get_data = modules::run('api_call/api_call/call_api',''.api_url().'nas/updateNas',$params,'POST');
		if($get_data['status']='success')
		{
			$this->session->alerts = array(
				'severity'=> 'success',
				'title'=> 'successfully updated'
			);
			redirect('nas/nas_list');
		}

	}
	function validateIpAddress()
	{

		$ip_address=$this->input->post('ip');
		if(filter_var($ip_address,FILTER_VALIDATE_IP)){
			echo "ip address is correct";
			// echo "ip address is correct";
		}else{
			echo "Invalid ip address";
		}
	}
	function form()
	{
		$data['_view'] = 'form';
		$this->load->view('index',$data);
	}
}


?>