<?php 
    require('connect.php');
    $username = $_GET['username'];

    $result = pg_query($conn, "UPDATE Users SET ban = TRUE WHERE user_name = '$username';");
    
    if($result) {
        header('Location: manageUsers.php');
    }
    else {
        header('Location: ' . $_SERVER["HTTP_REFERER"] );
        exit;
    }

    
?>