<?php
class MasterModel{
    

    protected $db = array();
    public function __construct()
    {
        $connect = 'mysql:dbname=shop_ecommerce_php;host=localhost;charset =utf8';
        $username = 'root';
        $password = '';
        $this->db = new Database($connect,$username,$password); 
    }
}

?>