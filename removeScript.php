<?php

# Connect to Database
require_once('home_Agent_mysqli_connect.php');

# query
 $clientId = 0;
 $clientId = $_GET['clientId'];
 echo $clientId;
 $query = "UPDATE notification SET isApproved=0 WHERE clientId=$clientId";
 $dbc->query($query);

 header("Location: approvedClients.php");
?>
