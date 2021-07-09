<?php
    class HomeController extends MasterController{
        public $data = array();
        const TABLE_CATE = 'tbl_categorys';
        const TABLE_PRODUCT = 'tbl_product';
        const TABLE_BRAND = 'tbl_categorys';
        public function __construct()
        {
            Session::init();
            parent::__construct();
            // $this->load = new Load();
        }
        //thuoc tinh load chinh la 1 doi tuong cua class load 
        
       
        public function HomePage(){
            $HomeModel = $this->load->model('HomeModel');
           
            $data['category']=$HomeModel->getCategoryHome(self::TABLE_CATE);
            $data['products'] = $HomeModel->getProductHome(self::TABLE_PRODUCT);
            $data['yield_product'] = 'Element/product';
            $data['yield_footer'] = 'Element/footer';
            $data['yield_header'] = 'Element/header';
            $data['yield_sidebar'] = 'Element/sidebar';
            $data['yield_slide'] = 'Element/slide';
            $data['yield_slidebottom'] = 'Element/slidebottom';
            $data['yield_tabs'] = 'Element/tabs';
          
            $this->load->view('master_layout',$data);
        }
        public function ProductByCategoryId($id){
            $HomeModel = $this->load->model('HomeModel');
           
            $condition = "category_id = $id";
            $data['category']=$HomeModel->getCategoryHome(self::TABLE_CATE);
            $data['products'] = $HomeModel->getProductByCategoryId(self::TABLE_PRODUCT,$condition);
            $data['yield_product'] = 'Element/product';
            $data['yield_footer'] = 'Element/footer';
            $data['yield_header'] = 'Element/header';
            $data['yield_sidebar'] = 'Element/sidebar';
            $data['yield_slide'] = 'Element/slide';

            $this->load->view('home',$data);

        }
        public function getAllProduct($page){
            $HomeModel = $this->load->model('HomeModel');
            $ProductModel = $this->load->model('ProductModel');
            
            $number_row = 12; // sô bản ghi trên 1 trang 
            $number_page = ($page -1) * $number_row; // số limit vi dụ url =?page =1 => $number_page = (1 -1 )* 10 
            // LIMIT $number_page,$number_row = LIMIT 0,10
            
            $count = $ProductModel->getListProduct(self::TABLE_PRODUCT);
            $count = count($count);
            $pages = ceil($count / $number_row) ;
            
            //tính số trang được phân ra vd: có 40 bảng ghi sẽ phân làm 4 trang 
            $data['pages'] = $pages;
            $data['category']=$HomeModel->getCategoryHome(self::TABLE_CATE);
            $data['products'] = $ProductModel->getProductPanigation(self::TABLE_PRODUCT,$number_page,$number_row);
            $data['yield_product'] = 'Element/product';
            $data['yield_footer'] = 'Element/footer';
            $data['yield_header'] = 'Element/header';
            $data['yield_sidebar'] = 'Element/sidebar';
            $data['yield_slide'] = 'Element/slide';

          
            $this->load->view('home',$data);

        }
        public function DetailsProduct($id){
            $HomeModel = $this->load->model('HomeModel');
            $ProductModel = $this->load->model('ProductModel');
            $data['yield_header'] = 'Element/header';
            //product connection
           

            $product = $ProductModel->ProductById(self::TABLE_PRODUCT,$id);
            foreach($product as $key => $value){
                $category_product = $value['category_id'];
            }
            $condition = "category_id = $category_product";
            $data['product_connect'] =  $HomeModel->getProductConnect(self::TABLE_PRODUCT,$condition);
         
            $data['products'] = $ProductModel->ProductById(self::TABLE_PRODUCT,$id);
            $data['category']=$HomeModel->getCategoryHome(self::TABLE_CATE);
            // comment


            $data['yield_sidebar'] = 'Element/sidebar';
            $data['yield_bottom'] = 'Element/slidebottom';
            $data['yield_footer'] = 'Element/footer';
          
            $this->load->view('layout_product_details',$data);
        }
        public function SearchProduct(){
            $HomeModel = $this->load->model('HomeModel');
            $search = filter_input(INPUT_POST,'search');
            if(!empty($search) && isset($search))
            {
                $data['category']=$HomeModel->getCategoryHome(self::TABLE_CATE);
                $data['products'] = $HomeModel->SearchProduct(self::TABLE_PRODUCT,$search);
                if(!empty($data['products']))
                {
                    $data['number_product'] = count($data['products']);
                }
                else
                {
                    $data['number_product'] = null;
                }
                $data['yield_product'] = 'Element/product';
                $data['yield_footer'] = 'Element/footer';
                $data['yield_header'] = 'Element/header';
                $data['yield_sidebar'] = 'Element/sidebar';
                $data['yield_slide'] = 'Element/slide';
                Session::set('name_search',$search);
                $this->load->view('home',$data);
            }
            else
            {
                header("location:".BASE_URL.'');
            }
          
        }
    }

?>