<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Areas extends CI_Controller {

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
        $areaList = Area::find_by_sql("Select * From area");
        $data['areaList'] = $areaList;
        $this->load->view('area_listing',$data);
	}
    
    function add_area()
    {
        $this->checkusersession();
        $data = array();
        $this->load->view('add_area_view',$data);

        if($_POST!=null)
        {
            $areaName = $_POST["name"];
            $areaCode = $_POST["area_code"];
            $cityName = $_POST["city"];

            $city = City::find_by_sql("select id from city where city_name='$cityName'");
            $cityId = $city[0]->id;
            if($cityId!=null)
            {
                $addAreaObj = new Area();
                $addAreaObj->city_id=$cityId;
                $addAreaObj->area_name=$areaName;
                $addAreaObj->area_code=$areaCode;
                $addAreaObj->save();
                redirect(base_url('index.php/areas'));
            }
        }
    }

    function edit_area($area)
    {
        $this->checkusersession();
        $data = array();
        $data['area'] = $area;
        $this->load->view('edit_area_view',$data);
    }

    function edit_area_save()
    {
       $this->checkusersession();
        $data = array();
        if($_POST!=null) {
            print_r($_POST);
            $areaName = $_POST["areaName"];
            $areaCode = $_POST["areaCode"];
            $cityId =$_POST["city"];

            $updateAreaObj = Area::find_by_id($cityId);
            $updateAreaObj->area_name=$areaName;
            $updateAreaObj->area_code=$areaCode;

            $updateAreaObj->save();
            redirect(base_url('index.php/areas'));
        }
    }
	
}

