<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
AND tbl_sanpham.id_sanpham = '$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
    <p>Chi tiết sản phẩm</p>
    <div class="wrapper_chitiet">
        <div class="hinhanh_sanpham">
            <img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
        </div>

        <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
            <div class="chitiet_sanpham">
                <h3 style="margin:0">Tên sản phẩm: <?php echo $row_chitiet['tensanpham'] ?></h3>
                <p>Mã sản phẩm: <?php echo $row_chitiet['masp'] ?></p>
                <p>Giá: <?php echo number_format($row_chitiet['giasp'], 0, ',', '.') . ' VNĐ' ?></p>
                <p>Số lượng: <?php echo $row_chitiet['soluong'] ?></p>
                <p>Danh mục: <?php echo $row_chitiet['tendanhmuc'] ?></p>
                <style>
                    ul#stars {
                        justify-content: center;
                        align-items: center;
                    }

                    .star {
                        list-style: none;
                    }

                    /* Idle State of the stars */
                    .rating-stars ul>li.star>i.fa {
                        font-size: 2rem;
                        /* Change the size of the stars */
                        color: #ccc;
                        /* Color on idle state */
                    }

                    /* Hover state of the stars */
                    .rating-stars ul>li.star.hover>i.fa {
                        color: #ffcc36;
                    }

                    /* Selected state of the stars */
                    .rating-stars ul>li.star.selected>i.fa {
                        color: #ff912c;
                    }
                </style>

                <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
            </div>
        </form>

    </div>
    <div class="clear"></div>
    <div class="tabs" style="margin-top: 15px;">
        <ul id="tabs-nav">
            <li><a href="#tab1">Giới thiệu sản phẩm</a></li>
            <li><a href="#tab2">Nội dung chi tiết</a></li>
            <li><a href="#tab3">Hình ảnh</a></li>
        </ul>
        <div id="tabs-content">
            <div id="tab1" class="tab-content">
                <?php echo $row_chitiet['tomtat'] ?>
                <div class="product_comment">
                    <h4>Bình luận</h4>
                    <section class='rating-widget'>
                        <div class='rating-stars text-center'>
                            <ul id='stars' style="display: flex; ">
                                <li class='star' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
            <div id="tab2" class="tab-content">
                <?php echo $row_chitiet['noidung'] ?>
            </div>
            <div id="tab3" class="tab-content">
                <img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
            </div>
        </div>
    </div>

    <div class="product_gallery">
        <h4>Thư viện sản phẩm</h4>
        <div id="product-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                // Lấy danh sách hình ảnh sản phẩm từ database (giả sử là cột 'hinhanh2', 'hinhanh3',...)
                $hinhanh_array = array($row_chitiet['hinhanh2'], $row_chitiet['hinhanh3']);
                foreach ($hinhanh_array as $index => $hinhanh) {
                    if (!empty($hinhanh)) {
                        $active_class = ($index == 0) ? 'active' : '';
                        echo '<div class="carousel-item ' . $active_class . '">';
                        echo '<img class="d-block w-100" src="admincp/modules/quanlysp/uploads/' . $hinhanh . '" alt="Slide ' . ($index + 1) . '">';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <a class="carousel-control-prev" href="#product-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#product-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
<?php
}
?>
