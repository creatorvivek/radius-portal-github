<?php


class Ticket extends MY_Controller{
	function __construct()
	{
		parent::__construct();


	} 


/*
* Adding a new ticket
*/
function add_ticket()
{
	##when in list user click in ticket generate button then all credential is fetch by get method 
	if($this->input->get())
	{
		$data['crn']=$this->input->get('crn');
		$data['mobile']=$this->input->get('mobile');
		$data['email']=$this->input->get('email');
		$data['name']=$this->input->get('name');

	}
	else
	{
		$data['crn']='';
		$data['mobile']='';
		$data['email']='';
		$data['name']='';
	}
	// var_dump($this->input->get());die;
	// $id=$this->session->id;
	$f_id=$this->session->f_id;
	$params=array('f_id'=>$f_id);
	$group_data=modules::run('api_call/api_call/call_api',''.api_url().'group/groupList',$params,'POST');
	try
	{
		if($group_data=='')
		{
			throw new Exception("server down", 1);
			log_error("group/groupList function error");

		}
		if(isset($group_data['error']))
		{
			throw new Exception($group_data['error'], 1);
		}
	}
	catch(Exception $e)
	{
		die(show_error($e->getMessage()));
	}

	if($group_data['status']=='success')
	{
		$data['group']=$group_data['data'];

	}
	else
	{
		$data['group']=[];
	}
	$staff_info = modules::run('api_call/api_call/call_api',''.api_url().'staff/fetchstaff',$params,'POST');
	try
	{
		if($staff_info=='')
		{
			throw new Exception("server down", 1);
			log_error("staff/fetchstaff function error");

		}
		if(isset($staff_info['error']))
		{
			throw new Exception($staff_info['error'], 1);
		}
	}
	catch(Exception $e)
	{
		die(show_error($e->getMessage()));
	}

	if($staff_info['status']=='success')
	{

		$data['staff']=$staff_info['data'];

	}
	else
	{
		$data['staff']=[];
	}
	$data['_view'] = 'add_ticket2';
	$this->load->view('index',$data);
}
function add()
{   
	
	$f_id=$this->session->f_id;
	$staff_id=$this->session->staff_id;
	
	
##if user is new so insert data in crn table	
	$name = $this->input->post('name',true);
	$type=$this->input->post('type',true);
            // 'username'=>$this->input->post('username'),
	$email = $this->input->post('email',true);
	$mobile = $this->input->post('mobile',true);
	$description = $this->input->post('description',true);
	$location = $this->input->post('location',true);
	$comment = $this->input->post('comment',true);
	$assign=$this->input->post('assign',true);
	$lead=$this->input->post('lead',true);
	$priority=$this->input->post('priority',true);
	$crn_number=$this->input->post('crn',true);
	$date=date('Y-m-d H-i-s');
	$attend_type = $this->input->post('attend_type',true);
	// print_r($this->input->post('assign_ind'));
	// print_r($this->input->post('assign_inds'));
	$this->load->library('form_validation');

	$this->form_validation->set_rules('name','Name','required|trim');
	$this->form_validation->set_rules('description','discription','trim');
	$this->form_validation->set_rules('mobile','mobile','required|trim');
	$this->form_validation->set_rules('location','location','required|trim');
	$this->form_validation->set_rules('comment','comment','required|trim');
	$this->form_validation->set_rules('email','Email','required|valid_email|trim');

	$this->form_validation->set_rules('mobile','Mobile number','required|exact_length[10]');

	if($this->form_validation->run() )     
	{  

		if(!$crn_number)
		{
			$crnParams=array(

				'name' => $name,
				'type'=>$type,
            // 'username'=>$this->input->post('username'),
				'email' =>$email,
				'mobile' => $mobile,

				'location' => $location,


				'leads'=>$lead,

				'f_id'=>$f_id,
				'created_at'=>$date
			);
			$addCrnDetails= modules::run('api_call/api_call/call_api',''.api_url().'crn/addCrn',$crnParams,'POST');
			try
			{
				if($addCrnDetails=='')
				{
					throw new Exception("server down", 1);
					log_error("crn/addCrn function error");

				}
				if(isset($addCrnDetails['error']))
				{
					throw new Exception($addCrnDetails['error'], 1);
				}
			}
			catch(Exception $e)
			{
				die(show_error($e->getMessage()));
			}

		// var_dump($addCrnDetails['last_inserted_id']);
			$crn_number=$addCrnDetails['last_inserted_id'];
		}
##generate new ticket id and check previous id
		$params=array(
			'f_id'=>$f_id
		);
		$ticketNo= modules::run('api_call/api_call/call_api',''.api_url().'ticket/getLastTicketId',$params,'POST');

    // var_dump($ticketNo['ticket_id']);
    // die;
		if($ticketNo['status']=='success')
		{
			$ticket_id=$ticketNo['ticket_id'];
		}
		elseif($ticketNo['status']=='initiate')
		{
			$ticket_id='f'.$this->session->f_id.'_00000'.$ticketNo['data'];
		}
		$ticketparams = array(

			'crn_number' => isset($crn_number)?$crn_number:$crn,
			'type'=>$type,
			'name'=>$name,
			'email' =>$email,
			'mobile' => $mobile,
			'description' => $description,
			'location' => $location,
			'comment' => $comment,
			'assign'=>$assign,
			'lead'=>$lead,
			'ticket_id'=>$ticket_id,
			'f_id'=>$f_id,
			'priority'=>$priority,
			'created_at'=>$date,
			'created_by'=>$staff_id,
			'attend_type'=>$attend_type
            ## testing purpose


		);
	// var_dump($ticketparams);
##insert ticket parameter in ticket table
		$ticketData= modules::run('api_call/api_call/call_api',''.api_url().'ticket/addTicket',$ticketparams,'POST');
		$assignIndivisual=$this->input->post('assign_indivisual');
	// print_r($assignIndivisual);die;
		if($assignIndivisual)
		{
	##mapping of assign and ticket id
			foreach ($assignIndivisual as $row) {
				$mapping=array(
					'ticket_id'=>$ticket_id,
					'assign_id'=>$row

				);
			// print_r($mapping);die;
				$mapInfo = modules::run('api_call/api_call/call_api',''.api_url().'ticket/mapTicketAssign',$mapping,'POST');

			}
		}
		$assignGroup=$this->input->post('assign_group');
		if($assignGroup)
		{
	##mapping of assign and ticket id
			foreach ($assignGroup as $row) {
				$grpmapping=array(
					'ticket_id'=>$ticket_id,
					'assign_id'=>$row

				);
				$mapInfo = modules::run('api_call/api_call/call_api',''.api_url().'ticket/mapTicketAssign',$grpmapping,'POST');

			}
		}
		/*end mapping*/
##insert log in log_ticket table	
		$logParams=array(

			'created_by' =>$staff_id,
			'type'=>$this->input->post('type',true),
            // 'username'=>$this->input->post('username'),
			'email' => $this->input->post('email',true),
			'mobile' => $this->input->post('mobile',true),
			'description' => $this->input->post('description',true),
            // 'location' => $this->input->post('location'),	
			'comment' => $this->input->post('comment',true),
			'assign'=>$this->input->post('assign',true),
			'lead'=>$this->input->post('lead',true),
			'ticket_id'=>$ticket_id,
			'reply'=>NULL,
			'created_at'=>$date

		);
		$ticketLogData= modules::run('api_call/api_call/call_api',''.api_url().'ticket/addTicketLog',$logParams,'POST');
	 ##send log
		try
		{
			if($ticketLogData=='')
			{
				throw new Exception("server down", 1);
				log_error("ticket/addTicketLog error");

			}
			if(isset($ticketLogData['error']))
			{
				throw new Exception($ticketLogData['error'], 1);
			}
		}
		catch(Exception $e)
		{
			die(show_error($e->getMessage()));
		}

		if(isset($crn_number))
		{
			$activity='Ticket number <b>'.$ticket_id.'</b> generated for issue  - :  <b>'.$comment.'</b> ' ;
		}
		else
		{
			$activity='new user crn number -: '.$crnTicket.'   number <b>'.$ticket_id.'</b> generated for issue  - :  <b>'.$comment.'</b> ' ;
		}

		$send_log=modules::run('log/log/user_log',$crn_number,$f_id,$activity,$staff_id);

	// var_dump($ticketLogData);
		if($ticketLogData['status']=='success')
		{
			$this->session->alerts = array(
				'severity'=> 'success',
				'title'=> 'successfully ticket generate'

			);
		}
		redirect('ticket/add_ticket');
	}
	else
	{

		if($this->input->get())
		{
			$data['crn']=$this->input->get('crn');
			$data['mobile']=$this->input->get('mobile');
			$data['email']=$this->input->get('email');
			$data['name']=$this->input->get('name');

		}
		else
		{
			$data['crn']='';
			$data['mobile']='';
			$data['email']='';
			$data['name']='';
		}
	// var_dump($this->input->get());die;
	// $id=$this->session->id;
		$f_id=$this->session->f_id;
		$params=array('f_id'=>$f_id);
		$group_data=modules::run('api_call/api_call/call_api',''.api_url().'group/groupList',$params,'POST');
		try
		{
			if($group_data=='')
			{
				throw new Exception("server down", 1);
				log_error("group/groupList function error");

			}
			if(isset($group_data['error']))
			{
				throw new Exception($group_data['error'], 1);
			}
		}
		catch(Exception $e)
		{
			die(show_error($e->getMessage()));
		}

		if($group_data['status']=='success')
		{
			$data['group']=$group_data['data'];

		}
		else
		{
			$data['group']=[];
		}
		$staff_info = modules::run('api_call/api_call/call_api',''.api_url().'staff/fetchstaff',$params,'POST');
		try
		{
			if($staff_info=='')
			{
				throw new Exception("server down", 1);
				log_error("staff/fetchstaff function error");

			}
			if(isset($staff_info['error']))
			{
				throw new Exception($staff_info['error'], 1);
			}
		}
		catch(Exception $e)
		{
			die(show_error($e->getMessage()));
		}

		if($staff_info['status']=='success')
		{

			$data['staff']=$staff_info['data'];

		}
		else
		{
			$data['staff']=[];
		}
		$data['_view'] = 'add_ticket2';
		$this->load->view('index',$data);
	}
}


function open_ticket()
{	
	
	$f_id=$this->session->f_id;
	$condition=array('f_id'=>$f_id,'status'=>'open');
	$ticketData= modules::run('api_call/api_call/call_api',''.api_url().'ticket/fetchTicketByCondition',$condition,'POST');
	// var_dump($ticketData);
	try
	{
		if($ticketData=='')
		{
			throw new Exception("server down", 1);
			log_error("ticket/fetchTicketByCondition");

		}
		if(isset($ticketData['error']))
		{
			throw new Exception($ticketData['error'], 1);
		}
	}
	catch(Exception $e)
	{
		die(show_error($e->getMessage()));
	}

	if($ticketData['status']=='success')
	{
		$data['open_ticket']=$ticketData['data'];
		$data['_view'] = 'open_ticket';
		$this->load->view('index',$data);
	}
	elseif($ticketData['status']=='not found')
	{
		$data['open_ticket']=[];
		$data['_view'] = 'open_ticket';
		$this->load->view('index',$data);
	}
	
	// $data['r']=3;
	// var_dump($data['open_ticket']);die;
	
}
function close_ticket()
{	
	$f_id=$this->session->f_id;
	$condition=array('f_id'=>$f_id,'status'=>'close');
	$ticketData= modules::run('api_call/api_call/call_api',''.api_url().'ticket/fetchTicketByCondition',$condition,'POST');
	try
	{
		if($ticketData=='')
		{
			throw new Exception("server down", 1);
			log_error("ticket/fetchTicketByCondition");

		}
		if(isset($ticketData['error']))
		{
			throw new Exception($ticketData['error'], 1);
		}
	}
	catch(Exception $e)
	{
		die(show_error($e->getMessage()));
	}

	if($ticketData['status']=='success')
	{
		$data['open_ticket']=$ticketData['data'];
		$data['_view'] = 'open_ticket';
		$this->load->view('index',$data);
	}
	##if no record in table so empty table show
	elseif($ticketData['status']=='not found')
	{
		$data['open_ticket']=[];
		$data['_view'] = 'open_ticket';
		$this->load->view('index',$data);
	}
	##show api related error


	
}

function my_close_ticket()
{
	$staff_id=$this->session->staff_id;
	$condition=array('status'=>'close','assign_id'=>$staff_id);
	$ticketData= modules::run('api_call/api_call/call_api',''.api_url().'ticket/myTicketList',$condition,'POST');
	try
	{
		if($ticketData=='')
		{
			throw new Exception("server down", 1);
			log_error("ticket/myTicketList");

		}
		if(isset($ticketData['error']))
		{
			throw new Exception($ticketData['error'], 1);
		}
	}
	catch(Exception $e)
	{
		die(show_error($e->getMessage()));
	}

	if($ticketData['status']=='success')
	{
		$data['open_ticket']=$ticketData['data'];
		$data['_view'] = 'open_ticket';
		$this->load->view('index',$data);
	}
	elseif($ticketData['status']=='not found')
	{
		$data['open_ticket']=[];
		$data['_view'] = 'open_ticket';
		$this->load->view('index',$data);
	}
	
}
function my_open_ticket()
{
	$group_id=$this->session->group_id;
	$staff_id=$this->session->staff_id;
	$condition=array('status'=>'open','assign_id'=>$staff_id);
	$ticketDataByStaffId= modules::run('api_call/api_call/call_api',''.api_url().'ticket/myTicketList',$condition,'POST');
	$conditionGroup=array('status'=>'open','assign_id'=>$group_id);
	$ticketDataByGroupId= modules::run('api_call/api_call/call_api',''.api_url().'ticket/myTicketList',$conditionGroup,'POST');

	try
	{
		if($ticketDataByStaffId=='' && $ticketDataByGroupId=='')
		{
			throw new Exception("server down", 1);
			log_error("ticket/myTicketList");

		}
		if(isset($ticketDataByStaffId['error']) )
		{
			throw new Exception($ticketDataByStaffId['error'], 1);
		}
		if(isset($ticketDataByGroupId['error']) )
		{
			throw new Exception($ticketDataByGroupId['error'], 1);
		}
	}
	catch(Exception $e)
	{
		die(show_error($e->getMessage()));
	}

	$data['list']=array_merge($ticketDataByStaffId['data'],$ticketDataByGroupId['data']);
	// var_dump($data['list']);die;
	if($ticketDataByStaffId['status']=='success')
	{
		// $data['open_ticket']=$ticketDataByStaffId['data'];
		$data['open_ticket']=$data['list'];
		$data['_view'] = 'open_ticket';
		$this->load->view('index',$data);
	}
	elseif($ticketDataByStaffId['status']=='not found')
	{
		$data['open_ticket']=[];
		$data['_view'] = 'open_ticket';
		$this->load->view('index',$data);
	}
	
}

function statusChange()
{       
	$status=$this->input->post('status');
	$id=$this->input->post('id');
	$ticket_id=$this->input->post('ticket_id');
	$params=array(
		'status'=>$status,
		'id'=>$id
	);
	$ticketData= modules::run('api_call/api_call/call_api',''.api_url().'ticket/statusUpdate',$params,'POST');
	try
	{
		if($ticketData=='')
		{
			throw new Exception("server down", 1);
			log_error("ticket/statusUpdate error");

		}
		if(isset($ticketData['error']))
		{
			throw new Exception($ticketData['error'], 1);
		}
	}
	catch(Exception $e)
	{
		die(show_error($e->getMessage()));
	}

	if($status=='close')
	{
		$ticketParams=array(
			'status'=>$status,
			'ticket_id'=>$ticket_id
		);
		modules::run('api_call/api_call/call_api',''.api_url().'ticket/statusUpdateMain',$ticketParams,'POST');
	}
	// echo json_encode($ticketData);die;
	if($ticketData['status']=='success')
	{
		echo "status update successfully";
	}
	elseif($ticketData['status']=='not found')
	{
		echo "not updated";
	}
	
}
#3 ticket add process


function existing_add()
{
	// print_r($this->input->post());
	// die;
	$staff_id=$this->session->staff_id;
	$logParams=array(

		'created_by' =>$staff_id,
		'type'=>$this->input->post('type',true),
            // 'username'=>$this->input->post('username'),
		'email' => $this->input->post('email',true),
		'mobile' => $this->input->post('mobile',true),
		'description' => htmlspecialchars($this->input->post('description',true)),	
            // 'location' => $this->input->post('location'),	
		'comment' => htmlspecialchars($this->input->post('comment',true)),
		'assign'=>$this->input->post('assign',true),
		'lead'=>$this->input->post('lead',true),
		'ticket_id'=>$this->input->post('ticket_no',true),
		'reply'=>NULL,
		'created_at'=>date('Y-m-d H:i:s')

	);
	$ticketLogData= modules::run('api_call/api_call/call_api',''.api_url().'ticket/addTicketLog',$logParams,'POST');
	try
	{
		if($ticketLogData=='')
		{
			throw new Exception("server down", 1);
			log_error("ticket/addTicketLog function error");

		}
		if(isset($ticketLogData['error']))
		{
			throw new Exception($ticketLogData['error'], 1);
		}
	}
	catch(Exception $e)
	{
		die(show_error($e->getMessage()));
	}

	$assignIndivisual=$this->input->post('assign_indivisual');
	if($assignIndivisual)
	{
	##mapping of assign and ticket id
		foreach ($assignIndivisual as $row) {
			$mapping=array(
				'ticket_id'=>$ticket_id,
				'assign_id'=>$row

			);
			$mapInfo = modules::run('api_call/api_call/call_api',''.api_url().'ticket/mapTicketAssign',$mapping,'POST');

		}
	}
	$assignGroup=$this->input->post('assign_group');
	if($assignGroup)
	{
	##mapping of assign and ticket id
		foreach ($assignGroup as $row) {
			$grpmapping=array(
				'ticket_id'=>$ticket_id,
				'assign_id'=>$row

			);
			$mapInfo = modules::run('api_call/api_call/call_api',''.api_url().'ticket/mapTicketAssign',$grpmapping,'POST');

		}
	}
	/*end mapping*/
	if($ticketLogData['status']=='success')
	{
		$this->session->alerts = array(
			'severity'=> 'success',
			'title'=> 'successfully ticket Log generate'

		);
		// echo json_encode("succesfully");
		redirect('ticket/add_ticket');
	}
	



}

function log_ticket_by_ticket_no()
{
	
	$ticket_id=$this->uri->segment(3);
	
	$condition=array('id'=>$ticket_id);
	##fetch ticket log by ticket number
	$ticketLogData=modules::run('api_call/api_call/call_api',''.api_url().'ticket/logByTicketNumber',$condition,'POST');
	try
	{
		if($ticketLogData=='')
		{
			throw new Exception("server down", 1);
			log_error("task/addtask function error");

		}
		if(isset($ticketLogData['error']))
		{
			throw new Exception($ticketLogData['error'], 1);
		}
	}
	catch(Exception $e)
	{
		die(show_error($e->getMessage()));
	}

	
	if($ticketLogData['status']=='success')
	{
		$data['ticket_log']=$ticketLogData['data'];
	}
	elseif($ticketLogData['status']=='not found')
	{
		$data['ticket_log']=[];
	}
	else
	{
		$data['ticket_log']=[];
		
	}

	$data['_view'] = 'logTicket';
	$this->load->view('index',$data);

}


function ticket_response()
{
	$data['title']='ticket response';
	$ticket_id=$this->uri->segment(3);
	// $ticket_id=$this->input->get('ticket_id');
	$condition=array('id'=>$ticket_id);
	// var_dump($ticket_id);
	// var_dump($condition);
	
	$ticketLogData=modules::run('api_call/api_call/call_api',''.api_url().'ticket/logByTicketNumber',$condition,'POST');
	try
	{
		if($ticketLogData=='')
		{
			throw new Exception("server down", 1);
			log_error("task/addtask function error");

		}
		if(isset($ticketLogData['error']))
		{
			throw new Exception($ticketLogData['error'], 1);
		}
	}
	catch(Exception $e)
	{
		die(show_error($e->getMessage()));
	}

	if($ticketLogData['status']=='success')
	{
		$f_id=$this->session->f_id;
		$params=array('f_id'=>$f_id);
		$staff_info = modules::run('api_call/api_call/call_api',''.api_url().'staff/fetchstaff',$params,'POST');
		if($staff_info['status']=='success')
		{

			$data['staff']=$staff_info['data'];

		}
		else
		{
			$data['staff']=[];
		}
		$data['ticket_detail']=$ticketLogData['data'][0];
	}
	elseif($ticketLogData['status']=='not found')
	{
		$data['ticket_detail']=[];
	}
	else
	{
		echo $ticketLogData['error'];
	}
	$data['_view'] = 'ticketResponse';
	$this->load->view('index',$data);
}

function ticket_list()
{
	$data['title']='ticket list';
	$f_id=$this->session->f_id;
	$condition=array('type'=>1,'f_id'=>$f_id);
	// $con=$this->security->xss_clean($condition);
	$customerTicket= modules::run('api_call/api_call/call_api',''.api_url().'ticket/fetchTickets',$condition,'POST');
	// var_dump($customerTicket);die;
	try
	{
		if($customerTicket=='')
		{
			throw new Exception("server down", 1);
			log_error("ticket/fetchTickets function error");

		}
		if(isset($customerTicket['error']))
		{
			throw new Exception($customerTicket['error'], 1);
		}
	}
	catch(Exception $e)
	{
		die(show_error($e->getMessage()));
	}

	if($customerTicket['status']=='success')
	{
		$data['customer']=$customerTicket['data'];
	}
	elseif($customerTicket['status']=='not found')
	{
		$data['customer']=[];
	}
	
	$condition=array('type'=>2,'f_id'=>$f_id);
	$frenchiseTicket= modules::run('api_call/api_call/call_api',''.api_url().'ticket/fetchTickets',$condition,'POST');
	// var_dump($ticketData);
	if($frenchiseTicket['status']=='success')
	{
		$data['frenchise']=$frenchiseTicket['data'];
		
	}
	elseif($frenchiseTicket['status']=='not found')
	{
		$data['frenchise']=[];
		
	}
	$data['_view'] = 'allTicket';
	$this->load->view('index',$data);
	// $data['r']=3;
	// var_dump($data['open_ticket']);die;
	

}
function autofill()
{
	$id=$this->input->post("id");
	$params=array('crn_id'=>$id);
	$data=modules::run('api_call/api_call/call_api',''.api_url().'ticket/getAutoFill',$params,'POST');
	if($data['status']=='success')
	{
		echo json_encode($data['data']);
	}
}


function getSearchResult()
{
	$search_query=$this->input->post('search_query');
	$f_id=$this->session->f_id;
	$params=array('query'=>$search_query,'f_id'=>$f_id);
	$data=modules::run('api_call/api_call/call_api',''.api_url().'ticket/getAutoSuggetions',$params,'POST');
	if($data['status']=='success')
	{
		echo json_encode($data['data']);
	}
	// var_dump($data);

}


## used to reply to customer by sms or reply in portal and assign other staff for ticket
function reply()
{

	$message=$this->input->post('sms');
	$status=$this->input->post('status');
	$mobile=$this->input->post('mobile');
	$statusclose=$this->input->post('statusclose');
	$ticket_id=$this->input->post('ticket_id');
	$crn_number=$this->input->post('crn_number');
	$staff_id=$this->session->staff_id;
	$f_id=$this->session->f_id;
	

	if($message)
	{
		/*send($mobile,$reply);*/
	## send reply to customer number
		$messageParams=array('message'=>$message,'mobile'=>$mobile);

		modules::run('api_call/api_call/call_api',''.api_url().'sms/send_sms',$messageParams,'POST');
	}
	##resolve and request to close
	if($status)
	{
		$status_update='request to close';
	}
	##for resolve and close
	if($statusclose)
	{
		$status_update='close';
		$ticketParams=array(
			'status'=>$status_update,
			'ticket_id'=>$ticket_id
		);
		modules::run('api_call/api_call/call_api',''.api_url().'ticket/statusUpdateMain',$ticketParams,'POST');
		$activity='Ticket number <b>'.$ticket_id.'</b> close  ' ;

		$send_log=modules::run('log/log/user_log',$crn_number,$f_id,$activity,$staff_id);
		
	}
	
	$comment=$this->input->post('comment');
	$reply=$this->input->post('reply');
	$replyData=array(
		'ticket_id'=>$ticket_id,
		'comment'=>$comment,
		'reply'=>$reply,
		'created_at'=>date('Y-m-d H:i:s'),
		'created_by'=>$staff_id,
		'status'=>isset($status_update)?$status_update:'open'
		
	);

	$data=modules::run('api_call/api_call/call_api',''.api_url().'ticket/replyTicket',$replyData,'POST');
	if($data['status']=='success')
	{
		$assign=$this->input->post('assign');
		if($assign)
		{
			$assignParams=array('assign_id'=>$assign,'ticket_id'=>$ticket_id);
			$mapInfo = modules::run('api_call/api_call/call_api',''.api_url().'ticket/mapTicketAssign',$assignParams,'POST');
			
			$updateAssign=array('ticket_id'=>$ticket_id);
			$assignInfo = modules::run('api_call/api_call/call_api',''.api_url().'ticket/updateAssignInMain',$updateAssign,'POST');
				// var_dump($assignInfo);
			
		}

	}
	// echo json_encode($data);
	redirect('ticket/log_ticket_by_ticket_no/'.$ticket_id);

}


}
?>