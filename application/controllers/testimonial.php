<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}


    public function checkusersession(){
        if(!$this->session->userdata('admin_id')){
            redirect(base_url());
        }
    }

    function ajax_testimonial_img()
    {
        //echo 'Working!'; die();
        $jsonstr = $_FILES['client_image'];
        $filename = str_replace(" ","_",$jsonstr["name"]);
        $rand = rand(100000, 999999);
        $org_file = "gallery/testimonial/client/" . $rand . $filename;
        move_uploaded_file($jsonstr["tmp_name"], $org_file);
        echo base_url().$org_file;
        exit;
    }

	function index()
	{
        $this->checkusersession();
        $data = array();
        $testimonialList = Area::find_by_sql("Select * From testimonial");
        $data['testimonialList'] = $testimonialList;
        $this->load->view('testimonial_listing',$data);
	}

	function add_testimonial()
    {
        $this->checkusersession();
        $data = array();
        $this->load->view('add_testimonial_view',$data);
        if($_POST!=null)
        {
            $clientName = $this->input->post('name');
            $clientLocation = $this->input->post('location');
            $clientImage = $this->input->post('filepath');
            $clientTestimonial = $this->input->post('testimonial');

            $testimonialNewObject= new TestimonialModel();
            $testimonialNewObject->client_name=$clientName;
            $testimonialNewObject->client_location=$clientLocation;
            $testimonialNewObject->client_image=$clientImage;
            $testimonialNewObject->testimonial_desc=$clientTestimonial;
            $testimonialNewObject->status=0;
            $testimonialNewObject->save();

            redirect(base_url('index.php/testimonial/add_testimonial'));
        }
    }

    function deactivate($id)
    {
        $this->checkusersession();
        $data = array();
        $data['id'] = $id;
        //echo($id);die();
        $testimonialValue=TestimonialModel::find($id);
        $testimonialValue->status=1;
        $testimonialValue->save();
        redirect(base_url('index.php/testimonial/'));
    }

    function activate($id)
    {
        $this->checkusersession();
        $data = array();
        $data['id'] = $id;

        $testimonialValue=TestimonialModel::find($id);
        $testimonialValue->status=0;

        $testimonialValue->save();
        redirect(base_url('index.php/testimonial/'));
    }

}

