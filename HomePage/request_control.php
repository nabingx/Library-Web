<?php
    include '../database/connect.php';
    session_start();
?>
<?php
    $check = false;
    $username = @ $_POST['username'];
    $email = @ $_POST['email'];
    $content = @ $_POST['content'];
    function checkLogin(){
        if(isset($_POST['submit'])) {
            return true;
        }
        return false;
    }
    $result = array();
    $count = array();
    $check = checkLogin();
    if($check == true){
        $pg_cmd_1 = "SELECT * FROM \"User\" WHERE \"Email\" = '$email';";
        $pg_execute_1 = pg_query($connect, $pg_cmd_1);
        while ( $row = pg_fetch_array($pg_execute_1)){
            $result[]= $row;
        }
        $id_user = $result[0]['User_ID'];
        $pg_cmd = "INSERT INTO \"Request\" (\"User_ID\", \"Content\", \"status\") VALUES('$id_user', '$content', 'wait');";
        $pg_execute = pg_query($connect, $pg_cmd);
    }                
     header("location:request.php");            
?>