<?php
    class HomeController extends MasterController{
        public $data = array();
        const TABLE_CATE = 'tbl_categorys';
        const TABLE_PRODUCT = 'tbl_products';
        const TABLE_BRAND = 'tbl_categorys';
        public function __construct()
        {
           
            parent::__construct();
            // $this->load = new Load();
        }
        //thuoc tinh load chinh la 1 doi tuong cua class load 
        
       
        public function HomePage(){
            $category = $this->load->model('HomeModel');
            $status = 1;
            $data['category']=$category->CategoryHome(self::TABLE_CATE,$status);
            $data['products']= [
                'name' => 'Van 123',
                'id'=>'5'
            ];
            $data['yield_category'] = 'home_category';
            $data['yield_product'] = 'home_product_new';
            // $this->db = new Database($connect,$username,$password); 
            $this->load->view('master_layout',$data);
        }
        public function ProductByCategoryId($id){


        }
        
    }

?>