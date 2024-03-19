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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Thông tin người dùng</title>
    
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    User Information
                </div>
                
                <div class="card-body">
                    <?php
                        if(isset($_POST['capnhatthongtin'])){
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $diachi = $_POST['diachi'];
                            $matkhau = $_POST['matkhau'];
                            $dienthoai = $_POST['dienthoai'];
                            $id_dangky = $_SESSION['id_khachhang'];
                            $sql_update_thongtin = mysqli_query($mysqli, "UPDATE tbl_dangky SET tenkhachhang='$name', diachi='$diachi', matkhau='$matkhau', dienthoai='$dienthoai', id_dangky='$id_dangky'
                              WHERE id_dangky = '$id_dangky'");
                            if($sql_update_thongtin){
                              echo '<script>alert("Cập nhật thông tin thành công")</script>';
                            }}
                    ?>

                    <?php   
                    
                            $id_dangky = $_SESSION['id_khachhang'];
                            
                            $sql_user = mysqli_query($mysqli, "SELECT * FROM tbl_dangky WHERE id_dangky = '$id_dangky' LIMIT 1");
                            $count = mysqli_num_rows($sql_user);
                    
                            if($count>0){
                              $row_get_vanchuyen = mysqli_fetch_array($sql_user);
                              $name = $row_get_vanchuyen['tenkhachhang'];
                              $email = $row_get_vanchuyen['email'];
                              $diachi = $row_get_vanchuyen['diachi'];
                              $matkhau = $row_get_vanchuyen['matkhau'];
                              $dienthoai = $row_get_vanchuyen['dienthoai'];
                            }else{
                              $name = '' ;
                              $email = '' ;
                              $diachi = '' ;
                              $matkhau = '' ;
                              $dienthoai = '' ;
                            }
                        
                          ?>
                          
                            <form action="" autocomplete="off" method="POST">
                              <div class="form-group">
                                <label for="name">Họ và tên</label>
                                <input type="text" class="form-control" name="name" value=" <?php echo $name ?>" placeholder="Họ và tên" >
                              </div>
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" value=" <?php echo $email ?>" placeholder="Email" >
                              </div>
                              <div class="form-group">
                                <label for="diachi">Địa chỉ</label>
                                <input type="text" class="form-control" name="diachi" value=" <?php echo $diachi ?>" placeholder="Địa chỉ" >
                              </div>
                              <div class="form-group">
                                <label for="matkhau">Mật khẩu</label>
                                <input type="text" class="form-control" name="matkhau" value=" <?php echo  $matkhau ?>" placeholder="Mật khẩu" >
                              </div>
                              <div class="form-group">
                                <label for="dienthoai">Số điện thoại</label>
                                <input type="text" class="form-control" name="dienthoai" value=" <?php echo $dienthoai?>" placeholder="Số điện thoại" >
                              </div>
                              <button type="submit" class="btn btn-success" name="capnhatthongtin" style="margin: 0 0 20px 0;">Cập nhật</button>
                              
                              <a href="doimatkhau.php" class="btn btn-success" name="doimatkhau">Đổi mật khẩu</a>
                            </form>
                               

                    
                </div>
                
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

   
