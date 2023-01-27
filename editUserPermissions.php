<?php 
    require('header.php');
    $username = $_GET['username'];
    $query = "SELECT Users_permission.*, Permission.permission_name 
    FROM Users_permission
    JOIN Permission
    ON permission.permission_type = users_permission.permission_type
    WHERE Users_permission.user_name = '$username';";

    $result = pg_query($conn, $query);
?>
<br><br>
<form style="padding: 2%; color: white; width:50%; border-radius:25px; text-align:center; margin: 0 auto; background-color: lightslategrey;" method="POST" action="givePermissionToUser.php">
    <label>User: </label> <?php echo $username ?> <br>
    <input type="hidden" value="<?php echo $username ?>" name="username">
    <label>List of permissions:</label>
    <?php 
    if($result) {
        echo "<ol>";
        while($row = pg_fetch_row($result)) {
            echo "<li style='all: unset;'>".$row[5]." <a style='color:lightgrey' href='remove_permission.php?username=$username&permission=$row[1]'>remove</a></li><br>";
        }
        echo "</ol>";
    }
    ?>


    <br><br>
    <label>Grant a permission: </label>
    <select id="roles" name="permission">
        <option value="-">-</option>
        <?php
        $result2 = pg_query($conn, "SELECT * FROM permission;");
        while ($row2 = pg_fetch_row($result2)) {
            echo "<option value='$row2[0]'>$row2[1]</option>";
        }
        ?>
    </select>
    <br><label>Expire at: </label> <input type="datetime-local" name="expired"><br>

    <br><input type="submit" value="Add">
</form>
<br><br>
<?php
    //echo $username;


    require('footer.php');

?>