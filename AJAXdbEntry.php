<?php
$servername = "69.172.204.200";
$username = "ocseti";
$password = "newaccount20$";
$dbname = "ocseti_cosc219";

//session_start();
//include 'login-info.php';

$mysqli = mysqli_connect($servername, $username, $password, $dbname);

if(mysqli_connect_errno()) {
    printf("Database connection failed: %s\n", mysqli_connect_error());
    exit();
}
else {
    // filter variables before entering into database to prevent SQL injection
    $email = filter_input(INPUT_POST,'email');

    // create database insert query and insert it into database
    $insert = "INSERT INTO AJAXDemo2020 (email) values ('$email')";
    $insertResult = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

    // define a response for AJAX
    $response = "";
    if ($insertResult) {
        $response = "Email successfully inserted!";
    } else {
        $response = "Entry not added";
    }
    echo $response;
}
$conn->close();
?>