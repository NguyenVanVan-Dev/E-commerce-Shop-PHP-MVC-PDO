<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bảng Dữ Liệu </h1>
    <p class="mb-4">Thông Báo: 
    <?php  

        $isSuccess = Session::get('success');
        $isFailed = Session::get('danger');
        if($isSuccess){
            echo '  <div class="alert alert-info">
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
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-2">Bảng Dữ Liệu Sản Phẩm :</h6>
            <a href="<?php echo BASE_URL?>ProductsController/ViewAddProduct" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"> Add Product</a>
          
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sản Phẩm</th>
                            
                            <th>Số Lượng</th>
                            <th>Giá</th>
                            <th>Hình Ảnh </th>
                            <th>Ẩn/Hiện</th>
                            <th>Chỉnh Sửa</th>
                        
                        </tr>
                    </thead>
                
                    <tbody>

                        
                        <?php 
                         if(isset($category))
                         {
                                   
                            foreach($category as $key => $value){
                                
                            
                                echo '<tr>';
                                echo '<td>'.$value['product_name'].'</td>';
                               
                                echo '<td>'.$value['product_quantity'].' Sản phẩm'.'</td>';
                                echo '<td>'.number_format($value['product_price']).' Vnđ'.'</td>';
                                echo '<td> <img src="'.BASE_URL.''.$value['product_image'].'" alt="" class="img-thumbnail "  style="width: 100px;"></td>';
                                if($value['product_status'] ==1){
                                    echo "<td>";
                                        echo '<a href="'.BASE_URL.'ProductsController/DisplayProduct/'.$value['product_id'].'" class="btn btn-success" > '.'<i class='.'"fas fa-hand-point-up"'.' style='.'"font-size:20px"'.'></i>'.'</a>';
                                    echo "</td>";
                                }
                                else
                                {
                                    echo "<td>";
                                        echo '<a href="'.BASE_URL.'ProductsController/DisplayProduct/'.$value['product_id'].'" class="btn btn-danger " > '.'<i class='.'"fas fa-hand-point-down"'.' style='.'"font-size:20px"'.'></i>'.'</a>';
                                    echo "</td>";
                                }
                                
                                if($admin_private =='admin' ){
        
                                echo '<td>'; 
                                    echo '<a href="'.BASE_URL.'ProductsController/EditProduct/'.$value['product_id'].'" class="btn btn-success" > '.'<i class='.'"fas fa-edit"'.' style='.'"font-size:20px"'.'></i>'.'</a>';
                                    echo '<a href="'.BASE_URL.'ProductsController/DeleteProduct/'.$value['product_id'].'" class="btn btn-danger ml-2" ui-toggle-class="" onclick="return confirm('.'\'Bạn có chắc là muốn xóa danh mục này ko?\''.')"  > '.'<i class='.'"fas fa-trash"'.' style='.'"font-size:20px"'.'></i>'.'</a>';
                                    echo '<a href="'.BASE_URL.'ProductsController/DetailProduct/'.$value['product_id'].'" class="btn btn-danger ml-2" ui-toggle-class="" > '.'<i class='.'"fas fa-book-open"'.' style='.'"font-size:20px"'.'></i>'.'</a>';  
                                echo '</td>';
                                }
                                else
                                {
                                echo '<td>'; 
                                    echo '<a href="'.BASE_URL.'ProductsController/EditProduct/'.$value['product_id'].'" class="btn btn-success disabled " > '.'<i class='.'"fas fa-edit"'.' style='.'"font-size:20px"'.'></i>'.'</a>';
                                    echo '<a href="'.BASE_URL.'ProductsController/DeleteProduct/'.$value['product_id'].'" class="btn btn-danger ml-2 disabled" ui-toggle-class="" onclick="return confirm('.'\'Bạn có chắc là muốn xóa danh mục này ko?\''.')"  > '.'<i class='.'"fas fa-trash"'.' style='.'"font-size:20px"'.'></i>'.'</a>';
                                    echo '<a href="'.BASE_URL.'ProductsController/DetailProduct/'.$value['product_id'].'" class="btn btn-danger ml-2" ui-toggle-class="" > '.'<i class='.'"fas fa-book-open"'.' style='.'"font-size:20px"'.'></i>'.'</a>';  
                                echo '</td>';

                                }
                            
                                
            
                                    
                                
                                echo '</tr>';
                                
                            }
                         }
                         else
                         {
                             echo '<tr >';
                                echo '<td colspan="7"> Không Có Sản Phẩm </td>';
                             echo '</tr>';
                         }




                        ?>
                       


                    

                    </tbody>
                    
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        </li>
                        <!-- 
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                        <?php 
                         for ($i=1; $i <= $pages; $i++) { 
                             
                            echo '<li class="page-item"><a class="page-link" href="'.BASE_URL.'/ProductsController/getListProduct/'.$i.'">'.$i.'</a></li>';
                         }
                        ?>
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>