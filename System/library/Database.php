<?php
class Database extends PDO{
   
    public function __construct($connect,$username,$password)
    {
        parent::__construct($connect,$username,$password);
    }

    public function select($sql,$data = array(),$fetchstyle = PDO::FETCH_ASSOC)
    {
        
        $statement = $this->prepare($sql);
        foreach($data as $key => $value){
            $statement->bindParam($key,$value);
        }
        $statement->execute();
        $result = $statement->fetchAll();
    
        if($result){
            return  $result;
        }
        
    }
    public function insert($table,$data){
            $keys = implode(',',array_keys($data));// arraykeys trar ve 1 mang moi chua cac key cua mang cu  sau đó đùng impode()
                                                    // để tách mảng thành chuổi cách nhau bằng , giữa các phần tử 
            $values = ':'.implode(', :',array_keys($data));// cái này cx y chang như trên nhưng dùng để làm đối số giá trị cho các trường trong bảng dữ liệu 
                                                                     
            
            $sql = " INSERT INTO $table($keys) VALUES ($values) ";
            $statement = $this->prepare($sql);
            foreach($data as $key => $value){
                $statement->bindValue(":$key",$value);
                
            }
            return $statement->execute();
    }
    public function update($table,$data,$condition){
        $updatekey = NULL;
        foreach($data as $key => $value){
           $updatekey .= "$key = :$key,";
          
        }
        $updatekey = rtrim($updatekey,","); //cat ki tu , o cuoi hang tu foreach category_id = :category_id,category_name= :category_name, => 
        // lenh sql se sai neu co , o cuoi nua nen phai xoa no di = rtrim();
       
        $sql = "UPDATE $table SET $updatekey WHERE $condition";
        //UPDATE $table SET category_status = :category_status WHERE category_id = $id ;
        $statement = $this->prepare($sql);

        foreach($data as $key => $value){
            $statement->bindValue(":$key",$value);
            
        }
        //$statement->bindValue(":category_status", 1 );
        //UPDATE $table SET category_status = 1 WHERE category_id = $id ;

        
        return $statement->execute();
    }
    public function delete($table,$condition,$limit = 1){
        $sql = "DELETE FROM $table WHERE $condition LIMIT  $limit";
        
        return $this->exec($sql);
    }
    public function affectedRow($sql,$email,$password)
    {
        $statement = $this->prepare($sql);
        $statement ->execute(array($email,$password)); 
        return  $statement->rowCount();
    }
    public function selectUser($sql,$email,$password)
    {
        $statement = $this->prepare($sql);
        $statement ->execute(array($email,$password)); 
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>