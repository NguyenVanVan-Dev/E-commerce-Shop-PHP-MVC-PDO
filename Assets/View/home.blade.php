<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="<?php echo BASE_URL ?>/Public/Frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>/Public/Frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>/Public/Frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>/Public/Frontend/css/price-range.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>/Public/Frontend/css/animate.css" rel="stylesheet">
	<link href="<?php echo BASE_URL ?>/Public/Frontend/css/main.css" rel="stylesheet">
	<link href="<?php echo BASE_URL ?>/Public/Frontend/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	
	<?php 
		$load = new Load;
		$load->view($yield_header,$data);
		$load->view($yield_slide,$data);
	
	?>
	

	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						
					<?php include './Assets/View/Element/sidebar.blade.php'?>
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Product </h2>

                        <?php 
                           
                            // echo '<pre>';
                            // print_r($products);
                            // echo '</pre>';
                            $load->view($yield_product,$data);
                        
                        
                        ?>


						
						
						
					</div><!--features_items-->
					
							<?php 
							if(isset($pages))
							{
								echo '<ul class="pagination">';
									for ($i=1; $i <= $pages; $i++) { 
									
										echo '<li class=""><a class="" href="'.BASE_URL.'/HomeController/getAllProduct/'.$i.'">'.$i.'</a></li>';
									}
									echo '<li><a href="">&raquo;</a></li>';
								echo '</ul>	';
							}
							?>
						
							
					
					
					
					
				</div>
			</div>
		</div>
	</section>
	
	<?php   
		
		$load->view($yield_footer,$data);
					  	
	?>
	

  
    <script src="<?php echo BASE_URL ?>/Public/Frontend/js/jquery.js"></script>
	<script src="<?php echo BASE_URL ?>/Public/Frontend/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL ?>/Public/Frontend/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo BASE_URL ?>/Public/Frontend/js/price-range.js"></script>
    <script src="<?php echo BASE_URL ?>/Public/Frontend/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo BASE_URL ?>/Public/Frontend/js/main.js"></script>
</body>
</html>

