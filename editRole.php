<?php 
    require('header.php');
    $roleId = $_GET['id'];
    $query = "SELECT * FROM role WHERE role_id = $roleId;";
    $result = pg_query($conn, $query);
    $row = pg_fetch_row($result);

    $query2 = "SELECT Role_permission.*, Permission.permission_name 
    FROM Role_permission
    JOIN Permission
    ON Permission.permission_type = Role_permission.permission_type
    WHERE role_id = $roleId;";
    $result2 = pg_query($conn, $query2);

?>
<br><br>
<form style="padding: 2%; color: white; width:50%; border-radius:25px; text-align:center; margin: 0 auto; background-color: lightslategrey;" method="POST" action="addPermissionToRole.php">
    <label>Role: </label> <?php echo $row[2] ?> <br>
    <input type="hidden" value="<?php echo $roleId ?>" name="roleId">
    <label>List of permissions in this role: </label>
    <?php 
    if($result) {
        echo "<ol>";
        while($row2 = pg_fetch_row($result2)) {
            echo "<li style='all: unset;'>".$row2[2]." <a style='color:lightgrey' href='remove_permission_form_a_role.php?role=$roleId&permission=$row2[0]'>remove</a></li><br>";
        }
        echo "</ol>";
    }
    ?>

    <br><br>
    <label>Grant a permission: </label>
    <select id="roles" name="permission">
        <option value="-">-</option>
        <?php
        $result3 = pg_query($conn, "SELECT * FROM permission;");
        while ($row3 = pg_fetch_row($result3)) {
            echo "<option value='$row3[0]'>$row3[1]</option>";
        }
        ?>
    </select>
    <br><input type="submit" value="Add">
</form>
<br><br>
<?php
    //echo $username;


    require('footer.php');

?>