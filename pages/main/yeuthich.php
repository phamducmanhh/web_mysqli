<?php
    $sql_lietke_sp = "SELECT *FROM tbl_sanpham, tbl_yeuthich WHERE tbl_sanpham.id_sanpham = tbl_yeuthich.product_id 
    ORDER BY tbl_yeuthich.id DESC";
    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>
<p>Liệt kê sản phẩm</p>
<table class="table" id="my_table"  width="100%">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Giá sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Tóm tắt</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Quản lý</th>
        </tr>
  </thead>
  <?php
    $i=0;
    while($row = mysqli_fetch_array($query_lietke_sp)){
        $i++;
    
  ?>
  <tbody>
    <tr>
        <th scope="row"><?php echo $i ?> </th>
        <td><?php echo $row['tensanpham'] ?> </td>
        <td><img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>" width="150px"></td>
        <td><?php echo $row['giasp'] ?> </td>
        <td><?php echo $row['soluong'] ?> </td>
        <td><?php echo $row['masp'] ?> </td>
        <td><?php echo $row['tomtat'] ?> </td>
        <td><?php if($row['tinhtrang']==1){
        echo 'Kích hoạt';
        }else{
        echo 'Ẩn';
        }  
        ?> 
        </td>
        <td>
            <a onclick="return confirm('Bạn có muốn xóa sản phẩm yêu thích?')" href="admincp/modules/quanlysp/xuly.php?idyeuthich=<?php echo $row['id_sanpham'] ?>"  ><button type="button" class="btn btn-danger"><i class="fa-solid fa-trash" aria-hidden="true"></i></button></a>
            <!-- <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham']?>"><button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> -->
        </td>
    </tr>
  </tbody>
    <?php
    }
    ?>

</table>