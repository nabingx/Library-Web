<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="Css/admin_login.css">
</head>
<?php
    include '../database/connect.php';
    session_start();
?>
<body>
    <div class="container">
        <form id="myform" action= "admin_login.php" method = "POST"> 
            <?php //echo $_SERVER['PHP_SELF'] ?>
            <h1>Admin Login</h1>
        <div class="form-control">
            <input id="username" type="text" class="username" name="username" placeholder="Email" value="<?php echo isset($_POST['username']) ? $_POST['username']: '';?>"> 
            <small class="notShow">Username is required</small>
            <small class="notShow" id = "errorNoti">Email was not found</small>
            <span></span>
        </div>
        <div class="form-control">
            <input id="password" type="password" class="Password" name="password" placeholder="Password" value="<?php echo isset($_POST['password']) ? $_POST['password']: '';?>">
            <small class="notShow">Password is required</small>
            <small class="notShow" id = "errorNoti">Wrong Password</small>
            <span></span>
        </div>
        <button type="submit" name="submit" class="btn-submit">Sign in</button>
        <div class="signup-link">
            Back to <a href="../HomePage/index.html">Library Online</a>
        </div>
        </form>
    </div>
</body>
<!-- <script src= "Controller/login_control.js"></script> -->
<?php
    $check = false;
    $username = @ $_POST['username'];
    $password = @ $_POST['password'];
    function checkLogin($connect, $username, $password){
        if(isset($_POST['submit'])) {
            echo"
                <script language='javascript'>
                    let parent;
                    let small;
                </script>
            ";
            if(empty($username)){
                echo"
                <script language='javascript'>
                    var username = document.querySelector(\"#username\");
                    parent = username.parentElement;
                    small = parent.querySelector(\"small\");
                    small.style.display = \"block\";
                    parent.classList.add(\"error\");
                </script>
                ";
                return false;
            }
            if(empty($password)){
                echo"
                <script language='javascript'>
                    var password = document.querySelector(\"#password\");
                    parent = password.parentElement;
                    small = parent.querySelector(\"small\");
                    small.style.display = \"block\";
                    parent.classList.add(\"error\");
                </script>
                ";
                return false;
            }
            if(!empty($username) && !empty($password)){
                $pg_cmd = "SELECT * FROM \"Admin\" WHERE \"Email\" LIKE $1;";
                pg_prepare($connect, "",$pg_cmd);
                if($pg_execute = pg_query_params($connect, $pg_cmd, array($username))){
                    if(($row = pg_fetch_array($pg_execute)) == false){
                        echo"
                            <script language='javascript'>
                                var username = document.querySelector(\"#username\");
                                parent = username.parentElement;
                                small = parent.querySelector(\"#errorNoti\");
                                small.style.display = \"block\";
                                parent.classList.add(\"error\");
                            </script>
                        ";
                        return false;
                    }else{
                        if($row["Password"] != $password){
                            echo"
                                <script language='javascript'>
                                    var password = document.querySelector(\"#password\");
                                    parent = password.parentElement;
                                    small = parent.querySelector(\"#errorNoti\");
                                    small.style.display = \"block\";
                                    parent.classList.add(\"error\");
                                </script>
                            ";
                            return false;
                        }
                        
                    }
                }
            }
            return true;
        }
        return false;
    }
    $check = checkLogin($connect, $username, $password);
    if($check == true){
       $_SESSION['username'] = $username;
       $_SESSION['password'] = $password;

    //    $row = {"tt", "tt"}  = mysql_fetch_array($cmd)
    //    $_SESSION['categories'] = $row;
       header("location:index.php");
    }
?>

</html>