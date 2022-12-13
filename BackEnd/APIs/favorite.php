<?php

include("connection.php");

// if post request is sent then favorite or unfavorite the property
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_GET["title"]) && !empty($_GET["user_id"])){
    $title = $_POST["title"];
    $user_id = $_POST["user_id"];
    $sql = "SELECT * FROM properties WHERE title = ?";
    $stmt = mysqli_stmt_init($connection);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $title);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $properties = array();
    while($row = mysqli_fetch_assoc($result)){
        $properties[] = $row;
    }
    $property_id = $properties[0]["id"];

    //if the property is not already favorited by the user, favorite it
    $sql = "SELECT * FROM favorites WHERE property_id = ? AND user_id = ?";
    $stmt = mysqli_stmt_init($connection);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $property_id, $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $favorites = array();
    while($row = mysqli_fetch_assoc($result)){
        $favorites[] = $row;
    }
    if(count($favorites) == 0){
        $sql = "INSERT INTO favorites (property_id, user_id) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($connection);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $property_id, $user_id);
        mysqli_stmt_execute($stmt);
    }
    // if the property is already favorited by the user, unfavorite it
    else{
        $sql = "DELETE FROM favorites WHERE property_id = ? AND user_id = ?";
        $stmt = mysqli_stmt_init($connection);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $property_id, $user_id);
        mysqli_stmt_execute($stmt);
    }
}

// if it sent as get request then return all the properties that the user has favorited
if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["user_id"])){
    $user_id = $_GET["user_id"];
    $sql = "SELECT * FROM favorites WHERE user_id = ?";
    $stmt = mysqli_stmt_init($connection);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $favorites = array();
    while($row = mysqli_fetch_assoc($result)){
        $favorites[] = $row;
    }
    $properties = array();
    foreach($favorites as $favorite){
        $property_id = $favorite["property_id"];
        $sql = "SELECT * FROM properties WHERE id = ?";
        $stmt = mysqli_stmt_init($connection);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "i", $property_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            $properties[] = $row;
        }
    }
    echo(json_encode($properties));
}