<?php
    require('connect.php');
    
    $pname = $_POST['permissionName'];
    $desc = $_POST['permissionDescription'];
    //echo $name . " " . $desc;
    //echo "$name, $surname, $username, $password, $address, $country, $city";
    $query = "INSERT INTO Permission VALUES(DEFAULT, '$pname', '$desc', NOW());";
    //echo $query;
    $result = pg_query($conn, $query);
    //echo $pname . " " . $desc;

    if($result)
        header('Location: managePermissions.php');
    else {
        header('Location: ' . $_SERVER["HTTP_REFERER"] );
        exit;
    }
    
?>