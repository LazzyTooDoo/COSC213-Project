<?php
$address= "localhost";
$username = "laztodo";
$password = "malazaris1";
$dbname = "testDB";


//session_start();
//include 'login-info.php';

$mysqli = mysqli_connect($address, $username, $password, $dbname);

if(mysqli_connect_errno()) {
    printf("Database connection failed: %s\n", mysqli_connect_error());
    exit();
}
else {
    // filter variables before entering into database to prevent SQL injection
    $email = filter_input(INPUT_GET,'email');

    // create database insert query and insert it into database
    $retrieve = "SELECT * FROM ajaxtest WHERE email='$email';";
    $retrieveResult = mysqli_query($mysqli, $retrieve) or die(mysqli_error($mysqli));

    // define a response for AJAX
    $response = "";
    while($row = mysqli_fetch_array($retrieveResult)) {
        $response = "The entered email " . $row['email'] . " was retrieved from the database.";
    }
    echo $response;
}
$conn->close();
?>