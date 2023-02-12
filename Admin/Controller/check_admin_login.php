<?php
    if(empty($_SESSION['username']) && empty($_SESSION['password'])){
        header("location:admin_login.php");
    }
?>