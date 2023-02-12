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
            <form action="" method="GET" class="myForm">
                <label>Email Address</label>
                <input type="email" name="adminEmail" id="adminEmail" placeholder="<?php echo $username?>" value ="<?php echo isset($_GET['adminEmail']) ? $_GET['adminEmail']: '';?>"></input>
                <small class="noShow" id = "emailErr">Invalid email</small>
                <small class="noShow" id = "emailNull">Email is required</small>
                <label>Password</label>
                <input type="password" name="adminPassword" id = "adminPassword" placeholder="***********" value ="<?php echo isset($_GET['adminPassword']) ? $_GET['adminPassword']: '';?>"></input>
                <small class="noShow" id = "passNull">Password is required</small>
                <button type="submit", name="submit">Edit</button>
                <small class="noShow" id = "succeed">Succeed update account</small>
            </form>
        </div>  
    </div>
</body>
</html>

<?php
    include '../database/connect.php';
    $username = @ $_GET['adminEmail'];
    $password = @ $_GET['adminPassword'];

    function check($username, $password){
        echo"
            <script language='javascript'>
                let small;
            </script>
        ";
        if(!empty($username) && !empty($password)){
            if(!filter_var($username, FILTER_VALIDATE_EMAIL)) {
                echo"
                <script language='javascript'>
                    small = document.querySelector(\"#emailErr\");
                    small.style.display = \"block\";
                </script>
                ";
                return false;
            }
        }else{
            if(empty($username)){
                echo"
                <script language='javascript'>
                    small = document.querySelector(\"#emailNull\");
                    small.style.display = \"block\";
                </script>
                ";
                return false;
            }
            if(empty($password)){
                echo"
                <script language='javascript'>
                    small = document.querySelector(\"#passNull\");
                    small.style.display = \"block\";
                </script>
                ";
                return false;
            }
            
        }
        return true;
    }
    if(isset($_GET['submit'])){
        if(check($username, $password) == true){
            $pg_cmd = "UPDATE \"Admin\" SET \"Email\" = $1, \"Password\" = $2 WHERE \"Email\" = $3";
            pg_prepare($connect, "", $pg_cmd);
            pg_query_params($connect, $pg_cmd, array($username, $password, $_SESSION['username']));
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
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
