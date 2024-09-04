<?php
require_once 'includes/dbh.inc.php';

if(isset($_POST["addStaff"])){
    $staffId=$_POST["staffId"];
    $fullName=$_POST["fullName"];
    $username=$_POST["username"];
    $pwdStaff=$_POST["pwdStaff"];
    $query = "INSERT INTO staff (staffId, fullName, userName, password) VALUES ('$staffId', '$fullName', '$username', '$pwdStaff')";
    
    if(mysqli_query($conn, $query)){
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <style>
    form {
            display: flex;
            flex-direction: column;
            width: 300px; /* Adjust the width as needed */
            margin: 0 auto; /* Center the form on the page */
        }

        label, input {
            margin-bottom: 15px; /* Add space between elements */
        }

        input[type="text"] {
            padding: 8px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <form action="" method="post" autocomplete="off">
        <label for="staffId">Staff ID</label>
        <input type="text" name="staffId" required value="">

        <label for="fullName">Full Name</label>
        <input type="text" name="fullName" required value="">

        <label for="username">Username</label>
        <input type="text" name="username" required value="">

        <label for="pwdStaff">Password</label>
        <input type="text" name="pwdStaff" required value="">

        <br>
        <button type="submit" name="addStaff" style="background-color: green;">Add</button>
    </form>
</body>
</html>
