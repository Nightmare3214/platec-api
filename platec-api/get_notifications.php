<?php

header("Content-Type: application/json");

$conn = new mysqli("localhost","DB_USERNAME","DB_PASSWORD","DB_NAME");

$studentId = $_GET['studentId'];

$sql = "SELECT teacher_name,message,time_created 
        FROM notifications
        WHERE student_id = ?
        ORDER BY time_created DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$studentId);
$stmt->execute();

$result = $stmt->get_result();

$data = [];

while($row = $result->fetch_assoc())
{
    $data[] = $row;
}

echo json_encode($data);

?>