    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php BASE_URL?>">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-7 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<?php 
							   
							     Session::get('user_address')? $address = Session::get('user_address') : $address = null;
							     Session::get('user_phone')? $phone = Session::get('user_phone') : $phone = null;
							     Session::get('user_email')? $email = Session::get('user_email') : $email = null;

								if (Session::get('user_name')) {
								?>
									<form action="<?php echo BASE_URL?>/CartsController/CheckOut/1" method="POST">
										<input type="text" name="email" placeholder="Email*" value="<?php echo  $email ?>">
										<input type="text" name="name" placeholder=" Name *" value="<?php echo Session::get('user_name')?>">
										<input type="text" name="address" placeholder="Address 1 *" value="<?php echo $address?>">
										<input type="text" name="phone" placeholder="Phone *" value="<?php echo $phone ?>">
										<button type="submit" class="btn btn-primary"> Order Product </button>
									</form>
								<?php
								}
								else
								{
								?>
									<form action="<?php echo BASE_URL?>/CartsController/CheckOut" method="POST">
										<input type="text" name="email" placeholder="Email*">
										<input type="text" name="name" placeholder=" Name *">
										<input type="text" name="address" placeholder="Address 1 *">
										<input type="text" name="phone" placeholder="Phone *">
										<button type="submit" class="btn btn-primary"> Order Product </button>
									</form>
								<?php
								}
								?>
							</div>
							
						</div>
					</div>
					<div class="col-sm-5">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
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
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                        <?php 
                            if(!empty($_SESSION['shopping_cart']))
                            {
                                $cart = $_SESSION['shopping_cart'];
                                $total = 0;
                                foreach($cart as $key => $value)
                                {
                                   
                                    if($value['product_id'] != null)
                                    {
                                        $subtotal = $value['product_quantity'] * $value['product_price'];
                                        $total += $subtotal;
                                    // product number la so luon san pham con lai trong kho ;
                                    ?>
                                        <form action="<?php echo BASE_URL.'CartsController/UpdateCart/'.$value['product_id']?>" method="post">
                                            <tr>
                                                <td class="cart_product">
                                                    <h4><a href=""><?php echo  $value['product_name']?></a></h4>
                                                    <p>Web ID: 1089772</p>
                                                 
                                                </td>
                                                <td class="cart_description">
                                                    <a href=""><img src="<?php echo BASE_URL.$value['product_image']?>" alt="" width="100px"></a>
                                                </td>
                                                <td class="cart_price">
                                                    <p><?php echo number_format($value['product_price'],0,',','.') ?>Đ </p>
                                                </td>
                                                <td class="cart_quantity">
                                                    <div class="cart_quantity_button">                                                   
                                                        <input class="cart_quantity_input" type="number" min="1" max="<?php echo  $value['product_number']?>"
                                                        name="quantity" value="<?php echo  $value['product_quantity']?>" autocomplete="off" size="2">                                                                                                              
                                                    </div>
                                                </td>
                                                <td class="cart_total">
                                                    <p class="cart_total_price"><?php echo number_format($subtotal,0,',','.')?>Đ</p>
                                                </td>
                                                <td class="">
                                                    <a class="btn btn-danger" href="<?php echo BASE_URL.'CartsController/DeleteCart/'.$value['product_id']?>"><i class="fa fa-times"></i></a>
                                                    <input type="submit" value="Update" class="btn btn-success">
                                                </td>
                                            </tr>
                                        </form>  
                                    <?php
                                    }
                                    
                                }
                            }
                            else
                            {
                                echo '<tr class="text-center"> 
                                        <td colspan="5">
                                            <h3 class="text-primary">Không Có Sản Phẩm Nào! <h3>
                                        </td>
                                    </tr>';
                            }
                           
                        
                        ?>

						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td><?php 
											if (!empty($total) ){
												echo number_format($total,0,',','.');
											}
											else
											{
												$total =0 ;
												echo number_format($total,0,',','.');
											}
											?>
										</td>
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
										<td><span><?php 
											if (!empty($total) ){
												echo number_format($total,0,',','.');
											}
											else
											{
												$total =0 ;
												echo number_format($total,0,',','.');
											}
											?>
										</span></td>
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
