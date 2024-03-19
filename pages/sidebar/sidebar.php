
            <div class="sidebar" style="margin: 47px 10px 0 0; border: none">
                <ul class="list-group">
                    <li class="list-group-item active" style="font-weight: 600;" aria-current="true">Danh mục sản phẩm</li>
                    <?php
                        $sql_danhmuc = "SELECT *FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                        while($row = mysqli_fetch_array($query_danhmuc)){
                    ?>
                    <li  class="list-group-item" style = "text-transform:uppercase;  "><a style="color: black; font-weight: 500;" href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>
                    <?php
                        }
                    ?>
                </ul>
                
                <ul class="list-group">
                    <li class="list-group-item active" style="font-weight: 600;" aria-current="true">Danh mục bài viết</li>
                    <?php
                        $sql_danhmuc_bv = "SELECT *FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
                        $query_danhmuc_bv = mysqli_query($mysqli, $sql_danhmuc_bv);
                        while($row = mysqli_fetch_array($query_danhmuc_bv)){
                    ?>
                    <li class="list-group-item" style = "text-transform:uppercase "><a style="color: black; font-weight: 500;" href="index.php?quanly=danhmucbaiviet&id=<?php echo $row['id_baiviet'] ?>"><?php echo $row['tendanhmuc_baiviet'] ?></a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div> 
           

          