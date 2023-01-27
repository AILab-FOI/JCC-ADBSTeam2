<?php 
session_start();
require('header.php');?>

<div class="navigacija">
      <div class="klasa navigation">
        <div class="container manjeod">
      </div>
      </div>

<div class="album py-4 bg-light pozadina">
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 


<?php

$result = pg_query($conn, "select * from users;");

if($result) {
    echo('<table id="table_id" class="table josjedna display">');
    echo('<thead><tr><th scope="col"><label>Username</label></th><th scope="col"><label>Postal code</label></th><th scope="col"><label>Country</label></th><th scope="col"><label>Name</label></th><th scope="col"><label>Surname</label></th><th scope="col"><label>Address</label></th><th scope="col"><label>Account status</label></th><th scope="col"><label>Ban</label></th></tr></thead>');
    echo('<tbody>');
    while ($row = pg_fetch_row($result)) {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td></td></tr>";
      }
    echo('</tbody>');
    echo('</table>');
}
echo('<a href="index.php">Home page</a>')
?>

            </div>
        </div>
    </div>
</div>
<?php require('footer.php');?>