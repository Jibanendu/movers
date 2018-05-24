<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cities extends CI_Controller {

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
        $cityList = City::find_by_sql("Select * From city");
        $data['cityList'] = $cityList;
        //print_r($cityList); exit;
        $this->load->view('city_listing',$data);
	}
    
    function add_city()
    {
        $this->checkusersession();
        $data = array();
        $this->load->view('add_city_view',$data);
        if($_POST!=null)
        {
            //print_r($_POST);
            $cityName = $_POST["cityName"];
            $countryName = $_POST["countryName"];

            $addCityObj = new City();
            $addCityObj->city_name=$cityName;
            $addCityObj->country=$countryName;

            $addCityObj->save();
            redirect(base_url('index.php/cities'));

        }

    }

    function edit_city($city)
    {
        $this->checkusersession();
        $data = array();
        $data['city'] = $city;
        //print_r($data['city']);die;
        $this->load->view('edit_city_view',$data);

    }

    function edit_city_save()
    {
        $this->checkusersession();
        $data = array();
        if($_POST!=null)
        {
            print_r($_POST);
            $cityName = $_POST["cityName"];
            $countryName = $_POST["countryName"];
            $cityId = $_POST["id"];

            $updateCityObj = City::find_by_id($cityId);
            $updateCityObj->city_name=$cityName;
            $updateCityObj->country=$countryName;

            $updateCityObj->save();
            redirect(base_url('index.php/cities'));
        }
    }
    
    
	
}

