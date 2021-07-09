<?php 


if(isset($products)){
    foreach($products as $key =>$value)
    {
        echo   '<div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <a href="'.BASE_URL.'/HomeController/DetailsProduct/'.$value['product_id'].'">
                                <div class="productinfo text-center">
                                    <img src="'.BASE_URL.''.$value['product_image'].'" alt="" />
                                    <h2>'.number_format($value['product_price']).' Vnđ </h2>
                                    <p>'.$value['product_name'].'</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                </div> ';



    }
    

}else if(empty($products))
{
    echo ' <h3 class= "text-center text-danger"> Không có sản phẩm nào ! </h3>';
}


?>

