<?php

    function showCategories($category, $category_id = 0, $char = '')
    {
        foreach ($category as $key => $item)
        {
        
            // Nếu là chuyên mục con thì hiển thị
            if ($item['category_parent'] == $category_id)
            {
                
                echo '<li><a href="'.$item['category_id'].'">'.$char.$item['category_name'].'</a></li>';
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
