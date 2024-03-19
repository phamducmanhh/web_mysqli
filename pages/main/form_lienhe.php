<?php
    include('../../admincp/config/config.php');
    if(isset($_POST['guilienhe'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $status_lienhe = 1;
        $note = $_POST['note'];
        $sql = "INSERT INTO tbl_thongbaolienhe(email,username,phone,status_lienhe,note) VALUE ('".$email."', '".$username."', '".$phone."', '".$status_lienhe."', '".$note."')";
        $row = mysqli_query($mysqli, $sql);
        header("Location:../../index.php?quanly=lienhe");
    }
?>