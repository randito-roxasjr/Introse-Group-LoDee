<?php

# Connect to Database
require_once('home_Agent_mysqli_connect.php');

# Updates the isApproved value of the notification back to 0
 $notifId = $_GET['notifId'];
 $clientId = $_GET['clientId'];
 $employeeId = $_GET['employeeId'];
 $subject = $_SESSION['subject'];
 $details = $_SESSION['details'];
 $query = "UPDATE notification SET isApproved=1, isRead=1 WHERE notifId=$notifId";
 $dbc->query($query);
 header("Location: insuranceCostSent.php");
?>
