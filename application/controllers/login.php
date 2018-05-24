<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		
		if($this->session->userdata('admin_id')){
			redirect(base_url('index.php/dashboard'));
		}	
        $this->load->view('login_view');
	}
	
	function authentication()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$encryptedPassword = md5($password);
		//echo $encryptedPassword; die();
		$adminObj = Admin::find_by_sql("Select * From admin_users Where username = '$username' and password = '$encryptedPassword' and status = 0");
		if(!empty($adminObj))
		{
			$this->session->set_userdata('admin_id',$adminObj[0]->id);
			$this->session->set_userdata('admin_type',$adminObj[0]->admin_type);
			$this->session->set_userdata('admin_name',$adminObj[0]->name);
			redirect(base_url('index.php/dashboard'));
		}
		else {
			echo 'login failed';
		}
	}
    
    function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_type');
        $this->session->unset_userdata('admin_name');
        redirect(base_url());
    }
    

}

