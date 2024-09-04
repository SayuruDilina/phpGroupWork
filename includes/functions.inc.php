<?php
function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat){
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
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function invalidEmail($email){
    $result;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd,$pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function uidExists($conn,$username,$email){
    $sql="SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt , $sql)){
        header("Location:../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss",$username,$email);
    mysqli_stmt_execute($stmt);
    $resultData= mysqli_stmt_get_result($stmt);

    if($row=mysqli_fetch_assoc($resultData)){
        mysqli_stmt_close($stmt);
        return $row;
    }else{
        mysqli_stmt_close($stmt);
        return false;
    }
   
}

function createUser($conn,$name,$email,$username,$pwd){
    $sql="INSERT INTO users(usersName,usersEmail,usersUid,usersPwd) VALUES (?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt , $sql)){
        header("Location:../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $pwd);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php?error=none");
    exit();
}
function emptyInputsLogin($username,$pwd){
    $result;
    if( empty($username) || empty($pwd)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function   LoginUser($conn,$username,$pwd){
    $uidExists=uidExists($conn,$username,$username);
    if($uidExists === false){
            header("Location:../signup.php?error=wronglogin");
            exit();
    }

    $storedPwd = $uidExists["usersPwd"];

      if ($pwd !== $storedPwd) {
        header("Location:../signup.php?error=wronglogin");
        exit();
    } else {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("Location:../customer.php");
        exit();
    }
    
}
function    LoginStaff($conn,$username,$pwd){
    $sql="SELECT * FROM staff WHERE userName = ?;";
    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt , $sql)){
        header("Location:../login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s",$username);
    mysqli_stmt_execute($stmt);
    $resultData= mysqli_stmt_get_result($stmt);

    if($row=mysqli_fetch_assoc($resultData)){
        $storedPwd = $row['password'];
        if ($pwd !== $storedPwd) {
            header("Location: ../login.php?error=wronglogin");
            exit();
    }
 else {
        session_start();
        $_SESSION["username"] = $row["userName"];
        header("Location:../staffInterface.php");
        exit();
  }
  }else {
        header("Location: ../login.php?error=wronglogin");
        exit();
    }

    mysqli_stmt_close($stmt);
    
}