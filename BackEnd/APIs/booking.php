<?php

include("connection.php");


// if request is sent as a post request then we create a new booking
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_GET["title"]) && !empty($_GET["user_id"]) && !empty($_GET["start_date"]) && !empty($_GET["end_date"])){
    $title = $_POST["title"];
    $user_id = $_POST["user_id"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $price = $_POST["price"];
    $property_id = getpropertyid($connection, $title);

    $sql = "INSERT INTO bookings (property_id, user_id, check_in, check_out, total_price) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($connection);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "iissi", $property_id, $user_id, $start_date, $end_date, $price);
    mysqli_stmt_execute($stmt);

    $response = array("status" => 200);
    echo json_encode($response);
    exit();
}
// if request was sent as a get request then we return all bookings for that user
if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["user_id"])){
    $user_id = $_GET["user_id"];
    $sql = "SELECT * FROM bookings WHERE user_id = ?";
    $stmt = mysqli_stmt_init($connection);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $bookings = array();
    while($row = mysqli_fetch_assoc($result)){
        $bookings[] = $row;
    }
    $properties = array();
    foreach($bookings as $booking){
        $property_id = $booking["property_id"];
        $sql = "SELECT * FROM properties WHERE id = ?";
        $stmt = mysqli_stmt_init($connection);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "i", $property_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $property = mysqli_fetch_assoc($result);
        $property["check_in"] = $booking["check_in"];
        $property["check_out"] = $booking["check_out"];
        $property["total_price"] = $booking["total_price"];
        $properties[] = $property;
    }
    echo json_encode($properties);
    exit();
}