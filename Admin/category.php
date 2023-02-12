<?php
    include 'header.php';
    include 'sidebar.php';
?>

<?php
	include_once('help.php');
	require_once("../database/connect.php");

	if(isset($_GET['cancel_id'])){
		$cancel_id = $_GET['cancel_id'];
		$sql = "update \"Library\" SET \"Book_Status\" = 'false' where \"Category\" ='$cancel_id'";
		execute($sql);
	}

    if(isset($_GET['enable_id'])){
		$enable_id = $_GET['enable_id'];
		$sql = "update \"Library\" SET \"Book_Status\" = 'true' where \"Author\" ='$enable_id'";
		execute($sql);
	}
?>

<html>
<head>
    <link rel="stylesheet" href="Css/category.css">
</head>
<body>
    <div class = "cateMother_div">
        <div>
            <h1>Profile</h1>
        </div>
        <div class="taskbar"><a href="index.php">Dashboard</a>&nbsp;/&nbsp;<a href="setting.php">Category</a></div>
        <div class= "table">
            <div class= "tableLable"><i class="fa-solid fa-user-pen"></i>Category Setting</div>
                <table class="container" id = "mytable">
                    <thead>
                        <tr>
                            <th><h1>STT</h1></th>
                            <th><h1>Category</h1></th>
                            <th><h1>Number of books</h1></th>
                            <th><h1>Enable</h1></th>
                            <th><h1>Disable</h1></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once("../database/connect.php");
                            $pg_cmd = "SELECT * FROM \"Category\"";
                            $pg_execute = pg_query($connect, $pg_cmd);
                            $i = 1;
                            while($row = pg_fetch_array($pg_execute)){
                                $catArrs = [];
                                $category = $row['Category_Name'];
                                array_push($catArrs, $category);
                                echo "<tr id = \"$i\">";
                                echo "<td>" .$i. "</td>";
                                echo "<td> " . $category . "</td>";

                                $pg_cmd2 = "SELECT * FROM \"Library\" WHERE \"Category\" = $1";
                                pg_prepare($connect, "", $pg_cmd2);
                                $pg_execute2 = pg_query_params($connect, $pg_cmd2, $catArrs);
                                echo "<td>" . pg_num_rows($pg_execute2) . "</td>";
                                echo '<td> <a href="?enable_id='.$category.'"> <button class="btn btn-warning" style="width: 100px; font-size: 20px;"> Enable</button></a> </td>';
                                echo '<td> <a href="?cancel_id='.$category.'"> <button class="btn btn-warning" style="width: 100px; font-size: 20px;"> Disable</button></a> </td>';
                                echo "</tr>";
                                $i++;
                            }
                        ?>
                    </tbody>
                </table>
                <form class = myForm method="post" action="Controller/cate_control.php">
                <label style="margin-top: 50px;">Input Category</label>
                <input id="name" type="text" name="name" class="name" placeholder="Category Name" >
                <button type="submit" style="width: 150px; height : 75px ;font-size: 20px;" name="submit" class="btn-submit">Add Category</button>
                
                </form>
        </div>
    </div>
</body>

<?php
    include 'footer.php';
?>

</html>

