<?php 
 foreach($result as $key =>$value){

    echo '<li class="header__item-bottom hidden-on-mobile ">';
        echo '<a href="'.BASE_URL.'HomeController/ProductByCategoryId/'.$value['category_id'].'" class="header__item-link ">'.$value['category_name'].'</a>';
    echo '</li>';

}
?>  
 
