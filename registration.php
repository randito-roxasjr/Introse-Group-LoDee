<?php
  session_start();
  $enable_header = false;
  $invalid_name = false;
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
    #login:hover, #home:hover, #myBtn:hover {
		background-color: rgba(0, 0, 0, 0.3);
    }

	#eye{
		cursor:pointer;
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

  </style>
</head>

<body>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:900i|Roboto:900i" rel="stylesheet">
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
			<a id="login" class="btn navbar-btn ml-2 text-white" href="login.php"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Log in</a>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-5" style="background-color: #FFFFFF">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5" style="background-color: #087830">
            <div class="card-body">
              <h2 class="mb-4">Registration form</h2>

              <!-- FORM -->
              <form method = "post">

                <div class="form-group"> <label>First Name</label>
                  <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" required> </div>

                <div class="form-group"> <label>Last Name</label>
                  <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" required> </div>


                 <div class="form-group"> <label>Email Address</label>
                  <input type="email" class="form-control" name="user_email" placeholder="Enter Email" required> </div>

                <div class="form-group"> <label>Complete Address</label>
                    <input type="text" class="form-control" name="address" size="50" placeholder="Enter Address" required> </div>

                <div class="form-group"> <label>Password</label>
					<div class="input-group">
					   <input type="password" class="form-control" id="pwd" name="password1" placeholder="Enter Password" required>
					   <span class="input-group-btn">
							<button class="btn btn-default" type="button" id="eye" title="Show password">
								<img src="https://cdn0.iconfinder.com/data/icons/feather/96/eye-16.png" alt="eye" />
							</button>
					   </span>
					</div>
				  <script>
					function show() {
						var p = document.getElementById('pwd');
						p.setAttribute('type', 'text');
					}
					function hide() {
						var p = document.getElementById('pwd');
						p.setAttribute('type', 'password');
					}
					var pwShown = 0;
					document.getElementById("eye").addEventListener("click", function () {
						if (pwShown == 0) {
							pwShown = 1;
							show();
						} else {
							pwShown = 0;
							hide();
						}
					}, false);
				  </script>
				</div>

                <div class="form-group"> <label>Confirm Password</label>
                  <input type="password" class="form-control" name="password2" placeholder="Confirm Password" required> </div>

                <div class="form-group"> <label>Contact Number</label>
                  <input type="tel" class="form-control" name="contact_num" placeholder="Enter Contact Number" required> </div>
                  <button type="submit" name="send_info" class="btn btn-primary" name ="send_info" style="cursor:pointer">Submit</button>

				<!-- Modals -->

				<!-- Email already taken -->
				<div class="modal" id="takenEM" tabindex="-1" role="dialog" aria-labelledby="takenEM" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="takenEM" style="color: black">Oops!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
					  </div>
					  <div class="modal-body" style="color: black">
						<p>
						  The email you entered is
						  <span style="color: #ff0000">already taken</span>
						</p>
					  </div>
					</div>
				  </div>
				</div>

				<!-- Passwords don't match -->
				<div class="modal" id="wrongPW" tabindex="-1" role="dialog" aria-labelledby="wrongPW" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="wrongPW" style="color: black">Oops!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
					  </div>
					  <div class="modal-body" style="color: black">
						<p>
						  The passwords you entered
						  <span style="color: #ff0000">don't match</span>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </div>


  <!--PHP SECTION-->
  <?php
  	require_once('home_Agent_mysqli_connect.php');

    #### Inserting Data
    $wrong_email = false;
    $wrong_pass = false;
  	if (isset($_POST['send_info'])){
  		$empty_data = array();
  		#Get first name
  		if(empty($_POST['first_name']) or preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬1234567890]/', $_POST['first_name']) or ctype_space($_POST['first_name'])){
  			$empty_data[] = 'First Name';
			$invalid_name = true;
  		}
  		else{
  			#Remove white space and store
  			$first_name = trim($_POST['first_name']);
  		}
  		#Get last name
  		if(empty($_POST['last_name']) or preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬1234567890]/', $_POST['last_name']) or ctype_space($_POST['last_name'])){
  			$empty_data[] = 'Last Name';
			$invalid_name = true;
  		}
  		else{
  			#Remove white space and store
  			$last_name = trim($_POST['last_name']);
  		}
  		#Get complete address
  		if(empty($_POST['address']) or ctype_space($_POST['address'])){
  			$empty_data[] = 'Address';
  		}
  		else{
  			#Remove white space and store
  			$address = trim($_POST['address']);
  		}
  		#Get EMAIL
  		if(empty($_POST['user_email'])){
  			$empty_data[] = 'Email Address';
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
  				#echo 'Passwords match<br />';
  				#Remove white space and store
  				$user_password = trim($_POST['password1']);
  			}
  			else{
  				echo 'Passwords do not match<br />';
          $wrong_pass = true;
  				$empty_data[] = 'password1';
  				$empty_data[] = 'password2';
  			}
  		}
  		#GET CONTACT DETAILS
  		if(empty($_POST['contact_num']) or !ctype_digit($_POST['contact_num'])){
  			$empty_data[] = 'Contact number';
			$invalid_name = true;
  		}
  		else{
  			#Remove white space and store
  			$contact_num = trim($_POST['contact_num']);
  		}
  		if(empty($empty_data)){
  			$query2 = "SELECT email_address FROM employee WHERE email_address='$email_address' limit 1";
  			$result2 = mysqli_query($dbc, $query2);
  			$data = mysqli_fetch_assoc($result2);

        if($data["email_address"] == $email_address){
  				$wrong_email = true;
  				mysqli_close($dbc);
  			}

        $query = "INSERT INTO Employee (firstName, lastName, addressLine1, phoneNumber1, email_address, password, isManager, managedBy) VALUES ('$first_name', '$last_name', '$address', '$contact_num', '$email_address', '$user_password', 0, 10014)";
        $result = mysqli_query($dbc, $query);

        if($result){
          #GET RECENT ID
          $query2 = "SELECT employeeId, email_address FROM employee WHERE email_address='$email_address' limit 1";
          $result1 = mysqli_query($dbc, $query2);
          $data = mysqli_fetch_assoc($result1);

          $message = 'Agent Registration by: <br>' . $first_name . ' ' . $last_name;
          #INSERT INTO NOTIFICATION TABLE
          $time_now = date("Y-m-d H:i:s");
          $query3 = "INSERT INTO Notification (employeeId, message, isRead, timeCreated, isApproved, notifType) VALUES ('$data[employeeId]', '$message', 0, '$time_now', 0, 0)";
          $result2 = mysqli_query($dbc, $query3);

          if($result1 and $result2){
              $enable_header = true;
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
  				echo "Error, not registered <br />";
  				echo mysqli_error($dbc);
  				#mysqli_stmt_close($result);
  				mysqli_close($dbc);
  			}
  		}
  	}
  ?>

  <!-- invalid input for first_name -->
						<div class="modal" id="invalidFN" tabindex="-1" role="dialog" aria-labelledby="invalidFN" aria-hidden="true">
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

										 foreach($empty_data as $missing){
										 echo "$missing <br />";
										 }
								 ?>
								</p>
							  </div>
							</div>
						  </div>
						</div>

  <!--Show modals-->
  <?php if($wrong_pass) : ?>
    <script>
      $("#wrongPW").modal()
    </script>
  <?php elseif($wrong_email) : ?>
    <script>
      $("#takenEM").modal()
    </script>
  <?php elseif($invalid_name) : ?>
    <script>
      $("#invalidFN").modal()
    </script>
  <?php endif;?>

  <?php if($enable_header) : ?>
     <script>
        window.location = "registration_registered.php";
     </script>
  <?php endif;?>
</body>

</html>
