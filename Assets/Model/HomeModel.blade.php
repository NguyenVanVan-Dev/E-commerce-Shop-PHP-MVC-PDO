<?php
class HomeModel extends MasterModel {

     public function  __construct()
     {
        parent::__construct();
     }
     public function getCategoryHome($table)
     {
      $sql =" SELECT * FROM $table WHERE category_status = 1";
      return $this->db->select($sql);

     }
     public function getProductHome($table)
     {
      $sql =" SELECT * FROM $table WHERE product_status = 1 ORDER BY product_id DESC LIMIT 6";
      return $this->db->select($sql);

     }
     
     public function getProductByCategoryId($table,$condition)
     {
      $sql =" SELECT * FROM $table WHERE product_status = 1 AND $condition ORDER BY product_id DESC ";
      return $this->db->select($sql);
     }

     public function getAllProduct($table)
     {
      $sql =" SELECT * FROM $table WHERE product_status = 1   ORDER BY product_id DESC ";
      return $this->db->select($sql);
     }

     public function getProductPanigation($table,$number_page,$number_row)
     {
         $sql =" SELECT * FROM  $table WHERE product_status = 1 LIMIT $number_page,$number_row";
         return $this->db->select($sql);
     }

     public function getProductConnect($table,$condition)
     {
      $sql =" SELECT * FROM $table WHERE $condition ORDER BY product_id DESC LIMIT 3 ";
      return $this->db->select($sql);
     }
     public function SearchProduct($table,$search)
     {
        $sql = " SELECT * FROM  $table WHERE product_name LIKE '%$search%' 
        OR product_desc LIKE '%$search%' 
        OR product_price LIKE '%$search%' ";
        return $this->db->select($sql);
     }
}

?>