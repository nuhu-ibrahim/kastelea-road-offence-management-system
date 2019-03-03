<?php if ( ! defined(''
        . 'BASEPATH')) exit('No direct script access allowed');

class Offence extends CI_Controller {
    /**
     * Index page for Magazine controller.
     */
    public function add_offence() {
        $this->is_logged_in();
        
        $user = $this->getUser();

        $success = "false";
        $header = "Offence Information";
        $sub_header = "you can add offence information here.";
        $error = array();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('OffenceModel');
        
        $offence = new OffenceModel();
   
        if(isset($_POST['save'])){
            $this->form_validation->set_rules(array(
                array(
                    'rules' => 'required',
                    'field' => 'category',
                    'label' => 'category',
                    'errors' => array('required' => 'Please select offence %s.',),
                ),
                array(
                    'rules' => 'required|numeric',
                    'field' => 'points',
                    'label' => 'point(s)',
                    'errors' => array('required' => 'Please provide offence %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'code',
                    'label' => 'code',
                    'errors' => array('required' => 'Please provide offence %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'offence_desc',
                    'label' => 'description',
                    'errors' => array('required' => 'Please provide offence %s.',),
                ),
                array(
                    'rules' => 'required|numeric',
                    'field' => 'penalty',
                    'label' => 'monetary penalty',
                    'errors' => array('required' => 'Please provide offence %s.',),
                ),
            )); 
     
            $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
            
            $query = $this->db->get_where('offences', array(
                'code'=> $this->input->post('code'),
            ));
            
            $row = $query->row();
            
            if(isset($row)){
                $error[] = "An offence already exist with same code.";
            }
             
            $offence->category = $this->input->post('category');
            $offence->points = $this->input->post('points');
            $offence->code = $this->input->post('code');
            $offence->offence_desc = $this->input->post('offence_desc');
            $offence->penalty = $this->input->post('penalty');
            
            if(count($error) > 0 | !$this->form_validation->run()){
                $this->load->view('template/header');
                $this->load->view('offence/add_offence', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'offence'=>$offence, 'error'=>$error, "success"=>$success));
                $this->load->view('template/footer');
            }else{
                $this->db->trans_start();
                
                $offence->save();
                
                $this->db->trans_complete();

                redirect("add-offence?success=true");
            }
        }else{
            $this->load->view('template/header');
            $this->load->view('offence/add_offence', array("user"=>$user, 'header' => $header,'offence'=>$offence, "sub_header" => $sub_header, 'error'=>$error, "success"=>$success));
            $this->load->view('template/footer');
        } 
    }
    
    public function view_offence() {
        $this->is_logged_in();
        $user = $this->getUser();
        
        $header = "View Offence Information";
        $sub_header = "you can edit offence information here by clicking edit on the offence record.";
        
        $this->load->model('OffenceModel');

        $offences= $this->OffenceModel->get();
        
        $offences_to_view = array();
        foreach($offences as $offence){
            $offences_to_view[$offence->offence_id] = $offence;
        }        
        
        $this->load->view('template/header');
        $this->load->view('offence/view_offences', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, "offences"=>$offences_to_view));
        $this->load->view('template/footer');
    }
    
    public function edit_offence($id) {
        $this->is_logged_in();
        $user = $this->getUser();
        
        $success = "false";
        $header = "Offence Information";
        $sub_header = "you can edit offence information here.";
        $error = array();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('OffenceModel');
        
        $offence = new OffenceModel();
      
        if(isset($id)){
            $offence->load($id);
            if($offence->offence_id === null){
                redirect(base_url("view-offence"));
            }
        }else{
            redirect(base_url("view-offence"));
        }

        if(isset($_POST['save'])){
            $this->form_validation->set_rules(array(
                array(
                    'rules' => 'required',
                    'field' => 'category',
                    'label' => 'category',
                    'errors' => array('required' => 'Please select offence %s.',),
                ),
                array(
                    'rules' => 'required|numeric',
                    'field' => 'points',
                    'label' => 'point(s)',
                    'errors' => array('required' => 'Please provide offence %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'offence_desc',
                    'label' => 'description',
                    'errors' => array('required' => 'Please provide offence %s.',),
                ),
                array(
                    'rules' => 'required|numeric',
                    'field' => 'penalty',
                    'label' => 'monetary penalty',
                    'errors' => array('required' => 'Please provide offence %s.',),
                ),
            )); 
     
     
            $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');

            $offence->category = $this->input->post('category');
            $offence->points = $this->input->post('points');
            $offence->offence_desc = $this->input->post('offence_desc');
            $offence->penalty = $this->input->post('penalty');
            
            if(count($error) > 0 | !$this->form_validation->run()){
                $this->load->view('template/header');
                $this->load->view('offence/edit_offence', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'error'=>$error, 'offence'=>$offence));
                $this->load->view('template/footer');
            }else{                
                
                $offence->update($offence->offence_id);
                
                redirect("edit-offence/".$offence->offence_id."?success=true");
            }
        }else{
            $this->load->view('template/header');
            $this->load->view('offence/edit_offence', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'error'=>$error, 'offence'=>$offence));
            $this->load->view('template/footer');
        }
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

