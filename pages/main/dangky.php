<?php
    
    if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $matkhau = md5($_POST['matkhau']);
        $dienthoai = $_POST['dienthoai'];
        $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky(tenkhachhang, email, diachi, matkhau, dienthoai)
        VALUE ('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
        if($sql_dangky){
            echo '<p style="color: green">Đăng ký tài khoản thành công</p>';
            $_SESSION['dangky']=$tenkhachhang;
            $_SESSION['email']=$email;
            $_SESSION['id_khachhang']=mysqli_insert_id($mysqli);
            header("Location: index.php?quanly=giohang");
        }
    }
?>

<style type="text/css">
    table.dangky tr td{
        padding: 5px;
    }
</style>
<p>Đăng ký thành viên</p>
<form action="" method="POST">
    <table class="dangky" border="1" width="50%" style="border-collapse: collapse">
        <tr>
            <td>Họ và tên</td>
            <td><input type="text" size="50" name="hovaten"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" size="50" name="email"></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" size="50" name="dienthoai"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" size="50" name="matkhau"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" size="50" name="diachi"></td>
        </tr>
        <tr>
            <td><input type="submit" name="dangky" value="Đăng ký"></td>
            <td><a href="index.php?quanly=dangnhap">Đăng nhập</a></td>
        </tr>
    </table>
</form>