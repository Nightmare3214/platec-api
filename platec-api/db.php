<?php
// START SESSION FIRST — NO OUTPUT BEFORE THIS
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//$section_id = $_GET['section'] ?? null;

//if (!$section_id) {
  //  die("No section selected.");
//}

// DATABASE CONNECTION
$conn = new mysqli(
    "sql113.infinityfree.com",
    "if0_41033690",
    "duwsqTV4rFT4d",
    "if0_41033690_attendance"
);

if ($conn->connect_error) {
    die("Database connection failed");
}
