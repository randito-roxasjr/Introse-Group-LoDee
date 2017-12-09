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
                  <!-- QUERY Notifications -->
                  <!--NOTIFICATION CONTENT-->

                  <?php
                  # Connect to Database
                  require_once('home_Agent_mysqli_connect.php');

                  # query
                  $query1 = "SELECT e.firstName, e.lastName, n.message, e.employeeId, n.employeeId, n.timeCreated, e.managedBy, e.isManager, n.notifType, n.isApproved FROM employee e, notification n WHERE e.employeeId = n.employeeId and e.managedBy = $_SESSION[employeeId] and notifType < 2 and n.isApproved = 0 ORDER BY n.timeCreated";
                  $result1 = mysqli_query($dbc, $query1);

                  $notifications = array();
                  # ID COUNTER
                  $curr = 0;

                  # LOOP PRINTING OF DATA IN NOTIFICATIONS
                  while($data1 = mysqli_fetch_assoc($result1)){
                      #echo '<div class="ScrollStyle">';
                      echo '<div class="card-body">';
                      echo '<ul class="notifications">';
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

                  #REINITIALIZE ID COUNTER TO ZERO
                  $curr = 0;
                  ?>

        </div>
              <?php #INCREMENT MODAL ID LOOP FOR MODAL TARGET
                foreach ($notifications as $v):
              ?>

                        <!-- MODAL ID ASSIGNMENT -->
                        <div class="modal fade" id="ModalLong<?php echo $curr;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLongTitle">Client #1</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                              </div>
                              <div class="modal-body"> <label for="recipient-name" class="col-form-label">From: Jonathan Wilson</label>
                                <br>
                                <hr>
                          					  <h4>Client Info</h4>
                          					  <br>
                          					  <li>First name:</li>
                          					  <li>Last name:</li>
                          					  <li>Address Line 1:</li>
                          					  <li>Address Line 2:</li>
                          					  <li>Address Line 2:</li>
                          					  <li>Province:</li>
                          					  <li>City:</li>
                          					  <li>Postal Code:</li>
                          					  <li>Email:</li>
                          					  <li>Phone Number 1:</li>
                          					  <li>Phone Number 2:</li>
                          					  <li>Payments:</li>
                          					  <hr>
                          					  <h4>Transaction Details</h4>
                          					  <br>
                          					  <h5>Subject:</h5>
                          						<p>(Sample)</p>
                          					  <br>
                          					  <h5>Details:</h5>
                          					  <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur
                                                  et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper
                                                  nulla non metus auctor fringilla.
          					  </p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Reject</button>
                                <input onclick="location.href='insuranceCost.php';" type="button" class="btn btn-success" value="Confirm"/>
                              </div>
                            </div>
                          </div>
                        </div> <!-- MODAL ID ASSIGNMENT -->

            <?php
                  #INCREMENT MODAL ID LOOP FOR MODAL TARGET
                  endforeach;
            ?>

			  <!-- Modal -->
              <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" id="exampleModalLongTitle">Client #1</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
                    <div class="modal-body"> <label for="recipient-name" class="col-form-label">From: Brian Imanuel</label>
                      <br>
                      <hr>
					  <h4>Client Info</h4>
					  <br>
					  <li>First name:</li>
					  <li>Last name:</li>
					  <li>Address Line 1:</li>
					  <li>Address Line 2:</li>
					  <li>Address Line 2:</li>
					  <li>Province:</li>
					  <li>City:</li>
					  <li>Postal Code:</li>
					  <li>Email:</li>
					  <li>Phone Number 1:</li>
					  <li>Phone Number 2:</li>
					  <li>Payments:</li>
					  <hr>
					  <h4>Transaction Details</h4>
					  <br>
					  <h5>Subject:</h5>
						<p>(Sample)</p>
					  <br>
					  <h5>Details:</h5>
					  <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur
                        et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper
                        nulla non metus auctor fringilla.
					  </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Reject</button>
                      <input onclick="location.href='insuranceCost.html';" type="button" class="btn btn-success" value="Confirm"/>
                    </div>
                  </div>
                </div>
              </div>
		  <br>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>
