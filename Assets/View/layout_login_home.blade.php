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
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="<?php echo BASE_URL ?>UsersController/LoginUser" method="post">
							<input type="email" name="email_user" placeholder="Email Address" />
							<input type="password" name="password_user" placeholder="PassWord" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="<?php echo BASE_URL ?>UsersController/RegisterUser" method="post">
							<input type="text" name="name_user" placeholder="Name"/>
							<input type="email" name="email_user" placeholder="Email Address"/>
							<input type="password" name="password_user" placeholder="Password"/>
							<?php									
									date_default_timezone_set('Asia/Ho_Chi_Minh');
									$date  = new DateTime(); 
									$time_created = $date->format('d-m-Y H:i:s');
								?>
							<label for="meeting-time">Time Create User:</label>
							<input type="text" id="meeting-time"
									name="time_create" value="<?php echo $time_created; ?>" >
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
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