<?php
    include 'header.php';
    include 'sidebar.php';
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
            <form action="" method="get" class="myForm">
                <table class="container" id = "mytable">
                    <thead>
                        <tr>
                            <th><h1>Category</h1></th>
                            <th><h1>Number of books</h1></th>
                            <th><h1>Choose row</h1></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once("../database/connect.php");
                            $pg_cmd = "SELECT DISTINCT \"Category\" FROM \"Library\"";
                            $pg_execute = pg_query($connect, $pg_cmd);
                            $i = 1;
                            while($row = pg_fetch_array($pg_execute)){
                                $catArrs = [];
                                $category = $row['Category'];
                                array_push($catArrs, $category);
                                echo "<tr id = \"$i\">";
                                echo "<td> " . $category . "</td>";

                                $pg_cmd2 = "SELECT * FROM \"Library\" WHERE \"Category\" = $1";
                                pg_prepare($connect, "", $pg_cmd2);
                                $pg_execute2 = pg_query_params($connect, $pg_cmd2, $catArrs);
                                echo "<td>" . pg_num_rows($pg_execute2) . "</td>";
                                echo "<td><input type=\"checkbox\" class=\"checkboxInput\" name=\"active\" value=\"" . $i . "\"></input></td>";
                                echo "</tr>";
                                $i++;
                            }
                        ?>
                    </tbody>
                </table>
                <label style="margin-top: 50px;">Input Category</label>
                <input type="text" id="newCate" name= "newCate" placeholder="Add new Category here"></input>
                <button align="center" type="button" name="add"  onclick="myFunction()">Add</button>
                <button align="center" type="button" name="remove"  onclick="">Remove </button>
            </form>
        </div>
    </div>
</body>

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
    include 'footer.php';
?>

</html>
