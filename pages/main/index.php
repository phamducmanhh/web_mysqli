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
<!-- Modal -->
<div class="modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><span id="title_product"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="gioithieu" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Giới thiệu sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="noidung" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nội dung chi tiết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="hinhanh_gal" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Hình ảnh</a>
                </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="gioithieu"><span id="gioithieu_text"></span></div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="noidung"><span id="noidung_text"></span></div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="hinhanh_gal">...</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <span id="hinhanhsp" ></span>
                
            </div>
            <div class="col-md-7">
            <form method="POST"  >
                <div class="chitiet_sanpham">
                    <h3 style="margin:0"><span id="title_product"></span></h3>
                    <p>Mã sản phẩm: <b><span id="masp"></span></b></p>
                    <p>Giá: <b><span id="giasp"></span></b></p>
                    <p>Số lượng: <b><span id="soluong"></span></b></p>
                    <p>Danh mục: <b><span id="tendanhmuc"></span></b></p>
                    <style>
                        ul#stars {
                            justify-content: center;
                            align-items: center;
                        }
                        .star{
                            list-style: none;
                        }
                        /* Idle State of the stars */
                        .rating-stars ul > li.star > i.fa {
                            font-size:2rem; /* Change the size of the stars */
                            color:#ccc; /* Color on idle state */
                        }

                        /* Hover state of the stars */
                        .rating-stars ul > li.star.hover > i.fa {
                            color:#FFCC36;
                        }

                        /* Selected state of the stars */
                        .rating-stars ul > li.star.selected > i.fa {
                            color:#FF912C;
                        }

                    </style>
                    
                    
                </div>
                
            </form>
            </div>
            <form action="" method="POST" id="form_data" style="margin: 0 auto">
                <p ><input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
            </form>
           
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<h3>TẤT CẢ SẢN PHẨM</h3>
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
                            <p style="text-align:center ; color:#ddd"><?php echo $row['tendanhmuc'] ?></p>
                            
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
    //     $('#stars li').on('click', function(){
    //         var onStar = parseInt($(this).data('value'), 10);
    //         var stars $(this).parent().children('li.star');
    //         var stars $(this).parent().children('li.star');
        

    //     for(i=0; i<stars.length;i++){
    //         $(stars[i]).removeClass('selected');
    //     }

    //     for(i=0; i<onStar; i++){
    //         $(stars[i]).addClass('Selected');
    //     }

    //     var ratingValue = parseInt($('#stars li.selected').last().data('value'),10);
    //     var msg = "";
    //     if(ratingValue >1){
    //         msg = "Thanks! You rated this "+ ratingValue + " stars.";
    //     }else{
    //         msg = "We will improve ourselves. You rated this "+ ratingValue + " stars.";
    //     }
    //     responseMessage(msg);

    //     $.ajax({
    //         url:"pages/main/danhgia.php",
    //         method: "POST",
    //         data:{rating:rating, product_id:product_id,danhgia:danhgia},
    //         success:function(data){
    //             if(data == 'done'){
    //                 alert("Bạn đã đánh giá "+rating+" trên 5 ");
    //             }else{
    //                 alert("Lỗi đánh giá");
    //             }
    //         }
    //     });
    // })