<?php
class UsersController extends MasterController
{
    const TABLE_USER = 'tbl_users';
    public function __construct()
    {
      Session::init();
      parent::__construct();
    }
    public function getTime(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date  = new DateTime(); 
        $time_created = $date->format('d-m-Y H:i:s');
        return $time_created;
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
       
        $time_created = $this->getTime();
           
        $pass =md5(filter_input(INPUT_POST,'password_user'));
        if (!empty($name) && !empty($email) && !empty($pass) )
        {
            $data = array(

                'user_name' => $name,
                'user_email' => $email,
                'user_pass' => $pass,
                'created_at' => $time_created,
    
            );
            $result = $UserModel->RegisterUser(self::TABLE_USER,$data);
           
            if($result == 1)
            {
                $user = $UserModel->getUserAfterLogin(self::TABLE_USER,$email,$pass);
                Session::init();
              
                Session::set('user_name',$user[0]['user_name']);              
                Session::set('user_id',$user[0]['user_id']);    
                Session::set('user_email',$user[0]['user_email']);           
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
            Session::set('user_email',$user[0]['user_email']);
            Session::set('user_address',$user[0]['user_address']);  
            Session::set('user_phone',$user[0]['user_phone']);              
            Session::set('user_avatar',$user[0]['user_avatar']);               
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
    public function UpdateUser($id)
    {

        $UserModel = $this->load->model('UserModel');
        $update_at = $this->getTime();
        $email =filter_input(INPUT_POST,'email');
        $name =filter_input(INPUT_POST,'name');
        $pass = md5(filter_input(INPUT_POST,'pass'));
        $repeat_pass = md5(filter_input(INPUT_POST,'repeat_pass'));
        $address = filter_input(INPUT_POST,'address');
        $phone = filter_input(INPUT_POST,'phone');
        $image = $_FILES['avatar']['name'];
        $tmp_image = $_FILES['avatar']['tmp_name'];

        

        $condition = "user_id = $id";
       
        

        $divede_name_image = explode('.',$image); //tach ten file lấy từ url ra khỏi loại fie vd :haha.png => $divede_name_image = ['haha','png']
        $file_type = strtolower(end($divede_name_image));// đổi tất cả các chứ của đuôi file thàng chữ thường  

        $new_name_image = $divede_name_image[0].rand(1000,100000).'.'.$file_type; // tạo 1 tên mới với tên cũ + số random từ 1000-100000 + . + loại file
        $path_uploads = 'Public/Uploads/'.$new_name_image;

        //Lấy link file avatar cũ
        $old_avatar = $UserModel->getUserById(self::TABLE_USER,$id);
        foreach($old_avatar as $key => $value)
        {
            $path_file_old = $value['user_avatar'];
        }
      
        if ($pass === $repeat_pass) 
        {
            if (!empty($name) && !empty($email) && !empty($pass)  && !empty($address) && !empty($image) && !empty($phone)  )
            {
                $data = array(
    
                    'user_name' => $name,
                    'user_phone' => $phone,
                    'user_email' => $email,
                    'user_pass' => $pass,
                    'user_avatar' => $path_uploads,
                    'user_address' => $address,
                    'update_at' => $update_at,

                );
              
                $update_user = $UserModel->UpdateUser(self::TABLE_USER,$data,$condition);
                if($update_user == 1)
                {   
                    unlink($path_file_old);
                    move_uploaded_file($tmp_image,$path_uploads);
                    Session::set('isSuccess','Update Profile Successfully!');
                    header("location:".BASE_URL.'UsersController/ProfileUser');
                }
                else
                {
                    Session::set('isFalse','Update User Failed!');
            header("location:".BASE_URL.'UsersController/ProfileUser');
                }
            }
        }
        else
        {
            Session::set('isFalse','Password Not equals Repeat Password!');
            header("location:".BASE_URL.'UsersController/ProfileUser');
        }

    }

}



?>