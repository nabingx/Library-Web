<html>
<head>
    <link rel="stylesheet" href="Css/dashboard.css">
</head>

<?php
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


    $pg_cmd = "SELECT DISTINCT \"User_ID\" FROM \"User\"";
    $pg_execute = pg_query($connect, $pg_cmd);
    $user_count  = pg_num_rows($pg_execute);


?>
<body>
    <div class = "dMother_div">
        <div>
            <h1>Dashboard</h1>
        </div>
        <a href="book.php"><div class="box">
            
            <p><?php echo $book_count; ?></<p>
            <p>Total books</p> 
            
        </div></a>
        
        <a href="author.php"><div class="box">
            
            <p><?php echo $author_count; ?></<p>
            <p>Total authors</p> 
            
        </div></a>
        <a href="category.php"><div class="box">
            
            <p><?php echo $category_count; ?></<p>
            <p>Total categories</p> 
            
        </div></a>

        <a href="user.php"><div class="box">
            <p><?php echo $user_count; ?></<p>
            <p>Total user requests</p> 
        </div></a>

    </div>
</body>

</html>