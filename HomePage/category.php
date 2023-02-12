<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
            <script src="https://kit.fontawesome.com/1147679ae7.js"crossorigin="anonymous"></script>
            
            <link rel="stylesheet" href="/css/style.css">
            <link rel="stylesheet" href="/css/category.css">
            <title>Online Library</title>
        </head>
<?php
    include "../database/connect.php";
    include "../HomePage/header.php";

    $pg_cmd = "SELECT * FROM \"Library\"";
    $pg_execute = pg_query($connect, $pg_cmd);
    $row_count = pg_num_rows($pg_execute);
    $per_page_record = 12;
    $max_page = $row_count / $per_page_record + 1;
    
    
    
    if(!isset($_GET['sort'])){
        if(empty($sort)){
            $sort  = "BookName";
        }
    }else{
        $sort = $_GET['sort'];
    }
    if(!isset($_GET['cate'])){
        if(empty($cate)){
            $cate  = "%";
        }
    }else{
        $cate  = $_GET['cate'];
    }
    if(!isset($_GET['author'])){
        if(empty($author)){
            $author  = "%";
        }
    }else{
        $author  = $_GET['author'];
    }
    if(!isset($_GET['name'])){
        if(empty($name)){
            $name  = "%";
        }
    }else{
        $name  = $_GET['name'];
    }
    if (!isset ($_GET['page'])) {
        $page = 1;
    }else{
        $page = (int)$_GET['page'];
    }
    $start_from = ($page-1) * $per_page_record;
    if($start_from < 0){
        $start_from = 0;
    }
    $pg_cmd = "SELECT * FROM \"Library\" WHERE \"Category\" LIKE '%" . $cate . "%' AND \"BookName\" LIKE '%" .$name . "%' AND \"Author\" LIKE '%". $author ."%' ORDER BY \"". $sort . "\" LIMIT " . $per_page_record . " OFFSET ". $start_from;
    $pg_execute = pg_query($connect, $pg_cmd);
    $row_count = pg_num_rows($pg_execute);
    $max_page = $row_count / $per_page_record + 1;
?>

<div class="content">
    <form action="" method="get">
        <div class="filter">
            <div class="filter-content">
                <select name="sort" id="sort">
                    <option value="BookName">Sắp xếp theo tên</option>
                    <option value="Author">Sắp xếp theo tác giả</option>
                    <option value="Public_Date">Sắp xếp theo ngày xuất bản</option>
                </select>
            </div>
            <div class="filter-content">
                <input type="text" name="cate" class="filter-input" id="category" placeholder="Thể loại" value="<?php if(isset($_GET['cate'])) $cate = $_GET['cate']; echo $cate;?>">
            </div>
            <div class="filter-content">
                <input type="text" name="author" class="filter-input" id="author" placeholder="Tác giả" value="<?php if(isset($_GET['author'])) $author = $_GET['author']; echo $author;?>">
            </div>
            <div class="filter-content">
                <input type="text" name="name" class="filter-input" id="name" placeholder="Tên sách" value="<?php if(isset($_GET['name'])) $name = $_GET['name']; echo $name;?>">
            </div>
            <div class="filter-content">
                <button type="submit" name="submit" class="filter-submit">Lọc</button>
            </div>
        </div>
        <div class="showBook">
            <?php 
                while($row = pg_fetch_array($pg_execute)){
                    echo "
                        <a href = \"product.php?book=". $row['Book_ID'] ."\"><div class=\"item\">
                            <img src=\"../src/img/". $row['Book_ID'] . ".jpg\" alt=\"\">
                            <label> Tên sách: " . $row['BookName']. "</label><br>
                            <label> Tác giả: " . $row['Author']."</label><br>
                            <label> Thể loại: " . $row['Category']."</label>
                        </div>
                        </a>
                    ";
                }
            ?>
        </div>
        <div class="page_count">
            <?php 
                if(isset($_GET['sort'])){
                    $sort = $_GET['sort'];
                }
                if(isset($_GET['cate'])){
                    $cate = $_GET['cate'];
                }
                if(isset($_GET['author'])){
                    $author = $_GET['author'];
                }
                if(isset($_GET['name'])){
                    $name = $_GET['name'];
                }
            ?>
            <p> 
                <?php 
                    echo "
                        <a href=\"category.php?page=" . 1 . "&sort=" . $sort . "&cate=" . $cate . "&author=" . $author . "&name=" . $name ."\">
                        <span>Trang đầu</span>
                        </a>
                        <a href=\"category.php?page="; 
                        if($page == 1){
                            echo $page;
                        }else{
                            echo ($page - 1);
                        }
                        echo "&sort=" . $sort . "&cate=" . $cate . "&author=" . $author . "&name=" . $name ."\">
                        <span>Trước</span>
                        </a>
                        <span style = \"border-style: none\"> ". $page ."</span>
                        <a href=\"category.php?page=";
                        if($page + 1 > $max_page){
                            echo $page;
                        }else{
                            echo ($page + 1);
                        }
                        echo "&sort=" . $sort . "&cate=" . $cate . "&author=" . $author . "&name=" . $name ."\">
                        <span>Sau</span>
                        </a>
                        <a href=\"category.php?page=" . (int)$max_page . "&sort=" . $sort . "&cate=" . $cate . "&author=" . $author . "&name=" . $name ."\">
                        <span>Trang cuối</span>
                        </a>
                    ";
                ?>
            </p>
        </div>
    </form>
</div>
    
    --------------------------- footer --------------------------------- -->
    <div style="height:20%; width:100%;float:left;">
    <?php include "../HomePage/footer.php" ?>
    <div>
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
    <script src="../Controller/category_controller.js"></script>
</html>