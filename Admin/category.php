<?php
    include 'header.php';
    include 'sidebar.php';
?>
<html>
    <?php
    ?>
<head>
    <link rel="stylesheet" href="Css/setting.css">
</head>
<body>
    <div class = "cateMother_div">
        <div>
            <h1>Profile</h1>
        </div>
        <div class="taskbar"><a href="index.php">Dashboard</a>&nbsp;/&nbsp;<a href="setting.php">Category</a></div>
        <div class= "table">
            <div class= "tableLable"><i class="fa-solid fa-user-pen"></i>Library Setting</div>
            <form action="" method="" class="myForm">
                <label>Library Name</label>
                <input type="email" name="LibName" value="Online Library"></input>
                <label>Address</label>
                <input type="text" name="LibAdrr" value="1 Tran Duy Hung, Ha Noi"></input>
                <label class="half_lable">Contact Number</label>
                <label class="half_lable">Contact Email</label>
                <input type="tel" name="LibPhoneNum" class="half_input" value="0123456789">
                <input type="email" name="LibEmail" class="half_input" value="abclibrary@gmail.com">
                <button type="submit">Edit</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    
    include 'footer.php';
?>
