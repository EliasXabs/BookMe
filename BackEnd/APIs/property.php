<?php

include("connection.php");


// If post request is sent we create a new property
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $price = $_POST["price"];
    $pictures = $_POST["pictures"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $category = $_POST["catetgory"];
    $user_id = $_POST["user_id"];

    $sql = "INSERT INTO properties(price, pictures, country, city, category, owner_id) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($connection);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_bind_param($stmt, "issssi", $price, $pictures, $country, $city, $category, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $obj = array("status" => 200, "message" => "Property created");
    echo(json_encode($obj));
    exit();
}

// If get request is sent with no parameters we return all properties
if($_SERVER["REQUEST_METHOD"] == "GET" && empty($_GET)){
    $sql = "SELECT * FROM properties";
    $result = mysqli_query($connection, $sql);
    $properties = array();
    while($row = mysqli_fetch_assoc($result)){
        $properties[] = $row;
    }
    echo(json_encode($properties));
    exit();
}

// if get request is sent with a category parameter we return all properties with that category
if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["category"])){
    $category = $_GET["category"];
    $sql = "SELECT * FROM properties WHERE category = ?";
    $stmt = mysqli_stmt_init($connection);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $category);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $properties = array();
    while($row = mysqli_fetch_assoc($result)){
        $properties[] = $row;
    }
    echo(json_encode($properties));
    exit();
}

//if get request is sent with a country parameter we return all properties with that country
if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["country"])){
    $country = $_GET["country"];
    $sql = "SELECT * FROM properties WHERE country = ?";
    $stmt = mysqli_stmt_init($connection);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $country);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $properties = array();
    while($row = mysqli_fetch_assoc($result)){
        $properties[] = $row;
    }
    echo(json_encode($properties));
    exit();
}

//if get request is sent with a user_id parameter we return all properties with that user_id
if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["user_id"])){
    $user_id = $_GET["user_id"];
    $sql = "SELECT * FROM properties WHERE owner_id = ?";
    $stmt = mysqli_stmt_init($connection);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $properties = array();
    while($row = mysqli_fetch_assoc($result)){
        $properties[] = $row;
    }
    echo(json_encode($properties));
    exit();
}