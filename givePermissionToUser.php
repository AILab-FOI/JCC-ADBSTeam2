<?php
require('connect.php');

$user = $_POST['username'];
$permission = $_POST['permission'];
$assigned = $_POST['expired'];

if($permission == "-" OR $assigned == ""){
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
    exit;
}

$query = "INSERT INTO Users_permission VALUES('$user', $permission, NOW(), '$assigned', 'FALSE');";

echo $query;


$result = pg_query($conn, $query);

if($result)
    header("Location: editUserPermissions.php?username=$user");
else {
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
    exit;
}
?>