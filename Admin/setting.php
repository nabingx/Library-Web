<?php
    include 'header.php';
    include 'sidebar.php';
?>
<html>
<head>
    <link rel="stylesheet" href="Css/setting.css">
</head>
<?php
    include '../database/connect.php';
    $pg_cmd = "SELECT * FROM \"Contact_Lib\"";
    $pg_execute = pg_query($connect, $pg_cmd);
    while($row = pg_fetch_array($pg_execute)){
        $libName = $row['LibraryName'];
        // $libAddr = $row['LibraryAddress'];
        $libPhoneNum = $row['LibraryPhoneNum'];
        $libEmail = $row['LibraryEmail'];
    }
?>
<body>
    <div class = "settingMother_div">
        <div>
            <h1>Profile</h1>
        </div>
        <div class="taskbar"><a href="index.php">Dashboard</a>&nbsp;/&nbsp;<a href="setting.php">Setting</a></div>
        <div class= "table">
            <div class= "tableLable"><i class="fa-solid fa-user-pen"></i>Library Setting</div>
            <form action="" method="Get" class="myForm">
                <label>Library Name</label>
                <input type="text" name="LibName" id = "LibName" placeholder="<?php echo $libName?>" value ="<?php echo isset($_GET['LibName']) ? $_GET['LibName']: '';?>"></input>
                <small class="noShow" id = "NameErr">Name is required</small>
                <label>Address</label>
                <input type="text" name="LibAddr" id = "LibAddr" placeholder="1 Tran Duy Hung, Ha Noi" value="<?php echo isset($_GET['LibAddr']) ? $_GET['LibAddr']: '';?>"></input>
                <small class="noShow" id = "AddrErr">Address is required</small>
                <label class="half_lable">Contact Number</label>
                <label class="half_lable">Contact Email</label>
                <input type="tel" name="LibPhoneNum" id = "LibPhoneNum" class="half_input" placeholder="<?php echo $libPhoneNum?>", value ="<?php echo isset($_GET['LibPhoneNum']) ? $_GET['LibPhoneNum']: '';?>">
                <input type="email" name="LibEmail" id = "LibEmail" class="half_input" placeholder="<?php echo $libEmail?>" value ="<?php echo isset($_GET['LibEmail']) ? $_GET['LibEmail']: '';?>">
                <small class="noShow" id = "NumErr">Invalid phone number</small>
                <small class="noShow" id = "phoneNull">Phone is required</small>
                <small class="noShow" id = "emailNull"> </small>
                <small class="noShow" id = "EmailErr">Invalid email</small>
                <button type="submit" name="submit">Edit</button>
                <small class="noShow" id = "succeed">Succeed update Library</small>
            </form>
        </div>
    </div>
</body>
</html>

<?php

    $libName = @ $_GET['LibName'];
    $libAddr = @ $_GET['LibAddr'];
    $libPhoneNum = @ $_GET['LibPhoneNum'];
    $libEmail = @ $_GET['LibEmail'];
    
    function check($libName, $libAddr, $libPhoneNum, $libEmail){
        echo"
            <script language='javascript'>
                let small;
            </script>
        ";
        if(!empty($libName) && !empty($libAddr) && !empty($libPhoneNum) && !empty($libEmail)){
            if(!filter_var($libEmail, FILTER_VALIDATE_EMAIL)) {
                echo"
                <script language='javascript'>
                    small = document.querySelector(\"#EmailErr\");
                    small.style.display = \"block\";
                </script>
                ";
                return false;
            }if(!preg_match('/^[0-9]{10}$/', $libPhoneNum)) {
                echo"
                <script language='javascript'>
                    small = document.querySelector(\"#NumErr\");
                    small.style.display = \"block\";
                </script>
                ";
                return false;
            }
        }else{
            if(empty($libName)){
                echo"
                <script language='javascript'>
                    small = document.querySelector(\"#NameErr\");
                    small.style.display = \"block\";
                </script>
                ";
                return false;
            }
            if(empty($libAddr) == true){
                echo"
                <script language='javascript'>
                    small = document.querySelector(\"#AddrErr\");
                    small.style.display = \"block\";
                </script>
                ";
                return false;
            }
            if(empty($libPhoneNum)){
                echo"
                <script language='javascript'>
                    small = document.querySelector(\"#phoneNull\");
                    small.style.display = \"block\";
                </script>
                ";
                return false;
            }
            if(empty($libEmail)){
                echo"
                <script language='javascript'>
                    small = document.querySelector(\"#emailNull\");
                    small.style.display = \"block\";
                </script>
                ";
                return false;
            }
        }
        return true;
    }
    if(isset($_GET['submit'])){
        if(check($libName, $libAddr, $libPhoneNum, $libEmail) == true){
            $pg_cmd = "UPDATE \"Contact_Lib\" SET \"LibraryName\" = $1, \"LibraryPhoneNum\" = $2, \"LibraryEmail\" = $3";
            pg_prepare($connect, "", $pg_cmd);
            pg_query_params($connect, $pg_cmd, array($libName, $libPhoneNum, $libEmail));
            echo"
                <script language='javascript'>
                    small = document.querySelector(\"#succeed\");
                    small.style.display = \"block\";
                </script>
            ";
        }
    }
    include 'footer.php';
    
?>
