<?php
$servername = "localhost";
$port = 4306; 
$userName = "sayuru2";
$password = "@]maY_u*wOzrCKaR";
$database = "loginsystem";


$conn = mysqli_connect($servername, $userName, $password, $database, $port);


 if(!$conn){
        die("Connection Failed:".mysqli_connect_error());
    }else{
        echo'its working';
    }