<?php
class AdminController extends MasterController{
    const TABLE_NAME ='tbl_admin';
    public function __construct()
    {
        $message = array();
        parent::__construct();
    }
    public function ViewLoginAdmin(){
    
        Session::init();
        if (Session::get('login')== true) {
            header("location:".BASE_URL.'AdminController/Dashboard');
        }else
        {
            $this->load->view('Admin/layout_login');
        }
       
    }
    public function Dashboard(){
        
        Session::checkSection();
       
        $data['yield'] = 'Admin/dashboard';
        $this->load->view('Admin/master_layout',$data); 
       
    }
    public function SiginAdmin(){
        $adminModel = $this->load->model('AdminModel');
        $email =filter_input(INPUT_POST,'email');
        $pass =md5(filter_input(INPUT_POST,'password'));

        $data = $adminModel->login_admin(self::TABLE_NAME,$email,$pass);
        
        if($data == 0){
            $message['msg'] = " User or Password don't correct!";
            header("location:".BASE_URL.'AdminController/ViewLoginAdmin');
        }
        else
        { 
            $result = $adminModel->getLogin(self::TABLE_NAME,$email,$pass);
            Session::init();
            Session::set('login',true);
            Session::set('admin_name',$result[0]['admin_name']);
            Session::set('admin_avatar',$result[0]['admin_avatar']);
            Session::set('admin_private',$result[0]['admin_private']);
            header("location:".BASE_URL.'AdminController/Dashboard');
        }

    }
    public function LogoutAdmin(){
        Session::init();
        Session::destroy();
        header("location:".BASE_URL.'AdminController/ViewLoginAdmin');
    }



}


?>