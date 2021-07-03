<?php
class Main{
    public $url ;
    public $ControllerName = 'HomeController';
    public $MethodName = 'HomePage';
    public $ControllerPath = './Assets/Controller/';
    
    public $controller;
    function __construct()
    {
     $this->getUrl();   
     $this->loadController();
     $this->callMethod();
    }
    public function getUrl(){
        $this->url = isset($_GET['url']) ? $_GET['url'] : NULL; /* Lay tham so url http://localhost/E-commerce%20Shop%20PHP/index.php?url=ProductsController/details_product/13 */
        if ($this->url != NULL) {
        $this->url = rtrim($this->url, '/'); /* loai bo dau / cuoi cung cua chuoi neu tham so thu 2 k co seloai bo cac gia tri /0,/n.... co trong chuoi */
        $this->url = explode('/', filter_var($this->url,FILTER_SANITIZE_URL)); /* phan tach chuoi thanh mang thong qua dau / */
        } else {
        unset($this->url);
        }
    
    
    }
    public function loadController(){
    
        if (!isset($this->url[0]))
        {
            include $this->ControllerPath.$this->ControllerName.'.php';
            // include './Assets/Controller/index.php';
            $this->controller =  new $this->ControllerName();
            // $index = new index();
        }else
        {
            $this->ControllerName = $this->url[0];
            $fileName = $this->ControllerPath.$this->ControllerName.'.php';
            if(file_exists($fileName))
            {
                include $fileName;
                if(class_exists($this->ControllerName))
                {
                    $this->controller = new $this->ControllerName();
                }
                else
                {

                }
            }
            else
            {

            }
        }
        /* 
         $this->url = explode('/', filter_var($this->url,FILTER_SANITIZE_URL));  phan tach chuoi thanh mang thong qua dau / 
         nếu url tồn tại url[0] thí gán thuộc tính ControllerName = thuộc tính url[0] 
         gán filename = method ControllerPath nối với Controllername nới Với đuôi .php
            kiểm tra xem có filename đó k nếu có thid include file name đó sau dó kiểm tra class của filename đó(thường class dat trùng tên với filename)
            nếu  có class đó thì gán cho đôi tượng (thuộc tính controller )  controller là dối tượng mới của Class trong filename đó. 
            vd: ?url = CategoryController 
            =>url[0] = CategoryController  => $this- ControllerName = 'CategoryController'
            $fileName = $this->ControllerPath.$this->ControllerName.'.php' == './Assets/Controller/CategoryController.php'
            kiem tra file nme ton tại thì include fname './Assets/Controller/CategoryController.php' ra sau dó kiểm tra tiêp
            class name của CategoryController.php  nếu có thì controller = new CategoryController(); 
        */


    }
    public function callMethod(){
        if(isset($this->url[3]))
        {
            $this->MethodName = $this->url[1];
            if(method_exists($this->controller,$this->MethodName))
            {
                $this->controller->{$this->MethodName}($this->url[2],$this->url[3]);
            }
            else
            {
                header("location:".BASE_URL.'index.php');
            }
        }else
        {
            if(!isset($this->url[3]))
            {
                if(isset($this->url[2]))
                {
                    $this->MethodName = $this->url[1];
                    if(method_exists($this->controller,$this->MethodName))
                    {
                        $this->controller->{$this->MethodName}($this->url[2]);
                    }
                    else
                    {
                        header("location:".BASE_URL.'index.php');
                    }
                   
                }
                else
                {
                    if(isset($this->url[1]))
                    {
                        $this->MethodName = $this->url[1];
                        if(method_exists($this->controller,$this->MethodName))
                        {
                            $this->controller->{$this->MethodName}();
                        }
                        else
                        {
                            header("location:".BASE_URL.'index.php');
                        }
                       
                    }
                    else
                    {
                        if(method_exists($this->controller,$this->MethodName))
                        {
                            $this->controller->{$this->MethodName}();
                        }
                        else
                        {
                            header('location:'.BASE_URL.'index.php');
                        }
                    }
                }
                /*  
                 sau khi đã có controller = new ControllerName() (đối tượng mới của class có tên ControllerName)
                 ta kiểm tra xem phần tử thứ 3(id) url[2] của url có tồn tại hay k nếu tồn tại chắc chắn sẽ tồn tại phần tử thứ 2 url[1]
                 ta gán phần tử thứ 2 cho thuộc tính MethodName  sau dó kiểm tra method  có tồn tại hay k nếu có 
                 ta dung thuộc tính controller(bởi vì h  thuộc tính controller là 1 đối tượng của class chứa method này) 
                 gọi đến method đó và truyền vào method đó tham số là phần tử thứ 2
                 ngoai ra neu phan tu thu 3 url[2] k tồn tại ta lại kiemr tra  tiep phan tu thu 2 url[1] có tồn tạo hay k 
                 nếu có thi ta lại kiểm tra method dó có tồn tại hay k nếu  có  ta dung thuộc tính controller(bởi vì h  thuộc tính controller là 1 đối tượng của class chứa method này) 
                 gọi đến method đó và k truyền gì vào method.
        
                
                */
                
                
            }
        }
        // 

    }
    //  $url = isset($_GET['url']) ? $_GET['url'] : NULL; /* Lay tham so url http://localhost/E-commerce%20Shop%20PHP/index.php?url=ProductsController/details_product/13 */
   
    //  // $objController->details_product($id);
    //  /* Lay tham so url=ProductsController/details_product/13 
    //   $url = $_GET['url'];
    //   $objController = new $url[0]();  goi class ProductsController 
    //  Array
    //  (
    //      [0] => ProductsController
    //      [1] => details_product
    //      [2] => 13
    //  )
    //  sau do goi ham bang cach {$url[1]}($url[2]) ~ details_product(13)
     
    //  */
    //  // $main->details_product();
 
    //  if ($url !=NULL) {
    //    $url = rtrim($url, '/'); /* loai bo dau / cuoi cung cua chuoi neu tham so thu 2 k co seloai bo cac gia tri /0,/n.... co trong chuoi */
    //    $url = explode('/', filter_var($url,FILTER_SANITIZE_URL)); /* phan tach chuoi thanh mang thong qua dau / */
    //  } else {
    //    unset($url);
    //  }
     
    //  if (isset($url[0]) )
    //  {
    //    include_once('Assets/Controller/'.$url[0].'.php');
    //    $objController = new $url[0](); 
    //     if (isset($url[2]))
    //     {
    //      $objController->{$url[1]}($url[2]);
    //     }
    //     else
    //     {
    //       if (isset($url[1])) {
    //        $objController->{$url[1]}();
    //       } else {
            
    //       }
          
    //     }
       
    //  }else
    //  {
    //      include_once('./Assets/Controller/index.php');
    //      $index = new index();
    //      $index->HomePage();
         
    //  }
    //  }
    

}
?>