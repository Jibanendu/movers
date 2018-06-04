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

            $propertyName = $this->input->post('name');
            $propertydescription = $this->input->post('description');
            $propertytype = $this->input->post('type');
            $propertyfloor = $this->input->post('floor');
            $minimumstay = $this->input->post('minimum_stay');
            $addedon = $this->input->post('added_on');
            $availablefrom = $this->input->post('available_from');

            $propertyAddObject = new Property();
            $propertyAddObject->property_name=$propertyName;
            $propertyAddObject->description=$propertydescription;
            $propertyAddObject->type=$propertytype;
            $propertyAddObject->floor=$propertyfloor;
            $propertyAddObject->minimum_stay=$minimumstay;
            $propertyAddObject->added_on=$addedon;
            $propertyAddObject->available_from=$availablefrom;

            $propertyAddObject->save();

            $id= Property::last()->property_id;

            $selectAmenities=$this->input->post('amenities');
            $selectRules=$this->input->post('rules');
            $selectBills=$this->input->post('bills');
            //var_dump($selectAmenities);

            //creating amenties_property map
            foreach($selectAmenities as $amenities)
            {
                $propertyAmentiesObject = new AmenitiesProperty();
                $propertyAmentiesObject->property_id=$id;
                $propertyAmentiesObject->amenities_id=$amenities;
                $propertyAmentiesObject->save();
            }

            //creating rules_property map
            foreach($selectRules as $rules)
            {
                $propertyRulesObject = new RulesProperty();
                $propertyRulesObject->property_id=$id;
                $propertyRulesObject->rules_id=$rules;
                $propertyRulesObject->save();
            }

            //creating rules_property map
            foreach($selectBills as $bills)
            {
                $propertyBillsObject = new BillsProperty();
                $propertyBillsObject->property_id=$id;
                $propertyBillsObject->bills_id=$bills;
                $propertyBillsObject->save();
            }
            redirect(base_url('index.php/property_listing/add_property'));


        }
    }
	
}

