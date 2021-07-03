<?php
class HomeModel extends MasterModel {

     public function  __construct()
     {
        parent::__construct();
     }
     public function CategoryHome($table,$status=0){
      $sql =" SELECT * FROM $table WHERE category_status = $status";
      return $this->db->select($sql);

     }
}

?>