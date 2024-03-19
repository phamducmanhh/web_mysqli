<?php
    session_start();
    include('../../admincp/config/config.php');
    // Thêm số lượng
    if(isset($_GET['cong'])){
        $id=$_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                        'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                $_SESSION['cart']= $product;
            }else{
                $tangsoluong = $cart_item['soluong'] +1;
                if($cart_item['soluong']<=9){
                    
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$tangsoluong,
                        'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                }else{
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                        'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                }
                $_SESSION['cart'] = $product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
    // Trừ số lượng
    if(isset($_GET['tru'])){
        $id=$_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                        'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                $_SESSION['cart']= $product;
            }else{
                $tangsoluong = $cart_item['soluong'] -1;
                if($cart_item['soluong']>1){
                    
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$tangsoluong,
                        'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                }else{
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                        'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                }
                $_SESSION['cart'] = $product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
    // Xóa số lượng
    if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            // Giả sử id của biến xóa =9
            // Thì nó sẽ bắt đầu so sánh
            // Giả sử trong giỏ hàng tồn tại 3 id lần lượt là 8, 9 , 10
            // Nó sẽ tiến hành so sánh: 8 khác 9(thỏa), 9 khác 9 (không thỏa sẽ tiến hành xóa), 10 khác 9(thỏa)
            // Sau khi phát hiện điều kiện không thỏa thì sẽ tiến hành xóa 
            // Và khởi tạo lại biến 8 và 10 (thỏa điều kiện) vào giỏ hàng 
            if($cart_item['id'] != $id){
                $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                        'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
            }
            $_SESSION['cart'] = $product ;
            header('Location:../../index.php?quanly=giohang');
        }
    }
    // Xóa tất cả
    if(isset($_GET['xoatatca']) && $_GET['xoatatca']==1){
        unset($_SESSION['cart']);
        header('Location:../../index.php?quanly=giohang');
    }
    // Thêm sản phẩm vào giỏ hàng
    
    if(isset($_POST['themgiohang'])){
        $id = $_GET['idsanpham'];
        $soluong =1;
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '".$id."' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($query);
        if($row){
            $new_product = array(array('tensanpham'=>$row['tensanpham'], 'id'=>$id, 'soluong'=>$soluong,
             'giasp'=>$row['giasp'], 'hinhanh'=>$row['hinhanh'], 'masp'=>$row['masp']));
             // Kiểm tra giỏ hàng tồn tại
             if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    // Nếu dữ liệu trùng
                    if($cart_item['id']==$id){
                        $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$soluong+1,
                        'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                        $found = true;
                    }else{
                        // nếu dữ liệu không trùng
                        $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$soluong,
                        'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                    }
                }
                if($found==false){
                    //Liên kết dữ liệu new_product với product
                    $_SESSION['cart']=array_merge($product, $new_product);
                }else{
                    $_SESSION['cart']=$product;
                }
             }else{
                $_SESSION['cart'] = $new_product;
             }
        }
        header('Location:../../index.php?quanly=giohang');
    }
?>