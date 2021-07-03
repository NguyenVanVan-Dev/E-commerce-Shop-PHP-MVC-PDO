<?php
class CategoryModel extends MasterModel {

     public function  __construct()
     {
         
         parent::__construct();
     }
     public function categorys($table){
      $sql =" SELECT * FROM $table ";
       return $this->db->select($sql);
     }

     public function categorybyid($table,$id){
      $sql =" SELECT * FROM $table WHERE category_id = :id";
      $data = array(':id'=> $id);
      return $this->db->select($sql,$data);
      
     }
     public function add_category($table,$data){

      return $this->db->insert($table,$data);
      
     }
     public function edit_category($table,$id){
        $sql = " SELECT * FROM $table WHERE category_id = $id";
        return $this->db->select($sql);
     }
     public function update_category($table,$data,$condition){
      
      return $this->db->update($table,$data,$condition);
     
     }
     public function delete_category($table,$condition){
      
      return $this->db->delete($table,$condition);
     
     }
}

?>