<?php
session_start();
include '../connect.php';

if(isset($_FILES['file']) === true){

    $var_userName =$_SESSION['username'];
    $pokus = $_FILES['file'];

    //$file_name = "woman.jpg";

    $file_name = $_FILES["file"]["tmp_name"];;
    /*
    foreach($_FILES["file"]["tmp_name"] as $file) {
        $img = fopen($file_name, 'r') or die("cannot read image\n");
        $data = fread($img, filesize($file_name));
    }
    */
    $img = fopen($file_name, 'r') or die("cannot read image\n");
    $data = fread($img, filesize($file_name));

    $es_data = pg_escape_bytea($data);
    fclose($img);

    $query = "UPDATE Users SET ProfilePicture = '$es_data' WHERE user_name ='$var_userName';";
    pg_query($conn, $query);

    //pg_close($conn);

    //echo "Uspech Insert";

    //$res = pg_query($conn, "SELECT ProfilePicture FROM users  where user_name = '$var_userName';");

    $query = "SELECT ProfilePicture FROM users  where user_name = '$var_userName'";
    $res = pg_query($conn, $query) or die (pg_last_error($conn));

    $data = pg_fetch_result($res, 'profilepicture');
    $unes_image = pg_unescape_bytea($data);

    $file_name = "test_image.jpg";
    $img = fopen($file_name, 'wb') or die("cannot open image\n");
    fwrite($img, $unes_image) or die("cannot write image data\n");
    fclose($img);

    //pg_close($conn);
   // echo "Uspech Download";


// Convert to binary and send to the browser
    //$res = pg_query("SELECT ProfilePicture(profilepicture, 'base64') AS data FROM users where user_name = '$var_userName'");
    $res = pg_query($conn, "SELECT profilepicture FROM users where user_name = '$var_userName'");
    $raw = pg_fetch_result($res, 'profilepicture');

// Convert to binary and send to the browser
    //header("Content-Type: image/jpeg");
    //echo pg_unescape_bytea($raw);


        header("location: ../profile.php");

}else{
    //alert(data);
    echo "Neuspech, neboli zadané všetky dáta";
}
?>