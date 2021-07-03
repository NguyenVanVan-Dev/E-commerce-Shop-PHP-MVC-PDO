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
            <h6 class="m-0 font-weight-bold text-primary mb-2">Bảng Dữ Liệu Danh Mục :</h6>
            <a href="<?php echo BASE_URL?>CategorysController/ViewAddCategory" class="d-none d-sm-inline-block btn  btn-primary shadow-sm"> Add Category</a>
          
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên Danh Mục</th>
                            <th>Slug</th>
                            <th>Mô Tả</th>
                            <th>Ẩn/Hiện</th>
                            <th>Chỉnh Sửa</th>
                        
                        </tr>
                    </thead>
                
                    <tbody>

                        
                        <?php 
                              
                        foreach($category as $key => $value){
                            
                        
                            echo '<tr>';
                            echo '<td>'.$value['category_name'].'</td>';
                            echo '<td>'.$value['category_slug'].'</td>';
                            echo '<td>'.$value['category_desc'].'</td>';

                            if($value['category_status'] ==1){
                                echo "<td>";
                                    echo '<a href="'.BASE_URL.'CategorysController/DisplayCategory/'.$value['category_id'].'" class="btn btn-success" > '.'<i class='.'"fas fa-hand-point-up"'.' style='.'"font-size:20px"'.'></i>'.'</a>';
                                echo "</td>";
                            }
                            else
                            {
                                echo "<td>";
                                    echo '<a href="'.BASE_URL.'CategorysController/DisplayCategory/'.$value['category_id'].'" class="btn btn-danger " > '.'<i class='.'"fas fa-hand-point-down"'.' style='.'"font-size:20px"'.'></i>'.'</a>';
                                echo "</td>";
                            }
                            
                            if($admin_private =='admin' ){
    
                            echo '<td>'; 
                                echo '<a href="'.BASE_URL.'CategorysController/EditCategory/'.$value['category_id'].'" class="btn btn-success" > '.'<i class='.'"fas fa-edit"'.' style='.'"font-size:20px"'.'></i>'.'</a>';
                                echo '<a href="'.BASE_URL.'CategorysController/DeleteCategory/'.$value['category_id'].'" class="btn btn-danger ml-2" ui-toggle-class="" onclick="return confirm('.'\'Bạn có chắc là muốn xóa danh mục này ko?\''.')"  > '.'<i class='.'"fas fa-trash"'.' style='.'"font-size:20px"'.'></i>'.'</a>';
                            echo '</td>';
                            }
                            else
                            {
                            echo '<td>'; 
                                echo '<a href="'.BASE_URL.'CategorysController/EditCategory/'.$value['category_id'].'" class="btn btn-success disabled " > '.'<i class='.'"fas fa-edit"'.' style='.'"font-size:20px"'.'></i>'.'</a>';
                                echo '<a href="'.BASE_URL.'CategorysController/DeleteCategory/'.$value['category_id'].'" class="btn btn-danger ml-2 disabled" ui-toggle-class="" onclick="return confirm('.'\'Bạn có chắc là muốn xóa danh mục này ko?\''.')"  > '.'<i class='.'"fas fa-trash"'.' style='.'"font-size:20px"'.'></i>'.'</a>';
                            echo '</td>';
                            }
                           
                               
        
                                
                            
                            echo '</tr>';
                            
                        }
                            ?>
                       


                    

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>