<?php
/*
$servername = "rec.foi.hr";
$database = "project";
$username = "leader";
$password = "pr0j3ctJ((";
$charset = "utf8mb4";

try {

$dsn = "mysql:host=$servername;dbname=$database;charset=$charset";
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo “Connection Okay”;

return $pdo

}

catch (PDOException $e)

{
echo “Connection failed: ”. $e->getMessage();
}
*/
/*
$servername = "rec.foi.hr";
$database = "project";
$username = "leader";
$password = "pr0j3ctJ((";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo “Connected successfully”;

mysqli_close($conn);
*/

//@session_start();
$servername = "rec.foi.hr";
$username = "leader";
$password = "pr0j3ctJ((";
$dbname = "project";
class connectionParams {}
$param = new connectionParams;
// 'host' for the PostgreSQL server
$param->host = "rec.foi.hr";

// default port for PostgreSQL is "5432"
$param->port = 50432;

// set the database name for the connection
$param->dbname = "project";

// set the username for PostgreSQL database
$param->user = "leader";

// password for the PostgreSQL database
$param->password = "pr0j3ctJ((";

// declare a new string for the pgconnect method
$hostString = "";

// use an iterator to concatenate a string to connect to PostgreSQL
foreach ($param as $key => $value) {

// concatenate the connect params with each iteration
    $hostString = $hostString . $key . "=" . $value . " ";
}


// WARNING: For demonstration purposes only
// NEVER echo password credentials in PHP
/*
echo "
\$hostString: ". $hostString. "
";*/

// use the pg_connect() to create a connection


$conn = pg_connect("host=rec.foi.hr port=50432 dbname=project user=leader password=pr0j3ctJ((");
//$result = pg_query($conn, "select * from users LIMIT 10");
/*
while ($row = pg_fetch_row($result)) {
    echo "$row[0] $row[3]<br>";
  }*/

/*
$conn = pg_connect($hostString);
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// pass the connect instance to the pg_query() method
$response = pg_query($conn, "SELECT * FROM Account_status");

while ($row = pg_fetch_row($response)) {
    echo "$row[0] $row[1] \n" . "</br>";
}
*/
//pg_close($conn);

?>