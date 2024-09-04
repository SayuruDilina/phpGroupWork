<?php
require_once 'includes/dbh.inc.php';

if(isset($_GET["itemCode"])){
        $itemCode=$_GET['itemCode'];
        $query="SELECT * FROM menu WHERE itemCode = '$itemCode'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($result);
}
if(isset($_POST['update'])){
    $itemCode=$_POST["itemCode"];
    $itemName=$_POST["itemname"];
    $price=$_POST["price"];
    $quantity=$_POST["qty"];

    $updateQuery = "UPDATE menu SET itemName='$itemName', price='$price', quantity='$quantity' WHERE itemCode='$itemCode'";

    if(mysqli_query($conn, $updateQuery)){
        echo "<script>alert('Data updated successfully');</script>";
        header("Location: customer.php"); 
        exit;
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: 0 auto;
        }

        label, input {
            margin-bottom: 15px;
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
<div class="container mt-5">
    <h1>Edit Item</h1>

    <form action="" method="post">
        <input type="hidden" name="itemCode" value="<?php echo $row['itemCode']; ?>">
        <label for="">Item Name</label>
        <input type="text" name="itemname" value="<?php echo $row['itemName']; ?>" required>
        <label for="">Price</label>
        <input type="text" name="price" value="<?php echo $row['price']; ?>" required>
        <label for="">Quantity</label>
        <input type="text" name="qty" value="<?php echo $row['quantity']; ?>" required>
        <br>
        <button type="submit" name="update" class="btn btn-success">Update</button>
    </form>
</div>
</body>
</html>