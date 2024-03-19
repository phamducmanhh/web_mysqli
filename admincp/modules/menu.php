<style>
    .admincp_list {
    list-style-type: none;
    padding: 0;
    margin: 0;
        }

        .admincp_list li {
            margin-bottom: 10px; /* Điều chỉnh khoảng cách giữa các mục */
        }

        .admincp_list li a {
            text-decoration: none;
            color: #333; /* Màu chữ của các liên kết */
            display: block; /* Hiển thị liên kết như là các khối, để có thể áp dụng margin, padding */
            padding: 10px; /* Tạo khoảng trống xung quanh các liên kết */
            border: 1px solid #ccc; /* Viền xung quanh các liên kết */
            border-radius: 5px; /* Bo tròn góc viền */
        }

        .admincp_list li a:hover {
            background-color: #f0f0f0; /* Màu nền khi di chuột qua */
        }
</style>
    <ul class="admincp_list" >
        <li><a href="index.php">Thống kê</a></li>
        <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
        <li><a href="index.php?action=quanlysp&query=them">Quản lý sản phẩm</a></li>
        <li><a href="index.php?action=quanlydanhmucbaiviet&query=them">Quản lý danh mục bài viết</a></li>
        <li><a href="index.php?action=quanlybaiviet&query=them">Quản lý bài viết</a></li>
        <li><a href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a></li>
        <li><a href="index.php?action=quanlyweb&query=capnhat">Quản lý Website</a></li>
        <li><a href="index.php?action=quanlyslider&query=them">Slider</a></li>
    </ul>

