<?php
    include '../../database/connect.php';
    session_start();
?>
<?php
    $check = false;
    $name = @ $_POST['name'];
    echo $name;
    function checkLogin(){
        if(isset($_POST['submit'])) {
            return true;
        }
        return false;
    }
    $check = checkLogin();
    if($check == true){
        $pg_cmd = "INSERT INTO \"Category\" (\"Category_Name\") VALUES('$name');";
        $pg_execute = pg_query($connect, $pg_cmd);
    }                
    header("location:../category.php");            
?>