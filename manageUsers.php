<?php
session_start();
require('header.php');

//$result = pg_query($conn, "DELETE FROM role WHERE role_name = 'member';");

?>

<link rel="stylesheet" type="text/css" href="login.css">
<div class="navigacija">
<div class="klasa navigation">
    <div class="container manjeod">
    </div>
</div>

<div class="album py-4 bg-light pozadina">
    <div class="container">
        <div class="row">
            <div class="col-md-12"><br><br>
                <?php
                $result = pg_query($conn, "SELECT user_name, ban FROM users;");

                if($result) {
                    echo('<table id="table_id" class="table josjedna display">');
                    echo('<thead>
                            <tr>
                                <th scope="col"><label>User name</label></th>
                                <th scope="col"><label>Roles</label></th>
                                <th scope="col"><label>Permissions</label></th>
                                <th></th><th></th><th></th>
                            </tr>
                        </thead>');
                    echo('<tbody>');
                    while ($row = pg_fetch_row($result)) {
                        $user = $row[0];
                        echo "<tr>
                            <td>$row[0]</td>
                            <td>";
                        $subresult = pg_query($conn, 
                        "SELECT Users_roles.*, role.role_name 
                        FROM Users_roles
                        JOIN role
                        ON role.role_id = users_roles.role_id
                        WHERE Users_roles.user_name = '$user';");
                        if($subresult) {
                            while($row2 = pg_fetch_row($subresult)) {
                                echo $row2[4]." ";
                            }
                        }
                        
                        echo "</td><td>";

                        $subresult = pg_query($conn, 
                        "SELECT Users_permission.*, Permission.permission_name 
                        FROM Users_permission
                        JOIN Permission
                        ON permission.permission_type = users_permission.permission_type
                        WHERE Users_permission.user_name = '$user';");
                        if($subresult) {
                            while($row2 = pg_fetch_row($subresult)) {
                                echo $row2[5]." ";
                            }
                        }

                        echo"</td>
                            <td>";

                        if($row[1] == 'f'){
                            echo "<a href='ban_user.php?username=$row[0]'>ban</a>";
                        }
                        else {
                            echo "<a href='unban_user.php?username=$row[0]'>unban</a>";
                        }
                        echo"</td>
                            <td><a href='editUserRoles.php?username=$row[0]'>roles</a></td>
                            <td><a href='editUserPermissions.php?username=$row[0]'>permissions</a></td>
                            </tr>";
                    }
                    echo('</tbody>');
                    echo('</table>');
                }
                echo('<a href="index.php">Home page</a>');
                ?>

            </div>
        </div>
    </div>
</div>

<?php require('footer.php');?>