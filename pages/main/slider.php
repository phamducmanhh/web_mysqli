<div class="slider">
    <div style="width:100% " id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <?php
                $sql_slider = mysqli_query($mysqli, "SELECT * FROM tbl_slider WHERE slider_active ='1' ORDER BY slider_id");
                while($row_slider = mysqli_fetch_array($sql_slider)){
                    $image_url = $row_slider['slider_image'];
            ?>
            <div class="carousel-itemw active">
                <!-- <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p><?php echo $row_slider['slider_caption'] ?></p>
                        </div>
                    </div>
                </div> -->
                <img class="d-block w-100" src="" alt="First slide">
            </div>
            <?php
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