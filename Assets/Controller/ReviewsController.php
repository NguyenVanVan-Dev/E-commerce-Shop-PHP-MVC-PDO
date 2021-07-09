<?php
class ReviewsController extends MasterController
{

    public function __construct()
    {
      Session::init();
      parent::__construct();
    }
    public function AddComment(){
        $ReviewModel = $this->load->model('ReviewModel');
        $name =filter_input(INPUT_POST,'user_name');
        $id =filter_input(INPUT_POST,'user_id');
        $comment =filter_input(INPUT_POST,'input_comment');
        $number_rate =filter_input(INPUT_POST,'number_rate');
        

    }






}



?>