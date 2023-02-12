<html>
<head>
    <link rel="stylesheet" href="Css/dashboard.css">
</head>

<?php
    include '../Admin/header.php';
    include '../Admin/sidebar.php';
    include '../Admin/Controller/check_admin_login.php';
    include '../database/connect.php';
    

    $pg_cmd = "SELECT * FROM \"Library\"";
    $pg_execute = pg_query($connect, $pg_cmd); 
    $book_count = pg_num_rows($pg_execute);

    $pg_cmd = "SELECT DISTINCT \"Author\" FROM \"Library\"";
    $pg_execute = pg_query($connect, $pg_cmd);
    $author_count  = pg_num_rows($pg_execute);

    $pg_cmd = "SELECT DISTINCT \"Category\" FROM \"Library\"";
    $pg_execute = pg_query($connect, $pg_cmd);
    $category_count  = pg_num_rows($pg_execute);
?>
<body>
    <div class = "dMother_div">
        <div>
            <h1>Dashboard</h1>
        </div>
        <div class="box">
            <a href="">
            <p><?php echo $book_count; ?></<p>
            <p>Total books</p> 
            </a>
        </div>
        <div class="box">
            <a href="">
            <p><?php echo $author_count; ?></<p>
            <p>Total authors</p> 
            </a>
        </div>
        <div class="box">
            <a href="category.php">
            <p><?php echo $category_count; ?></<p>
            <p>Total categories</p> 
            </a>
        </div>
        <div class="box">
            <p>3</<p>
            <p>Total users</p> 
        </div>
        <div class="box">
            <p>3</<p>
            <p>Total expired books</p> 
        </div>
        <div class="box">
            <p>3</<p>
            <p>Total ordered books </p> 
        </div>
        <div class="box">
            <p>3</<p>
            <p>Total user requests</p> 
        </div>

    </div>
</body>

</html>