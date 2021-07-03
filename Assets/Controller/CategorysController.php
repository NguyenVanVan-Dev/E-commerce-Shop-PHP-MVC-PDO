<?php
 class CategorysController extends MasterController{
    public $message = array();
    const TABLE_NAME = 'tbl_categorys';
    public function __construct()
    {
        Session::init();
        parent::__construct();
    }
    public function getListCategory(){
            
       
        $CategoryModel = $this->load->model('CategoryModel');
        /*
            $CategoryModel = $this->load->model('CategoryModel'); = include('./Assets/Model/CategoryModel.blade.php');
            $CategoryModel = new CategoryModel();
         
        */ 
        $data['category'] = $CategoryModel->categorys(self::TABLE_NAME);
        //  $sql =" SELECT * FROM $table ";
        //  return $this->db->select($sql);
        $data['yield'] = 'Category/list_category';
        // $this->db = new Database($connect,$username,$password); 
        $this->load->view('Admin/master_layout',$data);
        
        // thuoc tinh load thuc thi   phuong thuoc( ham ) 'view' vi no la 1 doi tuong cua Load  
        // ben trong class Load co phuong thuc view dung de tra ve file du lieu
    }
    public function CategoryByid($id){
        
        $CategoryModel = $this->load->model('CategoryModel');
        $data['category'] = $CategoryModel->categorybyid(self::TABLE_NAME,$id);
        $data['yield'] = 'Category/categorybyid';
        $this->load->view('master_layout',$data);
        
    }
    public function ViewAddCategory(){
        $CategoryModel = $this->load->model('CategoryModel');
        $data['category'] = $CategoryModel->categorys(self::TABLE_NAME);
        $data['yield'] = 'Category/add_category';
        $this->load->view('Admin/master_layout',$data);
    }
    public function AddCategory(){
        
        $CategoryModel = $this->load->model('CategoryModel');
        $name =filter_input(INPUT_POST,'category_name');
        $slug =filter_input(INPUT_POST,'category_slug');
        $desc =filter_input(INPUT_POST,'category_desc');
        $parent =filter_input(INPUT_POST,'category_parent');
        $status =filter_input(INPUT_POST,'category_status');
    
        if (!empty($name) && !empty($slug)&& !empty($desc))
        {
            $data = array(
                'category_name' => $name,
                'category_slug' => $slug,
                'category_desc' => $desc,
                'category_parent' => $parent,
                'category_status' => $status,
    
            );
            
            $result = $CategoryModel->add_category(self::TABLE_NAME,$data);
            if ($result == 1) 
            {
               Session::set('success', "Them Du Lieu Thanh Cong");
            }else
            {
                Session::set('danger', "Them Du Lieu That bai");
            }
            $data['category'] = $CategoryModel->categorys(self::TABLE_NAME);
            $data['yield'] = 'Category/add_category';
            $this->load->view('Admin/master_layout',$data);
        }
        else
        {   
            if ( empty($name) && empty($slug) && empty($desc) ) 
            {
                $request_data = ' Tên danh mục, Slug, Mô tả danh mục';
            }
            else if(empty($slug) && empty($name))
            {
                $request_data = 'Tên danh muc và Slug ';
            }
            else if(empty($name) && empty($desc))
            {
                $request_data = 'Tên danh mục và Mô tả danh mục';
            }
            else if( empty($desc) && empty($slug) )
            {
                $request_data = 'Slug và Mô tả danh mục';
            }
            else if( empty($desc)  )
            {
                $request_data = ' Mô tả danh mục';
            }
            else if(   empty($slug) )
            {
                $request_data = 'Slug';
            }
            else 
            {
                $request_data = 'Tên danh mục ';
            }
            Session::set('danger', "Dữ Liệu ". $request_data." Không Được Trống");
            $data['category'] = $CategoryModel->categorys(self::TABLE_NAME);
            $data['yield'] = 'Category/add_category';
            $this->load->view('Admin/master_layout',$data);
        }
        
    }
    public function EditCategory($id){
        $CategoryModel = $this->load->model('CategoryModel');
        $data['edit_category'] = $CategoryModel->edit_category(self::TABLE_NAME,$id);
        $data['category'] = $CategoryModel->categorys(self::TABLE_NAME,$id);
        $data['yield'] = 'Category/edit_category';
        $this->load->view('Admin/master_layout',$data);
    }
    public function UpdateCategory($id){
        
        $CategoryModel = $this->load->model('CategoryModel');
        $name =filter_input(INPUT_POST,'category_name');
        $slug =filter_input(INPUT_POST,'category_slug');
        $desc =filter_input(INPUT_POST,'category_desc');
        $parent =filter_input(INPUT_POST,'category_parent');
        $status =filter_input(INPUT_POST,'category_status');
       
        $condition = "category_id = $id ";
        if (!empty($name) && !empty($slug)&& !empty($desc))
        {
            $data = array(
                'category_name' => $name,
                'category_slug' => $slug,
                'category_desc' => $desc,
                'category_parent' => $parent,
                'category_status' => $status,

            );
            $result = $CategoryModel->update_category(self::TABLE_NAME,$data,$condition);
            if ($result == 1) 
            {
                Session::set('success', "Update Dữ Liệu Thành Công");
            }else
            {
                Session::set('success', "Update Dữ Liệu Thất Bại");
            }
            $data['edit_category'] = $CategoryModel->edit_category(self::TABLE_NAME,$id);
            $data['category'] = $CategoryModel->categorys(self::TABLE_NAME);
            $data['yield'] = 'Category/edit_category';
            $this->load->view('Admin/master_layout',$data);
        }
        else
        {  
            if ( empty($name) && empty($slug) && empty($desc) ) 
            {
                $request_data = ' Tên danh mục, Slug, Mô tả danh mục';
            }
            else if(empty($slug) && empty($name))
            {
                $request_data = 'Tên danh muc và Slug ';
            }
            else if(empty($name) && empty($desc))
            {
                $request_data = 'Tên danh mục và Mô tả danh mục';
            }
            else if( empty($desc) && empty($slug) )
            {
                $request_data = 'Slug và Mô tả danh mục';
            }
            else if( empty($desc)  )
            {
                $request_data = ' Mô tả danh mục';
            }
            else if(   empty($slug) )
            {
                $request_data = 'Slug';
            }
            else 
            {
                $request_data = 'Tên danh mục ';
            }
            
            Session::set('danger', "Dữ Liệu ".$request_data." Không Được Để Trống");
            $data['edit_category'] = $CategoryModel->edit_category(self::TABLE_NAME,$id);
            $data['category'] = $CategoryModel->categorys(self::TABLE_NAME);
            $data['yield'] = 'Category/edit_category';
            $this->load->view('Admin/master_layout',$data);
        }
       

    }
    public function DeleteCategory($id){
        
        $CategoryModel = $this->load->model('CategoryModel');
        
       
        $condition = "category_id = $id ";
        
        $result = $CategoryModel->delete_category(self::TABLE_NAME,$condition);
        if ($result == 1) 
        {
            Session::set('success', "Delete Dữ Liệu Thành Công");
        }else
        {
            Session::set('danger', "Delete Dữ Liệu Thất Bại");
        }
        $data['category'] = $CategoryModel->categorys(self::TABLE_NAME);
        $data['yield'] = 'Category/list_category';
        $this->load->view('Admin/master_layout',$data);

    }
    public function DisplayCategory($id){
        $CategoryModel = $this->load->model('CategoryModel');
        $condition = "category_id = $id ";
        $status = $CategoryModel->categorybyid(self::TABLE_NAME,$id);
        
        foreach($status as $key => $value)
        {
            $category_status = $value['category_status'];
        }
        if ($category_status == 1) {

            $category_status = 0;
            $string_status = 'Hidden';
        }
        else{

            $category_status = 1;
            $string_status = 'Show';
        }
        $data = array(
           
            'category_status' => $category_status,

        );
        $result = $CategoryModel->update_category(self::TABLE_NAME,$data,$condition);
        if ($result == 1) 
        {
            Session::set('success', " ". $string_status." Dữ Liệu Thành Công");
        }else
        {
            Session::set('success', "Update Dữ Liệu Thất Bại");
        }
        $data['category'] = $CategoryModel->categorys(self::TABLE_NAME);
        $data['yield'] = 'Category/list_category';
         
        $this->load->view('Admin/master_layout',$data);
    }
    
 }
