<?php

# Connect to Database
require_once('home_Agent_mysqli_connect.php');

# Updates the isApproved value of the notification back to 0
 $notifId = 0;
 $notifId = $_GET['notifId'];
 echo $notifId;
 $query = "DELETE FROM notification WHERE notifId=$notifId"; //Careful! Might delete all notifications with the clientId
 $dbc->query($query);

 header("Location: inbox_Manager.php");
?>
