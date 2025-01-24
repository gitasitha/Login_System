<?php
$serverName="localhost";
$dbusername="asithals";
$dbpassword="1KglR0ztbzfdZ/Ln";
$dbName="log_in_system";

$conn=mysqli_connect($serverName, $dbusername, $dbpassword, $dbName);

// Check connection
if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}