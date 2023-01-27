<?php 
    require('connect.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash = hash('sha256', $password);
    //echo $password;
    //$password = '310c42885e8e1b423eb34455acf1f4e156fc9903d5374145ddb6ac35ef3082fa';
    //$result = pg_query($conn, "select * from users LIMIT 1;");
    $result = pg_query($conn, "SELECT * FROM Users WHERE user_name = '$username' AND password_hash = '$hash';");
    
    if($result) {
        if(pg_num_rows($result) != 0){
            //here last_online atribut is updated on user for each log in
            $row = pg_fetch_row($result);
            if($row[7] == "f") {
                $result = pg_query($conn, "UPDATE Users SET last_online = Now() WHERE user_name = '$username';");

                session_start();
                $_SESSION['username'] = $username;
                session_create_id();
                session_commit();
                header('Location: index.php');
            }
            else {
                header('Location: ' . $_SERVER["HTTP_REFERER"] );
                exit;
            }
        }
        else {
            header('Location: ' . $_SERVER["HTTP_REFERER"] );
            exit;
        }
    }
    else {
        header('Location: ' . $_SERVER["HTTP_REFERER"] );
        exit;
    }

    
?>