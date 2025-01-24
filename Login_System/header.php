<?php
    session_start();
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My page</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <?php 
    if(isset($_SESSION["username"])){
    echo '<li style="float:right" ><a style="background-color: #45a049;">'.$_SESSION["username"].'</a</li>';
    echo '<li style="float:right" ><a style="background-color:rgb(59, 57, 218);" href="includes/logout.inc.php">Logout</a></li>';
    }else{
    echo '<li style="float:right" ><a style="background-color:rgb(59, 57, 218);" href="login.php">Login</a></li>';
    }
    ?>
</ul>
<div class="container" style="padding:20px;">