<?php

class UserModel extends MasterModel
{
    public function  __construct()
    {
       parent::__construct();
    }
    public function RegisterUser($table,$data)
    {
        return $this->db->insert($table,$data);
    }
    public function LoginUser($table,$email,$pass)
    {
        $sql = " SELECT * FROM $table WHERE user_email = ? AND user_pass = ? ";
        return $this->db->affectedRow($sql,$email,$pass);
    }
    public function getUserAfterLogin($table,$email,$pass)
    {
        $sql = " SELECT * FROM $table WHERE user_email = ? AND user_pass = ? ";
        return $this->db->selectUser($sql,$email,$pass);
           
    }
}


?>