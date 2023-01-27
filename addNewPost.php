<?php

require('header.php');
?>

<link rel="stylesheet" type="text/css" href="login.css">
<br>
<div id="addNewPost" class="login">
    <form id="addnew" method="POST" action="newPostdb.php.php">
    <br><br>
        <label>Post title:&nbsp;</label> <input type="text" name="post_title" required><br><br>
        <label>Post description: &nbsp;&nbsp;</label><textarea name="description"></textarea><br><br>


        </select><br><br>
        <br><input type="submit" value="ADD POST"><br><br>
    </form>
    <br>
</div>
<br>



<?php require('footer.php');?>