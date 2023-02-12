<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/1147679ae7.js"crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/product.css">
        <title>Online LIBRARY</title>
    </head>

    <body>
        <?php 
            include '../HomePage/header.php';
            include '../database/connect.php';
            $id = @ $_GET['book'];
            $book_name = @ $_GET['bookname'];
            if(!empty($_GET['bookname'])){
                $book_name = '%';
            }
            if(empty($_GET['book'])){
                $pg_cmd = "SELECT * FROM \"Library\" WHERE \"BookName\" LIKE '$book_name'";
                echo $pg_cmd;
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
    <form action="" method="get">
        <h2>Comment</h2>
        <div class="comment_row">
            <div class="avatar">
                <img src="../src/img/avatar.png" alt="">
            </div>
            <div class="user_name_div">
                <p class="user_name">User1</p> <p class="time">12:25:55 12/2/2023</p>
            </div>
            <p class="com-str">Sách hay</p>
        </div>
        <div class="comment_row">
            <div class="avatar">
                <img src="../src/img/avatar.png" alt="">
            </div>
            <div class="user_name_div">
                <p class="user_name">User1</p> <p class="time">12:25:55 12/2/2023</p>
            </div>
            <p class="com-str">Sách hay</p>
        </div>
        <div class="comment_row">
            <div class="avatar">
                <img src="../src/img/avatar.png" alt="">
            </div>
            <div class="user_name_div">
                <p class="user_name">User1</p> <p class="time">12:25:55 12/2/2023</p>
            </div>
            <p class="com-str">Sách hay</p>
        </div>

        <div class="UserComment">
            <p class="user_name">You</p>
            <input type="text" name="userInput" placeholder="Đánh giá của bạn">
            <button type="submit">Gửi</button>
        </div>
    </form>
</div>
<!----------------------------- footer ----------------------------------->
<div style="width: 100%; float:left;">
    <?php
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

