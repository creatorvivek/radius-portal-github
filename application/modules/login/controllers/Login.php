<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller
{

	function __construct()
	{
		parent::__construct();

    $this->load->helper('captcha');

  }

  public function index()
  {
// Load our view to be displayed
    $data['title']="login";
    // $file=$this->session->userdata('file_name');
    // if($file && file_exists('./captcha'.$file))
    // {
    //   unlink('/captcha/'.$this->session->userdata('file_name'));
    // }
    // $vals = array(
    //     // 'word'          => 'Random word',
    //   'img_path'      => './captcha/',
    //   'img_url'       => base_url('captcha'),
    //     // 'font_path'     => './path/to/fonts/texb.ttf',
    //   'img_width'     => '90',
    //     // 'img_height'    => 30,
    //   'expiration'    => 7200,
    //   'word_length'   => 4,
    //     // 'font_size'     => 19,
    //     // 'img_id'        => 'Imageid',
    //   'pool'          => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',

    //     // White background and border, black text and red grid
    //   'colors'        => array(
    //     'background' =>array(255, 255, 255),
    //     'border' => array(192,192,192),
    //     'text' => array(0, 0, 0),
    //     'grid' => array(255, 255, 255)
    //   )
    // );

    // $data['cap'] = create_captcha($vals);
    // $this->session->set_userdata('captcha_key',$data['cap']['word']);
    // $this->session->set_userdata('file_name',$data['cap']['filename']);
    $this->load->view('login', $data);
  }


  public function process()
  {


   //    $val = array(

   //      'img_path'      => './captcha/',
   //      'img_url'       => base_url('captcha'),
   //      // 'font_path'     => './path/to/fonts/texb.ttf',
   //      'img_width'     => '90',
   //      // 'img_height'    => 30,
   //      'expiration'    => 7200,
   //      'word_length'   => 4,
   //      // 'font_size'     => 19,
   //      // 'img_id'        => 'Imageid',
   //      'pool'          => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',

   //      // White background and border, black text and red grid
   //      'colors'        => array(
   //          'background' =>array(255, 255, 255) ,
   //          'border' => array(192, 192, 192),
   //          'text' => array(0, 0, 0),
   //          'grid' => array(255, 255, 255)
   //      )
   //  );

   //    $data['cap'] = create_captcha($val);
   //    $sessionCaptcha=$this->session->userdata('captcha_key');

   //     $typeCaptcha=$this->input->post('captcha');
   //     $image=$this->session->userdata('file_name');
   //     // var_dump($image);die;
   //     @unlink('./captcha/'.$image);
   //    if($sessionCaptcha!=$typeCaptcha)
   //    {
   //     $data['message'] = array(
   //        'error_message' => 'Invalid captcha'
   //    );
   //    // var_dump($data['cap']);
   //     $this->session->set_userdata('captcha_key',$data['cap']['word']);
   //     $this->load->view('login', $data);
   //   }
   // else   
   // {
    $loginInput=array(
     'username' => $this->security->xss_clean($this->input->post('username')),
     'password' => $this->security->xss_clean(md5($this->input->post('password')))
   );
##api call
        // var_dump($loginInput); die;
    $get_data= modules::run('api_call/api_call/call_api',''.api_url().'login/login_authentication',$loginInput,'POST');
        // var_dump($get_data);die;
 // $resp
 // print_r($response);die;
  // var_dump($get_data);

  //        die;
    try{
      if($get_data=='')
      {
        throw new Exception("server down", 1);

      }
    }
    catch(Exception $e)
    {
     die(show_error($e->getMessage()));
   }
##insert log in database
   $logsData=array(
    'username'=>isset($get_data['data'][0]['username'])?$get_data['data'][0]['username']:$loginInput['username'],
    'ip_address'=>$this->input->ip_address(),
    'date'=>date('y-m-d H:i:s'),
    'status'=>($get_data['status']=='success')?1:0
  );
   $insert_log= modules::run('api_call/api_call/call_api',''.api_url().'login/insert_log_login',$logsData,'POST');
   if($get_data['status']==false)
   {
     echo ($get_data['error']);
   }
   elseif($get_data['status']=='success')
   {
     $api_key=$this->session->api_key=$get_data['data'][0]['api_key'];
     $username=$this->session->username=$get_data['data'][0]['username'];
     $user_id=$this->session->user_id=$get_data['data'][0]['user_id'];

     $authorization_id=$this->session->authorization_id=$get_data['data'][0]['authorization_id'];
     $f_id=$this->session->f_id=$get_data['data'][0]['f_id'];
            ##search frenchise details
     $frenchise_param=array('id'=>$f_id);    
     $frenchise_data= modules::run('api_call/api_call/call_api',''.api_url().'frenchise/listFrenchiseSession',$frenchise_param,'POST');
     if($frenchise_data['status']=='success')
     {
       $this->session->invoice_template=$frenchise_data['data'][0]['invoice_template'];
       $this->session->dashboard_template=$frenchise_data['data'][0]['dashboard_template'];
       $this->session->logo=$frenchise_data['data'][0]['logo'];
       $this->session->frenchise_name=$frenchise_data['data'][0]['name'];
       $this->session->frenchise_type=$frenchise_data['data'][0]['frenchise_type'];
     }

// die;

     switch($get_data['data'][0]['authorization_id'])
     {
                ##admin
      case 0;
      redirect('super_admin/dashboard');
      break;
      case 1:
      $staff_id=$this->session->staff_id=$get_data['data'][0]['staff_id'];
       $params=array('member_id'=>$staff_id);
       ##if admin belong to any group so this function create session of group
      $groupInfo = modules::run('api_call/api_call/call_api',''.api_url().'group/myGroup',$params,'POST');
      try{
        if($groupInfo=='')
        {
          throw new Exception("server down", 1);

        }
      }
      catch(Exception $e)
      {
       die(show_error($e->getMessage()));
     }
     if($groupInfo['status']=='success')
     {
      $group_id=$this->session->group_id=$groupInfo['data'][0]['group_id'];
    }
    
    redirect('admin/dashboard');
    break;
                ##staff
    case 2:
    $staff_id=$this->session->staff_id=$get_data['data'][0]['staff_id'];
    $params=array('member_id'=>$staff_id);
    $groupInfo = modules::run('api_call/api_call/call_api',''.api_url().'group/myGroup',$params,'POST');
    if($groupInfo['status']=='success')
    {
      $group_id=$this->session->group_id=$groupInfo['data'][0]['group_id'];
    }

    redirect('admin/dashboard');
    break;
                ##customer
    case 3:
    $crn_number=$this->session->crn_number=$get_data['data'][0]['crn_number'];
    $caf_id=$this->session->caf_id=$get_data['data'][0]['caf_id'];

    redirect('profile/dashboard');
    break;



  }	
}
else
{
 $data['message'] = array(
  'error_message' => 'Invalid Username or Password'
);
 $this->load->view('login', $data);
 

}

}

public function refresh(){
        // Captcha configuration
 $vals = array(
        // 'word'          => 'Random word',
  'img_path'      => './captcha/',
  'img_url'       => base_url('captcha'),
        // 'font_path'     => './path/to/fonts/texb.ttf',
  'img_width'     => '90',
        // 'img_height'    => 30,
  'expiration'    => 7200,
  'word_length'   => 4,
        // 'font_size'     => 19,
        // 'img_id'        => 'Imageid',
  'pool'          => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',

        // White background and border, black text and red grid
  'colors'        => array(
    'background' =>array(255, 255, 255) ,
    'border' => array(192, 192, 192),
    'text' => array(0, 0, 0),
    'grid' => array(255, 255, 255)
  )
);

 $data['cap'] = create_captcha($vals);
 $this->session->unset_userdata('captcha_key');
 $this->session->set_userdata('captcha_key',$data['cap']['word']);
 $this->session->set_userdata('file_name',$data['cap']['filename']);
 echo $data['cap']['image'];
}


public function logout(){

  $this->session->unset_userdata('username');
  $this->session->unset_userdata('user_id');
  $this->session->unset_userdata('api_key');
  $this->session->unset_userdata('staff_id');
  $this->session->unset_userdata('f_id');
  $this->session->unset_userdata('authorization_id');
  $this->session->unset_userdata('group_id');
  $this->session->unset_userdata('frenchise_type');

  $this->session->sess_destroy();
  redirect('login');
}       






}

// }
?>