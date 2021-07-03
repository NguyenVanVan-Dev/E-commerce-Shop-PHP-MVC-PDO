<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Chi Tiết Sản Phẩm</h1>
<p class="mb-4"> Thông Báo:

        <?php 
        foreach($product as $key => $value)
        {
            $name = $value['product_name'];
            $slug = $value['product_slug'];
            $desc = $value['product_desc'];
            $price = $value['product_price'];
            $update = $value['update_at'];
            $create = $value['created_at'];
            $status = $value['product_status'];
            $quantity = $value['product_quantity'];
            $image = $value['product_image'];
           
            $id = $value['product_id'];
        }
        
        ?>
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thông Tin Sản Phẩm  </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr style="text-align: center;">
                        <th>Tên sản phẩm </th>
                        <th>Slug</th>
                        <th>Thuộc danh mục</th>
                       
                    </tr>
                </thead>               
                <tbody>
                   
                    <tr style="text-align: center;">
                        <td><?php echo $name ?></td>
                        <td><?php echo $slug ?></td>
                        <td><?php  echo $category[0]['category_name'] ?></td>
                        
                    </tr>
                   
                 
                </tbody>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ngày Tạo và Ngày Cập Nhật </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr style="text-align: center;">
                        <th>Ngày Tạo</th>
                        <th>Ngày Cập Nhật</th>
                       
                    </tr>
                </thead>               
                <tbody>
                    <tr style="text-align: center;"> 
                        <td><?php echo $create ?></td>
                        <td><?php echo $update ?></td>
                       
                    </tr>
                 
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Số Lượng và Giá </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr style="text-align: center;">
                        <th>Số Lượng</th>
                        <th> Giá </th>
                        <th>Ẩn/Hiện</th>
                    </tr>
                </thead>               
                <tbody>
                    <tr style="text-align: center;"> 
                        <td><?php echo $quantity ?></td>
                        <td><?php echo $price ?></td>
                        <td >
                            <?php
                            if($status== 0 )
                                echo "Sản Phẩm Đã Ẩn";
                            else{
                                echo "Sản Phẩm Đang Được Trưng Bày";
                            }
                            ?>

                        </td>
                    </tr>
                 
                </tbody>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hình ảnh và Mô tả </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr style="text-align: center;">
                        <th>Hình Ảnh</th>
                        <th>Mô tả</th>
                        

                    </tr>
                </thead>               
                <tbody>
                    <tr>
                        <td class="w-25"><img src="<?php echo BASE_URL.'/'.$image ?>" alt="" class="img-thumbnail" ></td>
                        <td id="navbar-example2" > 
                            <?php echo $desc ?>
                        
                        </td>
                        
                    </tr>
                  
                    

                </tbody>
            </table>
        </div>
    </div>
</div>


<hr>

</div>
<!-- /.container-fluid -->