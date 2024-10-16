<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller{
    public function dashboard(){
        $this->load->view('dashboard');
        }
    
        public function addCollege(){
            echo 'inside add college function';
        }

        public function addStudent(){
            echo 'inside add Student function';
        }

        public function addCoadmin(){
            echo 'inside add coadmin function';
        }

        public function __construct()
        {
            parent::__construct();
            if (!$this->session->userdata('user_id')) //to avoid unauthorized person to access other pages(admin dashboard/addstudent/addcoadmin/add college)
                return redirect("welcome/login");
            
        }
    }

?>