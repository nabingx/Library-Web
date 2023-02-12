<?php
   session_start();
   session_destroy();
   echo "Succeed";
   header('Refresh: 2; URL = user_login.php');
?>