<?php 
    include "../database/connect.php";
    $book_id = @ $_GET['book_id'];
    $user_id = @ $_GET['user_id'];

    $pg_cmd = 'INSERT INTO "Order" ("User_ID", "Book_ID" ) VALUES ('. $user_id .',' . $book_id . ')';
    pg_query($connect, $pg_cmd);
    header('Refresh: 0; URL = ../Homepage/profile.php?action=mybook');

?>