<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Property_Listing extends CI_Controller {

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

	}
    
    function add_property()
    {
        $this->checkusersession();
        $data = array();
        $this->load->view('add_property_view',$data);

        if($_POST!=null)
        {
            print_r($_POST);die();
        }
    }
	
}

