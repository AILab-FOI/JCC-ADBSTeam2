<?php

require('header.php');
$var_userName =$_SESSION['username'];
?>
<link rel="stylesheet" type="text/css" href="myBlogCSS.css">

<h1><br>Profile: <?php echo $var_userName; ?> </h1>

<?php

$res = pg_query($conn, "SELECT profilepicture FROM users where user_name = '$var_userName'");
$raw = pg_fetch_result($res, 'profilepicture');
$raw =pg_unescape_bytea($raw);

//header('Content-Type: image/jpeg');
//echo ($raw);
$contents = $raw;
// Get the bytes from the created image.
$base64 = base64_encode($contents);
?>


<div style=" padding: 5px; text-align: center";>
<img src="data:image/png;base64,<?php echo $base64; ?>" alt=""  width="400" height="400"/>
</div>


<div style="text-align: center;">


    <form action="insert/blobinsert.php" method="post" enctype="multipart/form-data" id="u16" name="u16">

    <input type="file" name="file" id="file" multiple>
    <input type="submit" value="Upload Image" name="submit">
    </form>


</div>
<div class="navigacija">

    <h2> <?php echo $_SESSION['username'];?> 's information</h2>
    <div class="album py-4 bg-light pozadina">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php

                    $result = pg_query($conn, "select * from users where user_name = '$var_userName';");

                    if($result) {
                        echo('<table class="table josjedna">');
                        echo('<tr><th scope="col"><label>Username</label></th><th scope="col"><label>Postal code</label></th><th scope="col"><label>Country</label></th><th scope="col"><label>Name</label></th><th scope="col"><label>Surname</label></th><th scope="col"><label>Address</label></th><th scope="col"><label>Account status</label></th><th scope="col"><label>Ban</label></th></tr>');
                        while ($row = pg_fetch_row($result)) {
                            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";
                        }
                        echo('</table>');
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>


    <div class="navigacija">
        <div class="klasa navigation">
            <div class="container manjeod">

            </div>
        </div>
        <h2> Logs information</h2>
        <div class="album py-4 bg-light pozadina">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <?php

                        $result = pg_query($conn, "Select l.user_name, l.date_time, l.code, a.description
                 from account_status a inner join logs l on  l.code= a.code where l.user_name = '$var_userName' order by l.date_time desc");

                        if($result) {
                            echo('<table class="table josjedna">');
                            echo('<tr><th scope="col"><label>Username</label></th><th scope="col"><label>Date and Time</label></th><th scope="col"><label>Code</label></th><th scope="col"><label>Description of code</label></th></tr>');
                            while ($row = pg_fetch_row($result)) {
                                echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
                            }
                            echo('</table>');
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="navigacija">
            <div class="klasa navigation">
                <div class="container manjeod">

                </div>
            </div>
            <h2> Role information</h2>
            <div class="album py-4 bg-light pozadina">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <?php

                            $result = pg_query($conn, "Select  u.user_name,r.role_name, u.assigned_at, u.expire_at 
                                                            from users_roles u inner join role r on u.role_id=r.role_id 
                                                            where u.user_name = '$var_userName'");

                            if($result) {
                                echo('<table class="table josjedna">');
                                echo('<tr><th scope="col"><label>Username</label></th><th scope="col"><label>Role name</label></th><th scope="col"><label>Assigned at</label></th><th scope="col"><label>Expire at</label></th></tr>');
                                while ($row = pg_fetch_row($result)) {
                                    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
                                }
                                echo('</table>');
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>



        <div class="navigacija">
            <div class="klasa navigation">
                <div class="container manjeod">

                </div>
            </div>
            <h2> Reports information</h2>
            <div class="album py-4 bg-light pozadina">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <?php

                            $result = pg_query($conn, "Select p.user_name, p.post_title, r.created_at, r.code, c.description
                 from report_log r inner join report_code c on r.code= c.code inner join post p on p.post_id=r.post_id where p.user_name = '$var_userName';");

                            if($result) {
                                echo('<table class="table josjedna">');
                                echo('<tr><th scope="col"><label>Username</label></th><th scope="col"><label>Post title</label></th><th scope="col"><label>Created</label></th><th scope="col"><label>Report Code</label></th><th scope="col"><label>Reason of report</label></th></tr>');
                                while ($row = pg_fetch_row($result)) {
                                    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
                                }
                                echo('</table>');
                            }
                            echo('<a href="index.php">Home page</a>')
                            ?>

                        </div>
                    </div>
                </div>
            </div>

<?php require('footer.php');?>


