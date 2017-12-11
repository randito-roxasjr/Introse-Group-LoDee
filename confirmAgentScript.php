<?php

# Connect to Database
require_once('home_Agent_mysqli_connect.php');

# Updates the isApproved value of the notification back to 0
 $agentId = 0;
 $agentId = $_GET['agentId'];
 echo $clientId;
 $query = "UPDATE notification SET isApproved=1 WHERE employeeId=$agentId";
 $dbc->query($query);

 header("Location: inbox_Manager.php");
?>
