<style>
    .carousel-inner .carousel-item img {
    max-width: 75%; /* Chiếm 3/4 chiều rộng của màn hình */
    display: block; /* Hiển thị ảnh dưới dạng block để có thể căn giữa */
    max-height: 327px;
    margin: 28px auto; /* Căn giữa ảnh */
    border-top-right-radius: 144px; /* Viền góc trên bên phải */
    border-bottom-left-radius: 144px; /* Viền góc dưới bên trái */
    
}
.slider-wrapper {
    position: relative;
}

.next-button {
    position: absolute;
    top: 50%;
    right: 20px; /* 20px từ mép phải */
    transform: translateY(-50%);
}
</style>

<div class="slider">
    <div style="width:100% " id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
                $sql_slider = "SELECT * FROM tbl_slider WHERE slider_active ='1' ORDER BY slider_id";
                $query_slider = mysqli_query($mysqli, $sql_slider);
                $slider_count = mysqli_num_rows($query_slider);
                
                // Tạo các indicators cho các slider
                for($i = 0; $i < $slider_count; $i++) {
                    if($i == 0) {
                        echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '" class="active"></li>';
                    } else {
                        echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"></li>';
                    }
                }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
                $active = "active";
                while($row_slider = mysqli_fetch_array($query_slider)){
            ?>
            <div class="carousel-item <?php echo $active; ?>">
                <img class="d-block w-100" src="admincp/modules/quanlyslider/uploads/<?php echo $row_slider['slider_image'] ?>" alt="<?php echo $row_slider['slider_caption'] ?>">
            </div>
            <?php
                    $active = ""; // Đặt biến $active thành rỗng sau khi hiển thị slider đầu tiên
                }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

