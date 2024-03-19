<?php
session_start();
                
include("admincp/config/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Đăng ký</title>
</head>
<body>
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
      .container {
        margin: 0 auto;
        }
  </style>
  
  
    <div class="container">
    <form action="" method="POST">
        <h3 style="margin: 20px 0 36px 0; text-align:center">ĐĂNG KÝ THÀNH VIÊN</h3>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Họ và tên</label>
            <input type="text" class="form-control" name="hovaten" id="inputAddress" placeholder="Fullname">
            <p></p>
            <label for="inputEmail4">Mật khẩu</label>
            <input type="password" class="form-control" name="matkhau" id="inputPassword4"  placeholder="Password">
            
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Email</label>
        <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
        <p></p>
        <label for="inputEmail4">Số điện thoại</label>
            <input type="password" class="form-control" name="dienthoai" id="inputAddress" placeholder="PhoneNumber">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputAddress">Địa chỉ</label>
        <input type="text" class="form-control" name="diachi" id="inputAddress" placeholder="Address">
    </div>
    
    <button type="submit" class="btn btn-primary" name="dangky" value="Đăng ký">Đăng ký</button>
    <a href="dangnhap.php" class="btn btn-primary" role="button">Đăng nhập</a>
      <!-- <table class="dangky" border="1" width="50%" style="border-collapse: collapse">
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
      </table> -->
      </form>
      </div>
  
</body>
</html>
