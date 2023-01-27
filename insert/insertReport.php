<?php
require('../header.php');

if(isset($_POST["postID"])&& isset($_POST["reportDesc"]) && isset($_SESSION["username"]) === true) {

    $var_userName =$_SESSION['username'];
    $postID = $_POST["postID"];
    $reportDesc = $_POST["reportDesc"];
    $date = date('Y-m-d H:i:s');
    //echo $date;
    $response = pg_query($conn, "SELECT max(report_log_id) FROM report_log;");

    while ($row = pg_fetch_row($response)) {
        $max = $row['0'] + 1;
        //echo $max;
    }

    $response = pg_query($conn, "SELECT max(log_id) FROM logs;");

    while ($row = pg_fetch_row($response)) {
        $maxLogs = $row['0'] + 1;
        //echo $max;
    }

    $response = pg_query($conn, "SELECT code FROM report_code where description ='$reportDesc';");


    while ($row = pg_fetch_row($response)) {
        $ReportID = $row['0'];
        //echo $max;
    }

    $response = pg_query($conn, "SELECT code FROM account_status where description ='Post reported';");


    while ($row = pg_fetch_row($response)) {
        $ReportIDLogs = $row['0'];
        //echo $max;
    }

    $sql = "INSERT INTO Report_log VALUES('" . $max . "','" . $postID . "','" . $date . "','" . $ReportID . "')";
    pg_query($conn, $sql);

    $sql = "INSERT INTO Logs VALUES('" . $maxLogs . "','" . $var_userName . "','" . $date . "','" . $ReportIDLogs . "')";
    pg_query($conn, $sql);

    //cez alert(data);
    echo "Uspech";;
}else{
    //alert(data);
    echo "Neuspech, neboli zadané všetky dáta";
}
?>
*/
