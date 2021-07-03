<?php
class MasterController{
    protected $load = array();
    
    public function __construct()
    {
        $this->load = new Load();
    }

 }

?>