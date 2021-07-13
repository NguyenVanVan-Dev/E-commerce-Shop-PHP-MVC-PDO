<?php
class CartsController extends MasterController
{
    const TABLE_CATE = 'tbl_categorys';
    const TABLE_PRODUCT = 'tbl_product';
    const TABLE_ORDER = 'tbl_order';
    const TABLE_ORDERDETAILS = 'tbl_order_details';
    public function __construct()
    {
        Session::init();
        parent::__construct();
    }
    public function ViewCart()
    {
        $HomeModel = $this->load->model('HomeModel');
        $data['category']=$HomeModel->getCategoryHome(self::TABLE_CATE);
        $data['yield_footer'] = 'Element/footer';
        $data['yield_cart'] = 'Element/cart';
        $data['yield_header'] = 'Element/header';

       $this->load->view('layout_cart',$data);
    }
    public function AddToCart()
    {
        $name     = filter_input(INPUT_POST,'product_name');     
        $quantity = filter_input(INPUT_POST,'product_quantity');
        $number = filter_input(INPUT_POST,'product_number');
        $image    = filter_input(INPUT_POST,'product_image');
        $price    = filter_input(INPUT_POST,'product_price');
        $id       = filter_input(INPUT_POST,'product_id');
        if(isset($_SESSION['shopping_cart']))
        {
            $avaiable = 0;
            foreach($_SESSION['shopping_cart'] as $key => $value)
            {
                if ($_SESSION['shopping_cart'][$key]['product_id'] == $id ) {
                  
                    $_SESSION['shopping_cart'][$key]['product_quantity'] += 1;
                    $avaiable++;
                }
                
            }
            if ($avaiable == 0) 
            {
                $item_array = array(
                    'product_id' => $id,
                    'product_name' => $name,
                    'product_quantity' => $quantity,
                    'product_price' => $price,
                    'product_image' => $image,
                    'product_number' => $number

                );
                $_SESSION['shopping_cart'][] = $item_array;
            }

        }
        else
        {

            $item_array = array(
                'product_id' => $id,
                'product_name' => $name,
                'product_quantity' => $quantity,
                'product_price' => $price,
                'product_image' => $image,
                'product_number' => $number
            );
            $_SESSION['shopping_cart'][] = $item_array;
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        // quay lai trang da them gia hang 
    }
    public function DeleteCart($id)
    {
        foreach($_SESSION['shopping_cart'] as $key => $value)
        {
            if ($_SESSION['shopping_cart'][$key]['product_id'] == $id ) {
                
                $_SESSION['shopping_cart'][$key]['product_id'] = null;
              
            }
            
        }  
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    public function UpdateCart($id)
    {
        $quantity = filter_input(INPUT_POST,'quantity');
        foreach($_SESSION['shopping_cart'] as $key => $value)
        {
            if ($_SESSION['shopping_cart'][$key]['product_id'] == $id ) {
                
                $_SESSION['shopping_cart'][$key]['product_quantity'] = $quantity; 
            }
            
        }
       
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    // CheckOut
    public function ViewCheckOut()
    {
        $HomeModel = $this->load->model('HomeModel');
        $data['category']=$HomeModel->getCategoryHome(self::TABLE_CATE);
        $data['yield_footer'] = 'Element/footer';
        $data['yield_cart'] = 'Element/checkout';
        $data['yield_header'] = 'Element/header';

       $this->load->view('layout_cart',$data);
    }
    public function CheckOut()
    {
        $CheckoutModel = $this->load->model('CheckoutModel');
        $user_name     = filter_input(INPUT_POST,'name');
        $user_email    = filter_input(INPUT_POST,'email');
        $user_phone    = filter_input(INPUT_POST,'phone');
        $user_address  = filter_input(INPUT_POST,'address');
        $order_code = rand(1000,10000);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date  = new DateTime(); 
        $time_created = $date->format('d-m-Y H:i:s');

        $data_order = array(
                    'order_code'  =>$order_code,
                    'user_name' =>$user_name,
                    'user_email'  =>$user_email,
                    'user_phone'  =>$user_phone,
                    'user_address'=>$user_address,
                    'created_at'  =>$time_created
        );
        $CheckoutModel->AddOrder(self::TABLE_ORDER,$data_order);
        if (!empty(Session::get('shopping_cart'))) {
    
           foreach (Session::get('shopping_cart') as $key => $value) {
             
            $data_detail = array(
                'order_code'  =>$order_code,
                'product_name' => $value['product_name'],
                'product_id' => $value['product_id'],
                'product_price' => $value['product_price'],
                'product_image' => $value['product_image'],
                'product_quantity' => $value['product_quantity'],
                'created_at' => $time_created
            );
            $result_details = $CheckoutModel->AddOrder(self::TABLE_ORDERDETAILS,$data_detail);
           }
           unset($_SESSION['shopping_cart']);
        }
        if ($result_details) {
            Session::set('meg','Đặt hàng thành công');
            header("location:".BASE_URL.'CartsController/ViewCart');
        }
       

    }



}



?>