<?php
  session_start();
  $enable_header = false;
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

	#eye{
		cursor:pointer;
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
			<a id="login" class="btn navbar-btn ml-2 text-white" href="login.html"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Log in</a>
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

                <div class="form-group"> <label>Complete Address</label>
                    <input type="text" class="form-control" name="address" size="50" placeholder="Enter Email" required> </div>

                <div class="form-group"> <label>Email Address</label>
                  <input type="email" class="form-control" name="user_email" placeholder="Enter Email" required> </div>

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
				<div class="modal fade" id="takenEM" tabindex="-1" role="dialog" aria-labelledby="takenEM" aria-hidden="true">
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
				<div class="modal fade" id="wrongPW" tabindex="-1" role="dialog" aria-labelledby="wrongPW" aria-hidden="true">
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
  	$servername = "localhost";
  	$username = "root";
  	$password = "1234";

  	#connect
  	$dbc = @mysqli_connect($servername, $username, $password, 'upperlimit') OR die("Connection Failed: " . mysqli_connect_error());
  	#### Inserting Data
    $wrong_email = false;
    $wrong_pass = false;
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
  		if(empty($_POST['contact_num'])){
  			$empty_data[] = 'contact number';
  		}
  		else{
  			#Remove white space and store
  			$contact_num = trim($_POST['contact_num']);
  		}
  		if(empty($empty_data)){
  			$query2 = "SELECT email_address FROM employee WHERE email_address='$email_address' limit 1";
  			$result2 = mysqli_query($dbc, $query2);
  			$data = mysqli_fetch_assoc($result2);

        $query = "INSERT INTO Employee (firstName, lastName, addressLine1, phoneNumber1, email_address, password, isManager) VALUES ('$first_name', '$last_name', '$address', '$contact_num', '$email_address', '$user_password', 0)";
        $result = mysqli_query($dbc, $query);

  			if($data["email_address"] == $email_address){
  				$wrong_email = true;
  				mysqli_close($dbc);
  			}
        else if($result){
          $enable_header = true;
          echo 'Employee registered';
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
  			echo "Enter required Data<br />";
  			foreach($empty_data as $missing){
  					echo $missing;
  				}
  		}
  	}
  ?>

  <!--Show modals-->
  <?php if($wrong_pass) : ?>
    <script>
      $("#wrongPW").modal()
    </script>
  <?php elseif($wrong_email) : ?>
    <script>
      $("#takenEM").modal()
    </script>
  <?php endif;?>

  <?php if($enable_header) : ?>
     <script>
        window.location = "registration_registered.php";
     </script>
  <?php endif;?>
</body>

</html>
