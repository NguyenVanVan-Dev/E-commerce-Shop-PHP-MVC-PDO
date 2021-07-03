<?php
class Load{

    public function __construct()
    {
       
    }
    public function view($filename, $data = array() )
    {
        if ($data ) {
            extract($data);
        }
        
        include('./Assets/View/'.$filename.'.blade.php');
    }
    public function model($filename)
    {
        include('./Assets/Model/'.$filename.'.blade.php');
        return new $filename();
    }


 }

?>