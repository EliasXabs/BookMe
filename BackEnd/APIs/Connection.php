<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = null;
$db_name = "BookMedb";

$connection = new mysqli($db_host, $db_user, $db_pass);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create the database if it doesn't exist
try {
    $connection->select_db($db_name);
} catch (\Throwable $th) {
    $sql = 'CREATE DATABASE ' . $db_name;
    if ($connection->query($sql)) {
        echo "Database my_db created successfully\n";
    } else {
        echo 'Error creating database: ' . mysql_error() . "\n";
    }
}

$connection->select_db($db_name);

// User table
$connection->query("CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password TEXT NOT NULL,
    email VARCHAR(50) NOT NULL,
    profile_picture TEXT NOT NULL,
    profit INT(6) NOT NULL
)");

// Property table
$connection->query("CREATE TABLE IF NOT EXISTS properties (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(10) NOT NULL,
    price INT(6) NOT NULL,
    pictures TEXT NOT NULL,
    country VARCHAR(30) NOT NULL,
    city VARCHAR(30) NOT NULL,
    category VARCHAR(30) NOT NULL,
    owner_id INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (owner_id) REFERENCES users(id)
    )");

// Booking table where users books properties
$connection->query("CREATE TABLE IF NOT EXISTS bookings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    property_id INT(6) UNSIGNED NOT NULL,
    user_id INT(6) UNSIGNED NOT NULL,
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    total_price INT(6) NOT NULL,
    FOREIGN KEY (property_id) REFERENCES properties(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
    )");

// Favorite table where users can save properties
$connection->query("CREATE TABLE IF NOT EXISTS favorites (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    property_id INT(6) UNSIGNED NOT NULL,
    user_id INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (property_id) REFERENCES properties(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
    )");
?>