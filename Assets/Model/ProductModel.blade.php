<?php
class ProductModel extends MasterModel {

    public function  __construct()
    {
        parent::__construct();
    }
    public function AddProduct($table,$data){
        
        return $this->db->insert($table,$data);
    }

    public function getListProduct($table)
    {
        $sql =" SELECT * FROM $table";
        return $this->db->select($sql);
    }
    public function getProductPanigation($table,$number_page,$number_row)
    {
        $sql =" SELECT * FROM $table LIMIT $number_page,$number_row";
        return $this->db->select($sql);
    }

    public function ProductById($table,$id){
        $sql =" SELECT * FROM $table WHERE product_id = :id";
        
        $data = array(':id'=> $id);

        return $this->db->select($sql,$data);
        
    }
    public function UpdateProduct($table,$data,$condition){

        return $this->db->update($table,$data,$condition);

    }
    public function DeleteProduct($table,$condition){
        return $this->db->delete($table,$condition);
    }
   
}

?>