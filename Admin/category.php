<!-- add session please -->
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
        <div class="taskbar"><a href="index.php">Dashboard</a>&nbsp;/&nbsp;<a href="category.php">Category</a></div>
        <div class= "table">
            <div class= "tableLable"><i class="fa-solid fa-user-pen"></i>Category Setting</div>
            <!-- <form action="" method="get" class="myForm">
                <div style="display:inline-block; width:25%;"></div>
                <div style="display:inline-block; width:18%;">
                <label>Category</label>
                    <ul>
                        <?php
                            require_once("../database/connect.php");
                            $pg_cmd = "SELECT DISTINCT \"Category\" FROM \"Library\"";
                            $pg_execute = pg_query($connect, $pg_cmd);
                            $catArrs = [];
                            while($row = pg_fetch_array($pg_execute)){
                                $category = $row['Category'];
                                array_push($catArrs, $category);
                                echo "<li>" . $category . "</li>";
                            }
                            // var_dump($catArrs);
                        ?>
                    </ul>
                </div>
                <div style="display:inline-block; width:18%;">
                    <label>Number of books</label>
                    <ul>
                        <?php
                            $bookNum = [];
                            foreach($catArrs as $catArr) {
                                $pg_cmd = "SELECT * FROM \"Library\" WHERE \"Category\" = $1";
                                pg_prepare($connect, "", $pg_cmd);
                                $pg_execute = pg_query_params($connect, $pg_cmd, array($catArr));
                                echo "<li>" . pg_num_rows($pg_execute) . "</li>";
                            }
                        ?>
                    </ul>
                </div>
                <div style="display:inline-block; width:18%;">
                    <label>Option</label>
                    <ul>
                        <?php
                            for($i = 0; $i < count($catArrs); $i++) {
                                echo "<li><input type=\"checkbox\" class=\"checkboxInput\" name=\"option\" value=\"" . $i . "\">Choose</input></li>";
                            }
                        ?>
                    </ul>
                </div> -->
                <!-- <input type="text" name="LibName" placeholder="Tran Duy Hung Library" value="<?php echo isset($_GET['LibName']) ? $_GET['LibName']: '';?>"></input>
                <small class="noShow" id = "libNameNull">Library Name is required</small>
                <label>Address</label>
                <input type="text" name="LibAddr" placeholder="1 Tran Duy Hung, Ha Noi" value="<?php echo isset($_GET['LibAddr']) ? $_GET['LibAddr']: '';?>"></input>
                <small class="noShow" id = "libAddrNull">Library Address is required</small>
                <label>Contact Number</label>
                <input type="tel" name="LibPhoneNum"  placeholder="0123456789" value="<?php echo isset($_GET['LibPhoneNum']) ? $_GET['LibPhoneNum']: '';?>">
                <small class="noShow" id = "telNull">Contact Telephone Number is required</small>
                <label>Contact Email</label>
                <input type="email" name="LibEmail"  placeholder="abclibrary@gmail.com" value="<?php echo isset($_GET['LibEmail']) ? $_GET['LibEmail']: '';?>">
                <small class="noShow" id = "emailNull">Email is required</small>
                <button type="submit" name = "submit">Edit</button> -->
            </form>
            <form action="" method="get" class="myForm">
                <table class="container">
                    <thead>
                        <tr>
                            <th><h1>Category</h1></th>
                            <th><h1>Number of books</h1></th>
                            <th><h1>Active Option</h1></th>
                            <th><h1>Block Option</h1></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once("../database/connect.php");
                            $pg_cmd = "SELECT DISTINCT \"Category\" FROM \"Library\"";
                            $pg_execute = pg_query($connect, $pg_cmd);
                            // $catArrs = [];
                            $i = 0;
                            while($row = pg_fetch_array($pg_execute)){
                                $catArrs = [];
                                $category = $row['Category'];
                                array_push($catArrs, $category);
                                echo "<tr>";
                                echo "<td>" . $category . "</td>";

                                $pg_cmd2 = "SELECT * FROM \"Library\" WHERE \"Category\" = $1";
                                pg_prepare($connect, "", $pg_cmd2);
                                $pg_execute2 = pg_query_params($connect, $pg_cmd2, $catArrs);
                                echo "<td>" . pg_num_rows($pg_execute2) . "</td>";
                                // echo "<td>Hello</td>";

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
