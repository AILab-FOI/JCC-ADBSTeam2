<?php
require('connect.php');

$user = $_GET['username'];
$role = $_GET['roleId'];

$query = "DELETE FROM Users_roles WHERE user_name = '$user' AND role_id = $role;";

echo $query;

$result = pg_query($conn, $query);

if($result)
    header("Location: editUserRoles.php?username=$user");
else {
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
    exit;
}
?>