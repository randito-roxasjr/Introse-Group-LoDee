<?php

# Connect to Database
require_once('home_Agent_mysqli_connect.php');

# Updates the isApproved value of the notification back to 0
 $clientId = 0;
 $clientId = $_GET['clientId'];
 echo $clientId;
 $query = "UPDATE notification SET isApproved=1 WHERE clientId=$clientId";
 $dbc->query($query);

 header("Location: inbox_Manager.php");
?>
