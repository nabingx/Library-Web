<!-- add session please -->
<?php
    include 'header.php';
    include 'sidebar.php';
?>
<html>
<head>
    <link rel="stylesheet" href="Css/author.css">
</head>
<body>
    <div class = "cateMother_div">
        <div>
            <h1>Profile</h1>
        </div>
        <div class="taskbar"><a href="index.php">Dashboard</a>&nbsp;/&nbsp;<a href="author.php">Author</a></div>
        <div class= "table">
            <div class= "tableLable"><i class="fa-solid fa-user-pen"></i>Author Setting</div>
            <form action="" method="get" class="myForm">
                <table class="container">
                    <thead>
                        <tr>
                            <th><h1>Author</h1></th>
                            <th><h1>Number of books</h1></th>
                            <th><h1>Active Option</h1></th>
                            <th><h1>Block Option</h1></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once("../database/connect.php");
                            $pg_cmd = "SELECT DISTINCT \"Author\" FROM \"Library\"";
                            $pg_execute = pg_query($connect, $pg_cmd);
                            $i = 0;
                            while($row = pg_fetch_array($pg_execute)){
                                $catArrs = [];
                                $category = $row['Author'];
                                array_push($catArrs, $category);
                                echo "<tr>";
                                echo "<td>" . $category . "</td>";

                                $pg_cmd2 = "SELECT * FROM \"Library\" WHERE \"Author\" = $1";
                                pg_prepare($connect, "", $pg_cmd2);
                                $pg_execute2 = pg_query_params($connect, $pg_cmd2, $catArrs);
                                echo "<td>" . pg_num_rows($pg_execute2) . "</td>";

                                echo "<td><input type=\"checkbox\" class=\"checkboxInput\" name=\"active\" value=\""
                                                                                        . $i . "\">Active</input></td>";
                                echo "<td><input type=\"checkbox\" class=\"checkboxInput\" name=\"block\" value=\""
                                                                                        . $i . "\">Block</input></td>";
                                echo "</tr>";
                                $i++;
                            }
                        ?>
                        
                    </tbody>
                </table>
                <button align="center" type="submit" name="submit">Add</button>
            </form>
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
