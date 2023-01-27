<?php
require('connect.php');

$permission = $_GET['permission'];
$roleId = $_GET['role'];

$query = "DELETE FROM Role_permission WHERE role_id = $roleId AND permission_type = $permission;";

//echo $query;

$result = pg_query($conn, $query);

if($result)
    header("Location: editRole.php?id=$roleId");
else {
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
    exit;
}
?>