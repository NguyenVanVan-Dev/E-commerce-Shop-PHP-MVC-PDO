<?php
class HomeModel extends MasterModel {

     public function  __construct()
     {
        parent::__construct();
     }
     public function getCategoryHome($table){
      $sql =" SELECT * FROM $table WHERE category_status = 1";
      return $this->db->select($sql);

     }
     public function getProductHome($table){
      $sql =" SELECT * FROM $table WHERE product_status = 1 ORDER BY product_id DESC LIMIT 6";
      return $this->db->select($sql);

     }
     public function getProductByCategoryId($table,$condition){
      $sql =" SELECT * FROM $table WHERE product_status = 1 AND $condition ORDER BY product_id DESC ";
      return $this->db->select($sql);
     }
     public function getAllproduct($table){
      $sql =" SELECT * FROM $table WHERE product_status = 1   ORDER BY product_id DESC ";
      return $this->db->select($sql);
     }
}

?>