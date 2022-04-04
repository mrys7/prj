<?php
session_start();
$db_host = "localhost";
$db_user = "id18111179_mrys";
$db_pass = "zaq1@WSXzaq1@WSX";
$db_name = "id18111179_io2";

$con = mysqli_connect($db_host ,$db_user ,$db_pass ,$db_name);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
