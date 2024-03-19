<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php
    $sql_bv = "SELECT *FROM tbl_baiviet WHERE tinhtrang=1 ORDER BY id DESC";
    $query_bv = mysqli_query($mysqli, $sql_bv);
?>  
<?php
    
    // Truy vấn SQL để lấy bảy bài viết đầu tiên
    $sql_bv_moinhat = "SELECT * FROM tbl_baiviet WHERE tinhtrang = 1 ORDER BY id DESC LIMIT 7";
    $query_bv_moinhat = mysqli_query($mysqli, $sql_bv_moinhat);

?>
<style>
    .article-container {
        position: relative;
        overflow: hidden;
    }

    .articles {
        display: flex;
        transition: transform 0.5s ease;
    }

    .article {
        flex: 0 0 24%; /* 24% màn hình */
        margin-right: 10px;
        width: calc(24% - 10px); /* 24% màn hình và 10px khoảng cách giữa các bài viết */
        text-align: center;
        overflow: hidden; /* Ẩn bất kỳ phần nào vượt quá kích thước khung */
        border: 1px solid #ccc; /* Viền bài viết */
        padding: 0px; /* Khoảng cách nội dung bên trong */
        height: 376px;
    }
    .article.article-all{
        flex: 0 0 24%; /* 24% màn hình */
        margin-right: 10px;
        width: calc(24% - 10px); /* 24% màn hình và 10px khoảng cách giữa các bài viết */
        text-align: center;
        overflow: hidden; /* Ẩn bất kỳ phần nào vượt quá kích thước khung */
        border: 0px solid ; /* Viền bài viết */
        padding: 0px; /* Khoảng cách nội dung bên trong */
        height: 376px;
    }
    .article img {
        height: 200px; /* Chiều cao hình ảnh */
        width: 100%; /* Chiều rộng hình ảnh */
        object-fit: cover; /* Hiển thị hình ảnh mà không bị kéo méo */
        margin-bottom:}

    .article h3, .article p {
        margin: 0;
        white-space: nowrap; /* Ngăn chặn xuống dòng */
        overflow: hidden; /* Ẩn bất kỳ phần nào vượt quá kích thước khung */
        text-overflow: ellipsis; /* Hiển thị dấu 3 chấm cho nội dung dư thừa */
    }
    .article-container {
    position: relative;
}

#prevBtn, #nextBtn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

#prevBtn {
    left: 0;
}

#nextBtn {
    right: 0;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    
    var articles = document.querySelectorAll(".articles .article");
    var numVisibleArticles = 4; // Số lượng bài viết hiển thị trên màn hình

    function showArticles(startIndex) {
        for (var i = 0; i < articles.length; i++) {
            if (i >= startIndex && i < startIndex + numVisibleArticles) {
                articles[i].style.display = "block";
            } else {
                articles[i].style.display = "none";
            }
        }
    }

    function nextArticles() {
        var startIndex = getCurrentStartIndex();
        if (startIndex + numVisibleArticles < articles.length) {
            startIndex += numVisibleArticles;
            showArticles(startIndex);
        }
    }

    function prevArticles() {
        var startIndex = getCurrentStartIndex();
        if (startIndex - numVisibleArticles >= 0) {
            startIndex -= numVisibleArticles;
            showArticles(startIndex);
        }
    }

    function getCurrentStartIndex() {
        for (var i = 0; i < articles.length; i++) {
            if (articles[i].style.display !== "none") {
                return i;
            }
        }
        return 0;
    }

    // Hiển thị bài viết đầu tiên khi tải trang
    showArticles(0);

    // Gán sự kiện cho nút "Previous" và "Next"
    document.getElementById("prevBtn").addEventListener("click", prevArticles);
    document.getElementById("nextBtn").addEventListener("click", nextArticles);
});




</script>

<h3>BÀI VIẾT MỐI NHẤT</h3>
<div class="article-container">
    <div class="articles">
        <?php
            while($row_bv_moinhat= mysqli_fetch_array($query_bv_moinhat)){
        ?>
        <a class="article" href="index.php?quanly=baiviet&id=<?php echo $row_bv_moinhat['id'] ?>">
            <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv_moinhat['hinhanh'] ?>">
            <h3 class="tenbaiviet"><?php echo $row_bv_moinhat['tenbaiviet'] ?></h3>
            <p class="summary"><?php echo $row_bv_moinhat['tomtat'] ?></p>
        </a>
        <?php
                        }
        ?>
        
    </div>
    <button id="prevBtn" onclick="prevArticle()">‹ Previous</button>
    <button id="nextBtn" onclick="nextArticle()">Next ›</button>
</div>
<h3>TẤT CẢ BÀI VIẾT <span></span></h3>
                <ul class="product_list" >
                    <?php
                        while($row_bv= mysqli_fetch_array($query_bv)){
                    ?>
                    <li style="height: 376px;">
                        <a class="article article-all" href="index.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>">
                            <img style="height: 200px" src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>">
                            <h3 class="tenbaiviet"><?php echo $row_bv['tenbaiviet'] ?></h3>
                            <p class="summary"><?php echo $row_bv['tomtat'] ?></p>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
