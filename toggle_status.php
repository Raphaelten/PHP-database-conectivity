<?php
session_start();
include("connction.php");

// 🚫 Stop non-admins
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// Get current status
$get = "SELECT status_id FROM user WHERE ID='$id'";
$result = mysqli_query($conn, $get);
$row = mysqli_fetch_assoc($result);

$current_status = $row['status_id'];

// Toggle status_id
if ($current_status == 1) {
    $new_status = 2; // Off
} else {
    $new_status = 1; // On
}

$update = "UPDATE user SET status_id='$new_status' WHERE ID='$id'";
mysqli_query($conn, $update);

header("Location: users.php");
exit();
?>