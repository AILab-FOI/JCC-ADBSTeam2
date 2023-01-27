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

                    $result = pg_query($conn, "Select p.user_name, p.post_title, r.created_at, r.code, c.description
                 from report_log r inner join report_code c on r.code= c.code inner join post p on p.post_id=r.post_id;");

                    if($result) {
                        echo('<table id="table_id" class="table josjedna display">');
                        echo('<thead><tr><th scope="col"><label>Username</label></th><th scope="col"><label>Post title</label></th><th scope="col"><label>Created</label></th><th scope="col"><label>Report Code</label></th><th scope="col"><label>Reason of report</label></th></tr></thead>');
                        echo('<tbody>');
                        while ($row = pg_fetch_row($result)) {
                            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
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
