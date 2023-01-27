<?php
require('connect.php');

$user = $_GET['username'];
$permission = $_GET['permission'];

$query = "DELETE FROM Users_permission WHERE user_name = '$user' AND permission_type = $permission;";

//echo $query;

$result = pg_query($conn, $query);

if($result)
    header("Location: editUserPermissions.php?username=$user");
else {
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
    exit;
}
?>