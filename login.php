<?php require('header.php');?>


<link rel="stylesheet" type="text/css" href="login.css">
<br>
<div id="prijava">
    <form id="login" method="POST" action="login_check.php">
        <br><br>
            <label>Username:</label> <input type="text" id="username" name="username" required><br><br>
            <label>Password:</label> <input type="password" id="pass" name="password" minlength="3" required><br><br><br>
            <input type="submit" value="LOG IN">
        <br><br>
    </form>
    <div id="tools">
        <a class="register" href="registration.php">Don't have an account?</a>
        <a class="recovery" href="recovery.php">Forgot password?</a>
    </div>
    <br>
</div>
<br>

<?php require('footer.php');?>
