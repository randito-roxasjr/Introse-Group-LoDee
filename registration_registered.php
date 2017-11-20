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
  </style>
</head>
<title>Successfully Registered</title>
<body>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:900i|Roboto:900i" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">
  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container">
      <a id="brand" class="navbar-brand" href="home.html"><i class="fa d-inline fa-lg fa-cloud"></i><b style="font-family: 'Roboto', sans-serif">  Upper Limit Insurance</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent"
        aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
			<a id="home" class="btn navbar-btn ml-2 text-white" href="home.html"><i class="fa fa-home" aria-hidden="true" style="font-size:20px"></i> Home</a>
        </ul>
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
              <h2 class="mb-4 text-center" style="font-family: 'Roboto', sans-serif">Congratulations!</h2>
              <div class="form-group">
				<p class="text-center">You've successfully registered!</p>
				<br>
					<center>
						<a id="login" class="btn text-white" href="login.html" style="font-size: 20px"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Log in</a>
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

<?php

	$servername = "localhost";
	$username = "root";
	$password = "1234";

	#connect
	$dbc = @mysqli_connect($servername, $username, $password, 'upperlimit') OR die("Connection Failed: " . mysqli_connect_error());


	#### Inserting Data
	if (isset($_POST['send_info'])){
		$empty_data = array();

		#Get first name
		if(empty($_POST['first_name'])){
			$empty_data[] = 'first name';
		}
		else{
			#Remove white space and store
			$first_name = trim($_POST['first_name']);
		}

		#Get last name
		if(empty($_POST['last_name'])){
			$empty_data[] = 'last name';
		}
		else{
			#Remove white space and store
			$last_name = trim($_POST['last_name']);
		}

		#Get complete address
		if(empty($_POST['address'])){
			$empty_data[] = 'address';
		}
		else{
			#Remove white space and store
			$address = trim($_POST['address']);
		}

		#Get EMAIL
		if(empty($_POST['user_email'])){
			$empty_data[] = 'email';
		}
		else{
			#Remove white space and store
			$email_address = trim($_POST['user_email']);
		}

		#GET PASSWORD
		if(empty($_POST['password1'])){
			$empty_data[] = 'password1';
			$empty_data[] = 'password2';

		}
		else{
			if($_POST['password1'] == $_POST['password2']){
				echo 'Passwords match';
				#Remove white space and store
				$user_password = trim($_POST['password1']);
			}
			else{
				echo 'Passwords do not match';
				$empty_data[] = 'password1';
				$empty_data[] = 'password2';
			}
		}

		#GET CONTACT DETAILS
		if(empty($_POST['contact_num'])){
			$empty_data[] = 'contact number';
		}
		else{
			#Remove white space and store
			$contact_num = trim($_POST['contact_num']);
		}

		if(empty($empty_data)){

			$query = "INSERT INTO Employee (employeeId, firstName, lastName, addressLine1, phoneNumber1, email_address, password, isManager) VALUES (10005, '$first_name', '$last_name', '$address', '$contact_num', '$email_address', '$user_password', 0)";

			$result = mysqli_query($dbc, $query);

			if($result){
				echo "Employee Registered";
				#mysqli_stmt_close($result);
				mysqli_close($dbc);
			}
			else{
				echo "Error, not registered <br />";
				echo mysqli_error($dbc);

				#mysqli_stmt_close($result);
				mysqli_close($dbc);
			}

		}
		else{
			echo "Enter required Data";

			foreach($empty_data as $missing){
					echo $missing;
				}
		}

	}

?>
</body>
</head>
</html>
