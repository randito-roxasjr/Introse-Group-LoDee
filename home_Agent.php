<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <style>
    nav, #container, button{
      background-color: #087830;
    }

	h2:hover {
		text-shadow: 2px 2px #000000;
		cursor: pointer;
	}

    #brand:hover {
      text-shadow: 2px 2px #000000;
    }

	#inbox:hover, #notifications:hover, #logout:hover, #myBtn:hover {
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

	a:hover {
      background-color: rgba(0, 0, 0, 0.3);
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
      <a id="brand" class="navbar-brand" href="#"><i class="fa d-inline fa-lg fa-cloud"></i><b style="font-family: 'Roboto', sans-serif">  Upper Limit Insurance</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent"
        aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <div class="btn-group">
              <!-- QUERY Notifications -->
              <?php
                require_once('getNotifsAgent.php');
              ?>
                <a style="color: #087830" href="notifications_agent.php" class="dropdown-item text-center"><i class="glyphicon glyphicon-search"></i>View All</a>
              </div>
            </div>
        </ul>
		<a id="logout" class="btn navbar-btn ml-2 text-white" href="home.html"><i style="font-size:20px" class="fa">&#xf08b;</i> Log out</a>
      </div>
    </div>
	</nav>
	  <div class="py-5" style="background-color: #FFFFFF">
	  <div class="w3-animate-opacity">
		<div class="container">
		  <div class="row">
			<div class="col-md-3"> </div>
			<div class="col-md-6">
			  <div class="card text-white p-5" style="background-color: #087830">
				<div class="card-body">
					<h1 style="text-align:center; font-family: 'Roboto', sans-serif">
						Welcome, <?php echo $_SESSION["logged_user"];?>
					</h1>
					<center>
						<p class="timestamp" id="lblTime"></p>
					</center>
						<script type="text/javascript">
							window.onload = function () {
								DisplayCurrentTime();
							};
							function DisplayCurrentTime() {
								var date = new Date();
								var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
								var am_pm = date.getHours() >= 12 ? "PM" : "AM";
								hours = hours < 10 ? "0" + hours : hours;
								var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
								time = hours + ":" + minutes + " " + am_pm;
								months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
								days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
								var lblTime = document.getElementById("lblTime");
								lblTime.innerHTML = 'Today is '+days[date.getDay()]+', '+months[date.getMonth()]+' '+date.getDate()+', '+date.getFullYear()+', '+time;
							};
						</script>
				  <hr class="w3-border-grey" style="margin:auto;width:60%">
					<center>
						<br>
						<a id="addClient" class="btn text-white" href="addClient.php" style="font-size: 20px"><i class="fa d-inline fa-lg fa-user-o"></i> Add Client</a>
						<a id="editClient" class="btn text-white" href="pickClient.php" style="font-size: 20px"><i class="fa d-inline fa-lg fa-edit"></i> Edit Client</a>
					</center>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>
