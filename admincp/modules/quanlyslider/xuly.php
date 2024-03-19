<?php
    include("../../config/config.php");
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;
    $noidung_caption = $_POST['noidung_caption'];
    if(isset($_POST['themslider'])){
        $sql_them = "INSERT INTO tbl_slider(slider_image,slider_caption) 
        VALUES ('".$hinhanh."','".$noidung_caption."')";
        mysqli_query($mysqli, $sql_them);
        move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
        header('Location:../../index.php?action=quanlyslider&query=them');
    }elseif(isset($_GET['idslider'])){
        $id = $_GET['idslider'];
        $sql = "SELECT * FROM tbl_slider WHERE slider_id = '$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_xoa = "DELETE FROM tbl_slider WHERE slider_id = '".$id."'";
        mysqli_query($mysqli, $sql_xoa);
        header('Location:../../index.php?action=quanlyslider&query=them');
    }
?>