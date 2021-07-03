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
                <center> <h1>Thêm Danh Mục Sản Phẩm</h1></center> 
            </header>
            
            <div class="panel-body">

                <div class="position-center">
                <?php  
                        
                        foreach($edit_category as $key =>$value){
                            
                            $name = $value['category_name'];
                            $slug = $value['category_slug'];
                            $desc = $value['category_desc'];
                            $id = $value['category_id'];

                        }
                       
                
                ?>
                    
                    <form role="form" action="<?php echo BASE_URL ?>CategorysController/UpdateCategory/<?php echo $id ?>" method="post"> 
                       
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="InputDanhmuc">Tên danh mục</label>
                                    <input type="text" name="category_name" class="form-control inputform" id="InputDanhmuc" placeholder="Tên Danh Mục" value="<?php echo $name ;?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="InputSlug">Slug</label>
                                    <input type="text" name="category_slug" class="form-control inputform" id="InputSlug" placeholder="Tên Slug Danh Mục" value="<?php echo $slug ;?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="InputSlug">Danh Mục Cha</label>
                                    <select name="category_parent" class="form-control inputform">
                                    <option value="0">Parent</option>
                                            <?php
                                                showCategories($category);
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="editor2">Mô tả danh mục</label> 
                                    <textarea style="resize: none" rows="4" class="form-control inputform" name="category_desc" id="editor2" placeholder="Mô Tả Danh Mục" > <?php echo $desc ;?></textarea>
                                    
                                </div>
                               
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="SelectAnHien">Hiển thị</label>
                                    <select name="category_status" class="form-control input-sm m-bot15 inputform">
                                            <option value="0" class="optionform">Ẩn</option>
                                            <option value="1" class="optionform">Hiển thị</option>
                                            
                                    </select>
                                    
                                </div>
                        
                                <button type="submit" name="Them-Danh-Muc" class="btn btn-info ">Sửa danh mục</button>
                            </div>
                        
                    </form>
                </div> 
                
            </div>
        </section>
    </div>
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
