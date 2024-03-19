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
<form action="" autocomplete="off" method="POST">
            <table border="1" class="table-login" style="text-align: center; border-collapse: collapse">
                <tr>
                    <td colspan="2"><h3>Đổi mật khẩu</h3></td>
                </tr>
                <tr>
                    <td>Tài khoản</td>
                    <td><input type="text" name="email" placeholder="Email"></td>
                </tr>
                <tr>
                    <td>Mật khẩu cũ</td>
                    <td><input type="password" name="password_cu" placeholder="Mật khẩu cũ"></td>
                </tr>
                <tr>
                    <td>Mật khẩu mới</td>
                    <td><input type="password" name="password_moi" placeholder="Mật khẩu mới"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Đổi mật khẩu" name="doimatkhau"></td>
                </tr>
            </table>
        </form>