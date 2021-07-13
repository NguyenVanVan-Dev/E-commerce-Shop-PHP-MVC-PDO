    <header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="<?php echo BASE_URL ?>/Public/Frontend/images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="<?php echo BASE_URL ?>CartsController/ViewCheckOut"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="<?php echo BASE_URL ?>CartsController/ViewCart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								
								<?php 
                                  
                                 
                                  $name = Session::get('user_name');
								  $name_id = Session::get('user_id');
                                  if(!empty($name))
								  {
									
									echo '<li class="dropdown-user"><a href="#"><i class="fa fa-user" ></i> '.$name.'</a></li>';
								  }
								  else
								  {
									echo '<li><a href="'. BASE_URL.'UsersController/ViewLoginUser"><i class="fa fa-lock"></i> Login</a></li>';
								  }
                                  
                                
                                ?>
								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo BASE_URL ?>" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?php echo BASE_URL ?>HomeController/getAllProduct/1">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Cart</a></li> 
										
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Category<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                      
                                        <?php
                                            function showCategories($category, $category_id = 0, $char = '')
                                            {
                                                foreach ($category as $key => $item)
                                                {
                                                
                                                    // Nếu là chuyên mục con thì hiển thị
                                                    if ($item['category_parent'] == $category_id)
                                                    {
                                                        
                                                        echo '<li><a href="'.BASE_URL.'HomeController/ProductByCategoryId/'.$item['category_id'].'">'.$char.$item['category_name'].'</a></li>';
                                                        // Xóa chuyên mục đã lặp
                                                        unset($category[$key]);
                                                        
                                                        // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                                                        showCategories($category, $item['category_id'], $char.'--');
                                                    }
                                                
                                                }
                                            }
                                            // call function
                                                if(isset($category))
                                                {
                                                    ShowCategories($category);    
                                                }
                                                else
                                                {
                                                    echo ' <li><a href="shop.html">Không Có Danh Mục </a></li>';
                                                }
                                        ?>

                                        
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Account<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<?php
										if(!empty($name))
										{
											echo   '<li><a href="'.BASE_URL.'UsersController/ProFileUser">Profile</a></li>
													<li><a href="#">Order List</a></li>
													<li><a href="'.BASE_URL.'AdminController/ViewLoginAdmin">Admin</a></li>';
											echo '<li><a href="'.BASE_URL.'UsersController/LogOutUser">Logout</a></li>';	
										}
										else
										{
											echo '	<li><a href="'.BASE_URL.'AdminController/ViewLoginAdmin">Admin</a></li> ';
													
											echo '<li><a href="'.BASE_URL.'UsersController/ViewLoginUser"><i class="fa fa-lock"></i> Login</a></li>';
										}
										
										
										?>
                                       
										
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="<?php echo BASE_URL?>HomeController/SearchProduct" method="post">
								<input type="text" name="search" placeholder="Search"/>
								<button type="submit" class="btn"><img src="<?php echo BASE_URL?>/Public/Frontend/images/home/searchicon.png" alt="" ></button>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->