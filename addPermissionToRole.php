<?php
require('connect.php');

$roleId = $_POST['roleId'];
$permission = $_POST['permission'];

if($permission == "-") {
    header('Location: ' . $_SERVER["HTTP_REFERER"]);
    exit;
}

$query = "INSERT INTO Role_permission VALUES($permission, $roleId);";

echo $query;


$result = pg_query($conn, $query);

if($result)
    header("Location: editRole.php?id=$roleId");
else {
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
    exit;
}
?>