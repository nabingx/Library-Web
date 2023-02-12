<?php
    session_start();
    if(empty($_SESSION['username']) && empty($_SESSION['password'])){
        header("location:user_login.php");
    }
?>