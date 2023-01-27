<?php 
    require('header.php');

?>

<link rel="stylesheet" type="text/css" href="pocetna.css">

<div class="box">

    <div class="box-content">


        <div class="box-text">
            <div class="wrap">
                <?php
                //$conn = pg_connect("host=rec.foi.hr port=50432 dbname=project user=leader password=pr0j3ctJ((");

                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where rowa = 1");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id1 = $row[1];
                }
                ?>

            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id1 ?>"'>

                Learn More
            </div>
        </div>
    </div>

    <div class="box-content">
        <div class="box-text">
            <div class="wrap">
                <?php
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where rowa = 2");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id2 = $row[1];
                }
                ?>
            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id2 ?>"'>
                Learn More
            </div>
        </div>
    </div>

    <div class="box-content">
        <div class="box-text">
            <div class="wrap">
                <?php
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where rowa = 3");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id3 = $row[1];
                }
                ?>
            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id3 ?>"'>
                Learn More
            </div>
        </div>
    </div>

</div>


<div class="box">

    <div class="box-content">


        <div class="box-text">
            <div class="wrap">
                <?php
                //$conn = pg_connect("host=rec.foi.hr port=50432 dbname=project user=leader password=pr0j3ctJ((");

                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where rowa = 4");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id4 = $row[1];
                }
                ?>

            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id4 ?>"'>

                Learn More
            </div>
        </div>
    </div>

    <div class="box-content">
        <div class="box-text">
            <div class="wrap">
                <?php
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where rowa = 5");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id5 = $row[1];
                }
                ?>
            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id5 ?>"'>
                Learn More
            </div>
        </div>
    </div>

    <div class="box-content">
        <div class="box-text">
            <div class="wrap">
                <?php
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where rowa = 6");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id6 = $row[1];
                }
                ?>
            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id6 ?>"'>
                Learn More
            </div>
        </div>
    </div>

</div>

<div class="box">

    <div class="box-content">


        <div class="box-text">
            <div class="wrap">
                <?php
                //$conn = pg_connect("host=rec.foi.hr port=50432 dbname=project user=leader password=pr0j3ctJ((");

                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where rowa = 7");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id7 = $row[1];
                }
                ?>

            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id7 ?>"'>

                Learn More
            </div>
        </div>
    </div>

    <div class="box-content">
        <div class="box-text">
            <div class="wrap">
                <?php
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where rowa = 8");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id8 = $row[1];
                }
                ?>
            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id8 ?>"'>
                Learn More
            </div>
        </div>
    </div>

    <div class="box-content">
        <div class="box-text">
            <div class="wrap">
                <?php
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where rowa = 9");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id9 = $row[1];
                }
                ?>
            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id9 ?>"'>
                Learn More
            </div>
        </div>
    </div>

</div>


<div class="box">

    <div class="box-content">


        <div class="box-text">
            <div class="wrap">
                <?php
                //$conn = pg_connect("host=rec.foi.hr port=50432 dbname=project user=leader password=pr0j3ctJ((");

                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where rowa = 10");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id1 = $row[1];
                }
                ?>

            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id1 ?>"'>

                Learn More
            </div>
        </div>
    </div>

    <div class="box-content">
        <div class="box-text">
            <div class="wrap">
                <?php
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where rowa = 11");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id2 = $row[1];
                }
                ?>
            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id2 ?>"'>
                Learn More
            </div>
        </div>
    </div>

    <div class="box-content">
        <div class="box-text">
            <div class="wrap">
                <?php
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where rowa = 12");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id3 = $row[1];
                }
                ?>
            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id3 ?>"'>
                Learn More
            </div>
        </div>
    </div>

</div>




<?php require('footer.php');?>
