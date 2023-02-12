
<html>
    <link rel="stylesheet" href="/css/profile.css">
    <body>
        <?php 
            session_start();
            if(empty($_SESSION['email'])){
                header("location:../user_login.php");
            }
            include '../HomePage/header.php';

            include '../database/connect.php';
            
            $email = $_SESSION['email'];
            $pg_cmd = "SELECT * FROM \"User\" WHERE \"Email\" LIKE '". $email ."'";
            $pg_execute = pg_query($connect, $pg_cmd);
            $row = pg_fetch_array($pg_execute);
            
            $pg_cmd = "SELECT * FROM \"Order\" WHERE \"User_ID\" = ". $row['User_ID'];
            $pg_execute2 = pg_query($connect, $pg_cmd);

            $action = @ $_GET['action'];
            if(empty($_GET['action']) && empty($action)){
                if(empty($_SESSION['action']))
                    $action = 'info';
                else{
                    $action = $_SESSION['action'];
                }
            }
            if(!empty($_GET['action'])){
                $action = $_GET['action'];
                $_SESSION['action'] = $_GET['action'];
            }

        ?>
        <div class="content">
            <div class="side_bar">
                <img src="../src/img/avatar_2.jpg" alt="">
                <p><?php echo $row['Name'] ?><p>
                <a href="../logout.php"><button type="button">Đăng xuất</button></a>
                <a href="../HomePage/profile.php?action=info"><div class = "side_bar_item">
                    <p>Thông tin của tôi</p>
                </div></a>
                <a href="../HomePage/profile.php?action=mybook"><div class = "side_bar_item">
                    <p>Sách đã đặt</p>
                </div></a>
                <a href="../HomePage/profile.php?action=change_pass"><div class = "side_bar_item">
                    <p>Đổi mật khẩu</p>
                </div></a>
            </div>
            
            <div class="main_content">
                <div class="info">
                    <div class="info_upper">
                        <p>Thông tin cá nhân</p>
                        <a href="../HomePage/profile.php?action=change_info"><button type="submit">Sửa thông tin cá nhân</button></a>
                    </div>
                    <div class="info-box" id ="info-box">
                        <div class="info_box" id ="info_box">
                            <p>Tên người dùng:<?php echo $row['Name'] ?></p>
                        </div>
                        <div class="info_box" id ="info_box">
                            <p>Email: <?php echo $row['Email']?></p>
                        </div>
                        <div class="info_box" id ="info_box">
                            <p>Địa chỉ: <?php echo $row['UserAddr']?></p>
                        </div>
                        <div class="info_box" id ="info_box">
                            <p>Số điện thoại: <?php echo $row['PhoneNum']?></p>
                        </div>
                    </div>

                    <div class="change_box" id ="change_box">
                        <form action="" method="get">
                            <div class="change-index" id="change-index">
                                <p>Tên người dùng</p>
                                <input type="text" name="name" id="name" placeholder="<?php echo $row['Name'] ?>">
                            </div>
                            <div class="change-index" id="change-index">
                                <p>Email</p>
                                <input type="email" name="email" id="email" placeholder="<?php echo $row['Email'] ?>">
                            </div>
                            <div class="change-index" id="change-index">
                                <p>Địa chỉ</p>
                                <input type="text" name="addr" id="addr" placeholder="<?php echo $row['UserAddr'] ?>">
                            </div>
                            <div class="change-index" id="change-index">
                                <p>Số điện thoại</p>
                                <input type="text" name="phone" id="phone" placeholder="<?php echo $row['PhoneNum'] ?>">
                            </div>
                                <button class="change-button" name="change_button_i" id ="change-button_i" type="submit">Sửa</button>
                                <small id="small_3" style="display: none; float:left; width:100%;color:red;margin: 5px 3%;">Thay đổi thất bại </small>
                                <small id="small_4" style="display: none; float:left; width:100%;color:blue;margin: 5px 3%;">Thay đổi thành công</small>
                        </form>
                    </div>

                    <div class="change-pass" id="change-pass">
                        <form action="" method="get">
                            <div class="change-index" id="change-index">
                                <p>Nhập email</p>
                                <input type="text" name="email_c" id="email_c" placeholder="Email">
                            </div>
                            <div class="change-index" id="change-index">
                                <p>Nhập tên người dùng</p>
                                <input type="text" name="name_c" id="name_c" placeholder="Tên người dùng">
                            </div>
                            <div class="change-index" id="change-index">
                                <p>Nhập mật khẩu mới</p>
                                <input type="password" name="newpass" id="newpass" placeholder="Mật khẩu">
                            </div>
                            <div class="change-index" id="change-index">
                                <p>Nhập lại mật khẩu</p>
                                <input type="password" name="repass" id="repass" placeholder="Mật khẩu">
                                
                            </div>
                            <button class="change-button" name= "change-button_p" id ="change-button_p" type="submit">Ok</button>
                            <small id="small" style="display: none; float:left; width:100%;color:red;margin: 5px 3%;">Đổi mật khẩu thất bại</small>
                            <small id="small_2" style="display: none; float:left; width:100%;color:blue;margin: 5px 3%;">Đổi mật khẩu thành công</small>
                        </form>
                    </div>
                    <div class="showBook" id="showBook">
                        <table class = "tableBook">
                            <thead>
                                <td>Tên sách</td>
                                <td>Tác giả</td>
                                <td>Thể loại</td>
                            </thead>
                            <tbody>
                                <?php
                                    while($row2 = pg_fetch_array($pg_execute2)){
                                        $pg_cmd = "SELECT * FROM \"Library\" WHERE \"Book_ID\" = ". $row2['Book_ID'];
                                        $pg_execute3 = pg_query($connect, $pg_cmd);
                                        $row3 = pg_fetch_array($pg_execute3);
                                        echo"                                
                                            <tr>
                                                <td>" . $row3['BookName'] . "</td>
                                                <td>" . $row3['Author'] . "</td>
                                                <td>" . $row3['Category'] . "</td>
                                            </tr>
                                        ";
                                    }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<div style="width: 100%; float:left;">
    <?php
        if($action == 'info'){
            echo "
                <script language='javascript'>
                    var ul = document.querySelector(\"#info-box\");
                    ul.style.display = \"block\";
                    var ul = document.querySelector(\"#change_box\");
                    ul.style.display = \"none\";
                    var ul = document.querySelector(\"#change-pass\");
                    ul.style.display = \"none\";
                    var ul = document.querySelector(\"#showBook\");
                    ul.style.display = \"none\";
                </script>
            ";
        }else if($action == 'change_pass'){
            echo "
                <script language='javascript'>
                    var ul = document.querySelector(\"#info-box\");
                    ul.style.display = \"none\";
                    var ul = document.querySelector(\"#change_box\");
                    ul.style.display = \"none\";
                    var ul = document.querySelector(\"#change-pass\");
                    ul.style.display = \"block\";
                    var ul = document.querySelector(\"#showBook\");
                    ul.style.display = \"none\";
                </script>
            ";
        }else if($action == 'change_info'){
            echo "
                <script language='javascript'>
                    var ul = document.querySelector(\"#info-box\");
                    ul.style.display = \"none\";
                    var ul = document.querySelector(\"#change_box\");
                    ul.style.display = \"block\";
                    var ul = document.querySelector(\"#change-pass\");
                    ul.style.display = \"none\";
                    var ul = document.querySelector(\"#showBook\");
                    ul.style.display = \"none\";
                </script>
            ";
        }else if($action == 'mybook'){
            echo "
                <script language='javascript'>
                    var ul = document.querySelector(\"#info-box\");
                    ul.style.display = \"none\";
                    var ul = document.querySelector(\"#change_box\");
                    ul.style.display = \"none\";
                    var ul = document.querySelector(\"#change-pass\");
                    ul.style.display = \"none\";
                    var ul = document.querySelector(\"#showBook\");
                    ul.style.display = \"block\";
                </script>
            ";
        }
        if($action == 'change_info'){
            $email_info = @ $_GET['email'];
            $name = @ $_GET['name'];
            $addr = @ $_GET['addr'];
            $phone = @ $_GET['phone'];
            if(isset($_GET['change_button_i'])){
                if(empty($email_info) || empty($name) || empty($addr) || empty($phone)){
                    echo "
                        <script language='javascript'>
                            var ul = document.querySelector(\"#small_3\");
                            ul.style.display = \"block\";
                        </script>
                    ";
                }else{
                    if($email != $email_info){
                        $pg_cmd = "SELECT * FROM \"User\" WHERE \"Email\" LIKE $1;";
                        pg_prepare($connect, "",$pg_cmd);
                        $pg_execute = pg_query_params($connect, $pg_cmd, array($email_info));
                        $row = pg_num_rows($pg_execute);
                        if($row > 0){
                            echo "
                                <script language='javascript'>
                                    var ul = document.querySelector(\"#small_3\");
                                    ul.style.display = \"block\";
                                </script>
                            ";
                        }else{
                            echo "
                                <script language='javascript'>
                                    var ul = document.querySelector(\"#small_4\");
                                    ul.style.display = \"block\";
                                </script>
                            ";
                            $pg_cmd = "UPDATE \"User\" SET \"Email\" = '" . $email_info ."', \"Name\" = '". $name ."' , \"UserAddr\" = '". $addr ."' , \"PhoneNum\" = '". $phone ."'WHERE \"Email\" = '" . $email ."'";
                            pg_query($connect, $pg_cmd);
                            $email = $email_info;
                            $_SESSION['email'] = $email;
                        }
                    }
                }
            }
            
        }
        if($action == 'change_pass'){
            $email_c = @ $_GET['email_c'];
            $repass = @ $_GET['repass'];
            $name_c = @ $_GET['name_c'];
            $newpass = @ $_GET['newpass'];
            if(isset($_GET['change-button_p'])){
                if(empty($email_c) || empty($name_c) || empty($repass) || empty($newpass)){
                    echo "
                        <script language='javascript'>
                            var ul = document.querySelector(\"#small\");
                            ul.style.display = \"block\";
                        </script>
                    ";
                }else{
                    if($email_c != $email || $newpass != $repass || $name_c != $row['Name']){
                        echo "
                            <script language='javascript'>
                                var ul = document.querySelector(\"#small\");
                                ul.style.display = \"block\";
                            </script>
                        ";
                    }else{
                        echo "
                            <script language='javascript'>
                                var ul = document.querySelector(\"#small_2\");
                                ul.style.display = \"block\";
                            </script>
                        ";
                        $pg_cmd = "UPDATE \"User\" SET \"Password\" = '" . $newpass ."' WHERE \"Email\" = '" . $email ."'";
                        pg_query($connect, $pg_cmd);
                    }
                }
            }
            
        }
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

