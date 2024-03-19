<?php
    $sql_lietke_slider = "SELECT *FROM tbl_slider WHERE slider_active ='1' ORDER BY slider_id";
    $query_lietke_slider = mysqli_query($mysqli, $sql_lietke_slider);
?>
<p>Liệt kê Slider</p>
<table border=1 style="border-collapse:collapse;" width="100%">
  <tr>
    <th>ID</th>
    <th>Hình ảnh</th>
    <th>Caption</th>
    <th>Quản lý</th>
  </tr>
  <?php
    $i=0;
    while($row = mysqli_fetch_array($query_lietke_slider)){
        $i++;
    
  ?>
  <tr>
    <td><?php echo $i ?> </td>
    <td><img src="modules/quanlyslider/uploads/<?php echo $row['slider_image']?>" width="150px"></td>
    <td><?php echo $row['slider_caption'] ?> </td>
    <td>
    <a onclick="return confirm('Bạn có muốn xóa sản phẩm?')" href="modules/quanlyslider/xuly.php?idslider=<?php echo $row['slider_id'] ?>" class="btn btn-danger">Xóa</a>
    
  </td>
  </tr>
    <?php
    }
    ?>

</table>