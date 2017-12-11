<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <style>
    nav,
    #container,
    #notifications {
      background-color: #087830;
    }

    #brand:hover {
      text-shadow: 2px 2px #000000;
    }

    #notifications:hover,
    #logout:hover {
      background-color: rgba(0, 0, 0, 0.3);
    }

	button, input {
	  cursor: pointer;
	}

    .user {
      display: inline-block;
      width: 65px;
      height: 65px;
      border-radius: 50%;
      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;
    }

    .one {
      background-image: url('http://placehold.it/65x65');
    }

    .ScrollStyle {
      max-height: 480px;
      overflow-y: scroll;
      overflow-x: hidden;
    }

    ul {
      padding: 0;
      list-style-type: none;
    }
    /* The Modal (background) */

    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      padding-top: 10px;
      /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }
    /* Modal Content */

    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 90%;
    }
    /* The Close Button */

    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,.close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .notifs {
      background: none!important;
      color: inherit;
      border: none;
      padding: 0!important;
      font: inherit;
      /*border is optional*/
      border-bottom: 1px solid #444;
      cursor: pointer;
	  max-width: 100%;

    }

    li {
      list-style: none;
    }

    body {
      overflow-y: hidden;
    }
  </style>
</head>

<body style="background-color: #FFFFFF">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:600i|Roboto:900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container">
      <a id="brand" class="navbar-brand" href="home_manager.php"><i class="fa d-inline fa-lg fa-cloud"></i><b style="font-family: 'Roboto', sans-serif">  Upper Limit Insurance</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent"
        aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a id="logout" class="btn navbar-btn ml-2 text-white" href="home_manager.php"><i class="fa fa-home" aria-hidden="true" style="font-size:20px"></i> Home</a>
          </li>
        </ul>
        <a id="logout" class="btn navbar-btn ml-2 text-white" href="home.html"><i style="font-size:20px" class="fa"></i> Log out</a>
      </div>
    </div>
  </nav>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-3"> </div>
      <div class="card text-black p-1" style="background-color:#EBEBEB">
        <h2 align="center">Notifications</h2>


        <div class="ScrollStyle">
          <div class="card-body">
            <ul class="notifications">
                  <!-- QUERY Notifications -->
                  <!--NOTIFICATION CONTENT-->

                  <?php
                  # Connect to Database
                  require_once('home_Agent_mysqli_connect.php');

                  # query
                  $query1 = "SELECT e.firstName, n.clientId, e.lastName, n.message, e.employeeId, n.employeeId, n.timeCreated, e.managedBy, e.isManager, n.notifType, n.isApproved, n.notifId FROM employee e, notification n WHERE e.employeeId = n.employeeId and e.managedBy=$_SESSION[employeeId] and notifType<2 and n.isApproved=0 ORDER BY n.timeCreated";
                  $result1 = mysqli_query($dbc, $query1);

                  $notifications = array();
                  # ID COUNTER
                  $curr = 0;

                  # LOOP PRINTING OF DATA IN NOTIFICATIONS
                  while($data1 = mysqli_fetch_assoc($result1)){
                      echo '<li class="notification">';
                      echo '<button class="notifs" data-toggle="modal" data-target="#ModalLong'.$curr.'" style="height: 130px; width: 485px; border-bottom:1px solid #939dad">';
                      echo '<div class="media">';
                      echo '<div class="media-left">';
                      echo '<div class="media-object">';
                      echo '<img class="user one" hspace="20"> </div>';
                      echo '</div>';
                      echo '<div class="media-body"> <strong class="notification-title"><a href="#">'.$data1["firstName"].' '.$data1["lastName"].'</a> sent <a href="#">'.$data1["message"].'</a></strong>';
                      echo '<p class="notification-desc" placeholder="Additional details"></p>';
                      echo '<div class="notification-meta"> <small class="timestamp">'.$data1["timeCreated"].'</small><br><br></div>';
                      echo '</div>';
                      #echo '</div>';
                      echo '</button>';
                      echo '</li>';
                      # PUSH TO ARRAY
                      array_push($notifications, $data1);
                      $curr++;
                  }

                  #REINITIALIZE ID COUNTER AND ACCEPT AND REJECT BUTTON COUNTER TO ZERO
                  $curr = 0;
                  $con_rej = 0;
                  ?>
            </div>
        </div>
              <?php #INCREMENT MODAL ID LOOP FOR MODAL TARGET
                foreach ($notifications as $v):
              ?>

                        <!-- MODAL ID ASSIGNMENT -->
                        <?php if($v['notifType'] == 1):?>
                        <div class="modal fade" id="ModalLong<?php echo $curr;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <?php
                            # QUERY NEW CLIENT DETAILS

                            $client_query = "SELECT email_address, firstName, lastName, postalCode,clientId, province, city, addressLine1, addressLine2, phoneNumber1, phoneNumber2 FROM client WHERE $v[clientId] = clientId limit 1";
                            $client_result = mysqli_query($dbc, $client_query);
                            $client_data = mysqli_fetch_assoc($client_result);
                          ?>

                          <!-- MODAL ID NEW Clients -->
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLongTitle">Pending Client Registration</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                              </div>

                              <div class="modal-body"> <label for="recipient-name" class="col-form-label">From: <?php echo $client_data['firstName'] . ' '. $client_data['lastName']; ?></label>
                                <br>
                                <hr>
                          					  <h4>Client Info</h4>
                          					  <br>
                          					  <li>First name: <?php echo $client_data['firstName']; ?></li>
                          					  <li>Last name: <?php echo $client_data['lastName']; ?></li>
                          					  <li>Address Line 1: <?php echo $client_data['addressLine1']; ?></li>
                          					  <li>Address Line 2: <?php echo $client_data['addressLine2']; ?></li>
                          					  <li>Province: <?php echo $client_data['province']; ?></li>
                          					  <li>City: <?php echo $client_data['city']; ?></li>
                          					  <li>Postal Code: <?php echo $client_data['postalCode']; ?></li>
                          					  <li>Email: <?php echo $client_data['email_address']; ?></li>
                          					  <li>Phone Number 1: <?php echo $client_data['phoneNumber1']; ?></li>
                          					  <li>Phone Number 2: <?php echo $client_data['phoneNumber2']; ?></li>
                          					  <hr>
                          					  <h4>Transaction Details:</h4>
                          						<p><?php echo $v['message']; ?></p>
                          					  <br>

                              </div>
                              <div class="modal-footer">
                                  <form method = "POST">
                                    <input onclick="location.href='rejectScript.php?notifId=<?php echo $v['notifId']; ?>'" type="submit" class="btn btn-danger" value="Reject" data-dismiss="modal"/>
                                    <!--  Onclick runs php script confirmScript.php.php and also reloads this web page. Also passes the notifId in the url-->
                                    <input onclick="location.href='confirmScript.php?notifId=<?php echo $v['notifId']; ?>'" type="submit" class="btn btn-success" value="Confirm" data-dismiss="modal"/>
                                  </form>
                                  <?php
                                  #-- ACCEPT AND REJECT BUTTONS -->
                                  if(isset($_POST['accept'.$con_rej])) : ?>
                                      <!-- <?php
                                        $_SESSION['client_Id'] = $client_data['clientId'];
                                      ?>

                                      <!-- <script>
                                      // JUMP TO NEXT PAGE
                                      window.location = 'insuranceCost.php';
                                      </script> -->

                                  <?php
                                  elseif(isset($_POST['reject'.$con_rej])) :?>
                                    <?php
                                      #  $reject_query = "UPDATE notification SET isRead=1 WHERE notifId = $v[notifId]";
                                      #  $reject_result = mysqli_query($dbc, $reject_query);

                                      #  $next_query = "DELETE FROM notifications WHERE notifId = $v[notifId]";
                                        #$next_result = mysqli_query($dbc, $next_query);
                                    ?> -->
                                  <?php endif; ?>

                              </div>
                            </div>
                          </div>
                        </div> <!-- MODAL ID ASSIGNMENT -->


                        <!-- MODAL FOR NEW AGENT DETAILS -->
                        <?php elseif($v['notifType'] == 0):?>
                          <div class="modal fade" id="ModalLong<?php echo $curr;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">

                              <?php
                                # QUERY AGENT DETAILS

                                $agent_query = "SELECT email_address, password, firstName, lastName, employeeId, addressLine1, phoneNumber1 FROM employee WHERE $v[employeeId] = employeeId limit 1";
                                $agent_result = mysqli_query($dbc, $agent_query);
                                $agent_data = mysqli_fetch_assoc($agent_result);

                              ?>

                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title" id="exampleModalLongTitle">Pending Agent Registration</h3>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                </div>
                                <div class="modal-body"> <label for="recipient-name" class="col-form-label">Applicant: <?php echo $agent_data['firstName'] . ' '. $agent_data['lastName']; ?></label>
                                  <br>
                                  <hr>
                                      <h4>Agent Info</h4>
                                      <br>
                                      <li>First name: <?php echo $agent_data['firstName']; ?></li>
                                      <li>Last name: <?php echo $agent_data['lastName']; ?></li>
                                      <li>Contact Details: <?php echo $agent_data['phoneNumber1']; ?></li>
                                      <li>Complete Address: <?php echo $agent_data['addressLine1']; ?></li>
                                      <li>Email: <?php echo $agent_data['email_address']; ?></li>
                                </div>
                                <div class="modal-footer">
                                    <form method="POST">
                                      <input onclick="location.href='rejectScript.php?notifId=<?php echo $v['notifId']; ?>'" type="submit" class="btn btn-danger" value="Reject" data-dismiss="modal"/>
                                      <input onclick="location.href='confirmScript.php?notifId=<?php echo $v['notifId']; ?>'" type="submit" class="btn btn-success" value="Confirm" data-dismiss="modal"/>
                                    </form>
                                </div>

                                </div>
                              </div>
                            </div>  		   <!-- MODAL FOR NEW AGENT DETAILS -->
                          <?php endif; ?>

            <?php
                  #INCREMENT MODAL ID LOOP FOR MODAL TARGET
                  $curr++;
                  $con_rej++;
                  endforeach;
            ?>

		  <br>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>



</body>

</html>
