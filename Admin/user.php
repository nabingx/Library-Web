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
            <h1>User</h1>
        </div>
        <div class="taskbar"><a href="index.php">Dashboard</a>&nbsp;/&nbsp;<a href="setting.php">Category</a></div>
        <div class= "table">
            <div class= "tableLable"><i class="fa-solid fa-user-pen"></i>Category Setting</div>
                <table class="container" id = "mytable">
                    <thead>
                        <tr>
                            <th><h1>STT</h1></th>
                            <th><h1>Name</h1></th>
                            <th><h1>Email</h1></th>
                            <th><h1>Phone Number</h1></th>
                            <th><h1>Address</h1></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                require_once("../database/connect.php");
                                $pg_cmd = "SELECT * FROM \"User\" ";
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
                                    echo "<td> " . $Book[$i]['Name'] . "</td>";
                                    echo "<td> " . $Book[$i]['Email'] . "</td>";
                                    echo "<td> " . $Book[$i]['PhoneNum'] . "</td>";
                                    echo "<td> " . $Book[$i]['UserAddr'] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                    </tbody>
                </table>
        </div>
    </div>
</body>

<?php
    include 'footer.php';
?>

</html>

