<?php
class CheckoutModel extends MasterModel {

    public function  __construct()
     {
        parent::__construct();
     }
     public function AddOrder($table,$data)
     {
        return $this->db->insert($table,$data);
     }
    
}   

?>