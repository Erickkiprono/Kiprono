<?php
$serverName = "DESKTOP-MDPCKQU"; // Replace this with your SQL Server name
$connectionOptions = array(
    "Database" => "Erose", // Replace this with your database name
    "Uid" => "your_username", // Replace this with your SQL Server username
    "PWD" => "your_password" // Replace this with your SQL Server password
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $selectedService = $_POST['service'];
    $message = $_POST['message'];

    $sql = "INSERT INTO YourTableName (name, email, service, message) VALUES (?, ?, ?, ?)";

    $params = array($name, $email, $selectedService, $message);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "New record created successfully";
    }
}

// Close the connection
sqlsrv_close($conn);
?>
