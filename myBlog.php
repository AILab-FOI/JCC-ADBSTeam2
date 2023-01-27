<?php
session_start();
require('header.php');
$var_userName =$_SESSION['username'];
?>
<link rel="stylesheet" type="text/css" href="myBlogCSS.css">

<br><h1>Welcome <?php echo $_SESSION['username'];?> </h1>
<a href = "addNewPost.php" class="createPost">Create New blog Post</a>


<div class="box" style="padding: 1%">

    <?php
    // Sill need to implement datatable
    $result = pg_query($conn, "select lifespan, post_title, substring(Post_description,1,700) || ' ...', Substr(cast(date_edited as text),3,10),post_id from post p
where user_name = '$var_userName';");

    if($result) {
        echo('<table id="table_id" class="table josjedna display" >');
        echo('<thead><tr><th scope="col"><label>Post Title</label></th><th scope="col"><label>Post text</label></th><th scope="col"><label>Created at</label></th><th scope="col"><label>Show post</label></th></tr></thead>');
        echo('<tbody>');
        while ($row = pg_fetch_row($result)) {
            $created = substr($row[0], 2, 10);
            $var_post_id =$row[4];
            echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$created</td><td><a href='single_post.php?var_post_id=$var_post_id'>Show</a></td></tr>";
        }
        echo('</tbody>');
        echo('</table>');
    }

    ?>

</div>
<?php echo('<a href="index.php">Home page</a>'); ?>
<?php require('footer.php');?>


