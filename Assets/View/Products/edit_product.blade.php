<?php  

    $isSuccess = Session::get('success');
    $isFailed = Session::get('danger');
    if($isSuccess){
        echo '  <div class="alert alert-success">
                <center>      <strong>Hoàn Thành!</strong> '. $isSuccess.'</center>
                </div>';
        Session::set('success',null);
    }
    if($isFailed){
        echo '  <div class="alert alert-danger">
                <center>      <strong>Thất Bại!</strong> '.$isFailed.'</center>
                </div>';
        Session::set('danger',null);
    }
   
?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                        <center> <h1>Thêm  Sản Phẩm</h1></center> 
                        </header>
                        <?php
                       
                            $message = Session::get('message');
                            if($message){
                                echo '  <div class="alert alert-success">
                                      <center>      <strong>Hoàn Thành!</strong> '. $message.'</center>
                                        </div>';
                                Session::set('message',null);
                            }
                            foreach($edit_product as $key => $value){
                                $name = $value['product_name'];
                                $slug = $value['product_slug'];
                                $desc = $value['product_desc'];
                                $price = $value['product_price'];
                                $quantity = $value['product_quantity'];
                               
                                $id = $value['product_id'];
                            }
                           
                        ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="<?php echo BASE_URL ?>ProductsController/UpdateProduct/<?php echo $value['product_id'] ?>" method="post" enctype="multipart/form-data">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" data-validation="length" data-validation-length="min10" 
                                    data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="product_name" class="form-control" 
                                    id="exampleInputEmail1" placeholder="Tên Sản Phẩm" value="<?php echo $name ;?>">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail5">Slug</label>
                                        <input type="text" name="product_slug" class="form-control" id="exampleInputEmail5" placeholder="Slug" value="<?php echo $slug ;?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail4">Giá sản phẩm</label>
                                        <input type="text" data-validation="number" 
                                        data-validation-error-msg="Làm ơn điền số tiền" name="product_price" 
                                        class="form-control" id="exampleInputEmail4" placeholder="Giá Sản Phẩm(number)" value="<?php echo $price;?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="exampleInputEmail6">Số Lương sản phẩm</label>
                                        <input type="text" data-validation="number" 
                                        data-validation-error-msg="Làm ơn điền số sản phẩm" 
                                        name="product_quantity" class="form-control" id="exampleInputEmail6" placeholder="Số Lượng Sản Phẩm(number)"
                                         value="<?php echo $quantity ;?> ">
                                    </div>
                                  
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail3">Hình ảnh sản phẩm</label>
                                        <input type="file" name="product_image" class="form-control" id="exampleInputEmail3">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="exampleInputPassword1">Hiển thị</label>
                                        <select name="product_status" class="form-control input-sm m-bot15">
                                                <option value="0">Ẩn</option>
                                                <option value="1">Hiển thị</option>
                                                
                                        </select>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label for="exampleInputPassword2">Mô tả sản phẩm</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" name="product_desc" id="editor3" placeholder="Mô tả sản phẩm"><?php echo $desc ;?>
                                    </textarea>
                                    <script>
                                            CKEDITOR.replace( 'editor3' );
                                    </script>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                        <select name="category_id" class="form-control input-sm m-bot15">
                                                <?php
                                                    showCategories($category);
                                                ?>
                                                
                                        </select>
                                    </div>
                                    
                                    
                                    
                                </div>
                               
                                <button type="submit"  class="btn btn-info">Sửa sản phẩm</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>

            <?php

function showCategories($category, $category_id = 0, $char = '')
{
    foreach ($category as $key => $item)
    {
       
        // Nếu là chuyên mục con thì hiển thị
        if ($item['category_parent'] == $category_id)
        {
            
             
              echo '<option value="'.$item['category_id'].'">'.$char.$item['category_name'].'</option>';
            // Xóa chuyên mục đã lặp
            unset($category[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($category, $item['category_id'], $char.'--');
        }
    
    }
}

?>