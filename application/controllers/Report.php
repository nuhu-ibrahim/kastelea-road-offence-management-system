<?php if ( ! defined(''
        . 'BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
    /**
     * Index page for Magazine controller.
     */
    public function index() {
        $this->is_logged_in();
        
        $user = $this->getUser();

        $header = "Reports";
        $sub_header = "you can view reports by making a choice below.";
        
        $this->load->view('template/header');
        $this->load->view('report/reports', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header));
        $this->load->view('template/footer');
    }
    
    public function view_offences() {
        $this->is_logged_in();
        
        $user = $this->getUser();

        $success = "false";
        $header = "Citizen Offence";
        $sub_header = "please validate offender to view all offences.";
        $error = array();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('CitizenModel');
        $this->load->model('OffenceModel');
        
        $citizen = new CitizenModel();
   
        if(isset($_POST['save'])){
            $this->form_validation->set_rules(array(
                array(
                    'rules' => 'required',
                    'field' => 'license_no',
                    'label' => 'driver licence number',
                    'errors' => array('required' => 'Please provide citizen\'s %s.',),
                ),
            )); 
     
            $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
            
            if($this->input->post('license_no')){
                $query = $this->db->get_where('citizen_info', array(
                    'license_no'=> $this->input->post('license_no'),
                ));

                $row = $query->row();

                if(!isset($row)){
                    $error[] = "Citizen with the license number does not exist.";
                }
            }
            
            $citizen->license_no = $this->input->post('license_no');
            
            if(count($error) > 0 | !$this->form_validation->run()){
                $this->load->view('template/header');
                $this->load->view('report/view_citizen_offence', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'citizen'=>$citizen, 'error'=>$error, "success"=>$success));
                $this->load->view('template/footer');
            }else{
                $query = $this->db->query("select * from citizen_offence_info, citizen_info, offences where citizen_info.citizen_id = '$row->citizen_id' AND citizen_offence_info.code_id = offences.offence_id AND citizen_info.citizen_id=citizen_offence_info.citizen_id");
            
                $citizen_offences = $query->result_array();

                $this->load->view('template/header');
                $this->load->view('report/view_citizen_offence', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'citizen'=>$citizen, 'error'=>$error, "citizen_offences"=>$citizen_offences ,"success"=>$success));
                $this->load->view('template/footer');
            }
        }else{
            $this->load->view('template/header');
            $this->load->view('report/view_citizen_offence', array("user"=>$user, 'header' => $header,'citizen'=>$citizen, "sub_header" => $sub_header, 'error'=>$error, "success"=>$success));
            $this->load->view('template/footer');
        } 
    }
    
    public function view_uncleared_offences() {
        $this->is_logged_in();
        
        $user = $this->getUser();

        $success = "false";
        $header = "Citizens Offence";
        $sub_header = "you can view all uncleared offences here.";
        
        $query = $this->db->query("select * from citizen_offence_info, citizen_info, offences where settlement= 'UNSETTLED' AND citizen_offence_info.code_id = offences.offence_id AND citizen_info.citizen_id=citizen_offence_info.citizen_id");

        $citizen_offences = $query->result_array();

        $this->load->view('template/header');
        $this->load->view('report/view_uncleared_offences', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, "citizen_offences"=>$citizen_offences));
        $this->load->view('template/footer');
            
    }
    
    public function is_logged_in() {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {	
            return true;
        }
        redirect("login");
    }
    
    public function getUser() {
        $this->load->model('AppUser');       
        $user = (new AppUser())->getUser();
        return $user;
    }
}

