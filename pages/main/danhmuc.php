<?php
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page = 1;
    }
    if($page=='' || $page==1){
        $begin = 0;
    }else{
        $begin = ($page*8)-8;
    }
    $sql_pro = "SELECT *FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
    ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin, 8";
    $query_pro = mysqli_query($mysqli, $sql_pro);
?>
<?php
    $sql_pro = "SELECT *FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc = '$_GET[id]' ORDER BY id_sanpham DESC";
    $query_pro = mysqli_query($mysqli, $sql_pro);

    $sql_cate = "SELECT *FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1";
    $query_cate = mysqli_query($mysqli, $sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
?>
<h3>Danh mục sản phẩm: <?php echo $row_title['tendanhmuc'] ?></h3>
    <div class="row" style="align-item: center;">
                    <?php
                        while($row =mysqli_fetch_array($query_pro)){
                    ?>
                    <div class="col-md-3"  style=" margin-bottom: 34px;  padding:0; ">
                    <div class="product-item" style="border: 5px solid #ddd; padding: 0; width:270px; border-radius: 11px">     
                        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                            <div class="image_pro" style=" height:250px;">
                                <img class="img img-responsive" width="90%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
                            </div>
                            <p class="title_product" style="padding: 0 4px;">Tên sản phẩm: <?php echo $row['tensanpham'] ?></p>
                            <p class="price_Product">Giá: <?php echo number_format($row['giasp'],0,',','.').' VNĐ' ?></p>
                            
                            
                        </a>
                        <p class="button-wrapper" style="display: flex; justify-content: center; align-items: center;">
                            <button style="margin-right: 10px;" onclick="xemnhanh(<?php echo $row['id_sanpham'] ?>)" data-toggle="modal" data-target="#xemnhanh" class="btn btn-success">Xem nhanh</button>
                            <button class="btn btn-danger" onclick="yeuthich(<?php echo $row['id_sanpham'] ?>)">Yêu thích</button>
                        </p>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <div style="clear:both;"></div>
                <style tyle="text/css">
                    ul.list_trang {
                        padding: 0;
                        margin: 0;
                        list-style: none;
                        /* float: left; */
                    }
                    ul.list_trang li {
                        padding: 5px 13px;
                        float: left;
                        margin: 5px;
                        background: burlywood;
                        display: block;
                    }
                    ul.list_trang li a {
                        text-align: center;
                        text-decoration: none;
                        color: black;
                    }
                </style>
                <?php
                    $sql_trang = mysqli_query($mysqli, "SELECT *FROM tbl_sanpham");
                    $row_count = mysqli_num_rows($sql_trang);
                    $trang = ceil($row_count/5);
                ?>
                <p>Trang hiện tại: <?php echo $page ?>/<?php echo $trang ?></p>
                
                <ul class="list_trang">
                    <?php
                        for($i=1; $i<=$trang; $i++){
                            
                        
                    ?>
                    <li <?php if($i==$page){echo 'style="background:brown;"';}
                                else{
                                    echo '';
                                } 
                    
                        ?>>
                        <a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                    <?php
                        }
                    ?>
                    
                </ul>

                <?php