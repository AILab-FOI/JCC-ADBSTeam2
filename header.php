<?php 
session_start();
require('connect.php');
    $result = "";
//Use this to check if your new user is added to the database
    /*
    $result = pg_query($conn, "SELECT * FROM role WHERE role_name = 'member';");

    if($result) {
        while ($row = pg_fetch_row($result)) {
            echo "$row[0]<br>";
        }
    }*/
    
?>

<!DOCTYPE html>
<html>
<link rel="icon" href="">
    <head>
        <meta charset="utf-8"/>
        <title>BL0G</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="header.css">
        <script src="jquery-3.6.3.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    </head>

    <body>
    <header>

    </head>
<body>
    
<div style="background-color: slategray;" class="nau navbar">
    <div id="logo">
        <a href="index.php" class="navbar-brand">
            <img src="logo.png" alt="Logo" width="auto" height="40px">
        </a>
    </div>

    <?php
        if(!isset($_SESSION['username']))
            echo("<div id='log'>
                    <a href='login.php'>Sign in/Sign up</a>
                </div>");
        else {
            $username = $_SESSION['username'];
            $result = pg_query($conn, "SELECT * FROM users_permission WHERE user_name = '$username'");
            $permissions = Array();

            if($result){
                while($row = pg_fetch_row($result)) {
                    array_push($permissions, $row[1]);
                } 
            }
            
            
            
            $roleList = Array();
            $rlst = Array();
            $result2 = pg_query($conn, "SELECT * FROM Users_roles WHERE user_name = '$username'");
            if($result2) {
                while($row2 = pg_fetch_row($result2)) {
                    array_push($roleList, $row2[1]);
                }
            }
            
            
            $i = 0;
            while($i < sizeof($roleList)) {
                $resultn = pg_query($conn, "SELECT * FROM role WHERE role_id = $roleList[$i]");
                while($rown = pg_fetch_row($resultn)) {
                    array_push($rlst, $rown[0]);
                    array_push($rlst, $rown[1]);
                }
                $i++;
            }


            if($result2) {
                while($row2 = pg_fetch_row($result2)) {
                    array_push($roleList, $row2[1]);
                }
            }      

            
            if(!in_array(515, $rlst)){
                foreach($rlst as $r) {
                    $query = "SELECT * FROM Role_permission WHERE role_id = $r;";
                    $result4 = pg_query($conn, $query);
                    while($row4 = pg_fetch_row($result4)) {
                        array_push($permissions, $row4[0]);
                    }
                }
            }


            echo("<div id='log'><br><a href='profile.php'>My profile</a><a href='logout.php'>&nbsp;&nbsp;&nbsp;&nbsp;Log out</a>
                                </div>");
        }
            

    ?>


    <div id="lista">
        <?php 
            /*if($result != "") {
                while ($row = pg_fetch_row($result)) {
                    echo "$row[0] $row[3]<br>";
                }
            }*/
            
        ?>
        <ul>
                <li><a href="exploreBlogAll.php">Explore all blogs</a></li>
                <li><a href="exploreBlog.php">Explore random blogs</a></li>
                <?php if (isset($_SESSION['username'])){ ?>
                    <li><a href="myBlog.php">My blog</a></li>
                <?php  
                    if(in_array(505, $permissions)) {
                        echo '<li><a href="manageUsers.php">Manage users</a></li>';
                    }
                    if(in_array(506, $permissions)){
                        echo '<li><a href="manageRoles.php">Manage roles</a></li>';
                    }
                    if(in_array(507, $permissions)){
                        echo '<li><a href="managePermissions.php">Manage permissions</a></li>';
                    }
                    if(in_array(508, $permissions)) {
                        echo '<li><a href="usersList.php">Users list</a></li>';
                    }
                    if(in_array(509, $permissions)) {
                        echo '<li><a href="logs.php">Logs</a></li>';
                    }
                    if(in_array(510, $permissions)) {
                        echo '<li><a href="reports.php">Reports</a></li>';
                    }
                } 
                ?>
                <li><a href="ourInfo.php">Contact us</a></li>
            </ul>
        </div>
    </div>

    </header>

    <main role="main">

