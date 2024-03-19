<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Website bán điện thoại</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php
                session_start();
                
                include("admincp/config/config.php");
                include("pages/header.php");
                include("pages/menu.php");
                $current_url = $_SERVER['REQUEST_URI'];

                // Kiểm tra nếu đang ở trang chính
                if ($current_url == '/web_mysqli/index.php' || $current_url == '/web_mysqli/') {
                include("pages/slider.php");
            }
                include("pages/main.php");
                
                include("pages/footer.php"); // Chỉ hiển thị footer trên trang vận chuyển
                
            ?>
        </div>
        
    </div>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script type="text/javascript">
        // Show the first tab and hide the rest
        $('#tabs-nav li:first-child').addClass('active');
        $('.tab-content').hide();
        $('.tab-content:first').show();

        // Click function
        $('#tabs-nav li').click(function(){
        $('#tabs-nav li').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();
        
        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        return false;
        });
    </script>
    <!-- <script type="text/javascript">
        $(document).ready(function() {

        var back = $(".prev");
        var next = $(".next");
        var steps = $(".step");

        next.bind("click", function() {
        $.each(steps, function(i) {
            if (!$(steps[i]).hasClass('current') && !$(steps[i]).hasClass('done')) {
            $(steps[i]).addClass('current');
            $(steps[i - 1]).removeClass('current').addClass('done');
            return false;
            }
        })
        });
        back.bind("click", function() {
        $.each(steps, function(i) {
            if ($(steps[i]).hasClass('done') && $(steps[i + 1]).hasClass('current')) {
            $(steps[i + 1]).removeClass('current');
            $(steps[i]).removeClass('done').addClass('current');
            return false;
            }
        })
        });

        })
    </script> -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://www.paypal.com/sdk/js?client-id=AWyPkbrAVg4l-Wf1VEZ0pwIjgAkEHrHK8wSZd21qKT_QQvWUmy1ZYvL6QfR5X3m_VfbN0otwac6NH_Nv&currency=USD"></script>
<script>
    paypal.Buttons({
        createOrder: function(data, actions){
            var tongtien = document.getElementById('tongtien').value;
            return actions.order.create({
                purchase_units:[{
                    amount: {
                        value: tongtien
                    }
                }]
            });
        },

        onApprove: function(data, actions){
            return actions.order.capture().then(function(orderData){
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
                window.location.replace('http://localhost:8088/web_mysqli/index.php?quanly=camon&thanhtoan=paypal');
            });
        },
        onCancle:function(data){
            window.location.replace('http://localhost:8088/web_mysqli/index.php?quanly=thongtinthanhtoan');
        }
    }).render('#paypal-button-container');
</script>
<script>
    function xemnhanh($id){
        var product_id = $id;
        $.ajax({
            url:"pages/ajax/xemnhanh.php",
            method: "POST",
            dataType: "JSON",
            data:{ product_id:product_id},
            success:function(data){
                $("#title_product").text(data.tensanpham);
                $("#tendanhmuc").text(data.tendanhmuc);
                $("#masp").text(data.masp);
                $("#soluong").text(data.soluong);
                $("#giasp").text(data.giasp);
                $("#gioithieu_text").html(data.tomtat);
                $("#noidung_text").html(data.noidung);
                $("#hinhanhsp").html('<img class="ctsp" width="100%" src="admincp/modules/quanlysp/uploads/'+data.hinhanh+'">');
            
                $("#form_data").attr("action", "pages/main/themgiohang.php?idsanpham="+product_id)
            }
        });
    }
</script>
<script>
    function yeuthich($id){
        var product_id = $id;
        $.ajax({
            url:"pages/ajax/yeuthich.php",
            method: "POST",
            data:{ product_id:product_id},
            success:function(data){
                if(data=='Done'){
                    alert('Thêm sản phẩm vào yêu thích thành công');
                }else{
                    alert('Sản phẩm này đã được thêm vào yêu thích trước đó');
                }
                
            }
        });
    }
</script>
</html>