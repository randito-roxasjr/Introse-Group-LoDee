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
              <button id="notifications" class="btn dropdown-toggle text-white" data-toggle="dropdown" style="cursor:pointer">
				<i style="color: #f42929"class="fa d-inline fa-lg fa-exclamation -o"></i>
				  <span style="font-size: 18px; font-family: 'Roboto', sans-serif" class="w3-badge w3-red">2</span>
					Notifications
			  </button>
              <div class="dropdown-menu">
				<a class="dropdown-item text-center"><center><a href="#">Dave Lister</a> confirmed <a href="#">Transaction #1</a></center></a></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-center"><center><a href="#">Bob Brown</a> rejected <a href="#">Transaction #2</a></center></a></a>
                <div class="dropdown-divider"></div>
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
						<a id="addClient" class="btn text-white" href="addClient.html" style="font-size: 20px"><i class="fa d-inline fa-lg fa-user-o"></i> Add Client</a>
						<a id="editClient" class="btn text-white" href="pickClient.php" style="font-size: 20px"><i class="fa d-inline fa-lg fa-edit"></i> Edit Client</a>
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
	if(isset($_POST['submit'])){


		$data_missing = array();
		$employee_login = $_SESSION["employeeId"];

		#optional variables
		$house_address2 = NULL;
		$phone_number2 = NULL;

		#each one of these looks for a value from the html form, if it is not there, it gets added to data_missing
		if(empty($_POST['firstname'])){

			$data_missing[] = "First Name";
		}else{

			$first_name = trim($_POST['firstname']);
		}

		if(empty($_POST['lastname'])){

			$data_missing[] = "Last Name";
		}else{

			$last_name = trim($_POST['lastname']);
		}

		if(empty($_POST['address1'])){

			$data_missing[] = "Address 1";
		}else{

			$house_address = trim($_POST['address1']);
		}

		#optional
		if(!empty($_POST['address2'])){

			$house_address2[] = trim($_POST['address2']);
		}

		if(empty($_POST['province'])){

			$data_missing[] = "Province";
		}else{

			$client_province = trim($_POST['province']);
		}

		if(empty($_POST['city'])){

			$data_missing[] = "City";
		}else{

			$client_city = trim($_POST['city']);
		}

		if(empty($_POST['postalcode'])){

			$data_missing[] = "Postal Code";
		}else{

			$client_postalcode = trim($_POST['postalcode']);
		}

		if(empty($_POST['carmodel'])){

			$data_missing[] = "Car Model";
		}else{

			$car_model = trim($_POST['carmodel']);
		}

		if(empty($_POST['carname'])){

			$data_missing[] = "Car Name";
		}else{

			$car_name = trim($_POST['carname']);
		}

		if(empty($_POST['carmanufacturer'])){

			$data_missing[] = "Car Manufacturer";
		}else{

			$car_manufacturer = trim($_POST['carmanufacturer']);
		}

		if(empty($_POST['carvalue'])){

			$data_missing[] = "Car Value";
		}else{

			$car_value = trim($_POST['carvalue']);
		}

		if(empty($_POST['emailaddress'])){

			$data_missing[] = "Email Address";
		}else{

			$email_add = trim($_POST['emailaddress']);
		}

		if(empty($_POST['phonenumber1'])){

			$data_missing[] = "Phone Number 1";
		}else{

			$phone_number1 = trim($_POST['phonenumber1']);
		}

		#optional
		if(!empty($_POST['phonenumber2'])){

			$phone_number2 = trim($_POST['phonenumber2']);
		}

		#if there is no data missing, execute code
		if(empty($data_missing)){
      $employee_login = $_SESSION["employeeId"];
			#connects mysql to php
			$servername = "localhost";
  			$username = "root";
  			$password = "1234";

		  	#connect
		  	$dbc = @mysqli_connect($servername, $username, $password, 'upperlimit') OR die("Connection Failed: " . mysqli_connect_error());

			#inserts the client to the table
      $query1 = "INSERT INTO client(employeeId,firstName,lastName,addressline1,province,city,postalCode,phonenumber1) VALUES('$employee_login','$first_name','$last_name', '$house_address','$client_province','$client_city','$client_postalcode','$phone_number1')";
      #inserts carinfo along with the client
			$query2 = "INSERT INTO carinfo(clientId,manufacturer,modelYear,model,value) VALUES(?,?,?,?,?)";
			#searches for the clientId to put with the carinfo
			$query3 = "SELECT clientId from client WHERE lastName='$last_name' limit 1";

		$stmt1 = mysqli_query($dbc,$query1);

		$stmt2 = mysqli_prepare($dbc,$query2);

		$stmt3 = mysqli_prepare($dbc,$query3);

		$result = mysqli_query($dbc,$query3);

		$value = mysqli_fetch_object($result);

    mysqli_stmt_bind_param($stmt2,"issss", $value->clientId, $car_manufacturer, $car_name,$car_model,$car_value);
		mysqli_stmt_execute($stmt2);

		$affected_rows2 = mysqli_stmt_affected_rows($stmt2);

		#if both inserts went through
		if($affected_rows2 == 1){
			echo 'Client Added';

			mysqli_stmt_close($stmt2);
			mysqli_close($dbc);
		} else{
			echo 'error occurred <br />';
			echo mysqli_error($dbc);


			mysqli_stmt_close($stmt2);

			mysqli_close($dbc);
		}



		}else{
			echo 'You need to enter the following information <br />';

			foreach($data_missing as $missing){
				echo "$missing <br />";
			}
		}






	}





?>
</body>

</html>
