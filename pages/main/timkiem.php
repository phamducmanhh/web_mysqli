<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
    $sql_pro = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc";
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
        // Chuyển đổi giá trị tìm kiếm sang kiểu số
        $gia = floatval($tukhoa);

    // Xác định khoảng giá gần bằng (ví dụ: +/- 5%)
        $range = 0.1 * $gia;

        $sql_pro .= " AND (tbl_sanpham.tensanpham LIKE '%".$tukhoa."%' OR tbl_sanpham.giasp BETWEEN ".($gia - $range)." AND ".($gia + $range).")";
    }
    //$sql_pro = "SELECT *FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
    //AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
    $query_pro = mysqli_query($mysqli, $sql_pro);

?>
<style>
    /* Style cho các cột */

.col-md-3 {
    margin-bottom: 10px; /* Lề dưới của các cột */
    
    
    padding: 0;
}

/* Thêm lề cho thẻ card */
.card {
    margin-bottom: 10px; /* Lề dưới của các thẻ card */
}
</style>
<h3>Từ khóa tìm kiếm: <?php echo $_POST['tukhoa']; ?></h3>
<div class="row">
    <?php while($row = mysqli_fetch_array($query_pro)) { ?>
    <div class="col-md-3"> <!-- Sử dụng col-md-3 để chia cột, tức là mỗi hàng sẽ chứa 4 cột -->
        
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" > <!-- Liên kết đến trang chi tiết với ID sản phẩm -->
            <div class="cart" style="width:310px; border: 5px solid #ddd; margin: 10px 30px">
            <img class="card-img-top" style=" height:250px;" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="<?php echo $row['tensanpham'] ?>">
            <div class="card-body">
                <h5 class="card-title" style="padding: 0 4px; font-size:1.2rem; color: black; font-weight: 600;">Tên sản phẩm: <?php echo $row['tensanpham'] ?></h5>
                <p class="card-text" style="font-size: 1.4rem; color: red; font-weight:bold; padding 0;">Giá: <?php echo number_format($row['giasp'],0,',','.').' VNĐ' ?></p>
                <p class="card-text" style="text-align:center; color:#ddd"><?php echo $row['tendanhmuc'] ?></p>
            </div>
            </div>
        
        </a>
    </div>
    <?php } ?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
