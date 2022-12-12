<?php

include("connection.php");
include("helpers.php");

$username =  $_POST["username"];
$email =  $_POST["email"];
$pass =  $_POST["password"];
$profile_picture = "/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHsAewMBIgACEQEDEQH/xAAbAAEAAwEBAQEAAAAAAAAAAAAABQYHBAMCAf/EADUQAAIBAgMEBQsFAQAAAAAAAAABAgMEBQYRIUFRcRIxYZHBEyIkUoGhsbLR8PEjNUJiczL/xAAWAQEBAQAAAAAAAAAAAAAAAAAAAQL/xAAWEQEBAQAAAAAAAAAAAAAAAAAAEQH/2gAMAwEAAhEDEQA/ANSABpkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACAzfiU7Kxjb0G1WuNVquuMd/fsXeBz41mqFvOVDDoxq1FslVltiuXF+7mV2pj+LVJ9J31WPZHRL4Eby6gWIsOHZsvaE0r1K4pb3oozXJrYXOzu6F9bxuLafTpy38HwfaZWTWVcSlY4jGlOX6FdqE1uT3P74hWggAgAAAAAAAAAAAULOlRzxtxb2U6UYr3vxL6UTO1JwxmM2tlSjFp8m14ICvgA0gOT0fEBJyekVq3sS4k1catbVHVtqNR9c4Rk/aj1PijT8lRp0/Uio9x9kAAAAAAAAAAACCzZhk8QsY1aEelXoPVR3yjvXwZOgDJNwNCxTLdjiFSVVKVCs9spU+qT7V+CHlkurr5l9BrtpP6lIqpO5Twyd7fxuJx9Ht5dJt/yluXj+SXtMm29OSld3M6qX8YLoJ8+t/AsdCjSt6UaVCnGnTitIxitEgPQAEAAAAAAAAAAADhxDFrLDo+lVlGemqpx2yfsITMWZXQnO0w6S8onpUreq+Ee3tKdKUpzc5ycpyerk3q2wLXdZzeulnaLTc60vBfU4nm7FG9itl2Km/qQALEqy0M5XkX+vbUJr+nSi/iyaw/NGH3bUKrlbTe6p/wA9/wBdCgAQrWk9Vqj9M7wTHrjC5RpvWra67abe2PbHgX60uaN5bwuLefTpzWqfhzIr2AAAAAAAAK/m3F5WFsra3lpcVl1+pDjz3d5YOb0Rl+LXrxDEK1035s5eYuEV1e4Dk5AAqaAAoAAATOWMXeG3ip1Zei1npP8Aq90vvcQwJq41sERla+d9hFNzetSi/JS136aaPuaJcgAAAAAOHHKzoYPeVF1qk0ub2eJmRouav2C75R+ZGdFNAAVAAAAAAAAFryHWflryhucYzXsenii4FHyL+6V/8H80S8EUABB//9k=";

if(usernameExists($connection, $username)){
    $obj = array("status" => 403, "message" => "Username already taken");
    echo(json_encode($obj));
    exit();
}

if(emailExists($connection, $email)){
    $obj = array("status" => 403, "message" => "Email already taken");
    echo(json_encode($obj));
    exit();
}


$sql = "INSERT INTO users(username, password, email, profile_picture) VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($connection);
mysqli_stmt_prepare($stmt, $sql);

$hashedpass = md5($pass);

mysqli_stmt_bind_param($stmt, "ssss", $username, $hashedpass, $email, $profile_picture);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

$response = array("status" => 200);
echo (json_encode($response));