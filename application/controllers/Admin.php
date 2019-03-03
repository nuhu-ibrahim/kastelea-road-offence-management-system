<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function index()
    {
        if ($this->is_logged_in()) {
            $this->load->model('AppUser');
            
            $user = (new AppUser())->getUser();

            $header = "Reports";
            $sub_header = "you can view reports by making a choice below.";
            
            $this->load->view('template/header');
            $this->load->view('report/reports', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header));
            $this->load->view('template/footer');
        } else {
            // there user was not logged in, we cannot logged him out,
            // redirect him to site root
            redirect('login');
        }
    }
    
    public function logout()
    {
        if ($this->is_logged_in()) {	
            // remove session datas
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
            // user logout ok
            redirect('login');
        } else {
            // there user was not logged in, we cannot logged him out,
            // redirect him to site root
            redirect('login');
        }
    }
    
    public function login()
    {
        if ($this->is_logged_in()) {
            redirect('admin');
        }
        $error = array();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('AppUser');
        $user = new AppUser();
        
        $password = "";
        $username = "";
        
        if(isset($_POST['save'])){
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required',
                    'errors' => array('required' => '%s can not be empty.'),
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => array('required' => '%s can not be empty.',),
                ),
            ));
            
            $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            if(count($error) > 0 || !$this->form_validation->run()){
                $this->load->view('login/login', array("username"=>$username, "password"=>$password, "error"=>$error));
            }else{
                $this->db->select('*');
		$this->db->from('app_user');
		$this->db->where('username', $username);
                $this->db->where('password', sha1($password));
                
                $row = $this->db->get()->row();
                if(isset($row)){
                    $_SESSION['user_id'] = (int)$row->user_id;
                    $_SESSION['logged_in'] = (bool)true;

                    redirect("admin");
                }else{
                    $error[] = "Incorrect email or password, Try again!.";
                    $this->load->view('login/login', array("username"=>$username, "password"=>$password, "error"=>$error));
                }
            }
        }else{
            $this->load->view('login/login', array("username"=>$username, "password"=>$password, "error"=>$error));
        } 
    }
    
    public function is_logged_in() {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {	
            return true;
        }
    }
}