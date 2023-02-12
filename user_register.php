<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="Admin/Css/admin_login.css">
</head>
<?php
    include 'database/connect.php';
    session_start();
?>
<body>
    <div class="container">
        <form action="" method="Post">
            <h1>User Register</h1>
        <div class="form-control">
            <input id="username" type="text" name="username" class="username" placeholder="Username" value="<?php echo isset($_POST['username']) ? $_POST['username']: '';?>">
            <small class="notShow">Username is required</small>
            <small class = "notShow" id="name_duplicate">Username already exists</small>
            <!-- <script>showSucceed(document.querySelector("#username"))</script> -->
            <span></span>
        </div>
        <div class="form-control">
            <input id="email" type="email" name="email" class="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email']: '';?>">
            <small class="notShow">Email is required</small>
            <small class="notShow" id="email_duplicate">Email has been registered</small>
            <!-- <script>showSucceed(document.querySelector("#email"))</script> -->
            <span></span>
        </div>
        <div class="form-control">
            <input id="password" type="password" name="Password" class="Password" placeholder="Password" value="<?php echo isset($_POST['Password']) ? $_POST['Password']: '';?>">
            <small class="notShow">Password is required</small>
            <!-- <script>showSucceed(document.querySelector("#password"))</script> -->
            <span></span>
        </div>
        <div class="form-control">
            <input id="confirm-password" type="password" name="confirm-password" class="confirm-password" placeholder="Confirm password" value="<?php echo isset($_POST['confirm-password']) ? $_POST['confirm-password']: '';?>">
            <small class="notShow">Confirm password is required</small>
            <small class="notShow" id ="pass_error">Confirm password is not match</small>
            <!-- <script>showSucceed(document.querySelector("#confirm-password"))</script> -->
            <span></span>
        </div>
        <div class="form-control">
            <input id="tele" type="text" name="phoneNumber" class="phoneNumber" placeholder="Telephone" value="<?php echo isset($_POST['phoneNumber']) ? $_POST['phoneNumber']: '';?>">
            <small class="notShow">Telephone is required</small>
            <small class="notShow" id ="phoneInValid">Telephone is invalid</small>
            <!-- <script>showSucceed(document.querySelector("#phoneNumber"))</script> -->
            <span></span>
        </div>
        <div class="form-control">
            <input id="addr" type="text" name="addr" class="addr" placeholder="Address" value="<?php echo isset($_POST['addr']) ? $_POST['addr']: '';?>">
            <small class="notShow">Address is required</small>
            <!-- <script>showSucceed(document.querySelector("#addr"))</script> -->
            <span></span>
        </div>
        <button type="submit" name="submit" class="btn-submit">Register</button>
        <div class="signup-link">
            Already have an account? <a href="user_login.php"#>Sign in</a> now
        </div>
        </form>
    </div>
</body>
<?php
    $check = false;
    $username = @ $_POST['username'];
    $password = @ $_POST['Password'];
    $email = @ $_POST['email'];
    $Retype_password = @ $_POST['confirm-password'];
    $phoneNum = @ $_POST['phoneNumber'];
    $addr = @ $_POST['addr'];
    function checkLogin($connect, $username, $password, $Retype_password, $phoneNum, $addr, $email){
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
            if(empty($email)){
                echo"
                <script language='javascript'>
                    var username = document.querySelector(\"#email\");
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
            if(empty($Retype_password)){
                echo"
                <script language='javascript'>
                    var username = document.querySelector(\"#confirm-password\");
                    parent = username.parentElement;
                    small = parent.querySelector(\"small\");
                    small.style.display = \"block\";
                    parent.classList.add(\"error\");
                </script>
                ";
                return false;
            }
            if(empty($phoneNum)){
                echo"
                <script language='javascript'>
                    var username = document.querySelector(\"#phoneNumber\");
                    parent = username.parentElement;
                    small = parent.querySelector(\"small\");
                    small.style.display = \"block\";
                    parent.classList.add(\"error\");
                </script>
                ";
                return false;
            }
            if(empty($addr)){
                echo"
                <script language='javascript'>
                    var username = document.querySelector(\"#addr\");
                    parent = username.parentElement;
                    small = parent.querySelector(\"small\");
                    small.style.display = \"block\";
                    parent.classList.add(\"error\");
                </script>
                ";
                return false;
            }
            if(!empty($username) && !empty($password) && !empty($Retype_password) && !empty($email) && !empty($addr) && !empty($phoneNum)){
                $pg_cmd = "SELECT * FROM \"User\" WHERE \"Name\" LIKE $1;";
                pg_prepare($connect, "",$pg_cmd);
                if($pg_execute = pg_query_params($connect, $pg_cmd, array($username))){
                    $row = pg_num_rows($pg_execute);
                    if($row > 0){
                        echo"
                            <script language='javascript'>
                                var username = document.querySelector(\"#username\");
                                parent = username.parentElement;
                                small = parent.querySelector(\"#name_duplicate\");
                                small.style.display = \"block\";
                                parent.classList.add(\"error\");
                            </script>
                        ";
                        return false;
                    }
                    $pg_cmd = "SELECT * FROM \"User\" WHERE \"Email\" LIKE $1;";
                    pg_prepare($connect, "",$pg_cmd);
                    $pg_execute = pg_query_params($connect, $pg_cmd, array($email));
                    $row = pg_num_rows($pg_execute);
                    if($row > 0){
                        echo"
                            <script language='javascript'>
                                var username = document.querySelector(\"#email\");
                                parent = username.parentElement;
                                small = parent.querySelector(\"#email_duplicate\");
                                small.style.display = \"block\";
                                parent.classList.add(\"error\");
                            </script>
                        ";
                        return false;
                    }else{
                        if($password != $Retype_password){
                            echo"
                                <script language='javascript'>
                                    var username = document.querySelector(\"#confirm-password\");
                                    parent = username.parentElement;
                                    small = parent.querySelector(\"#pass_error\");
                                    small.style.display = \"block\";
                                    parent.classList.add(\"error\");
                                </script>
                            ";
                            return false;
                        }else if(!preg_match('/^[0-9]{10}$/', $phoneNum)){
                            echo"
                                <script language='javascript'>
                                    var username = document.querySelector(\"#phoneNumber\");
                                    parent = username.parentElement;
                                    small = parent.querySelector(\"#phoneInValid\");
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
    $check = checkLogin($connect, $username, $password, $Retype_password, $phoneNum, $addr, $email);
    if($check == true){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $pg_cmd = "INSERT INTO \"User\" (\"Email\", \"Password\", \"PhoneNum\", \"UserAddr\", \"Name\") VALUES($1, $2, $3, $4, $5);";
        pg_prepare($connect, "",$pg_cmd);
        $pg_execute = pg_query_params($connect, $pg_cmd, array($email, $password, $phoneNum, $addr, $username));
        header("location:logout.php");
    }
?>
</html>