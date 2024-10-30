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
        $this->load->model('queries');
        $colleges = $this->queries->getColleges();
        $this->load->view('addStudent',['colleges'=>$colleges]);
    }

    public function addCoAdmin(){
        $this->load->model('queries');
		$roles = $this->queries->getRoles();
        $colleges = $this->queries->getColleges();
        // echo 'inside add coadmin function';
        $this->load->view('addCoadmin', ['roles'=>$roles,'colleges'=>$colleges]);
    }

    public function viewStudents($college_id){
        $this->load->model('queries');
		$students = $this->queries->getStudents($college_id);
        $this->load->view('viewStudent',['students'=>$students]);
    }

    public function viewCoadmins(){
        $this->load->model('queries');
        $coadmins = $this->queries->viewAllColleges();
        // echo '<pre>';print_r($coadmins);echo '</pre>';exit();
        $this->load->view('viewCoadmins',['coadmins'=>$coadmins]);
    }

    public function editStudent($id){
        $this->load->model('queries');
		$studentData = $this->queries->getStudentRecord($id);
        $colleges = $this->queries->getColleges();
        $this->load->view('editStudent',['studentData'=>$studentData, 'college_id' => $studentData->college_id,'colleges'=>$colleges]);
    }

    public function modifyStudent($id){
        $this->form_validation->set_rules('studentname', 'Student Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('college_id', 'College', 'required');
        $this->form_validation->set_rules('course', 'Course', 'required');
        $this->form_validation->set_rules('student_img', 'Image', 'required');

        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

        if( $this->form_validation->run()){
                 
            $this->load->model('queries');
            $data = $this->input->post();
            if ($this->queries->updateStudent($data,$id)){
                // echo '<pre>';print_r($data);echo '</pre>';exit();
                $this->session->set_flashdata('message','Student Updated Successfully');
                return redirect("admin/editStudent/{$id}"); 
            }
            else{
                $this->session->set_flashdata('message','Failed to Update Student!');
                return redirect("admin/editStudent/{$id}");
            }

        } 
        else {
            $this->editStudent($id);  // Reload the form and show errors
        }
        
    }

    // public function deleteStudent($id){
    //     $this->load->model('queries');
    //     if($this->queries->removeStudent($id)){
    //         return redirect("admin/dashboard");
    //     }
    //     // echo $id;
    // }

    public function deleteStudent($id) {
        $this->load->model('queries');
        $student = $this->queries->getStudentRecord($id);
        // Check if form was submitted
        if ($this->input->post('confirm_delete')) {
            // Perform deletion
            if ($this->queries->removeStudent($id)) {
                $this->session->set_flashdata('success', 'Student Deleted Successfully');
            } else {
                $this->session->set_flashdata('error', 'Failed to Delete Student!');
            }
            return redirect("admin/viewStudents/{$student->college_id}");
        }
        // Get student data to show in confirmation
        if (!$student) {
            $this->session->set_flashdata('error', 'Student not found!');
            return redirect('admin/dashboard');
        }
        // Load confirmation view
        $data['student'] = $student;
        // echo '<pre>'; print_r($data); echo '</pre>';exit();
        
        $this->load->view('deleteStudent', $data);
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


    public function createStudent(){
        $this->form_validation->set_rules('studentname', 'Student Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('college_id', 'College', 'required');
        $this->form_validation->set_rules('course', 'Course', 'required');

        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

        $data = $this->input->post();
        if( $this->form_validation->run()){
           
            $data = $this->input->post();
            $this->load->model('queries');
            if ($this->queries->addStudent($data)){
                $this->session->set_flashdata('message','Student Added Successfully');
                return redirect("admin/addStudents");
            }
            else{
                $this->session->set_flashdata('message','Failed to Add Student!');
                return redirect("admin/addStudents");
            }


        } else {
            $this->addStudents();  // Reload the form and show errors
        }
    }


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