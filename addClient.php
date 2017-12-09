<!-- This page allows an agent/employee to submit a client's
	details to the database -->

<?php

session_start();
$modal1 = false;
$modal2 = false;
$modal3 = false;
$modal4 = false;
$change_page = false;
$data_missing = array();
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
      <a id="brand" class="navbar-brand" href="home_Agent.php"><i class="fa d-inline fa-lg fa-cloud"></i><b style="font-family: 'Roboto', sans-serif">  Upper Limit Insurance</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent"
        aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
		  <li class="nav-item">
            <a id="logout" class="btn navbar-btn ml-2 text-white" href="home_agent.php"><i class="fa fa-home" aria-hidden="true" style="font-size:20px"></i> Home</a>
          </li>
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
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card p-5" style="background-color: #087830">
            <div class="card-body">
              <h2 style="color: white;" class="mb-4">Input Client Info</h2>
              <form method = "post" action ="">
                <div class="form-group"> <label>First Name</label>
                  <input type="text" name="firstname" class="form-control" placeholder="Enter client's first name" required> </div>
				<div class="form-group"> <label>Last Name</label>
                  <input type="text" name="lastname" class="form-control" placeholder="Enter client's last name" required> </div>
                <div class="form-group"> <label>Address Line 1</label>
                  <input type="text" name="address1" class="form-control" placeholder="Enter client's 1st address" required> </div>
				<div class="form-group"> <label>Address Line 2</label>
                  <input type="text" name="address2" class="form-control" placeholder="Enter client's 2nd address"> </div>
				<div class="form-group"> <label>Province</label>
                  <input type="text" name="province" class="form-control" placeholder="Enter province" required> </div>
				<div class="form-group"> <label>City</label>
                  <input type="text" name="city" class="form-control" placeholder="Enter city" required> </div>
				<div class="form-group"> <label>Postal Code</label>
                  <input type="number" name="postalcode" min="1" step="any" class="form-control" placeholder="Enter postal code" required> </div>
                <div class="form-group"> <label>Car Model</label>
                  <input type="text" name="carmodel" class="form-control" placeholder="Enter car model" required> </div>
                <div class="form-group"> <label>Car Name</label>
                  <input type="text" name="carname" class="form-control" placeholder="Enter car name" required> </div>
				<div class="form-group"> <label>Car Manufacturer</label>
                  <input type="text" name="carmanufacturer" class="form-control" placeholder="Enter car manufacturer" required> </div>
                <div class="form-group"> <label>Car Value</label>
                  <input type="number" name="carvalue" min="1" step="any" class="form-control" placeholder="Enter car value" required> </div>
                <div class="form-group"> <label>Email</label>
                  <input type="email" name="emailaddress" class="form-control" placeholder="Enter client's email" required> </div>
                <div class="form-group"> <label>Phone Number 1</label>
                  <input type="tel" name="phonenumber1" class="form-control" placeholder="Enter client's 1st mobile/landline number" required> </div>
				<div class="form-group"> <label>Phone Number 2</label>
                  <input type="tel" name="phonenumber2" class="form-control" placeholder="Enter client's 2nd mobile/landline number"> </div>
                <div class="form-group"> <label>Payments</label>
                  <input type="number" class="form-control" placeholder="Enter payments" required> </div>

							  <br>
							  <hr class="w3-border-grey">
							  <br>
							  <h2 style="color: white;" class="form-group">Input Transaction Details</h2>
							  <!--<div class="form-group">
								<label for="recipient-name" n class="form-control-label">Recipient:</label>
								<input type="text" class="form-control" id="recipient-name" placeholder="Enter Manager name" required>
							  </div> -->
							  <div class="form-group">
								<label for="recipient-name" class="form-control-label">Subject:</label>
								<input type="text" class="form-control" name="subject" placeholder="Enter subject" required>
							  </div>
							  <div class="form-group">
								<label for="message-text" class="form-control-label"> Details:</label>
								<textarea min="1" step="any" name="message" onkeyup="s()" class="form-control" id="abc" placeholder="Enter transaction details" required></textarea>
								<center>
								<br>
								<input data-toggle="modal" data-target="#invalidFN" type="submit" id="abc2" name="submit" value="Send" class="btn btn-primary" style="width: 40%" disabled />
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


						<!-- invalid input for last_name -->
						<div class="modal fade" id="invalidLN" tabindex="-1" role="dialog" aria-labelledby="invalidLN" aria-hidden="true">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title" id="wrongPW" style="color: black">Oops!</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
							  </div>
							  <div class="modal-body" style="color: black">
								<p>
								  The last name you entered has
								  <span style="color: #ff0000">numbers in it</span>.
								</p>
							  </div>
							</div>
						  </div>
						</div>

						<!-- invalid input for contact_number -->
						<div class="modal fade" id="invalidCN" tabindex="-1" role="dialog" aria-labelledby="invalidCN" aria-hidden="true">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title" id="wrongPW" style="color: black">Oops!</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
							  </div>
							  <div class="modal-body" style="color: black">
								<p>
								  The contact number you entered has
								  <span style="color: #ff0000">letters/symbols in it</span>.
								</p>
							  </div>
							</div>
						  </div>
						</div>

						<!-- invalid input for address -->
						<div class="modal fade" id="invalidAD" tabindex="-1" role="dialog" aria-labelledby="invalidAD" aria-hidden="true">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title" id="wrongPW" style="color: black">Oops!</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
							  </div>
							  <div class="modal-body" style="color: black">
								<p>
								  The address you entered has
								  <span style="color: #ff0000">symbols in it</span>.
								</p>
							  </div>
							</div>
						  </div>
						</div>

						</form>
						</div>
					  </div>
					</div>
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

  <?php

	if(isset($_POST['submit'])){

		$employee_login = $_SESSION["employeeId"];

		#optional variables
		$house_address2 = NULL;
		$phone_number2 = NULL;

		#each one of these looks for a value from the html form, if it is not there or if it is invalid, it gets added to data_missing
		if(empty($_POST['firstname']) or preg_match('/[!\'^£$%&*()}{#~?><>,|=_+¬1234567890]/', $_POST['firstname'])  or ctype_space($_POST['firstname'])){

			$data_missing[] = "First Name";
			$modal1 = true;
		}else{

			$first_name = trim($_POST['firstname']);
		}

		if(empty($_POST['lastname']) or preg_match('/[!\'^£$%&*()}{#~?><>,|=_+¬1234567890]/', $_POST['lastname'])  or ctype_space($_POST['lastname'])){

			$data_missing[] = "Last Name";
			$modal1 = true;
		}else{

			$last_name = trim($_POST['lastname']);
		}

		if(empty($_POST['address1']) or ctype_space($_POST['address1'])){

			$data_missing[] = "Address 1";
			$modal1 = true;
		}else{

			$house_address = trim($_POST['address1']);
			
		}

		#optional
		if(!empty($_POST['address2']) and !ctype_space($_POST['address2'])){

			$house_address2 = trim($_POST['address2']);
		}else if (ctype_space($_POST['address2'])){
			$data_missing[] = "Address Line 2";
			$modal1 = true;
		}

		if(empty($_POST['province']) or preg_match('/[!\'^£$%&*()}{#~?><>,|=_+¬1234567890]/', $_POST['province'])  or ctype_space($_POST['province'])){

			$data_missing[] = "Province";
			$modal1 = true;
		}else{

			$client_province = trim($_POST['province']);
		}

		if(empty($_POST['city']) or preg_match('/[\'^!£$%&*()}{#~?><>,|=_+¬1234567890]/', $_POST['city'])  or ctype_space($_POST['city'])){

			$data_missing[] = "City";
			$modal1 = true;
		}else{

			$client_city = trim($_POST['city']);
		}

		if(empty($_POST['postalcode']) or !ctype_digit($_POST['postalcode'])){

			$data_missing[] = "Postal Code";
			$modal1 = true;
		}else{

			$client_postalcode = trim($_POST['postalcode']);
		}

		if(empty($_POST['carmodel']) or preg_match('/[\'^!£$%&*()}{#~?><>,|=_+¬]/', $_POST['carmodel']) or ctype_space($_POST['carmodel'])){

			$data_missing[] = "Car Model";
			$modal1 = true;
		}else{

			$car_model = trim($_POST['carmodel']);
		}

		if(empty($_POST['carname']) or preg_match('/[\'^!£$%&*()}{#~?><>,|=_+¬]/', $_POST['carname']) or ctype_space($_POST['carname'])){

			$data_missing[] = "Car Name";
			$modal1 = true;
		}else{

			$car_name = trim($_POST['carname']);
		}

		if(empty($_POST['carmanufacturer']) or preg_match('/[\'^!£$%&*()}{#~?><>,|=_+¬1234567890]/', $_POST['carmanufacturer']) or ctype_space($_POST['carmanufacturer'])){

			$data_missing[] = "Car Manufacturer";
			$modal1 = true;
		}else{

			$car_manufacturer = trim($_POST['carmanufacturer']);
		}

		if(empty($_POST['carvalue']) or ($_POST['carvalue'] < 0) ){

			$data_missing[] = "Car Value";
			$modal1 = true;
		}else{

			$car_value = trim($_POST['carvalue']);
		}

		if(empty($_POST['phonenumber1']) or !ctype_digit($_POST['phonenumber1'])  or ctype_space($_POST['phonenumber1'])){

			$data_missing[] = "Phone Number 1";
			$modal1 = true;
		}else{

			$phone_number1 = trim($_POST['phonenumber1']);
		}

		#optional
		if(!empty($_POST['phonenumber2']) and ctype_digit($_POST['phonenumber2'])  and !ctype_space($_POST['phonenumber2'])){

			$phone_number2 = trim($_POST['phonenumber2']);
		}else if(ctype_space($_POST['phonenumber2'])){
			$data_missing[] = "Phone Number 2";
			$modal1 = true;
		}


		if(empty($_POST['emailaddress']  or ctype_space($_POST['emailaddress']))){

			$data_missing[] = "Client Email Address";
			$modal1 = true;
		}else{

			$client_email_address = trim($_POST['emailaddress']);
		}

		if(empty($_POST['subject']) or ctype_space($_POST['subject'])){

			$data_missing[] = "Subject";
			$modal1 = true;
		}else{

			$subject = trim($_POST['subject']);
		}

		if(empty($_POST['message']) or ctype_space($_POST['message'])){

			$data_missing[] = "Message";
			$modal1 = true;
		}else{

			$message = trim($_POST['message']);
		}

		if(!empty($message) and !empty($subject)){
			$notifmessage = $subject . " " . $message;
		}

		$time_now = date("Y-m-d H:i:s");
		#if there is no data missing, execute code
		if(empty($data_missing)){


      $employee_login = $_SESSION["employeeId"];
			#connects mysql to php
			require_once('home_Agent_mysqli_connect.php');
			#inserts the client to the table
			$query1 = "INSERT INTO client(employeeId,firstName,lastName,addressline1,addressLine2,province,city,postalCode,phonenumber1,phonenumber2,email_address) VALUES('$employee_login','$first_name','$last_name', '$house_address','$house_address2','$client_province','$client_city','$client_postalcode','$phone_number1','$phone_number2','$client_email_address')";
			#inserts carinfo along with the client
			$query2 = "INSERT INTO carinfo(clientId,manufacturer,modelYear,model,value) VALUES(?,?,?,?,?)";
			#searches for the clientId to put with the carinfo
			$query3 = "SELECT clientId from client WHERE lastName='$last_name' limit 1";

			$query4 = "INSERT INTO notification(employeeID,message,isRead,timeCreated,isApproved) VALUES('$employee_login','$notifmessage','0','$time_now','0')";

			$stmt1 = mysqli_query($dbc,$query1);

			$stmt2 = mysqli_prepare($dbc,$query2);

			$stmt3 = mysqli_prepare($dbc,$query3);

			$stmt4 = mysqli_query($dbc,$query4);


			$result = mysqli_query($dbc,$query3);

			$value = mysqli_fetch_object($result);

			mysqli_stmt_bind_param($stmt2,"issss", $value->clientId, $car_manufacturer, $car_name,$car_model,$car_value);
			mysqli_stmt_execute($stmt2);



			$affected_rows2 = mysqli_stmt_affected_rows($stmt2);

			#if both inserts went through
			if($affected_rows2 == 1){
				echo 'Client Added';
				$change_page = true;

				mysqli_stmt_close($stmt2);
				mysqli_close($dbc);
			} else{
				echo 'error occurred <br />';
				echo mysqli_error($dbc);


				mysqli_stmt_close($stmt2);

				mysqli_close($dbc);
			}
	}

		}else{
			//$data_missing = array();
			$data_missing[] = "First Name";
			$data_missing[] = "Last Name";
			$data_missing[] = "Address Line 1";
			$data_missing[] = "Province";
			$data_missing[] = "City";
			$data_missing[] = "Car Model";
			$data_missing[] = "Car Name";
			$data_missing[] = "Car Manufacturer";
			$data_missing[] = "Email";
			$data_missing[] = "Phone Number 1";
			$data_missing[] = "Subject";
			$data_missing[] = "Message";
		}



?>

<!-- Modals -->

						<!-- invalid input for first_name -->
						<div class="modal fade" id="invalidFN" tabindex="-1" role="dialog" aria-labelledby="invalidFN" aria-hidden="true">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title" id="takenEM" style="color: black">Oops!</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
							  </div>
							  <div class="modal-body" style="color: black">
								<p>
								 <?php

										 echo 'You entered invalid information for the following fields: <br />';
										 foreach((array)$data_missing as $missing){
											echo "$missing <br />";
										 }
								 ?>
								</p>
							  </div>
							</div>
						  </div>
						</div>


<!--Show modals-->
  <?php if($modal1) : ?>
    <script>
      $("#invalidFN").modal()
    </script>
  <?php endif; ?>

  <?php if($change_page) : ?>
      <script>
       window.location = "addClient_clientadded.php";
      </script>
  <?php endif; ?>

  </body>

</html>
