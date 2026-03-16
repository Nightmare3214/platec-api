<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST");

include "config/db.php";

$data = json_decode(file_get_contents("php://input"), true);

$studentId = $_POST['studentId'] ?? '';
$password  = $_POST['password'] ?? '';

$stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND role='student'");
$stmt->bind_param("s",$studentId);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if($user && password_verify($password,$user['password'])){
    echo json_encode(["status"=>"success"]);
}else{
    echo json_encode(["status"=>"error"]);
}
?>