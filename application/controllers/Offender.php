<?php if ( ! defined(''
        . 'BASEPATH')) exit('No direct script access allowed');

class Offender extends CI_Controller {
    /**
     * Index page for Magazine controller.
     */
    public function validate_offender() {
        $this->is_logged_in();
        
        $user = $this->getUser();

        $success = "false";
        $header = "Citizen Offence";
        $sub_header = "please validate offender to add offence information.";
        $error = array();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('CitizenModel');
        
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
                $this->load->view('profile_offender/validate_offender', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'citizen'=>$citizen, 'error'=>$error, "success"=>$success));
                $this->load->view('template/footer');
            }else{
                redirect("profile-offender/".$row->citizen_id);
            }
        }else{
            $this->load->view('template/header');
            $this->load->view('profile_offender/validate_offender', array("user"=>$user, 'header' => $header,'citizen'=>$citizen, "sub_header" => $sub_header, 'error'=>$error, "success"=>$success));
            $this->load->view('template/footer');
        } 
    }
    
    public function profile_offender($id) {
        $this->is_logged_in();
        $user = $this->getUser();
        
        $success = "false"; $offence_id = '';
        $header = "Citizen Offence";
        $sub_header = "you can add citizen offence information here.";
        $error = array();
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->load->model('CitizenOffenceModel');
        $this->load->model('OffenceModel');
        $this->load->model('CitizenModel');
        $this->load->model('PenaltyModel');
        
        $offence_info = new CitizenOffenceModel();
        $citizen = new CitizenModel();
        $offence = new OffenceModel();
        $penalty = new PenaltyModel();
        
        $offence_types = '';
        
        if(!isset($id)){
            redirect(base_url("validate-offender"));
        }else{
            $citizen->load($id);
            if($citizen->citizen_id === null){
                redirect(base_url("validate-offender"));
            }
        }

        $offences= $this->OffenceModel->get();
   
        $offence_types = array(""=>"--Select Offence Code--");
        foreach($offences as $offence){
            $offence_types[$offence->offence_id] = $offence->code;
        }
        
        if(isset($_POST['save'])){
            $this->form_validation->set_rules(array(
                array(
                    'rules' => 'required',
                    'field' => 'code',
                    'label' => 'code',
                    'errors' => array('required' => 'Please select offence %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'vehicle_reg_no',
                    'label' => 'vehicle registration number',
                    'errors' => array('required' => 'Please provide %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'vehicle_make',
                    'label' => 'vehicle make',
                    'errors' => array('required' => 'Please provide %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'vehicle_colour',
                    'label' => 'vehicle colour',
                    'errors' => array('required' => 'Please provide %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'vehicle_type',
                    'label' => 'vehicle type',
                    'errors' => array('required' => 'Please select %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'vehicle_ownership',
                    'label' => 'vehicle ownership',
                    'errors' => array('required' => 'Please select %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'report_location',
                    'label' => 'report location',
                    'errors' => array('required' => 'Please provide %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'report_date',
                    'label' => 'report date',
                    'errors' => array('required' => 'Please choose %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'offence_date',
                    'label' => 'offence date',
                    'errors' => array('required' => 'Please choose %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'officer_type',
                    'label' => 'officer type',
                    'errors' => array('required' => 'Please select %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'officer_id',
                    'label' => 'officer ID',
                    'errors' => array('required' => 'Please provide %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'officer_comment',
                    'label' => 'officer comment',
                    'errors' => array('required' => 'Please provide %s.',),
                ),
            )); 
     
     
            $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');

            $offence_info->offence_date = $this->input->post('offence_date');
            $offence_info->officer_comment = $this->input->post('officer_comment');
            $offence_info->officer_id = $this->input->post('officer_id');
            $offence_info->officer_type = $this->input->post('officer_type');
            $offence_info->report_date = $this->input->post('report_date');
            $offence_info->report_location = $this->input->post('report_location');
            $offence_info->vehicle_colour = $this->input->post('vehicle_colour');
            $offence_info->vehicle_make = $this->input->post('vehicle_make');
            $offence_info->vehicle_ownership = $this->input->post('vehicle_ownership');
            $offence_info->vehicle_reg_no = $this->input->post('vehicle_reg_no');
            $offence_info->vehicle_type = $this->input->post('vehicle_type');
            $offence_info->code_id = $this->input->post('code');
            $offence_info->settlement = "UNSETTLED";
            $offence_info->citizen_id = $id;
            $offence_id = $this->input->post('code');
                    
            if(count($error) > 0 | !$this->form_validation->run()){
                $this->load->view('template/header');
                $this->load->view('profile_offender/profile_offender', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'error'=>$error, 'citizen'=>$citizen,  'offence_info'=>$offence_info, "offence_codes"=>$offence_types, "offence_id"=>$offence_id));
                $this->load->view('template/footer');
            }else{
                $query = $this->db->get_where('offences', array(
                    'offence_id'=> $this->input->post('code'),
                ));
            
                $row = $query->row();
                
                $query = $this->db->get_where('penalty_info', array(
                    'citizen_id'=> $id,
                ));
            
                $row2 = $query->row();
                $amount = $row2->amount + $row->penalty;
                
                $this->db->trans_start();
               
                $penalty->penalty_id = $row2->penalty_id;
                $penalty->citizen_id = $id;
                $penalty->amount = $amount;
                $penalty->update($row2->penalty_id);
                $offence_info->save();
                
                $this->db->trans_complete();
                
                redirect("validate-offender?success=true");
            }
        }else{
            $this->load->view('template/header');
            $this->load->view('profile_offender/profile_offender', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'error'=>$error, 'citizen'=>$citizen,  'offence_info'=>$offence_info, "offence_codes"=>$offence_types, "offence_id"=>$offence_id));
            $this->load->view('template/footer');
        }
    }
    
    public function clear_offender() {
        $this->is_logged_in();
        
        $user = $this->getUser();

        $success = "false";
        $header = "Citizen Offence";
        $sub_header = "please validate offender to view all uncleared offences.";
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
                $this->load->view('profile_offender/clear_offender', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'citizen'=>$citizen, 'error'=>$error, "success"=>$success));
                $this->load->view('template/footer');
            }else{
                $query = $this->db->query("select * from citizen_offence_info, citizen_info, offences where citizen_info.citizen_id = '$row->citizen_id' AND settlement= 'UNSETTLED' AND citizen_offence_info.code_id = offences.offence_id AND citizen_info.citizen_id=citizen_offence_info.citizen_id");
            
                $citizen_offences = $query->result_array();

                $this->load->view('template/header');
                $this->load->view('profile_offender/clear_offender', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'citizen'=>$citizen, 'error'=>$error, "citizen_offences"=>$citizen_offences ,"success"=>$success));
                $this->load->view('template/footer');
            }
        }else{
            $this->load->view('template/header');
            $this->load->view('profile_offender/clear_offender', array("user"=>$user, 'header' => $header,'citizen'=>$citizen, "sub_header" => $sub_header, 'error'=>$error, "success"=>$success));
            $this->load->view('template/footer');
        } 
    }
    
    public function clear_charge($id) {
        $this->is_logged_in();
        $user = $this->getUser();
             
        $this->load->model('CitizenOffenceModel');
        $this->load->model('PenaltyModel');
        
        $offence = new CitizenOffenceModel();
        $penalty = new PenaltyModel();
      
        if(!isset($id)){
            redirect(base_url("clear-offender"));
        }else{
            $offence->load($id);
            if($offence->citizen_offence_id === null){
                redirect(base_url("clear-offender"));
            }
            
        }
        
        $query = $this->db->get_where('offences', array(
            'offence_id'=> $offence->code_id,
        ));

        $row = $query->row();

        $query = $this->db->get_where('penalty_info', array(
            'citizen_id'=> $offence->citizen_id,
        ));

        $row2 = $query->row();
        $amount = $row2->amount - $row->penalty;
                
        $this->db->trans_start();

        $penalty->load($row2->penalty_id);
        $penalty->amount = $amount;
        $penalty->update($row2->penalty_id);
        
        $offence->settlement = "SETTLED";
        $offence->update($offence->citizen_offence_id);
        
        $this->db->trans_complete();

        redirect("clear-offender?success=true");
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

