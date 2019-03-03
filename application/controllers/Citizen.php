<?php if ( ! defined(''
        . 'BASEPATH')) exit('No direct script access allowed');

class Citizen extends CI_Controller {
    /**
     * Index page for Magazine controller.
     */
    public function add_citizen() {
        $this->is_logged_in();
        
        $user = $this->getUser();
        
        $config = array(
            'upload_path' => 'assets/passports',
            'allowed_types' => 'gif|jpg|png',
            'max_size' => 1000,
            'max_width' => 1920,
            'max_heigh' => 1080,
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $success = "false";
        $header = "Citizen Information";
        $sub_header = "you can add citizen information here.";
        $error = array();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('CitizenModel');
        $this->load->model('PenaltyModel');
        
        $citizen = new CitizenModel();
        $penalty = new PenaltyModel();
   
        if(isset($_POST['save'])){
            $this->form_validation->set_rules(array(
                array(
                    'rules' => 'required|alpha',
                    'field' => 'firstname',
                    'label' => 'firstname',
                    'errors' => array('required' => 'Please provide citizen\'s %s.',),
                ),
                array(
                    'rules' => 'alpha',
                    'field' => 'middlename',
                    'label' => 'middlename',
                    'errors' => array('required' => 'Please provide citizen\'s %s.',),
                ),
                array(
                    'rules' => 'required|alpha',
                    'field' => 'lastname',
                    'label' => 'lastname',
                    'errors' => array('required' => 'Please provide citizen\'s %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'sex',
                    'label' => 'gender',
                    'errors' => array('required' => 'Please select citizen\'s %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'marital_status',
                    'label' => 'marital status',
                    'errors' => array('required' => 'Please select citizen\'s %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'state_of_origin',
                    'label' => 'state of origin',
                    'errors' => array('required' => 'Please select citizen\'s %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'address',
                    'label' => 'address',
                    'errors' => array('required' => 'Please provide citizen\'s %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'license_no',
                    'label' => 'driver licence number',
                    'errors' => array('required' => 'Please provide citizen\'s %s.',),
                ),
            )); 
     
            $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
            
            $check_file_upload = FALSE;
            if (isset($_FILES['passport']['error']) && ($_FILES['passport']['error'] != 4)) {
                $check_file_upload = TRUE;
            }else{
                $error[] = "Please attach a clear citizen passport photograph.";
            }
            
            $query = $this->db->get_where('citizen_info', array(
                'license_no'=> $this->input->post('license_no'),
            ));
            
            $row = $query->row();
            
            if(isset($row)){
                $error[] = "Citizen with thesame Licence Number already exist.";
            }
             
            $citizen->firstname = $this->input->post('firstname');
            $citizen->middlename = $this->input->post('middlename');
            $citizen->lastname = $this->input->post('lastname');
            $citizen->sex = $this->input->post('sex');
            $citizen->marital_status = $this->input->post('marital_status');
            $citizen->state_of_origin = $this->input->post('state_of_origin');
            $citizen->address = $this->input->post('address');
            $citizen->license_no = $this->input->post('license_no');

            if(count($error) > 0 | !$this->form_validation->run() || ($check_file_upload && !$this->upload->do_upload('passport'))){
                $this->load->view('template/header');
                $this->load->view('citizen/add_citizen', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'citizen'=>$citizen, 'error'=>$error, "success"=>$success));
                $this->load->view('template/footer');
            }else{
                $upload_data = $this->upload->data();
                if (isset($upload_data['file_name'])) {
                    $citizen->passport = $upload_data['file_name'];
                }
                
                if($upload_data['file_name'] === ""){
                    $citizen->passport = "dummy_photo.png";
                }
                
                $penalty->amount = 0;
                $penalty->citizen_id = 
                
                $this->db->trans_start();
                
                $citizen->save();
                
                $penalty->amount = 0;
                $penalty->citizen_id = $citizen->citizen_id;
                $penalty->save();
                
                $this->db->trans_complete();

                redirect("add-citizen?success=true");
            }
        }else{
            $this->load->view('template/header');
            $this->load->view('citizen/add_citizen', array("user"=>$user, 'header' => $header,'citizen'=>$citizen, "sub_header" => $sub_header, 'error'=>$error, "success"=>$success));
            $this->load->view('template/footer');
        } 
    }
    
    public function view_citizen() {
        $this->is_logged_in();
        $user = $this->getUser();
        
        $header = "View Citizen Information";
        $sub_header = "you can edit citizen information here by clicking edit on the citizen record.";
        
        $this->load->model('CitizenModel');

        $citizens= $this->CitizenModel->get();
        
        $citizens_to_view = array();
        foreach($citizens as $citizen){
            $citizens_to_view[$citizen->citizen_id] = $citizen;
        }        
        
        $this->load->view('template/header');
        $this->load->view('citizen/view_citizens', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, "citizens"=>$citizens_to_view));
        $this->load->view('template/footer');
    }
    
    public function edit_citizen($id) {
        $this->is_logged_in();
        $user = $this->getUser();
          
        $config = array(
            'upload_path' => 'assets/passports',
            'allowed_types' => 'gif|jpg|png',
            'max_size' => 1000,
            'max_width' => 1920,
            'max_heigh' => 1080,
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $success = "false";
        $header = "Citizen Information";
        $sub_header = "you can edit citizen information here.";
        $error = array();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('CitizenModel');
        
        $citizen = new CitizenModel();
      
        if(isset($id)){
            $citizen->load($id);
            if($citizen->citizen_id === null){
                redirect(base_url("view-citizen"));
            }
        }else{
            redirect(base_url("view-citizen"));
        }

        if(isset($_POST['save'])){
            $this->form_validation->set_rules(array(
                array(
                    'rules' => 'required|alpha',
                    'field' => 'firstname',
                    'label' => 'firstname',
                    'errors' => array('required' => 'Please provide citizen\'s %s.',),
                ),
                array(
                    'rules' => 'alpha',
                    'field' => 'middlename',
                    'label' => 'middlename',
                    'errors' => array('required' => 'Please provide citizen\'s %s.',),
                ),
                array(
                    'rules' => 'required|alpha',
                    'field' => 'lastname',
                    'label' => 'lastname',
                    'errors' => array('required' => 'Please provide citizen\'s %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'sex',
                    'label' => 'gender',
                    'errors' => array('required' => 'Please select citizen\'s %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'marital_status',
                    'label' => 'marital status',
                    'errors' => array('required' => 'Please select citizen\'s %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'state_of_origin',
                    'label' => 'state of origin',
                    'errors' => array('required' => 'Please select citizen\'s %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'address',
                    'label' => 'address',
                    'errors' => array('required' => 'Please provide citizen\'s %s.',),
                ),
            )); 
     
            $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');

            $check_file_upload = FALSE;
            if (isset($_FILES['passport']['error']) && ($_FILES['passport']['error'] != 4)) {
                $check_file_upload = TRUE;
            }
             
            $citizen->firstname = $this->input->post('firstname');
            $citizen->middlename = $this->input->post('middlename');
            $citizen->lastname = $this->input->post('lastname');
            $citizen->sex = $this->input->post('sex');
            $citizen->marital_status = $this->input->post('marital_status');
            $citizen->state_of_origin = $this->input->post('state_of_origin');
            $citizen->address = $this->input->post('address');
            
            if(count($error) > 0 | !$this->form_validation->run() || ($check_file_upload && !$this->upload->do_upload('passport'))){
                $this->load->view('template/header');
                $this->load->view('citizen/edit_citizen', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'error'=>$error, 'citizen'=>$citizen));
                $this->load->view('template/footer');
            }else{                  
                $upload_data = $this->upload->data();
                        
                if (isset($upload_data['file_name']) && $upload_data['file_name'] !== "") {
                    $citizen->passport = $upload_data['file_name'];
                }
                
                $citizen->update($citizen->citizen_id);
                
                redirect("edit-citizen/".$citizen->citizen_id."?success=true");
            }
        }else{
            $this->load->view('template/header');
            $this->load->view('citizen/edit_citizen', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'error'=>$error, 'citizen'=>$citizen));
            $this->load->view('template/footer');
        }
    }
    
    public function search_citizen() {
        $this->is_logged_in();
        
        $user = $this->getUser();

        $success = "false";  $search_key = ''; $search_option = ''; $citizens = null;
        $header = "Citizen";
        $sub_header = "please provide search parameters to search for a citizen.";
        $error = array();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('CitizenModel');

        $citizen = new CitizenModel();
   
        if(isset($_POST['save'])){
            $this->form_validation->set_rules(array(
                array(
                    'rules' => 'required',
                    'field' => 'search_key',
                    'label' => 'search key',
                    'errors' => array('required' => 'Please provide %s.',),
                ),
                array(
                    'rules' => 'required',
                    'field' => 'search_option',
                    'label' => 'search option',
                    'errors' => array('required' => 'Please provide %s.',),
                ),
            )); 
     
            $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
          
            $search_key = $this->input->post('search_key');
            $search_option = $this->input->post('search_option');
            
            if($search_key){
                if($search_option == 'name'){
                    $query = $this->db->query("select * from citizen_info where firstname = '$search_key' OR middlename = '$search_key' OR lastname = '$search_key'");
                }else{
                    $query = $this->db->query("select * from citizen_info where $search_option LIKE '%$search_key%'");
                }
                $citizens = $query->result_array();
            }
            
            if(count($error) > 0 | !$this->form_validation->run()){
                $this->load->view('template/header');
                $this->load->view('citizen/search_citizen', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'citizens'=>$citizens, 'search_key'=>$search_key, "search_option"=>$search_option, 'error'=>$error, "success"=>$success));
                $this->load->view('template/footer');
            }else{
                $this->load->view('template/header');
                $this->load->view('citizen/search_citizen', array("user"=>$user, 'header' => $header, "sub_header" => $sub_header, 'search_key'=>$search_key, "search_option"=>$search_option, 'citizens'=>$citizens, 'error'=>$error,"success"=>$success));
                $this->load->view('template/footer');
            }
        }else{
            $this->load->view('template/header');
            $this->load->view('citizen/search_citizen', array("user"=>$user, 'header' => $header,'citizens'=>$citizens, "sub_header" => $sub_header, 'search_key'=>$search_key, "search_option"=>$search_option, 'error'=>$error, "success"=>$success));
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

