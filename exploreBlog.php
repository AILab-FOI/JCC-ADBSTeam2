<?php

session_start();
require('header.php'); ?>
<link rel="stylesheet" type="text/css" href="pocetna.css">

<button style="text-align: center; margin: 5px; display: block" onclick="window.location.href ='exploreBlog.php'">New Random Blogs</button>


<div class="box">

    <div class="box-content">


        <div class="box-text">
            <div class="wrap">
                <?php
                //$conn = pg_connect("host=rec.foi.hr port=50432 dbname=project user=leader password=pr0j3ctJ((");

                $response = pg_query($conn, "select max(post_id) from post");
                while ($row = pg_fetch_row($response)) {

                    $var_max = $row[0];
                }
                $number = rand(100010, $var_max);
                //echo $number;

                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where post_id = $number");

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
                $number = rand(100010, $var_max);
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where post_id= $number");

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
                $number = rand(100010, $var_max);
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where post_id=$number");

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
                $number = rand(100010, $var_max);
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where post_id=$number");

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
		where post_id=$number");

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
                $number = rand(100010, $var_max);
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where post_id=$number");

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
                $number = rand(100010, $var_max);
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where post_id=$number");

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
                $number = rand(100010, $var_max);
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where post_id=$number");

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
                $number = rand(100010, $var_max);
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where post_id=$number");

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
                $number = rand(100010, $var_max);
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where post_id=$number");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id10 = $row[1];
                }
                ?>

            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id10 ?>"'>

                Learn More
            </div>
        </div>
    </div>

    <div class="box-content">
        <div class="box-text">
            <div class="wrap">
                <?php
                $number = rand(100010, $var_max);
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where post_id=$number");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id11 = $row[1];
                }
                ?>
            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id11 ?>"'>
                Learn More
            </div>
        </div>
    </div>
    <div class="box-content">
        <div class="box-text">
            <div class="wrap">
                <?php
                $number = rand(100010, $var_max);
                $response = pg_query($conn, "select rowa,post_id,user_name, post_title, substring(Post_description,1,500)  
from( select  post_id, user_name, post_title, Post_description, row_number() over(order by post_id desc) as rowa
		from post ) as deso
		where post_id=$number");

                while ($row = pg_fetch_row($response)) {
                    echo "
                    <h2><br>$row[3] \n </h2>
                    <br><label>Author: </label>$row[2] \n
                    <br>$row[4] \n". "</br>";
                    $var_post_id12 = $row[1];
                }
                ?>
            </div>
        </div>
        <div class="box-footer">
            <div class="wrap" onclick='window.location.href ="single_post.php?var_post_id=<?php echo $var_post_id12 ?>"'>
                Learn More
            </div>
        </div>
    </div>

</div>

<?php require('footer.php');?>
