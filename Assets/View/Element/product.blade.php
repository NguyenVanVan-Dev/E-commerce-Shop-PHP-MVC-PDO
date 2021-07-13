<?php 


    if(isset($products)){
        foreach($products as $key =>$value)
        {

?>      
        <form action="<?php echo BASE_URL ?>/CartsController/AddToCart" method="post">
            <input type="hidden" value="<?php echo $value['product_name']?>" name="product_name">
            <input type="hidden" value="<?php echo $value['product_slug']?>" name="product_slug">
            <input type="hidden" value="1" name="product_quantity">
            <input type="hidden" value="<?php echo $value['product_id']?>" name="product_id">
            <input type="hidden" value="<?php echo $value['product_price']?>" name="product_price">
            <input type="hidden" value="<?php echo $value['product_image']?>" name="product_image"> 
            <input type="hidden" value="<?php echo $value['product_quantity']?>" name="product_number"> 
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                       
                        <a href="<?php echo BASE_URL.'/HomeController/DetailsProduct/'.$value['product_id'] ?>">
                            <div class="productinfo text-center">
                                <img src="<?php echo BASE_URL.$value['product_image'] ?>" alt="" />
                                <h2><?php echo  number_format($value['product_price']) ?> Vnđ </h2>
                                <p><?php echo $value['product_name'] ?></p>
                               
                                <button type="submit" class="btn btn-default add-to-cart"> <i class="fa fa-shopping-cart"></i> Add to cart</button>
                            </div>
                        </a>

                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div> 
        </form>
<?php
        }
    }else if(empty($products))
    {
        echo ' <h3 class= "text-center text-danger"> Không có sản phẩm nào ! </h3>';
    }


?>

