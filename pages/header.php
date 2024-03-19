<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        header {
            background-color: #2a2828;
            height: 140px;
            font-family: 'Pacifico', cursive;
        }
        
        .row.row-bottom{
            height: 100%;
        }
        .container1 {
                background-color: black;
                padding: 1px 0 0 0;
                height: 45px;
                /* display: flex; */
                align-items: center;
                /* margin: 0; */
        }
        .form-inline{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .col{
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: center;
        }
        .col-6{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .col.cart{
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: center;
        }
        .container{
            height: 95px;
        }
</style>
</head>
<body>
    <header class="text-light w-100">
        <div class="container1">
            <div class="row" style="margin: 10px; ">
                <!-- Phần trái -->
                <div class="col-md-4" >
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa-brands fa-facebook"></i></li>
                        <li class="list-inline-item"><i class="fa-brands fa-tiktok"></i></li>
                        <li class="list-inline-item"><i class="fa-brands fa-instagram"></i></li>
                    </ul>
                    
                </div>
                <!-- Phần giữa (khung tìm kiếm) -->
                <div class="col-md-4">
                    
                    
                </div>
                <!-- Phần phải (biểu tượng xã hội) -->
                <div class="col-md-3 text-right">
                        <div class="dangnhap">
                                <a name="dangnhap" href="dangnhap.php">Đăng nhập</a>
                                <span style="margin-right: 10px;">|</span>
                                <a name="dangky" href="dangky.php">Đăng ký</a>
                        </div>
                           
                </div>
                <?php  
                    if(isset($_SESSION['dangky'])){
                ?>
                <div class="col-md-1">
                    
                    <div class="user" >
                        
                            <a href="thongtinnguoidung.php"><i class="fa-solid fa-user"></i></a>
                        
                    </div>    
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="container">
            
                <!-- Phần trái -->
                <div class="row row-bottom">
                    <div class="col">
                        <a href="#" class="navbar-brand"  >
                                    <h1>SoleMate</h1>
                                <!-- <img src="logo.png" alt="Logo" class="img-fluid"> -->
                        </a>
                    </div>
                    <div class="col-6">
                        <!-- <form class="form-inline my-2 my-lg-0" action="index.php?quanly=timkiem" method="POST">
      <input class="form-control mr-sm-2" name="tukhoa" type="search" placeholder="Từ khóa...." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" class="timkiem" name="timkiem">Tìm kiếm</button>
    </form> -->
                        <form class="form-inline" action="index.php?quanly=timkiem" method="POST">
                            <input style="width: 78%;" class="form-control mr-sm-2" class="button-search" name="tukhoa" type="search" placeholder="Từ khóa, giá sản phẩm" aria-label="Search">
                                                
                            <button style="width: 20%;" class="btn btn-outline-success my-2 my-sm-0" type="submit" class="timkiem" name="timkiem">Tìm kiếm</button>
                        </form>
                                
                            
                                
                    </div>
                    
                    <div class="col cart">
                        <a class="header-cart" style="font-size: 1.4rem;" href="index.php?quanly=giohang"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
                <!-- Phần giữa (khung tìm kiếm) -->
                
    </header>
    
</body>
</html>
