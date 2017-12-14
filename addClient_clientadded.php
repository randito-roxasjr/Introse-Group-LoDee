<!-- This page lets the agent/employee know if they successfully submitted
	a client to the database -->

<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <style>
    nav {
      background-color: #087830;
    }

    #brand:hover {
      text-shadow: 2px 2px #000000;
    }

    #login:hover, #home:hover{
      background-color: rgba(0, 0, 0, 0.3);
    }

	nav, #container, button{
      background-color: #087830;
    }

	#inbox:hover, #notifications:hover, #logout:hover, #myBtn:hover {
      background-color: rgba(0, 0, 0, 0.3);
    }

	a:hover {
      background-color: rgba(0, 0, 0, 0.3);
    }
  </style>
</head>

<body>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:900i|Roboto:900i" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">
  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container">
      <a id="brand" class="navbar-brand" href="#"><i class="fa d-inline fa-lg fa-cloud"></i><b style="font-family: 'Roboto', sans-serif">  Upper Limit Insurance</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent"
        aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <div class="btn-group">
              <?php
                require_once('getNotifsAgent.php');
              ?>
                <a style="color: #087830" href="notifications_agent.html" class="dropdown-item text-center"><i class="glyphicon glyphicon-search"></i>View All</a>
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
              <h2 class="mb-4 text-center" style="font-family: 'Roboto', sans-serif">Good Work!</h2>
              <div class="form-group">
				<p class="text-center">Client info and Transaction details successfully sent</p>
				<br>
					<center>
						<br>
						<a id="addClient" class="btn text-white" href="addClient.php" style="font-size: 20px"><i class="fa d-inline fa-lg fa-user-o"></i> Add Client</a>
						<a id="editClient" class="btn text-white" href="editClient.php" style="font-size: 20px"><i class="fa d-inline fa-lg fa-edit"></i> Edit Client</a>
					</center>
			  </div>
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
