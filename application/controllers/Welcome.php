<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

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
    }

	public function Login()
	{
		if ($this->session->userdata('user_id'))//to avoid admin to go back login page from admin dashboard
			return redirect("admin/dashboard");
		$this->load->view('login');
	}

	public function adminSignin()
	{
	   $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

        if( $this->form_validation->run()){ 
            $email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
            $this->load->model('queries');
            $adminExist = $this->queries->adminLogin($email, $password); //check if user already exists.
            if($adminExist){
				$sessionData = $sessionData=[
					'user_id' => $adminExist->user_id,
					'username' => $adminExist->username,
                    'role_id' => $adminExist->role_id,
                    'email' => $adminExist->email,
				];
                $this->session->set_userdata($sessionData);//store an user data in a session when user joined.
                return redirect("admin/dashboard");
            }
            else{
                $this->session->set_flashdata('message','Invalid Email or Password!');
                return redirect("welcome/Login");
			}
		}
		else{
			// echo validation_errors();
			$this->Login();
		}
	}
	 public function logout() {
		$this->session->unset_userdata('user_id');
		return redirect("welcome/login");
	 }

}
