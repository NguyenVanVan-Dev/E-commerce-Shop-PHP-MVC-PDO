<?php
 class ProductsController extends MasterController{

    const TABLE_CATEGORY = 'tbl_categorys';
    const TABLE_PRODUCT = 'tbl_product';
    public function __construct()
    {
      Session::init();
      parent::__construct();
    }
    public function getListProduct($page){
      $ProductModel = $this->load->model('ProductModel');


      $number_row = 5; // sô bản ghi trên 1 trang 
      $number_page = ($page -1) * $number_row; // số limit vi dụ url =?page =1 => $number_page = (1 -1 )* 10 
      // LIMIT $number_page,$number_row = LIMIT 0,10
     
      $count = $ProductModel->getListProduct(self::TABLE_PRODUCT);
      $count = count($count);
      $pages = ceil($count / $number_row) ;
     
      //tính số trang được phân ra vd: có 40 bảng ghi sẽ phân làm 4 trang 
      $data['pages'] = $pages;
      $data['category'] = $ProductModel->getProductPanigation(self::TABLE_PRODUCT,$number_page,$number_row);
      $data['yield'] = 'Products/list_product';
      $this->load->view('Admin/master_layout',$data);

    }
    public function ProductByid($id){
        
      $ProductModel = $this->load->model('ProductModel');
      $data['category'] = $ProductModel->categorybyid(self::TABLE_PRODUCT,$id);
      $data['yield'] = 'Category/categorybyid';
      $this->load->view('master_layout',$data);
      
  }


    public function ViewAddProduct(){

    $CategoryModel = $this->load->model('CategoryModel');
    $data['category'] = $CategoryModel->categorys(self::TABLE_CATEGORY);
    $data['yield'] = 'Products/add_product';
    $this->load->view('Admin/master_layout',$data);

    }
    public function DetailProduct($id){
      $ProductModel = $this->load->model('ProductModel');
      $CategoryModel = $this->load->model('CategoryModel');
      $cate_product = $ProductModel->ProductByid(self::TABLE_PRODUCT,$id);
      $name_category = $CategoryModel->categorybyid(self::TABLE_CATEGORY,$cate_product[0]['category_id']);

      $data['category']=$name_category;
      $data['product'] = $ProductModel->ProductByid(self::TABLE_PRODUCT,$id);
      $data['yield'] = 'Products/detail_product';
      $this->load->view('Admin/master_layout',$data);

    }
    public function AddProduct(){
      $CategoryModel = $this->load->model('CategoryModel');
      $ProductModel = $this->load->model('ProductModel');
      $name =filter_input(INPUT_POST,'product_name');
      $slug =filter_input(INPUT_POST,'product_slug');
      $desc =filter_input(INPUT_POST,'product_desc');
      $quantity =filter_input(INPUT_POST,'product_quantity');
      $status =filter_input(INPUT_POST,'product_status');
      $category_id =filter_input(INPUT_POST,'category_id');
      $image = $_FILES['product_image']['name'];// lấy tên file 
      $tmp_image = $_FILES['product_image']['tmp_name']; //lấy đường ẫn cũ của file
      $price =filter_input(INPUT_POST,'product_price');
      $time_created =filter_input(INPUT_POST,'product_time_created');
      
      $divede_name_image = explode('.',$image); //tach ten file cũ ra khỏi loại fie vd :haha.png => $divede_name_image = ['haha','png']
      $file_type = strtolower(end($divede_name_image));// đổi tất cả các chứ của đuôi file thàng chữ thường  

      $new_name_image = $divede_name_image[0].rand(1000,100000).'.'.$file_type; // tạo 1 tên mới với tên cũ + số random từ 1000-100000 + . + loại file
      $path_uploads = 'public/Uploads/'.$new_name_image;

    
      if (!empty($name) && !empty($slug)&& !empty($desc)&& !empty($quantity) && !empty($status) && !empty($category_id) && !empty($price))
      {
          $data = array(
              'product_name' => $name,
              'product_slug' => $slug,
              'product_desc' => $desc,
              'product_quantity' => $quantity,
              'product_status' => $status,
              'category_id' => $category_id,
              'product_price' => $price,
              'product_image' => $path_uploads,
              'created_at' => $time_created,
              
          );
          
          $result = $ProductModel->AddProduct(self::TABLE_PRODUCT,$data);
          if ($result == 1) 
          {
            move_uploaded_file($tmp_image,$path_uploads);
            Session::set('success', "Thêm Sản Phẩm Thành Công");
          }else
          {
              Session::set('danger', "Thêm Sản Phẩm Thất Bại");
          }
          $data['category'] = $CategoryModel->categorys(self::TABLE_CATEGORY);
          $data['yield'] = 'Products/add_product';
          $this->load->view('Admin/master_layout',$data);
      }
      else
      {   
          
          Session::set('danger', "Dữ Liệu Không Được Trống");
          $data['category'] = $CategoryModel->categorys(self::TABLE_CATEGORY);
          $data['yield'] = 'Products/add_product';
          $this->load->view('Admin/master_layout',$data);
       }


    }

    public function EditProduct($id){
      $ProductModel = $this->load->model('ProductModel');
      $CategoryModel = $this->load->model('CategoryModel');
      $data['edit_product'] = $ProductModel->ProductByid(self::TABLE_PRODUCT,$id);
      $data['category'] = $CategoryModel->categorys(self::TABLE_CATEGORY);
      $data['yield'] = 'Products/edit_product';
      $this->load->view('Admin/master_layout',$data);
    }

    public function UpdateProduct($id){
      $CategoryModel = $this->load->model('CategoryModel');

      $ProductModel = $this->load->model('ProductModel');

      $name =filter_input(INPUT_POST,'product_name');
      $slug =filter_input(INPUT_POST,'product_slug');
      $desc =filter_input(INPUT_POST,'product_desc');
      $quantity =filter_input(INPUT_POST,'product_quantity');
      $status =filter_input(INPUT_POST,'product_status');
      $category_id =filter_input(INPUT_POST,'category_id');
      $image = $_FILES['product_image']['name'];// lấy tên file 
      $tmp_image = $_FILES['product_image']['tmp_name']; //lấy đường ẫn cũ của file
      $price =filter_input(INPUT_POST,'product_price');
      $time_created =filter_input(INPUT_POST,'product_time_created');
      
      $divede_name_image = explode('.',$image); //tach ten file cũ ra khỏi loại fie vd :haha.png => $divede_name_image = ['haha','png']
      $file_type = strtolower(end($divede_name_image));// đổi tất cả các chứ của đuôi file thàng chữ thường  

      $new_name_image = $divede_name_image[0].rand(1000,100000).'.'.$file_type; // tạo 1 tên mới với tên cũ + số random từ 1000-100000 + . + loại file
      $path_uploads = 'public/Uploads/'.$new_name_image;

      $condition = "product_id = $id";
      if (!empty($name) && !empty($slug)&& !empty($desc)&& !empty($quantity)  && !empty($category_id) && !empty($price))
      {
          $data = array(
              'product_name' => $name,
              'product_slug' => $slug,
              'product_desc' => $desc,
              'product_quantity' => $quantity,
              'product_status' => $status,
              'category_id' => $category_id,
              'product_price' => $price,
              'product_image' => $path_uploads,
              'update_at' => $time_created,
              
          );
          
          $result = $ProductModel->UpdateProduct(self::TABLE_PRODUCT,$data,$condition);
          if ($result == 1) 
          {
            move_uploaded_file($tmp_image,$path_uploads);
            Session::set('success', "Update Dữ Liệu Thành Công");
          }else
          {
              Session::set('danger', "Update Dữ Liệu Thất Bại ");
          }
          $data['edit_product'] = $ProductModel->ProductByid(self::TABLE_PRODUCT,$id);
          $data['category'] = $CategoryModel->categorys(self::TABLE_CATEGORY);
          $data['yield'] = 'Products/edit_product';
          $this->load->view('Admin/master_layout',$data);
      }
      else
      {   
          
          Session::set('danger', "Dữ Liệu Không Được Trống");
          $data['edit_product'] = $ProductModel->ProductByid(self::TABLE_PRODUCT,$id);
          $data['category'] = $CategoryModel->categorys(self::TABLE_CATEGORY);
          $data['yield'] = 'Products/edit_product';
          $this->load->view('Admin/master_layout',$data);
       }

     

  }

    public function DisplayProduct($id){
      $ProductModel = $this->load->model('ProductModel');
      $condition = "product_id = $id ";
      $status = $ProductModel->ProductById(self::TABLE_PRODUCT,$id);
      $number_row = 5; // sô bản ghi trên 1 trang 
      foreach($status as $key => $value)
      {
          $product_status = $value['product_status'];
      }
      if ($product_status == 1) {

          $product_status = 0;
          $string_status = 'Hidden';
      }
      else{

          $product_status = 1;
          $string_status = 'Show';
      }
      $data = array(
         
          'product_status' => $product_status,

      );
      $result = $ProductModel->UpdateProduct(self::TABLE_PRODUCT,$data,$condition);
      if ($result == 1) 
      {
          Session::set('success', " ". $string_status." Dữ Liệu Thành Công");
      }else
      {
          Session::set('success', "Update Dữ Liệu Thất Bại");
      }
      $count = $ProductModel->getListProduct(self::TABLE_PRODUCT);
      $count = count($count);
      $pages = ceil($count / $number_row) ;
     
      //tính số trang được phân ra vd: có 40 bảng ghi sẽ phân làm 4 trang 
      $data['pages'] = $pages;
      $data['category'] = $ProductModel->getProductPanigation(self::TABLE_PRODUCT,0,$number_row);
      $data['yield'] = 'Products/list_product';
       
      $this->load->view('Admin/master_layout',$data);
  }
  public function DeleteProduct($id){
    $ProductModel = $this->load->model('ProductModel');
    $condition = "product_id = $id ";
    $getpath_file = $ProductModel->ProductByid(self::TABLE_PRODUCT,$id);

    foreach($getpath_file as $key => $value)
    {
      $path_file = $value['product_image'];
    }
   
    $result = $ProductModel->DeleteProduct(self::TABLE_PRODUCT,$condition);

    if ($result == 1) 
    {
        unlink($path_file);
        Session::set('success', "Delete Dữ Liệu Thành Công");
    }else
    {
        Session::set('danger', "Delete Dữ Liệu Thất Bại");
    }
    $data['category'] = $ProductModel->getListProduct(self::TABLE_PRODUCT);
    $data['yield'] = 'Products/list_product';
    $this->load->view('Admin/master_layout',$data);
  }

 }

?>