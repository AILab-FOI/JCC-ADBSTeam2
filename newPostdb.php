<?php
require('connect.php');

$title = $_POST['post_title'];
$description = $_POST['description'];
$username = $_SESSION['username'];
//echo "$name, $surname, $username, $password, $address, $country, $city";

$result = pg_query($conn, "INSERT INTO post VALUES(DEFAULT, '$username','$title','$description', (NOW(),NULL ), NULL, 'TRUE', NULL, NULL)");

if($result)
    header('Location: addNewPost.php');
else {
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
    exit;
}
?>
