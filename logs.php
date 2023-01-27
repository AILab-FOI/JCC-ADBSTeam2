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

                $result = pg_query($conn, "Select l.user_name, l.date_time, l.code, a.description
                 from account_status a inner join logs l on  l.code= a.code order by l.date_time desc;");

                if($result) {
                    echo('<table id="table_id" class="table josjedna display">');
                    echo('<thead><tr><th scope="col"><label>Username</label></th><th scope="col"><label>Date and Time</label></th><th scope="col"><label>Code</label></th><th scope="col"><label>Description of code</label></th></tr></thead>');
                    echo('<tbody>');
                    while ($row = pg_fetch_row($result)) {
                        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
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
