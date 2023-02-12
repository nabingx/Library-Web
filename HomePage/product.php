
<html>
    <link rel="stylesheet" href="/css/product.css">
    <body>
        <?php 
            include '../HomePage/header.php';
            include '../database/connect.php';
            $id = @ $_GET['book'];
            if(empty($_SESSION['id']) && !empty($id)){
                $_SESSION['id'] = $id;
            }
            if(!empty($_SESSION['id'])){
                $id = $_SESSION['id'];
            }
            
            $email = @ $_SESSION['email'];
            $comment = @ $_GET['userInput'];
            $book_name = @ $_GET['bookname'];
            if(!empty($comment) && !empty($email)){
                $pg_cmd = "SELECT * FROM \"User\" WHERE \"Email\" LIKE '" . $email . "'";
                $pg_execute = pg_query($connect, $pg_cmd);
                $row4 = pg_fetch_array($pg_execute);
                $pg_cmd = "INSERT INTO \"Comment\" (\"User_ID\", \"Book_ID\", \"Comment\") VALUES($1, $2, $3)";
                pg_prepare($connect, "", $pg_cmd);
                if(empty($id)){
                    $pg_cmd = "SELECT * FROM \"Linrary\" WHERE \"BookName\" LIKE '" . $book_name . "'";
                    $pg_execute = pg_query($connect, $pg_cmd);
                    $row5 = pg_fetch_array($pg_execute);
                    $id = $row5['Book_ID'];
                    $_SESSION['id'] = $id;
                }
                pg_query_params($connect, $pg_cmd, array($row4['User_ID'], $id, $comment));
            }

            if(empty($_GET['bookname'])){
                $book_name = '%';
            }else{
                $id = 0;
            }
            if(empty($id)){
                $pg_cmd = "SELECT * FROM \"Library\" WHERE \"BookName\" LIKE '$book_name'";
            }else{
                $pg_cmd = "SELECT * FROM \"Library\" WHERE \"Book_ID\" = $id";
                echo $pg_cmd;
            }
            $pg_execute = pg_query($connect, $pg_cmd);
            $row = pg_fetch_array($pg_execute);
        ?>
<div class="content">
    <div class="product-image">
        <img src= <?php echo "../src/img/" . $row['Book_ID'] . ".jpg" ?> alt="">
    </div>
    <div class="information">
        <div class="upper">
            <h1><?php echo $row['BookName'] ?></h1>
            <br>
            <h2>by <?php echo $row['Author'] ?></h2>
            <hr>
            <br>
            <div class="upper_left">
                <p>Version <?php echo $row['Version'] ?></p>
                <p>Số lượng: 10 quyển</p>
                <p>Thể loại: <?php echo $row['Category'] ?></p>
                <p>Ngôn ngữ: Tiếng Anh</p>
            </div>
            <div class="upper_right">
                <button type="button">Borrow</button>
            </div>
            
        </div>
        <hr>
        <div class="bottom">
            <h2>Overview</h2>
           <img src= <?php echo "../src/img/anh_" . $row['Book_ID'] . ".jpg" ?> alt="">
        </div>
    </div>

</div>
<div class="comment">
        <h2>Comment</h2>
        <?php 
            $pg_cmd = "SELECT * FROM \"Comment\" WHERE \"Book_ID\" = " . $row['Book_ID'];
            $pg_execute = pg_query($connect, $pg_cmd);  
            while($row2 = pg_fetch_array($pg_execute)){
                $pg_cmd = "SELECT *FROM \"User\" WHERE \"User_ID\" = " . $row2['User_ID'];
                $pg_execute2 = pg_query($connect, $pg_cmd);
                $row3 = pg_fetch_array($pg_execute2);
                echo "
                    <div class=\"comment_row\">
                        <div class=\"avatar\">
                            <img src=\"../src/img/avatar.png\" alt=\"\">
                        </div>
                        <div class=\"user_name_div\">
                            <p class=\"user_name\">". $row3['Name'] ."</p> <p class=\"time\">12:25:55 12/2/2023</p>
                        </div>
                        <p class=\"com-str\">". $row2['Comment'] ."</p>
                    </div>
                ";
            }
        ?>
        <form action="" method="get">
            <div class="UserComment" id = "UserComment">
                <p class="user_name">You</p>
                <input type="text" name="userInput" id="input-comment" placeholder="Đánh giá của bạn">
                <?php 
                    if(isset($_GET['userInput'])) $comment = $_GET['userInput'];
                ?>
                <button type="submit" name = "submit">Gửi</button>
            </div>
            <div id="error1"></div>
            <ul id="suggestions1"></ul>
            <script>
                const inp1 = document.getElementById('input-comment');
                const listBox1 = document.getElementById('suggestions1');
                const errorBox1 = document.getElementById('suggestions1');
                function setSuggestions1(s) {
                    listBox1.innerHTML = s.map(si => `<li>${si}</li>`).join('');
                }
                inp1.addEventListener('input', () => {
                    const value = inp1.value.trim();
                    if (value == '') return setSuggestions1([]);
                    const xhr1 = new XMLHttpRequest();
                    xhr1.onload = () => {
                        const ret1 = JSON.parse(xhr1.response);
                        console.log(ret1);
                        setSuggestions1(ret1.suggestions);
                    }
                    xhr1.onerror = (err) => {
                        errorBox1.innerText = err;
                    }
                    xhr1.open('GET', '../Controller/get-comments.json.php?value=' + encodeURIComponent(value), true);
                    xhr1.send();
                })
                listBox1.addEventListener('click', event => {
                    const value = event.target.innerText;
                    inp1.value = value;
                })
            </script>
            <div class="sign_in" id = "sign-in">
                <p><a href="../user_login.php">Đăng nhập</  a> để bình luận sản phẩm!</p>
            </div>
        </form>
</div>
<!----------------------------- footer ----------------------------------->
<div style="width: 100%; float:left;">
    <?php
        if(empty($_SESSION['email'])){
            echo "
                <script language='javascript'>
                    var ul = document.querySelector(\"#UserComment\");
                    ul.style.display = \"none\";
                    var ul = document.querySelector(\"#sign-in\");
                    ul.style.display = \"block\";
                </script>
            ";
        }else{
            echo "
                <script language='javascript'>
                    var ul = document.querySelector(\"#sign-in\");
                    ul.style.display = \"none\";
                    var ul = document.querySelector(\"#UserComment\");
                    ul.style.display = \"block\";
                </script>
            ";
        }
        include "../HomePage/footer.php";
    ?>
</div>
</body>
<!------------------------------ Java Script ------------------------------>
<script>
    const header = document.querySelector("header")
    window.addEventListener("scroll",function()
    {
        x = window.pageYOffset
        if(x>0)
        {
            header.classList.add("sticky")
        }
        else{
            header.classList.remove("sticky")
        }
    })
</script>
</html>
    </body>
</html>

