<h1> This is CategoryID Page</h1>
<?php

   
        foreach($category as $key => $value)
        {
            echo $value['category_name'].'</br>';
            echo $value['category_slug'].'</br>';
            echo $value['category_desc'].'</br>';
        }
  

    


?>