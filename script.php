<?php session_start();

require_once('home_Agent_mysqli_connect.php');
$subject = $_POST['subject'];
$details = $_POST['details'];
$message = "Client Approved: <br>" . $subject . ' ' . $details;
$time_now = date("Y-m-d H:i:s");
$notifId = $_SESSION['notifId'];
$clientId = $_SESSION['clientId'];
$employeeId = $_SESSION['tempEmployeeId'];
$query2 = "INSERT INTO Notification (employeeId, message, isRead, timeCreated, isApproved, notifType) VALUES ('$employeeId', '$message', 0, '$time_now', 0, 3)";

$dbc->query($query2);
header("Location: confirmClientScript.php?clientId=$clientId&notifId=$notifId&employeeId=$employeeId");
?>
