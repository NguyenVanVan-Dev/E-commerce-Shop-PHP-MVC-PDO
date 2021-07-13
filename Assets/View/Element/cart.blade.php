
 	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo BASE_URL ?>">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php  
					$isSuccess = Session::get('meg');
					if($isSuccess){
						echo '  <div class="alert alert-success">
								<center>      <strong>Hoàn Thành!</strong> '. $isSuccess.'</center>
								</div>';
						Session::set('meg',null);
					}
				?>					
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu text-center">
							<td class="image">Name</td>
							<td class="description">Image</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td class="Event">Delete/Update Quantity</td>
							<td></td>
						</tr>
					</thead>
					<tbody class="text-center">
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

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>
								<?php 
									if (!empty($total) ){
										echo number_format($total,0,',','.');
									}
									else
									{
										$total =0 ;
										echo number_format($total,0,',','.');
									}
								?>
							</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total<span>
								<?php 
									if (!empty($total) ){
										echo number_format($total,0,',','.');
									}
									else
									{
										$total =0 ;
										echo number_format($total,0,',','.');
									}
							  	?>
							  </span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="<?php echo BASE_URL ?>CartsController/ViewCheckOut">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->