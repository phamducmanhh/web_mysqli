<?php
    $sql_sua_sp = "SELECT *FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
    $query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);
?>
<p>Sửa sản phẩm</p>
<table border=1 width="100%" style="border-collapse:collapse;">
<?php
    while($row = mysqli_fetch_array($query_sua_sp)){

?>
  
  <form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php  echo $_GET['idsanpham'] ?>" enctype="multipart/form-data">
    <tr>
        <td>Hình ảnh</td>
        <td>
            <input type="file" name="hinhanh" id="image">
            <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh']?>" width="150px">
            <p>Preview image before uploading</p>
            <div id="preview"></div>
        </td>
    </tr>
    <tr>
        <td>Nội dung</td>
        <td><textarea rows="10" name="noidung_caption" style="resize: none"></textarea></td>
    </tr>
    
    <tr>
        <td colspan="2"><input type="submit" name="suaslider" value="Sửa Slider"></td>
    </tr>
  </form>
<?php
    }
?>
</table>