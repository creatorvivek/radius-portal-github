    <?php
class Authenticate{
  protected $CI;

  public function __construct() {
    $this->CI = & get_instance();
  }
    $hook['post_controller'] = function()
{
        /* do something here */
			$this->load->model('Authentication_model');
				$auth=$this->Authentication_model->check_authentication($this->uri->segment(1),$this->uri->segment(2),3,$this->session->authorization_id);
				if($auth==False)
				{
					echo "hii";
					die;
				}

};

				?>