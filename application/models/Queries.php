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
    }
?>