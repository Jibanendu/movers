<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: jibanendurath
 * Date: 24/05/18
 * Time: 5:13 PM
 */

class users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        if($this->session->userdata('user_id')){
            redirect(base_url('index.php/user_dashboard'));
        }
        $this->load->view('login_user_view');
    }

    function authentication()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $encryptedPassword = md5($password);
        echo $encryptedPassword; die();
        $userObj = User::find_by_sql("Select * From users Where email_id = '$username' and password = '$encryptedPassword' and status = 0");
        if(!empty($userObj))
        {
            $this->session->set_userdata('user_id',$userObj[0]->id);
            $this->session->set_userdata('user_name',$userObj[0]->email_id);
            redirect(base_url('index.php/user_dashboard'));
        }
        else {
            echo 'login failed';
        }
    }

}

?>