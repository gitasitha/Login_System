<?php
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $username=$_POST["uid"];
    $pwd=$_POST["pwd"];
    $pwdRepeat=$_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $emptyInput=emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat);
    $invlidUid=invalidUid($username);
    $invalidEmail=invalidEmail($email);
    $pwdMatch=pwdMatch($pwd, $pwdRepeat);
    $userExists=userExists($conn, $username, $email);

    if($emptyInput!==false){
        header("Location:../signup.php?error=emptyinput");
        exit(); 
    }

    if($invlidUid!==false){
        header("Location:../signup.php?error=invalidUid");
        exit(); 
    }

    if($invalidEmail!==false){
        header("Location:../signup.php?error=invliedEmail");
        exit(); 
    }

    if($pwdMatch!==false){
        header("Location:../signup.php?error=pwdMatch");
        exit(); 
    }

    if($userExists!==false){
        header("Location:../signup.php?error=usernametaken");
        exit(); 
    }

    createUser($conn,$name,$email,$username,$pwd);
    

}else{
    header('Location:../login.php');
    exit();
}
