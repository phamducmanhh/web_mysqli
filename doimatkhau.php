<?php
    session_start();
                    
    include("admincp/config/config.php");
?>
<?php
    
    if(isset($_POST['doimatkhau'])){
        $taikhoan = $_POST['email'];
        $matkhau_cu = md5($_POST['password_cu']);
        $matkhau_moi = md5($_POST['password_moi']);
        $sql = "SELECT *FROM tbl_dangky WHERE email='".$taikhoan."' AND matkhau='".$matkhau_cu."' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $sql_update = mysqli_query($mysqli, "UPDATE tbl_dangky SET matkhau='".$matkhau_moi."'");
            echo '<p style="color:green">Thay đổi mật khẩu thành công</p>';
        }else{
            echo '<p style="color:red">Thông tin tài khoản hoặc mật khẩu không chính xác</p>';
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Đăng nhập</title>
</head>
<body>
<form action="" autocomplete="off" method="POST"><div class="container">
    <h3>ĐỔI MẬT KHẨU</h3>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" name="email" id="inputAddress" placeholder="Email" required>
            <p></p>
            <label for="inputEmail4">Mật khẩu cũ</label>
            <input type="password" class="form-control" name="password_cu" id="inputPassword4"  placeholder="Mật khẩu cũ" required>
            <p></p>
            <label for="inputEmail4">Mật khẩu mới</label>
            <input type="password" class="form-control" name="password_moi" id="inputPassword4"  placeholder="Mật khẩu mới" required>
            
        </div>
        
    </div>
    
    
    
    <button type="submit" class="btn btn-primary" value="Đổi mật khẩu" name="doimatkhau">Đổi mật khẩu</button>
            
        </form>


</body>
</html>
