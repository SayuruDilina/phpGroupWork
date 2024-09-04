<?php
require_once 'includes/dbh.inc.php';

$query="SELECT * FROM menu";
$result=mysqli_query($conn,$query);

$queryReserve="SELECT * FROM reservations";
$resultreserve=mysqli_query($conn,$queryReserve);

$queryOrder="SELECT * FROM orders";
$resultOrders=mysqli_query($conn,$queryOrder);


if(isset($_POST["submit"])){
    $itemcode=$_POST["itemcode"];
    $itemname=$_POST["itemname"];
    $price=$_POST["price"];
    $qty=$_POST["qty"];
    $query = "INSERT INTO menu (itemCode, itemName, price, quantity) VALUES ('$itemcode', '$itemname', '$price', '$qty')";
    
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
        tbody tr {
    transition: background-color 0.3s ease;
    /* Smooth background color change */
}

tbody tr:hover {
    background-color: #f2f2f2;
    /* Highlight on hover */
}

table {
    width: 100%;
    border-collapse: collapse;
}

table,
th,
td {
    border: 1px solid black;
    font-weight: bold;
}

th,
td {
    padding: 15px;
    text-align: left;
}

th {
    background-color: black;
    color: white;
}
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4"> Menu</h1>
    <table class="table table-bordered bg-dark text-white" id="burgerTable" >
       
            <tr>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Price (LKR)</th>
                <th>Qty</th>
                <th>Edit</th>
                <th>Delete</th>
                 </tr>
                 <tr>
                    <?php
                    while($row=mysqli_fetch_assoc($result)){
                      ?>
                      <td><?php echo $row['itemCode'] ?></td>
                      <td><?php echo $row['itemName'] ?></td>
                      <td><?php echo $row['price'] ?></td>
                      <td><?php echo $row['quantity'] ?></td>
                      <td>
                          <a href="editItem.php?itemCode=<?php echo $row['itemCode']; ?>" class="btn btn-primary">Edit</a>
                        </td>
                      <td>
                      <a href="deleteItem.php?itemCode=<?php echo $row['itemCode']; ?>" class="btn btn-danger">Delete</a>
                     </td>
                        </tr>
                      <?php
                    }
                    ?>
               
        
    </table>
    <table class="Table" id="TableOrder">
    <h1 class="mb-4"> Order Details</h1>
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Item Name</th>
                <th>Price (LKR)</th>
                <th>Qty</th>
                <th>Action</th>
                                    </tr>
                                    <tr>
                                    <?php
                    while($row=mysqli_fetch_assoc($resultOrders)){
                      ?>
                      <td><?php echo $row['oid'] ?></td>
                      <td><?php echo $row['itemName'] ?></td>
                      <td><?php echo $row['quantity'] ?></td>
                      <td><?php echo $row['price'] ?></td>
                       </tr>
                      <?php
                    }
                    ?>
                    </tr>
        </thead>
           </table>

           <table class="Table" id="TableOrder">
        <thead>
            <tr>
                <th>Reservation Id</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Time</th>
                <th>Number of Guests</th>
                                    </tr>
                                    <tr>
                                    <?php
                    while($row=mysqli_fetch_assoc($resultreserve)){
                      ?>
                      <td><?php echo $row['reservationId'] ?></td>
                      <td><?php echo $row['custName'] ?></td>
                      <td><?php echo $row['email'] ?></td>
                      <td><?php echo $row['date'] ?></td>
                      <td><?php echo $row['time'] ?></td>
                      <td><?php echo $row['guestsNo'] ?></td>
                       </tr>
                      <?php
                    }
                    ?>
                    </tr>
        </thead>
            </table>

<form class="" action="" method="post" autocomplete="off">
    <label for=""> Item Code</label>
    <input type="text" name="itemcode" required value="">
    <label for=""> Item name</label>
    <input type="text" name="itemname" required value="">
    <label for=""> price</label>
    <input type="text" name="price" required value="">
    <label for=""> Quantity</label>
    <input type="text" name="qty" required value="">
    <br>
    <button type="submit" name="submit">submit</button>
</form>    
</body>
</html>