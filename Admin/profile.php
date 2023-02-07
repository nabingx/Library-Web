<?php
    include 'header.php';
    include 'sidebar.php';
?>
<html>
<head>
    <link rel="stylesheet" href="Css/profile.css">
</head>
<body>
    <div class = "pMother_div">
        <div>
            <h1>Profile</h1>
        </div>
        <div class="taskbar"><a href="index.php">Dashboard</a>&nbsp;/&nbsp;<a href="profile.php">Profile</a></div>
        <div class= "table">
            <div class= "tableLable"><i class="fa-solid fa-user-pen"></i>Edit Profile Details</div>
            <form action="" method="" class="myForm">
                <label>Email Address</label>
                <input type="email" name="adminEmail" value="thanhnt@gmail.com"></input>
                <label>Password</label>
                <input type="password" name="adminPassword" value="thanhnt"></input>
                <button type="submit">Edit</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    
    include 'footer.php';
?>
