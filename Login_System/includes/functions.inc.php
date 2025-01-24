<?php
//register form validate function
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function userExists($conn,$username,$email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
}
//user registration function
function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users(usersName,usersEmail,usersUid,usersPassword) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../signup.php?error=stmtfailed");
        exit();
    }

    $hashPwd = password_hash($pwd,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php?error=none");
    exit();
}

//login  form validate function
function emptyInputLogin($username, $pwd){
    $result;
    if(empty($username) || empty($pwd)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
//login user function
function LoginUser($conn,$username,$pwd){
    $uidExist = userExists($conn,$username,$username);
    if($uidExis===false){
        header('location:../login.php?error=invalidusername');
        exit();
    }
    $pwdhashed = $uidExist["usersPassword"];
    $checkpwd = password_verify($pwd,$pwdhashed);
     if($checkpwd===false){
        header('location:../login.php?error=invalidpassword');
        exit();
     }else if($checkpwd===true){
        session_start();
        $_SESSION["userid"]=$uidExist["usersId"];
        $_SESSION["useruid"]=$uidExist["usersUid"];
        $_SESSION["username"]=$uidExist["usersName"];
        header("location:../home.php");
        exit();
     }
}