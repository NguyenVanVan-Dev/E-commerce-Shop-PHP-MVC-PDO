<?php
    class HomeController extends MasterController{
        public $data = array();
        const TABLE_CATE = 'tbl_categorys';
        const TABLE_PRODUCT = 'tbl_product';
        const TABLE_BRAND = 'tbl_categorys';
        public function __construct()
        {
           
            parent::__construct();
            // $this->load = new Load();
        }
        //thuoc tinh load chinh la 1 doi tuong cua class load 
        
       
        public function HomePage(){
            $HomeModel = $this->load->model('HomeModel');
            $status = 1;
            $data['category']=$HomeModel->getCategoryHome(self::TABLE_CATE,$status);
            $data['products'] = $HomeModel->getProductHome(self::TABLE_PRODUCT,$status);
            $data['yield_category'] = 'home_category';
            $data['yield_product'] = 'home_product_new';
            // $this->db = new Database($connect,$username,$password); 
            $this->load->view('master_layout',$data);
        }
        public function ProductByCategoryId($id){


        }
        
    }

?>