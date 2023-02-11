<!-- add session please -->
<?php
    include 'header.php';
    include 'sidebar.php';
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
            <form action="" method="get" class="myForm">
                <table class="container">
                    <thead>
                        <tr>
                            <th><h1>Book ID</h1></th>
                            <th><h1>Book Name</h1></th>
                            <th><h1>Category</h1></th>
                            <th><h1>Version</h1></th>
                            <th><h1>Author</h1></th>
                            <th><h1>Public Date</h1></th>
                            <th><h1>Public Company</h1></th>
                            <th><h1>Book Status</h1></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            require_once("../database/connect.php");
                            while($i < 8) {
                                $pg_cmd = "SELECT * FROM \"Library\" WHERE \"Book_ID\" = " . $i;
                                $pg_execute = pg_query($connect, $pg_cmd);
                                $row = pg_fetch_array($pg_execute);

                                $book_id = @ $row['Book_ID'];
                                $bookName = @ $row['BookName'];
                                $category = @ $row['Category'];
                                $version = @ $row['Version'];
                                $author = @ $row['Author'];
                                $public_date = @ $row['Public_Date'];
                                $public_company = @ $row['Public_Company'];
                                $book_status = @ $row['Book_Status'];

                                echo "<tr>";

                                echo "<td>" . $book_id . "</td>";
                                echo "<td>" . $bookName . "</td>";
                                echo "<td>" . $category . "</td>";
                                echo "<td>" . $version . "</td>";
                                echo "<td>" . $author . "</td>";
                                echo "<td>" . $public_date . "</td>";
                                echo "<td>" . $public_company . "</td>";
                                echo "<td>" . $book_status . "</td>";

                                echo "</tr>";
                                $i++;
                            }
                            
                        ?>
                        
                    </tbody>
                </table>
                <button align="center" type="submit" name="submit">Add</button>
                <!-- If table print too long when press "Add" button -> fix .table in book.css -->
            </form>
        </div>
    </div>
</body>
</html>

<?php
    // include '../database/connect.php';
    // require_once("../database/connect.php");
    // $libName = @ $_GET['LibName'];
    // $libAddr = @ $_GET['LibAddr'];
    // $libPhoneNum = @ $_GET['LibPhoneNum'];
    // $libEmail = @ $_GET['LibEmail'];

    // function check($libName, $libAddr, $libPhoneNum, $libEmail) {
    //     echo "Helllloooo";
    //     if(empty($libName)){
    //         echo "hiiiiii2";
    //         echo"
    //         <script language='javascript'>
    //             small = document.querySelector(\"#libNameNull\");
    //             small.style.display = \"block\";
    //         </script>
    //         ";
    //         return false;
    //     }
    //     if(empty($libAddr)){
    //         echo "hiiiiii3";
    //         echo"
    //         <script language='javascript'>
    //             small = document.querySelector(\"#libAddrNull\");
    //             small.style.display = \"block\";
    //         </script>
    //         ";
    //         return false;
    //     }
    //     if(empty($libPhoneNum)){
    //         echo "hiiiiii4";
    //         echo"
    //         <script language='javascript'>
    //             small = document.querySelector(\"#telNull\");
    //             small.style.display = \"block\";
    //         </script>
    //         ";
    //         return false;
    //     }
    //     if(empty($libEmail)){
    //         echo "hiiiiii5";
    //         echo"
    //         <script language='javascript'>
    //             small = document.querySelector(\"#emailNull\");
    //             small.style.display = \"block\";
    //         </script>
    //         ";
    //         return false;
    //     }
    //     else{
    //         return true;
    //     }
    // }
    // if(isset($_GET['submit']))
    //     check($libName, $libAddr, $libPhoneNum, $libEmail);
    if(isset($_GET['name']) && $_GET['name'] == "option") {
        if(isset($_GET["option0"])) {echo "Hello0";}
        elseif(isset($_GET["option1"])) {echo "Hello1";}
        elseif(isset($_GET["option" . $i])) {echo "Hello2";}
    }

    include 'footer.php';
?>
