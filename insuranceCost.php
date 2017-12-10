<<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <style>
    nav, #container, button{
      background-color: #087830;
    }

    #brand:hover {
      text-shadow: 2px 2px #000000;
    }

	#notifications:hover, #logout:hover, #home:hover, #myBtn:hover {
      background-color: rgba(0, 0, 0, 0.3);
    }

	#myBtn {
		display: none;
		position: fixed;
		bottom: 20px;
		right: 30px;
		z-index: 99;
		border: none;
		outline: none;
		background-color: #087830;
		color: white;
		cursor: pointer;
		padding: 15px;
		border-radius: 10px;
	}

	.badge {
		border-radius:1em;
		margin:0 0.25em;
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
      width: 80%;
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

	#modal-body {
		font-color: black;
	}

	.form-group {
		color: white;
	}

	.form-group2 {
		color: black;
	}

	dropdown-item{
		cursor: pointer;
	}
  </style>
  <script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("myBtn").style.display = "block";
		} else {
			document.getElementById("myBtn").style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0; // For Chrome, Safari and Opera
		document.documentElement.scrollTop = 0; // For IE and Firefox
	}
  </script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:600i|Roboto:900i" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Concert+One|Lobster" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap-notifications.css" type="text/css">
  <link rel="stylesheet" href="bootstrap-notifications.min.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-expand-md navbar-dark">
    <div class="container">
      <a id="brand" class="navbar-brand" href="home_manager.php"><i class="fa d-inline fa-lg fa-cloud"></i><b style="font-family: 'Roboto', sans-serif">  Upper Limit Insurance</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent"
        aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
		  <li class="nav-item">
            <a id="home" class="btn navbar-btn ml-2 text-white" href="home_manager.php"><i class="fa fa-home" aria-hidden="true" style="font-size:20px"></i> Home</a>
          </li>
          <li class="nav-item">
            <div class="btn-group">
<!----------------------------------------------------------------------------->
              <!-- QUERY Notifications -->
              <?php
              # Connect to Database
              require_once('home_Agent_mysqli_connect.php');

              # query
              $query = "SELECT COUNT(*) as 'NUM' FROM notification WHERE notifType < 2";
              $result = mysqli_query($dbc, $query);
              $data = mysqli_fetch_assoc($result);
              ?>
              <!-- NOTIFICATION BUTTON -->
                  <button id="notifications" class="btn dropdown-toggle text-white" data-toggle="dropdown" style="cursor:pointer">
                      <i style="color: #f42929"class="fa d-inline fa-lg fa-exclamation -o"></i>
                          <span style="font-size: 18px; font-family: 'Roboto', sans-serif" class="w3-badge w3-red"><?php echo $data['NUM'];?></span>
                               Notifications
                  </button>
              <div class="dropdown-menu">

                <!-- NOTIFICATION Data -->
                <?php

                $query1 = "SELECT * FROM employee e, notification n WHERE e.employeeId = n.employeeId and e.managedBy = $_SESSION[employeeId] and notifType < 2 and n.isApproved = 0 ORDER BY n.timeCreated";
                $result1 = mysqli_query($dbc, $query1);

                    #INCREMENT ID LOOP
                    while($data1 = mysqli_fetch_assoc($result1)){
                      echo '<a class="dropdown-item text-center"><center><a href="#">'.$data1["firstName"].' '.$data1["lastName"].'</a>'. ': '. $data1["message"]. '<a href="#"></a></center></a></a>';
                      echo '<div class="dropdown-divider"></div>';
                    }
                ?>
                </div>
<!----------------------------------------------------------------------------->




        </ul>
		<a id="logout" class="btn navbar-btn ml-2 text-white" href="home.html"><i style="font-size:20px" class="fa">&#xf08b;</i> Log out</a>
      </div>
    </div>
	</nav>
  <div class="py-5" style="background-color: #FFFFFF">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card p-5" style="background-color: #087830">
            <div class="card-body">
              <h2 style="color: white;" class="mb-4">Input Insurance Cost</h2>


      <?php
        # QUERY NEW CLIENT DETAILS
        echo $_SESSION['client_Id'];
        $client_query = "SELECT email_address, firstName, lastName, postalCode,clientId, province, city, addressLine1, addressLine2, phoneNumber1, phoneNumber2 FROM client WHERE $_SESSION[client_Id] = clientId limit 1";
        $client_result = mysqli_query($dbc, $client_query);
        $client_data = mysqli_fetch_assoc($client_result);
      ?>

      <!-- FORMS -->
      <form action = "inbox_manager.php" method = "post">
					<div class="form-group">
						<hr>
						<h5 for="recipient-name" class="form-control-label">Client: <?php echo $client_data['firstName'].' '.$client_data['lastName'];?></h5>
						<hr>

					</div>

					<div class="form-group">
						<label for="recipient-name" class="form-control-label">Subject:</label>
						<input type="text" class="form-control" id="subject" placeholder="Enter subject" required>
					</div>
					<div class="form-group">
						<label for="message-text" class="form-control-label">Cost & Details:</label>
						<textarea min="1" step="any" id="abc" onkeyup="s()" class="form-control" id="message-text" placeholder="Enter insurance cost & additional details" required></textarea>
							<center>
							<br>
							<input type="submit" id="abc2" name="submit" value="Send" class="btn btn-primary" style="width: 40%" disabled />
							<script type="text/javascript">
								function s(){
								var i=document.getElementById("abc");
									if(i.value==""){
										document.getElementById("abc2").disabled=true;
										document.getElementById("abc2").style="cursor: ; width: 40%";
									}
									else{
										document.getElementById("abc2").disabled=false;
										document.getElementById("abc2").style="cursor: pointer; width: 40%";
									}
								}
							</script>
							</center>
					</div>
			  </form>   <!-- FORMS -->

			</div>
		  </div>
		</div>
      </div>
    </div>
  </div>
	<button onclick="topFunction()" id="myBtn" title="Go to top" class="fa" style="font-size:35px">&#xf0aa;</button>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>
