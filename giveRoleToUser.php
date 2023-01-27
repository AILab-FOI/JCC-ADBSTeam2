<?php
require('connect.php');

$user = $_POST['username'];
$role = $_POST['givenRole'];
$assigned = $_POST['expired'];

if($role == "-" OR $assigned == ""){
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
    exit;
}

$query = "INSERT INTO users_roles VALUES('$user', $role, NOW(), '$assigned');";

echo $query;


$result = pg_query($conn, $query);

if($result)
    header("Location: editUserRoles.php?username=$user");
else {
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
    exit;
}
?>