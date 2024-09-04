<?php
   require_once 'dbh.inc.php';
   require_once 'functions.inc.php';
if(isset($_POST["submit"])){
    ////speciall/////////////
$username =$_POST["uid"];
$pwd=$_POST["pwd"];

  
if(emptyInputsLogin($username,$pwd) !==false){
        exit();
}
    LoginUser($conn,$username,$pwd);

}elseif(isset($_POST["submitStaff"])){
    $username =$_POST["uid"];
    $pwd=$_POST["pwd"];
    LoginStaff($conn,$username,$pwd);
}
else{
    header('Location:../login.php');
    exit();
}
