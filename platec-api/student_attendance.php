<?php

header("Content-Type: application/json");

include("../config/connection.php");

$studentNo = $_POST['studentNo'];
$password = $_POST['password'];

$sql = "SELECT * FROM students WHERE studentNo='$studentNo' AND password='$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);

    echo json_encode([
        "status" => "success",
        "studentNo" => $row['studentNo'],
        "name" => $row['name']
    ]);

}else{

    echo json_encode([
        "status" => "error",
        "message" => "Invalid login"
    ]);

}

?>