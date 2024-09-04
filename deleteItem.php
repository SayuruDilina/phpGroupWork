<?php
require_once 'includes/dbh.inc.php';

if(isset($_GET["itemCode"])){
        $itemCode=$_GET['itemCode'];
        $deleteQuery = "DELETE FROM menu WHERE itemCode='$itemCode'";
       
        if(mysqli_query($conn, $deleteQuery)){
            echo "<script>alert('Item deleted successfully');</script>";
            header("Location: customer.php");
            exit;
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
}
?>
