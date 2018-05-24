<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subadmin extends CI_Controller {

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
        $data = array();
        $subadmins = Admin::find_by_sql("Select * From admin_users Where admin_type = 1 and status = 0");
        $data['subadmins'] = $subadmins;
		$this->load->view('subadmin_listings',$data);
	}
    
    
    function add_subadmin()
    {
        $this->checkusersession();
        $data = array();
        $this->load->view('add_subadmin_view',$data);
    }
    
    
	
}

