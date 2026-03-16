<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Content-Type: application/json");



header("Content-Type: application/json");

include("../config/db.php");

$studentNo = $_GET['studentNo'];

$sql = "SELECT studentNo, name, section FROM students WHERE studentNo='$studentNo'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);

    echo json_encode($row);

}else{

    echo json_encode([
        "status"=>"error"
    ]);

}

?>