<?php
    require('connect.php');

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    //echo "$name, $surname, $username, $password, $address, $country, $city";
    $hash = hash('sha256', $password);

    $result = pg_query($conn, "INSERT INTO Users VALUES('$username', '$city', '$country', '$hash', '$name', '$surname', '$address', 'FALSE', NULL, NULL)");

    if($result){
        $result = pg_query($conn, "INSERT INTO Users_roles VALUES('$username', 515, NOW(), NULL)");
        header('Location: index.php');
    }  
    else {
        header('Location: ' . $_SERVER["HTTP_REFERER"] );
        exit;
    }
?>