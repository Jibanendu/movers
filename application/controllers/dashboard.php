<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function checkusersession(){
		if(!$this->session->userdata('admin_id')){
			redirect(base_url());
		}	
	}
	
	function index()
	{
		$this->checkusersession();
		$this->load->view('dashboard_view');
	}
	
    

}

