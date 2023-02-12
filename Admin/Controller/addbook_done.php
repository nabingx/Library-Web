<?php
    include '../../database/connect.php';
    session_start();
?>
<?php
    $check = false;
    $username = @ $_POST['username'];
    $password = @ $_POST['Password'];
    $email = @ $_POST['email'];
    $phoneNum = @ $_POST['phoneNumber'];
    $addr =  @ $_POST['addr'];
    function checkLogin($connect, $username, $password, $phoneNum, $addr, $email){
        if(isset($_POST['submit'])) {
            return true;
        }
        return false;
    }
    $check = checkLogin($connect, $username, $password, $phoneNum, $addr, $email);
    if($check == true){
        $pg_cmd = "INSERT INTO \"Library\" (\"Author\", \"BookName\", \"Category\", \"Version\", \"Public_Company\", \"Book_Status\") VALUES($1, $2, $3, $4, $5, 'true');";
        pg_prepare($connect, "",$pg_cmd);
        $pg_execute = pg_query_params($connect, $pg_cmd, array($username, $password, $email, $phoneNum, $addr));
    }
    header("location:../book.php");
?>