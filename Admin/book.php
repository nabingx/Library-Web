<!-- add session please -->
<?php
    include 'header.php';
    include 'sidebar.php';
?>

<?php
	include_once('help.php');
	require_once("../database/connect.php");

	if(isset($_GET['cancel_id'])){
		$cancel_id = $_GET['cancel_id'];
		$sql = "update \"Library\" SET \"Book_Status\" = 'false' where \"BookName\" ='$cancel_id'";
		execute($sql);
	}

    if(isset($_GET['enable_id'])){
		$enable_id = $_GET['enable_id'];
		$sql = "update \"Library\" SET \"Book_Status\" = 'true' where \"BookName\" ='$enable_id'";
		execute($sql);
	}
?>
<html>
<head>
    <link rel="stylesheet" href="Css/book.css">
</head>
<body>
    <div class = "cateMother_div">
        <div>
            <h1>Profile</h1>
        </div>
        <div class="taskbar"><a href="index.php">Dashboard</a>&nbsp;/&nbsp;<a href="book.php">Book</a></div>
        <div class= "table">
            <div class= "tableLable"><i class="fa-solid fa-user-pen"></i>Book Setting</div>
                <table class="container">
                    <thead>
                        <tr>
                            <th><h1>Book ID</h1></th>
                            <th><h1>Book Name</h1></th>
                            <th><h1>Category</h1></th>
                            <th><h1>Version</h1></th>
                            <th><h1>Author</h1></th>
                            <th><h1>Public Company</h1></th>
                            <th><h1>Book Status</h1></th>
                            <th><h1>Enable</h1></th>
                            <th><h1>Disable</h1></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                require_once("../database/connect.php");
                                $pg_cmd = "SELECT * FROM \"Library\" ";
                                $pg_execute = pg_query($connect, $pg_cmd);
                                $i = 0;
                                $Book = array();
                                $status ='';
                                while($row = pg_fetch_array($pg_execute)){
                                    $Book[] = $row;
                                }
                                for($i = 0; $i < count($Book); $i++){
                                    echo "<tr id = \"$i\">";
                                    echo "<td>" .($i + 1). "</td>";
                                    echo "<td> " . $Book[$i]['BookName'] . "</td>";
                                    echo "<td> " . $Book[$i]['Category'] . "</td>";
                                    echo "<td> " . $Book[$i]['Version'] . "</td>";
                                    echo "<td> " . $Book[$i]['Author'] . "</td>";
                                    echo "<td> " . $Book[$i]['Public_Company'] . "</td>";
                                    if ($Book[$i]['Book_Status'] == 't') {
                                        $status = 'enable';
                                    }else{
                                        $status = 'disable';
                                    }
                                    echo "<td> " . $status . "</td>";
                                    echo '<td> <a href="?enable_id='. $Book[$i]['BookName'] .'"> <button class="btn btn-warning" style="width: 75px; font-size: 16px;"> Enable</button></a> </td>';
                                    echo '<td> <a href="?cancel_id='. $Book[$i]['BookName'] .'"> <button class="btn btn-warning" style="width: 75px; font-size: 16px;"> Disable</button></a> </td>';
                                    echo "</tr>";
                                }
                            ?>
                        
                    </tbody>
                </table>
                <form class = myForm action="add_book.php">
                        <button align="center" name="submit">Add Book</button>
                </form>
                <!-- If table print too long when press "Add" button -> fix .table in book.css -->
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_GET['name']) && $_GET['name'] == "option") {
        if(isset($_GET["option0"])) {echo "Hello0";}
        elseif(isset($_GET["option1"])) {echo "Hello1";}
        elseif(isset($_GET["option" . $i])) {echo "Hello2";}
    }

    include 'footer.php';
?>
