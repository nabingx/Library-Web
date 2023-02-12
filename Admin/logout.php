<?php
   session_start();
   session_destroy();
   header('Refresh: 0; URL = admin_login.php');
?>