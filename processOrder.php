<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');


$servername = "localhost";
$port = 4306; 
$userName = "sayuru2";
$password = "@]maY_u*wOzrCKaR";
$database = "loginsystem";

$conn = mysqli_connect($servername, $userName, $password, $database, $port);

if(!$conn){
    echo json_encode(['success' => false, 'message' => "Connection Failed: " . mysqli_connect_error()]);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data['orders'])) {

    foreach ($data['orders'] as $order) {
        $itemName = $conn->real_escape_string($order['itemName']);
        $itemPrice = $conn->real_escape_string($order['itemPrice']);
        $quantity = $conn->real_escape_string($order['quantity']);
        $tot=$itemPrice*$quantity;

        $sql = "INSERT INTO orders (oid, itemName, quantity, price) VALUES ('3', '$itemName', '$quantity', '$tot')";
        if ($conn->query($sql) !== TRUE) {
            echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
            exit;
        }
    }

    echo json_encode(['success' => true, 'message' => 'Order processed successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'No orders to process.']);
}

$conn->close();
?>
