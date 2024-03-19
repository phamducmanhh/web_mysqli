<style>
    .footer {
        display: none;
    }
</style>
<div class="container">
  <?php
      if(isset($_SESSION['id_khachhang'])){  
  ?>
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step done"> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Vận chuyển</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh toán</a><span> </div>
    <div class="step"> <span><a href="index.php?quanly=donhangdadat" >Lịch sử đơn hàng</a><span> </div>
  </div> 
  <?php 
    }
  ?>
    <h4>Thông tin vận chuyển</h4>
    <?php
      if(isset($_POST['themvanchuyen'])){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $note = $_POST['note'];
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_them_vanchuyen = mysqli_query($mysqli, "INSERT INTO tbl_shipping(name,address,phone,note, id_dangky) VALUES ('$name','$address','$phone','$note','$id_dangky')");
        if($sql_them_vanchuyen){
          echo '<script>alert("Thêm thông tin vận chuyển thành công")</script>';
        }
      }elseif(isset($_POST['capnhatvanchuyen'])){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $note = $_POST['note'];
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_update_vanchuyen = mysqli_query($mysqli, "UPDATE tbl_shipping SET name='$name', address='$address', phone='$phone', note='$note', id_dangky='$id_dangky'
          WHERE id_dangky = '$id_dangky'");
        if($sql_update_vanchuyen){
          echo '<script>alert("Cập nhật thông tin vận chuyển thành công")</script>';
        }
      }
    ?>
    <div class="row">
      <?php
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE id_dangky = '$id_dangky' LIMIT 1");
        $count = mysqli_num_rows($sql_get_vanchuyen);

        if($count>0){
          $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
          $name = $row_get_vanchuyen['name'];
          $address = $row_get_vanchuyen['address'];
          $phone = $row_get_vanchuyen['phone'];
          $note = $row_get_vanchuyen['note'];
        }else{
          $name = '' ;
          $address = '' ;
          $phone = '' ;
          $note = '' ;
        }
      ?>
      <div class="col-md-12">
        <form action="" autocomplete="off" method="POST">
          <div class="form-group">
            <label for="email">Họ và tên</label>
            <input type="text" class="form-control" name="name" value=" <?php echo $name ?>" placeholder="Họ và tên" required>
          </div>
          <div class="form-group">
            <label for="email">Địa chỉ</label>
            <input type="text" class="form-control" name="address" value=" <?php echo $address ?>" placeholder="Địa chỉ" required>
          </div>
          <div class="form-group">
            <label for="email">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" value=" <?php echo $phone?>" placeholder="Số điện thoại" required>
          </div>
          <div class="form-group">
            <label for="email">Ghi chú</label>
            <input type="text" class="form-control" name="note" value=" <?php echo $note ?>" placeholder="Ghi chú">
          </div>
          <?php
            if($name=='' && $phone==''){
          ?>
          <button type="submit" class="btn btn-primary" name="themvanchuyen">Thêm thông tin vận chuyển</button>
          <?php
            }elseif($name!='' && $phone!=''){
          ?>
          <button type="submit" class="btn btn-success" name="capnhatvanchuyen" style="margin: 0 0 20px 0;">Cập nhật tin vận chuyển</button>
          <?php
            }
          ?>
        </form>
        <!--------------------- Giỏ hàng ----------------->
      <table style="width:100%; text-align:center; border-collapse: collapse;" border="1">
        <tr>
          <th>ID</th>
          <th>Mã sản phẩm</th>
          <th>Tên sản phẩm</th>
          <th>Hình ảnh</th>
          <th>Số lượng</th>
          <th>Giá sản phẩm</th>
          <th>Thành tiền</th>
          
        </tr>
          <?php
            if(isset($_SESSION['cart'])){
                $i = 0;
                $tongtien=0;
                foreach($_SESSION['cart'] as  $cart_item){
                    $thanhtien = $cart_item['soluong']*$cart_item['giasp'];
                    $tongtien+= $thanhtien;
                    $i++; 
          ?>
        <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $cart_item['masp']; ?></td>
          <td><?php echo $cart_item['tensanpham']; ?></td>
          <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" alt="" width="150px"></td>
          <td>
              <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']?>" style="text-decoration: none"><i class="fa-sharp fa-solid fa-plus fa-style"></i></a>
              <?php echo $cart_item['soluong']; ?>
              <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id']?>" style="text-decoration: none"><i class="fa-solid fa-minus fa-style"></i></a>
          </td>
          <td><?php echo number_format($cart_item['giasp'],0,',','.').' VNĐ'; ?></td>
          <td><?php  echo number_format($thanhtien,0,',','.').'VNĐ' ;?></td>
          
        </tr>

          <?php
                }
          ?>

        <td colspan="8" >
            <p style="float:left;">Tổng tiến: <?php  echo number_format($tongtien, 0,',','.').'VNĐ' ;?></p>
            
            <div style="clear:both"></div>
            <?php
              if(isset($_SESSION['dangky'])){
            ?>
            <p><a href="index.php?quanly=thongtinthanhtoan" class="btn btn-success">Thanh toán</a></p>
            <?php
              }else{
            ?>
            <p><a href="index.php?quanly=dangky">Đăng ký đặt hàng</a></p>
            <?php
              }
            ?>
        </td>
          <?php
          }else{

          ?>
        <tr>
          <td colspan = "8">Hiện tại giỏ hàng trống</td>
          
        </tr>
          <?php
            }
          ?>
      </table>
      </div>
      

    </div>
</div>
  
  