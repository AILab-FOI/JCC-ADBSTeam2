<?php
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
            <div class="col-md-12">
            <div id="prijava" style="width=100%">
            <form id="login" method="POST" action="insert_role.php">
                <label>Role name: </label> <input type="text" name="roleName"><br><br>
                <label>Based on: </label>
                <!--<input id="roleInherit" name="roleInherit" type="text" multiple list="roles">-->
                <select id="roles" name="roleInherit">
                    <option value="-">-</option>
                    <?php 
                        $result = pg_query($conn, "SELECT * FROM role;");
                        while ($row = pg_fetch_row($result)) {
                            echo "<option value='$row[0]'>$row[2]</option>";
                        }
                    ?>
                </select>
                <!--<input type="hidden" id="roleInherits" name="roleInherits">-->
                <input type="submit" value="Add">
            </form>
</div><br><br>
<?php
// Sill need to implement datatable
$result = pg_query($conn, "SELECT * FROM role ORDER BY role_id DESC;");

if($result) {
    echo('<table id="table_id" class="table josjedna display">');
    echo('<thead><tr><th scope="col"><label>Role name</label></th><th scope="col"><label>Role inherits permissions from role</label></th><th scope="col"><label>Created at</label></th><th></th></tr></thead>');
    echo('<tbody>');
    while ($row = pg_fetch_row($result)) {
        if($row[1] != ""){
            $subresult = pg_query($conn, "SELECT * FROM role WHERE role_id = $row[1]");
            $row2 = pg_fetch_row($subresult);
        }
        else {
            $row2 = "";
        }
        echo "<tr><td>$row[2]</td><td>$row2[2]</td><td>$row[3]</td><td><a href='editRole.php?id=$row[0]'>edit</a></td></tr>";
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