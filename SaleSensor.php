<?php
use Illuminate\Support\Facades\Http;
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "wvsu3";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from POST request



// Set the default timezone to Asia/Manila
date_default_timezone_set('Asia/Manila');
$time = date('H:i');
$date = date('Y-m-d');
$device_id = "Device_102";
$Container = "Container2";
$Weight = 5;
$Price = 500;



// Prepare and bind
$stmt = $conn->prepare("INSERT INTO product_sales (Device_id, Container, Weight_Sold, Price, Date, Time) VALUES (?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssddss", $device_id, $Container, $Weight, $Price, $date, $time);


if($stmt->execute()){
    echo "Insert Success";
}else{
    echo mysqli_error();
}


if($Container == "Container1"){
    // Prepare the SQL statement
$Container1 = $conn->prepare("
UPDATE stock_tables 
SET Container1 = Container1 - ? 
WHERE Device_Id = ?
");
// Bind parameters
$Container1->bind_param("ds", $Weight, $device_id);

if($Container1->execute()){
echo "Update Success";
$Container1->close();
}else{
echo mysqli_error();
}
}else{
    // Prepare the SQL statement
$Container2 = $conn->prepare("
UPDATE stock_tables 
SET Container2 = Container2 - ? 
WHERE Device_Id = ?
");
// Bind parameters
$Container2->bind_param("ds", $Weight, $device_id);

if($Container2->execute()){
echo "Update Success";
$Container2->close();
}else{
echo mysqli_error();
}
}

// //Sms Function
// function Sms(){
//  //Send SMS
//  curl -X POST -u <username>:<password> \
//  -H "Content-Type: application/json" \
//  -d '{ "message": "Hello, world!", "phoneNumbers": ["+79990001234", "+79995556677"] }' \
//  http://<device_local_ip>:8080/message
// }

// Close the connection
$stmt->close();
$conn->close();
?>