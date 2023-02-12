<?php
    include 'header.php';
    include 'sidebar.php';
?>
<<<<<<< HEAD
=======

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

>>>>>>> ngocanh-4
<html>
<head>
    <link rel="stylesheet" href="Css/category.css">
</head>
<body>
    <div class = "cateMother_div">
<<<<<<< HEAD
        <div>
            <h1>Profile</h1>
=======
        <div class="title">
            <h1>Category</h1>
>>>>>>> ngocanh-4
        </div>
        <div class="taskbar"><a href="index.php">Dashboard</a>&nbsp;/&nbsp;<a href="setting.php">Category</a></div>
        <div class= "table">
            <div class= "tableLable"><i class="fa-solid fa-user-pen"></i>Category Setting</div>
<<<<<<< HEAD
            <form action="" method="get" class="myForm">
                <table class="container" id = "mytable">
                    <thead>
                        <tr>
                            <th><h1>Category</h1></th>
                            <th><h1>Number of books</h1></th>
                            <th><h1>Choose row</h1></th>
=======
                <table class="container" id = "mytable">
                    <thead>
                        <tr>
                            <th><h1>STT</h1></th>
                            <th><h1>Category</h1></th>
                            <th><h1>Number of books</h1></th>
                            <th><h1>Enable</h1></th>
                            <th><h1>Disable</h1></th>
>>>>>>> ngocanh-4
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once("../database/connect.php");
<<<<<<< HEAD
                            $pg_cmd = "SELECT DISTINCT \"Category\" FROM \"Library\"";
=======
                            $pg_cmd = "SELECT * FROM \"Category\"";
>>>>>>> ngocanh-4
                            $pg_execute = pg_query($connect, $pg_cmd);
                            $i = 1;
                            while($row = pg_fetch_array($pg_execute)){
                                $catArrs = [];
<<<<<<< HEAD
                                $category = $row['Category'];
                                array_push($catArrs, $category);
                                echo "<tr id = \"$i\">";
=======
                                $category = $row['Category_Name'];
                                array_push($catArrs, $category);
                                echo "<tr id = \"$i\">";
                                echo "<td>" .$i. "</td>";
>>>>>>> ngocanh-4
                                echo "<td> " . $category . "</td>";

                                $pg_cmd2 = "SELECT * FROM \"Library\" WHERE \"Category\" = $1";
                                pg_prepare($connect, "", $pg_cmd2);
                                $pg_execute2 = pg_query_params($connect, $pg_cmd2, $catArrs);
                                echo "<td>" . pg_num_rows($pg_execute2) . "</td>";
<<<<<<< HEAD
                                echo "<td><input type=\"checkbox\" class=\"checkboxInput\" name=\"active\" value=\"" . $i . "\"></input></td>";
=======
                                echo '<td> <a href="?enable_id='.$category.'"> <button class="btn btn-warning" style="width: 100px; font-size: 20px;"> Enable</button></a> </td>';
                                echo '<td> <a href="?cancel_id='.$category.'"> <button class="btn btn-warning" style="width: 100px; font-size: 20px;"> Disable</button></a> </td>';
>>>>>>> ngocanh-4
                                echo "</tr>";
                                $i++;
                            }
                        ?>
                    </tbody>
                </table>
<<<<<<< HEAD
                <label style="margin-top: 50px;">Input Category</label>
                <input type="text" id="newCate" name= "newCate" placeholder="Add new Category here"></input>
                <button align="center" type="button" name="add"  onclick="myFunction()">Add</button>
                <button align="center" type="button" name="remove"  onclick="">Remove </button>
            </form>
=======
                <form class = myForm method="post" action="Controller/cate_control.php">
                <label style="margin-top: 50px;">Input Category</label>
                <input id="name" type="text" name="name" class="name" placeholder="Category Name" >
                <button type="submit" style="width: 150px; height : 75px ;font-size: 20px;" name="submit" class="btn-submit">Add Category</button>
                
                </form>
>>>>>>> ngocanh-4
        </div>
    </div>
</body>

<<<<<<< HEAD
<script>
    function myFunction(){
        var table = document.getElementById("mytable");
        var rowCount = table.rows.length;
        var input = document.getElementById("newCate");
        var row = table.insertRow(rowCount);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        cell1.innerHTML = input.value;
        cell2.innerHTML = "0";
        cell3.innerHTML = "<td><input type=\"checkbox\" class=\"checkboxInput\" name=\"active\" ><?php $new = @ $_GET['newCate']; array_push($catArrs, $new);?></input></td>";
        <?php 
                
        ?>
    }
</script>

<?php
    // foreach ($catArrs as $value) {
    //     echo "<script>  

    //         </script>
    //     ";
    // }
=======
<?php
>>>>>>> ngocanh-4
    include 'footer.php';
?>

</html>

