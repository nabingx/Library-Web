
<html>
    <link rel="stylesheet" href="/css/profile.css">
    <body>
        <?php 
            include '../HomePage/header.php';
            include '../database/connect.php';
        ?>
        <div class="content">
            <div class="side_bar">
                <img src="../src/img/avatar_2.jpg" alt="">
                <p>Thành Nguyễn<p>
                <a href="../logout.php"><button type="button">Đăng xuất</button></a>
                <div class = "side_bar_item">
                    <p>Thông tin của tôi</p>
                </div>
                <div class = "side_bar_item">
                    <p>Sách đã đặt</p>
                </div>
                <div class = "side_bar_item">
                    <p>Đổi mật khẩu</p>
                </div>
            </div>
            
            <div class="main_content">
                <div class="info">
                    <div class="info_upper">
                        <p>Thông tin cá nhân</p>
                        <button type="submit">Sửa thông tin cá nhân</button>
                    </div>
                    <div class="info_box">
                        <p>Tên người dùng: Nguyễn Thành</p>
                    </div>
                    <div class="info_box">
                        <p>Email: thanh@gmail.com</p>
                    </div>
                    <div class="info_box">
                        <p>Địa chỉ: 470 Ngõ Giếng Mứt, Trương Định, Hai Bà Trưng, Hà Nội</p>
                    </div>
                    <div class="info_box">
                        <p>Số điện thoại: 0987654321</p>
                    </div>
                    <div class="change_box">
                        <div class="change-index">
                            <p>Name</p>
                            <input type="text" name="name" id="name" placeholder="Nguyen Thanh">
                        </div>
                        <div class="change-index">
                            <p>Name</p>
                            <input type="text" name="name" id="name" placeholder="Nguyen Thanh">
                        </div>
                        <div class="change-index">
                            <p>Name</p>
                            <input type="text" name="name" id="name" placeholder="Nguyen Thanh">
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div style="width: 100%; float:left;">
    <?php
        include "../HomePage/footer.php";
    ?>
</div>
</body>
<!------------------------------ Java Script ------------------------------>
<script>
    const header = document.querySelector("header")
    window.addEventListener("scroll",function()
    {
        x = window.pageYOffset
        if(x>0)
        {
            header.classList.add("sticky")
        }
        else{
            header.classList.remove("sticky")
        }
    })
</script>
</html>
    </body>
</html>

