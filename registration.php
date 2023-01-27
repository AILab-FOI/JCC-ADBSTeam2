<?php require('header.php');

$result = pg_query($conn, "select * from Country;");

?>

<link rel="stylesheet" type="text/css" href="login.css">
<br>
<div id="prijava">
    <form id="login" method="POST" action="insert_user.php">
    <br><br>
        <label>Name:</label> <input type="text" name="name" required><br><br>
        <label>Surname:</label> <input type="text" name="surname" required><br><br>
        <label>Username:</label> <input type="text" name="username" required><br><br>
        <label>Password:</label> <input type="password" name="password" id="password" onkeyup="passwordCheck()" required><br><br>
        <label>Repeat password:</label> <input type="password" name="rpassword" id="rpassword" onkeyup="passwordCheck()" required><br><br>
        <label>Address:</label> <input tpye="text" name="address" required><br><br>
        <select name="country" id="country" onchange="cityFromCountry()" onload="cityFromCountry()" required>
            <?php
                while ($row = pg_fetch_row($result)) {
                    echo "<option value='$row[0]'>".$row[1]. " [". $row[0] . "] </option><br>";
                  }
            ?>
        </select><br><br>
        <select name="city" id="city" required>
        </select><br><br>
        <br><input type="submit" value="REGISTER"><br><br>
    </form>
        <div id="tools" class="login">
            <a href="login.php">Already have an account?</a>
        </div>
    <br>
</div>
<br>

<script>
    function cityFromCountry() {
        var selectedCountry = $("#country").val();
        $.ajax({url: "_cities.php?id=" + selectedCountry, success: function(result){
            $("#city").html(result);
        }});
    }
    cityFromCountry();

    function passwordCheck() {
        var passwd = $("#password");
        var rpasswd = $("#rpassword");

        if(passwd.val() === rpasswd.val()) {
            passwd.css('border',  '2px solid green'); 
            rpasswd.css('border', '2px solid green'); 
        }
        else {
            passwd.css('border', '2px solid red'); 
            rpasswd.css('border', '2px solid red'); 
        }
        
        if(passwd.val() === "" && rpasswd.val() === "") {
            passwd.css('border',  '0'); 
            rpasswd.css('border', '0'); 
        }
    }
</script>

<?php require('footer.php');?>
