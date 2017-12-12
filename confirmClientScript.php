<?php

# Connect to Database
require_once('home_Agent_mysqli_connect.php');

# Updates the isApproved value of the notification back to 0
 $notifId = 0;
 $notifId = $_GET['notifId'];
 $clientId = $_GET['clientId'];
 echo $notifId;
 $query = "UPDATE notification SET isApproved=1 WHERE notifId=$notifId";
 $query2 = "";
 $dbc->query($query);

 header("Location: inbox_Manager.php");
?>
