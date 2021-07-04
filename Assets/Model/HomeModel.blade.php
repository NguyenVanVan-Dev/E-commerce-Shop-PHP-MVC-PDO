<?php
class HomeModel extends MasterModel {

     public function  __construct()
     {
        parent::__construct();
     }
     public function getCategoryHome($table,$status=0){
      $sql =" SELECT * FROM $table WHERE category_status = $status";
      return $this->db->select($sql);

     }
     public function getProductHome($table,$status=0){
      $sql =" SELECT * FROM $table WHERE product_status = $status";
      return $this->db->select($sql);

     }
}

?>