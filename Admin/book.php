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
    <div class = "bookMother_div">
        <div>
            <h1>Book</h1>
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
                                $row_count = pg_num_rows($pg_execute);
                                $per_page_record = 5;
                                $max_page = (int)($row_count / $per_page_record) + 1;

                                if (!isset ($_GET['page'])) {
                                    $page = 1;
                                }else{
                                    $page = (int)$_GET['page'];
                                }
                                $start_from = ($page-1) * $per_page_record;
                                if($start_from < 0){
                                    $start_from = 0;
                                }
                                $pg_cmd = "SELECT * FROM \"Library\" LIMIT " . $per_page_record . " OFFSET ". $start_from;
                                $pg_execute = pg_query($connect, $pg_cmd);

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
                <p class="page_foot" style="text-align: center;"> 
                    <?php 
                        echo "
                            <a href=\"book.php?page=1\">
                            Trang đầu
                            </a>
                            <a href=\"book.php?page="; 
                            if($page == 1){
                                echo $page;
                            }else{
                                echo ($page - 1);
                            }
                            echo "\">
                            Trước
                            </a>
                            <span style = \"border-style: none\"> ". $page ."</span>
                            <a href=\"book.php?page=";
                            if($page == $max_page){
                                echo $page;
                            }else{
                                echo ($page + 1);
                            }
                            echo "\">
                            Sau
                            </a>
                            <a href=\"book.php?page=" . $max_page . "\">
                            Trang cuối
                            </a>
                        ";
                    ?>
                </p>
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
