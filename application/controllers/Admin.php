<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller{
    public function dashboard(){
		$this->load->model('queries');
		$users = $this->queries->viewAllColleges();
		$this->load->view('dashboard', ['users'=>$users]);
	}

    
    public function addCollege(){
        $this->load->view('addCollege');
    }

    public function addStudents(){
        // echo 'inside add Student function';
        $this->load->view('addStudent');
    }

    public function addCoAdmin(){
        $this->load->model('queries');
		$roles = $this->queries->getRoles();
        $colleges = $this->queries->getColleges();
        // echo 'inside add coadmin function';
        $this->load->view('addCoadmin', ['roles'=>$roles,'colleges'=>$colleges]);
    }

    public function createCollege(){
        $this->form_validation->set_rules('collegename', 'College Name', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');

        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

        $data = $this->input->post();
        if( $this->form_validation->run()){
           
            $data = $this->input->post();
            $this->load->model('queries');
            if ($this->queries->addCollege($data)){
                $this->session->set_flashdata('message','College Added Successfully');
                return redirect("admin/addCollege");
            }
            else{
                $this->session->set_flashdata('message','Failed to Register Admin!');
                return redirect("admin/addCollege");
            }


        } else {
            $this->addCollege();  // Reload the form and show errors
        }
    }


    // public function createStudent(){
    //     $this->form_validation->set_rules('studentname', 'Student Name', 'required');

    //     $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

    //     $data = $this->input->post();
    //     if( $this->form_validation->run()){
           
    //         $data = $this->input->post();
    //         $this->load->model('queries');
    //         if ($this->queries->addStudent($data)){
    //             $this->session->set_flashdata('message','Student Added Successfully');
    //             return redirect("admin/addStudents");
    //         }
    //         else{
    //             $this->session->set_flashdata('message','Failed to Add Student!');
    //             return redirect("admin/addStudents");
    //         }


    //     } else {
    //         $this->addCoAdmin();  // Reload the form and show errors
    //     }
    // }


    public function createCoadmin() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('college_id', 'College', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confpwd', 'Password Again', 'required|matches[password]');

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if ($this->form_validation->run()) {
            $data = $this->input->post();
            //encrypt pwd and confpwd
            $data['password']= sha1($this->input->post('password'));
            $data['confpwd']= sha1($this->input->post('confpwd'));
            
            $this->load->model('queries');
            if ($this->queries->registerCoAdmin($data)){
                $this->session->set_flashdata('message','Co-Admin Added Successfully');
                return redirect("admin/addCoAdmin");
            }
            else{
                $this->session->set_flashdata('message','Failed to Add Co-Admin!');
                return redirect("admin/addCoAdmin");
            }

        } else {
            $this->addCoAdmin();  // Reload the form and show errors
        }
    }


    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_id')) //to avoid unauthorized person to access other pages(admin dashboard/addstudent/addcoadmin/add college)
            return redirect("admin/dashboard");
        
    }
}

?>