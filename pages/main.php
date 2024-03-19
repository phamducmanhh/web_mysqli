<style>
    .col-lg-12 {
    padding-left: 100px;
    padding-right: 100px;
}

/* Căn giữa nội dung trang web */
.maincontent {
    text-align: center;
}
</style>
<div id="main" style="border:none">
<div class="cotainer">
            <div class="row">

            <?php
            // Kiểm tra xem trang hiện tại có phải là trang chủ hay không
            $is_homepage = ($current_url == '/web_mysqli/index.php' || $current_url == '/web_mysqli/');
            if ($is_homepage) {
                // Nếu là trang chủ, sidebar chiếm 2 phần
                echo '<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">';
                include("sidebar/sidebar.php");
                echo '</div>';
                echo '<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">';
            } else {
                // Nếu không phải trang chủ, nội dung chiếm full width
                echo '<div class="col-lg-12 "> ';
            }
            ?>
            
            <!-- <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12"> -->
            <div class="maincontent">
                <?php
                    if(isset($_GET['quanly'])){
                        $tam = $_GET['quanly'];
                    }else{
                        $tam = '';
                    }
                    if($tam=='danhmucsanpham'){
                        include("main/danhmuc.php");
                    }elseif($tam=='giohang'){
                        include("main/giohang.php");
                    }elseif($tam=='yeuthich'){
                        include("main/yeuthich.php");
                    }elseif($tam=='vanchuyen'){
                        include("main/vanchuyen.php");
                    }elseif($tam=='thongtinthanhtoan'){
                        include("main/thongtinthanhtoan.php");
                    }elseif($tam=='donhangdadat'){
                        include("main/donhangdadat.php");
                    }elseif($tam=='danhmucbaiviet' ){
                        include("main/danhmucbaiviet.php");
                    }elseif($tam=='baiviet'){
                        include("main/baiviet.php");
                    }elseif($tam=='tintuc'){
                        include("main/tintuc.php");
                    }elseif($tam=='lienhe'){
                        include("main/lienhe.php");
                    }elseif($tam=='sanpham'){
                        include("main/sanpham.php");
                    }
                    // elseif($tam=='dangky'){
                    //     include("main/dangky.php");
                    // }
                    elseif($tam=='thanhtoan'){
                        include("main/thanhtoan.php");
                    }
                    // elseif($tam=='dangnhap'){
                    //     include("main/dangnhap.php");
                    // }
                    elseif($tam=='timkiem'){
                        include("main/timkiem.php");
                    }elseif($tam=='camon'){
                        include("main/camon.php");
                    }elseif($tam=='thaydoimatkhau'){
                        include("main/thaydoimatkhau.php");
                    }elseif($tam=='lichsudonhang'){
                        include("main/lichsudonhang.php");
                    }elseif($tam=='xemdonhang'){
                        include("main/xemdonhang.php");
                    }elseif($tam=='slider'){
                        include("main/slider.php");
                    }else{
                        include("main/index.php");
                    }
                ?>
            </div>
            </div>
            </div>
        </div>
        </div>