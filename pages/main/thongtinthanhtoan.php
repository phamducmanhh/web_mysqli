<p>Hình thức thanh toán</p>
<style>
    .footer {
        display: none;
    }
</style>
<div class="container">
<?php
    if(isset($_SESSION['cart'])){  
?>
  <div class="arrow-steps clearfix">
    <div class="step done"> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
    <div class="step done"> <span><a href="index.php?quanly=vanchuyen" >Vận chuyển</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh toán</a><span> </div>
    <div class="step"> <span><a href="index.php?quanly=donhangdadat" >Lịch sử đơn hàng</a><span> </div>
  </div>
  <?php 
  }
  ?>
  <form action="pages/main/xulythanhtoan.php" method="POST">
  <div class="row">
  <div class="col-md-8" >
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
    <h4>Thông tin vận chuyển và giỏ hàng</h4>
    <ul style="list-style:none;">
      <li>Họ và tên: <b><?php echo $name ?></b></li>
      <li>Địa chỉ: <b><?php echo $address ?></b></li>
      <li>Số điện thoại: <b><?php echo $phone ?></b></li>
      <li>Ghi chú: <b><?php echo $note ?></b></li>
    </ul>
    <h5>Giỏ hàng của bạn</h5>
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
        <p style="float:left; color: red"><b>Tổng tiến: <?php  echo number_format($tongtien, 0,',','.').'VNĐ' ;?></b></p>
        
        <div style="clear:both"></div>
        
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
  <style type="text/css">
    .col-md-4.thongtinvanchuyen .form-check{
      margin: 6px;
    }
  </style>
  <div class="col-md-4 thongtinvanchuyen" >
  <h4>Hình thức vận chuyển</h4>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="tienmat" checked>
      <!-- <img src="images/tienmat.jpg" style="width:47px; height: 33px"> -->
      <label class="form-check-label" for="exampleRadios1">
        Tiền mặt
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="chuyenkhoan" >
      <!-- <img src="images/chuyenkhoan.png" style="width:43px; height: 32px"> -->
      <label class="form-check-label" for="exampleRadios2">
        Chuyển khoản
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="payment" id="exampleRadios4" value="vnpay" >
      <img src="images/vnpay.png" style="width:94px; height: 36px">
      <label class="form-check-label" for="exampleRadios4">
        
      </label>
    </div>
    <input type="submit" value="Thanh toán" name="redirect" id="redirect" class="btn btn-danger">
    <p></p>
  </form>
    <?php
      $tongtien=0;
      foreach($_SESSION['cart'] as $key => $value){
        $thanhtien = $value['soluong']*$value['giasp'];
        $tongtien+= $thanhtien;
        
      }
      $tongtien_vnd = $tongtien;
      $tongtien_usd = round($tongtien/23677);
    ?>
    <input type="hidden" name="" value="<?php echo $tongtien_vnd ?>" id="tongtien">
    <div id="paypal-button-container"></div>
    <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="pages/main/xulythanhtoanmomo.php">
      <input type="hidden" value="<?php echo $tongtien_vnd ?>" name = "tongtien_vnd">
      <input type="submit" name="momo" value="Thanh toán MOMO QRcode" class="btn btn-danger">
    </form>

    <p></p>

    <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="pages/main/xulythanhtoanmomo_atm.php">
      <input type="hidden" value="<?php echo $tongtien_vnd ?>" name = "tongtien_vnd">  
      <input type="submit" name="momo" value="Thanh toán MOMO ATM" class="btn btn-danger">
    </form>
    <p></p>
    <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="pages/main/onepay.php">
      <input type="hidden" value="<?php echo $tongtien_vnd ?>" name = "tongtien_vnd">  
      <input type="submit" name="momo" value="Thanh toán ONEPAY" class="btn btn-danger">
    </form>
    <p></p>
  </div>
  </div>
  
</div>
