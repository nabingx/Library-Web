<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fe59ae0d7b.js" crossorigin="anonymous"></script>
    <link href="Css/header.css" rel="stylesheet">
    <title>Library Management</title>
</head>
<?php
    session_start();
    include '../Admin/Controller/check_admin_login.php';
    $username = $_SESSION['username'];
    $password =  $_SESSION['password'];
?>
<body>
    <div class="hMother_div">
        <div class= "float_div" id="hTitle">
            <a class="link_without_underline" href="index.php"><strong>Library System</strong>  </a>
        </div>
        <div class= "float_div" id="hIcon">
            <div id = "myIcon"><i id = "icon1" class="fa-solid fa-user"></i><i id = "icon2" class="fa-sharp fa-solid fa-caret-down"></i></div>
            <div class = "Icon_drop" id= "popup">
                <ul class = "drop_content">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="setting.php">Setting</a></li>
                    <li><a href= "logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
    <script>
        document.body.addEventListener("click", function check(event) {
            var myIcon = document.getElementById("myIcon");
            var myIcon1 = document.getElementById("icon1");
            var myIcon2 = document.getElementById("icon2");
            var popup = document.getElementById("popup");
            if (event.target == myIcon || event.target == myIcon1 || event.target == myIcon2) {
                popup.style.display = "block";
            }else{
                popup.style.display = "none";
            }
        });
    </script>
</html>