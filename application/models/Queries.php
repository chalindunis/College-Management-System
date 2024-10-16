<?php
    class Queries extends CI_Model{

        public function getRoles(){ //get role details from the database
            $roles = $this->db->get('tbl_roles');
            if ($roles->num_rows() >0){
                return $roles->result();
            }
        }

        public function registerAdmin($data){ //insert user details to the database
            return $this->db->insert('tbl_users', $data); //this returns 0 or 1
        }

        public function chkAdminExist(){ //check admin is already registered in db
            $chkAdmin = $this->db->where(['role_id' => '1'])-> get('tbl_users');
            if($chkAdmin->num_rows() > 0){
                return $chkAdmin->num_rows();
            }else{
                return 0;
            }
        }

        public function adminLogin($email,$password){
            $result = $this->db->where(['email' => $email, 'password' => $password])->get('tbl_users');
            if($result->num_rows() > 0){
                return $result->row(); //return the all record of the user row number.
            } else {
                return 0;
            }
        }

        public function addCollege($data){ //insert college details to the database
            return $this->db->insert('tbl_colleges', $data); //this returns 0 or 1
        }

        public function getColleges(){ //get college details from the database
            $colleges = $this->db->get('tbl_colleges');
            if ($colleges->num_rows() >0){
                return $colleges->result();
            }
        }

        public function addStudent($data){ //insert student details to the database
            return $this->db->insert('tbl_students', $data); //this returns 0 or 1
        }

    }
?>