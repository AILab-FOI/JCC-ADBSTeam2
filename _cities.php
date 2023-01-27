<?php

    require('connect.php');

    $id = $_GET['id'];

    $result = pg_query($conn, "select * from City WHERE id_country = '$id';");

    if($result){
        while ($row = pg_fetch_row($result)) {
            echo "<option value='$row[0]'>".$row[0]. " ". $row[2] . " </option><br>";
        }
    }
    
?>