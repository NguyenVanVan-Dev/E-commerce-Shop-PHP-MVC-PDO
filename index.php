<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>E-commerce Shop PHP </title>
  <link rel="shortcut icon" href="./image/favicon_logo.ico" type="image/x-icon">
</head>

<body>
 

    <?php
    spl_autoload_register(function($class){
      include_once('./System/library/'.$class.'.php');
    });
    include './Assets/config/config.php';
    $main = new Main();
    
    
    
    ?>

  
  
</body>

</html>