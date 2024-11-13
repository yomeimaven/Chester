<?php
use Illuminate\Support\Facades\Http;
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "wvsu3";

// Retrieve data from POST request

// Set the default timezone to Asia/Manila
date_default_timezone_set('Asia/Manila');
$time = date('H:i');
$date = date('Y-m-d');
$device_id = "Device_102";
$Container = "Container1";
$Weight = 8;
$Price = 500;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



function sms($phone, $message) {
    // Your device ID and API key
    $deviceId = '67275d8d58ae3b65508198a5'; // Replace with your device ID
    $apiKey = 'a1928243-cc4d-4d42-b910-0b634b795ca2'; // Replace with your API key

    // API URL
    $url = "https://api.textbee.dev/api/v1/gateway/devices/$deviceId/sendSMS";

    // Prepare data
    $data = [
        'recipients' => ['+63' . $phone], // Format the phone number with country code
        'message' => $message,
    ];

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'x-api-key: ' . $apiKey,
        'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    
    // Enable debugging output (optional)
    curl_setopt($ch, CURLOPT_VERBOSE, true); // This will output debugging info to stderr

    // Execute cURL request
    $response = curl_exec($ch);

    // Check for errors
    if ($response === false) {
        $error = curl_error($ch);
        $errorCode = curl_errno($ch);
        curl_close($ch);
        echo json_encode(['message' => 'Failed to send SMS.', 'error' => $error, 'error_code' => $errorCode]);
        exit;
    }

    // Get the HTTP status code
    $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close cURL session
    curl_close($ch);

    // Debug output
    echo "HTTP Status Code: $httpStatusCode\n"; // Display the HTTP status code

    // Decode the JSON response
    $responseData = json_decode($response, true);

    // Check if the response is successful
    if ($httpStatusCode == 200 || $httpStatusCode == 201) {
        echo json_encode([
            'message' => 'SMS sent successfully!',
            'data' => $responseData,
            'OTP' => $otp
        ]);
    } else {
        echo json_encode([
            'message' => 'Failed to send SMS.',
            'error' => $responseData['error'] ?? 'Unknown error',
            'status_code' => $httpStatusCode // Include the actual HTTP status code in the response
        ]);
    }
}

//GetOwnerContact Function
function getOwnerNumber($device_id, $container){
//Device Query
$sql1 = "SELECT Owner FROM  devices WHERE Device_Id = $device_id";
$query1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($query1);
$OwnerName = $row1["Owner"];
//Owner
$sql2 = "SELECT contact FROM users WHERE name = $OwnerName";
$query2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($query2);
$contactNum = $row2["contact"];

//sms($contactNum,$container);
echo "<br>".$contactNum;
}

//Check Current Stock
function CurrentStock($device_id, $conn,$){
$getCurrentStock = "SELECT * FROM stock_tables WHERE Device_Id = $device_id";
$getStockQuery = mysqli_query($conn, $getCurrentStock);
$getStockRow = mysqli_fetch_assoc($getStockQuery);
echo $getStockRow;
if($getStockRow["Container1"]<4){
    // getOwnerNumber($device_id, "Container1");
}elseif($getStockRow["Container2"]<4){
    // getOwnerNumber($device_id, "Container2");
}
}


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
CurrentStock($device_id, $conn);
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
CurrentStock();
$Container2->close();
}else{
echo mysqli_error();
}
}


// Close the connection
$stmt->close();
$conn->close();
?>