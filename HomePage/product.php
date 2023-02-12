
<html>
    <link rel="stylesheet" href="/css/product.css">
    <body>
        <?php 
            session_start();
            include '../HomePage/header.php';
            include '../database/connect.php';
            $id = @ $_GET['book'];
            $book_name = @ $_GET['bookname'];
            if(empty($id) && !empty($book_name)){
                $_SESSION['bookname'] = $book_name;
            }else if(!empty($id) && empty($book_name)){
                $_SESSION['id'] = $id;
            }else{
                $book_name = "%";
            } 

            $email = @ $_SESSION['email'];
            $comment = @ $_GET['userInput'];
            

            if(!empty($comment) && !empty($email)){
                $pg_cmd = "SELECT * FROM \"User\" WHERE \"Email\" LIKE '" . $email . "'";
                $pg_execute = pg_query($connect, $pg_cmd);
                $row4 = pg_fetch_array($pg_execute);
                $pg_cmd = "INSERT INTO \"Comment\" (\"User_ID\", \"Book_ID\", \"Comment\") VALUES($1, $2, $3)";
                pg_prepare($connect, "", $pg_cmd);
                if(empty($id)){
                    // if(empty($book_name))
                    //     $book_name = $_SESSION['bookname'];
                    // $pg_cmd = "SELECT * FROM \"Library\" WHERE \"BookName\" LIKE '" . $book_name . "'";
                    // $pg_execute = pg_query($connect, $pg_cmd);
                    
                    // $row5 = pg_fetch_array($pg_execute);
                    // $id = $row5['Book_ID'];
                    // $_SESSION['id'] = $id;
                    $id = $_SESSION['id'];
                }
                
                pg_query_params($connect, $pg_cmd, array($row4['User_ID'], $id, $comment));
            }
            
            if(empty($id)){
                $pg_cmd = "SELECT * FROM \"Library\" WHERE \"BookName\" LIKE '$book_name'";
                
            }else{
                $pg_cmd = "SELECT * FROM \"Library\" WHERE \"Book_ID\" = $id";
                
            }
            $pg_execute = pg_query($connect, $pg_cmd);
            $row = pg_fetch_array($pg_execute);
            $check = pg_num_rows($pg_execute);
        ?>
<div class="content" id = "content">
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
                <p>Ngôn ngữ: Tiếng Việt</p>
            </div>
            <div class="upper_right">
                    <a href="
                    <?php 
                        $pg_cmd = "SELECT * FROM \"User\" WHERE \"Email\" LIKE '". $email ."'";
                        $pg_execute = pg_query($connect, $pg_cmd);
                        $row2 = pg_fetch_array($pg_execute);
                        if($row2 == false){
                            echo "../user_login.php";
                        }else{
                            echo "../Controller/borrow_book.php?book_id=" . $row['Book_ID'] . "&user_id=" . $row2['User_ID'];
                        }
                        
                    ?>"
                    ><button type="button">Borrow</button></a>
            </div>
            
        </div>
        <hr>
        <div class="bottom">
            <h2>Overview</h2>
           <img src= <?php echo "../src/img/anh_" . $row['Book_ID'] . ".jpg" ?> alt="">
        </div>
    </div>
</div>
<div class="comment" id = "comment">
        <?php
            if($check == 0){
                echo "
                    <script language='javascript'>
                        var ul = document.querySelector(\"#content\");
                        ul.style.display = \"none\";
                        var ul = document.querySelector(\"#comment\");
                        ul.style.display = \"none\";
                        
                    </script>
                ";
            }
        ?>
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
                <input type="text" id = "input-comment" name="userInput" placeholder="Đánh giá của bạn">
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
                        
                        listBox1.innerHTML = s.map(si => `<li>${si}</li><hr>`).join('');
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
                </script>
            <div class="sign_in" id = "sign-in">
                <p><a href="../user_login.php">Đăng nhập</a> để bình luận sản phẩm!</p>
            </div>
        </form>


</div>
<!----------------------------- footer ----------------------------------->
<div style="width: 100%; float:left; display:block">
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

