    <?php
	
		$session = new Session;
		$name = $session::get('user_name');
		$name_id = $session::get('user_id');
	
	
	?>
	
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo BASE_URL ?>">Home</a></li>
				  <li class="active">Profile User</li>
				</ol>
			</div><!--/breadcrums-->

		

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-6">
						<div class="shopper-info">
							<p>Update Information</p>
							<form id="formUser">
								<input type="email" name="email" placeholder="Address Email">
								<input type="text" name="name" placeholder="User Name">
								<input type="password" name="pass" placeholder="Password">
								
								<input type="password" name="repeact_pass" placeholder="Confirm password">
								<input type="file" name="image" id="" placeholder="Avatar">
								<input type="text" name="address" placeholder="Address">		
								<?php									
									date_default_timezone_set('Asia/Ho_Chi_Minh');
									$date  = new DateTime(); 
									$time_created = $date->format('d-m-Y H:i:s');
								?>
								<label for="meeting-time">Time Update User:</label>
								<input type="text" id="meeting-time"
										name="time_updated" value="<?php echo $time_created; ?>" >
								
							</form>
							<button type="submit" class="btn btn-primary"> Update Information </button>
							<button onclick="resetForm()" class="btn btn-primary"> Reset Form </button>
							<script>
								function resetForm(){
									document.getElementById("formUser").reset();
								}

							</script>
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="order-message">
							<p><?php 
							   echo 'Hello@'.$name.'...';
							?></p>
							<img src="<?php echo BASE_URL ?>Public/Frontend/images/home/girl1.jpg" alt="" style="width: 400px; height:400px">
							
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/one.png" alt="" width="65px"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>

					
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>$59</td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>$2</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>$61</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->
