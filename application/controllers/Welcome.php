<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->model('queries');
		$chkAdminExist = $this->queries->chkAdminExist();
		// echo $chkAdminExist;
		// exit();
		$this->load->view('home',['chkAdminExist' => $chkAdminExist]);
	}

	public function adminRegister()
	{
		$this->load->model('queries');
		$roles = $this->queries->getRoles();
		// print_r($roles);
		// exit();
		$this->load->view('register', ['roles'=>$roles]);
	}

	// public function adminSignup()
	// {
	// 	// $this->load->library('form_validation');

	// 	$this->form_validation->set_rules('username', 'Username', 'Required');
	// 	$this->form_validation->set_rules('email', 'Email', 'Required');
	// 	$this->form_validation->set_rules('gender', 'Gender', 'Required');
	// 	$this->form_validation->set_rules('role_id', 'Role', 'Required');
	// 	$this->form_validation->set_rules('password', 'Password', 'Required');
	// 	$this->form_validation->set_rules('confpwd', 'Password Again', 'Required');

	// 	$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
	// 	if( $this->form_validation->run()){
	// 		echo 'Validation Passed';
	// 	}
	// 	else{
	// 		echo validation_errors();
	// 	}
	// }

	public function adminSignup() {
        // if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
            $this->form_validation->set_rules('role_id', 'Role', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confpwd', 'Password Again', 'required|matches[password]');

            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if ($this->form_validation->run()) {
                $data = $this->input->post();
				//encrypt pwd and confpwd
				$data['password']= sha1($this->input->post('password'));
				$data['confpwd']= sha1($this->input->post('confpwd'));
				// echo '<pre>'; //pre tag is for preformatted texts
				// print_r($data);
				// echo '</pre>';
				// exit();
				$this->load->model('queries');
				if ($this->queries->registerAdmin($data)){
					$this->session->set_flashdata('message','Admin Registered Successfully');
					return redirect("welcome/adminRegister");
				}
				else{
					$this->session->set_flashdata('message','Failed to Register Admin!');
					return redirect("welcome/adminRegister");
				}


            } else {
                $this->adminRegister();  // Reload the form and show errors
            }
        // } else {
        //     $this->adminRegister();
        // }
    }

	public function adminLogin()
	{
		$this->load->view('login');
	}

}
