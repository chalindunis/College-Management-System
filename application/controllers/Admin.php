<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller{
    public function dashboard(){
		$this->load->model('queries');
		$colleges = $this->queries->getColleges();
		$this->load->view('dashboard', ['colleges'=>$colleges]);
	}

    
    public function addCollege(){
        $this->load->view('addCollege');
    }

    public function addStudent(){
        // echo 'inside add Student function';
        $this->load->view('addStudent');
    }

    public function addCoadmin(){
        // echo 'inside add coadmin function';
        $this->load->view('addCoadmin');
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

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_id')) //to avoid unauthorized person to access other pages(admin dashboard/addstudent/addcoadmin/add college)
            return redirect("welcome/login");
        
    }
}

?>