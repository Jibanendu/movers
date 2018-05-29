<?php
/**
 * Created by PhpStorm.
 * User: jibanendurath
 * Date: 24/05/18
 * Time: 6:05 PM
 */

class AllUsers extends CI_Controller
{

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
        $userList = User::find_by_sql("Select * From users");
        $data['userList'] = $userList;
        $this->load->view('user_listing',$data);
    }

    function deactivate($id)
    {
        $this->checkusersession();
        $data = array();
        $data['id'] = $id;

        $user=User::find_by_id($id);
        $user->active_inactive=1;

        $user->save();
        redirect(base_url('index.php/allusers'));
    }
    function activate($id)
    {
        $this->checkusersession();
        $data = array();
        $data['id'] = $id;

        $user=User::find_by_id($id);
        $user->active_inactive=0;

        $user->save();
        redirect(base_url('index.php/allusers'));
    }

    function add_user()
    {
        $this->checkusersession();
        $data = array();
        $this->load->view('add_user_view',$data);
        if($_POST!=null)
        {
            //print_r($_POST);die();

            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $gender = $_POST["gender"];
            $email = $_POST["email"];
            $phoneNumber=$_POST["phoneNumber"];
            $password=$_POST["password"];

            $addUserObj = new User();
            $addUserObj->first_name=$firstName;
            $addUserObj->last_name=$lastName;
            $addUserObj->gender=$gender;
            $addUserObj->email_id=$email;
            $addUserObj->phone=$phoneNumber;
            $addUserObj->password=$password;
            $addUserObj->status=0;
            $addUserObj->active_inactive=0;

            $addUserObj->save();

            redirect(base_url('index.php/allusers'));


        }
    }
}

?>