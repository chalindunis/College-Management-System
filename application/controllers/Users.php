<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller{

    public function dashboard(){
		$this->load->model('queries');
        $college_id = $this->session->userdata('college_id');
		$students = $this->queries->getStudents($college_id);
		$this->load->view('users',['students'=>$students]);
	}

    public function list(){
		$this->load->model('queries');
        $college_id = $this->session->userdata('college_id');
		$students = $this->queries->getStudents($college_id);
		$this->load->view('usersList',['students'=>$students]);
	}
}