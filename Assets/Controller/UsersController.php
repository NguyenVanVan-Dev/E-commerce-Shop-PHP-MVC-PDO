<?php
class UsersController extends MasterController
{
    const TABLE_USER = 'tbl_users';
    public function __construct()
    {
      Session::init();
      parent::__construct();
    }
    public function ViewLoginUser()
    {

        $data['yield_header'] = 'Element/header';
        $data['yield_footer'] = 'Element/footer';
        $data['yield_slide'] = 'Element/slide';
        $this->load->view('layout_login_home',$data);
        
    }
   
    
   
    public function RegisterUser()
    {
        $UserModel = $this->load->model('UserModel');
        $email =filter_input(INPUT_POST,'email_user');
        $name =filter_input(INPUT_POST,'name_user');
        $time =filter_input(INPUT_POST,'time_create');
        $pass =md5(filter_input(INPUT_POST,'password_user'));
        if (!empty($name) && !empty($email) && !empty($pass) )
        {
            $data = array(

                'user_name' => $name,
                'user_email' => $email,
                'user_pass' => $pass,
                'created_at' => $time,
    
            );
            $result = $UserModel->RegisterUser(self::TABLE_USER,$data);
           
            if($result == 1)
            {
                $user = $UserModel->getUserAfterLogin(self::TABLE_USER,$email,$pass);
                Session::init();
              
                Session::set('user_name',$user[0]['user_name']);              
                Session::set('user_id',$user[0]['user_id']);              
                header("location:".BASE_URL.''); 
            }
            else
            { 
                Session::init();
                Session::set('mes','Không Thể Đăng Ký!');
                header("location:".BASE_URL.'UsersController/ViewLoginUser');
                
            }
        }

    }
    public function LoginUser()
    {
        $UserModel = $this->load->model('UserModel');
        $email =filter_input(INPUT_POST,'email_user');
        $pass =md5(filter_input(INPUT_POST,'password_user'));

        $data = $UserModel->LoginUser(self::TABLE_USER,$email,$pass);

        if($data == 1)
        {
            $user = $UserModel->getUserAfterLogin(self::TABLE_USER,$email,$pass);
            Session::init();
          
            Session::set('user_name',$user[0]['user_name']);  
            Session::set('user_id',$user[0]['user_id']);              
            header("location:".BASE_URL.'');
        }
        else
        {
            Session::init();
            Session::set('mes','Sai tên đăng nhập hoạc mật khẩu !');
            header("location:".BASE_URL.'UsersController/ViewLoginUser');
        }

    }
    public function LogOutUser(){
        Session::init();
        Session::destroy();
        header("location:".BASE_URL.'UsersController/ViewLoginUser');
    }
    public function ProFileUser(){
        $data['yield_header'] = 'Element/header';
        $data['yield_footer'] = 'Element/footer';
        $data['yield_user'] = 'Element/user';
        $this->load->view('layout_user',$data);
    }

}



?>