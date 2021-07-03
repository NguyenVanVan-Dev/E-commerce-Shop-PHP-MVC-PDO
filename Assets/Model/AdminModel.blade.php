<?php

class AdminModel extends MasterModel{

    public function __construct()
    {
        parent::__construct();
    }
    public function login_admin($table,$email,$pass){
       $sql = "SELECT * FROM $table WHERE admin_email = ? AND admin_pass = ?";
      
       return $this->db->affectedRow($sql,$email,$pass);
       
    }
    public function getLogin($table,$email,$pass){
        $sql = "SELECT * FROM $table WHERE admin_email= ? AND admin_pass = ?";
       
        return $this->db->selectUser($sql,$email,$pass);
        
    }



}

?>