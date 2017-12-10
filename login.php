<?php
session_start();
$enable_header=false;
$enable_manager=false
?>
<!DOCTYPE html>
<html>

<head>
    <style>
      nav,
      #container {
        background-color: #087830;
      }
      #register:hover, #home:hover {
        background-color: rgba(0, 0, 0, 0.3);
      }
      #brand:hover {
        text-shadow: 2px 2px #000000;
      }
      #login:hover {
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.3);
      }

  	/* The Modal (background) */

      .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 200px;
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
        width: 100%;
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

  	.form-group {
  		color: white;
  	}
    </style>
</head>

<body>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:900i|Roboto:900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container">
      <a id="brand" class="navbar-brand" href="home.html"><i class="fa d-inline fa-lg fa-cloud"></i><b style="font-family: 'Roboto', sans-serif">  Upper Limit Insurance</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent"
        aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
			<a id="home" class="btn navbar-btn ml-2 text-white" href="home.html"><i class="fa fa-home" aria-hidden="true" style="font-size:20px"></i> Home</a>
			<a id="register" class="btn navbar-btn ml-2 text-white" href="registration.html"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Register</a>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-5" style="background-color: #FFFFFF">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div id="container" class="card p-5">
            <div class="card-body">
              <h2 class="mb-4" style="color: white">Login form</h2>

              <!-- FORM-->
              <form method="post">
                  <div class="form-group"> <label>Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
  				        </div>

                <div class="form-group"> <label>Password</label>
                  <div class="input-group">
        					   <input type="password" name="password" class="form-control" id="pwd" name="password1" placeholder="Enter Password" required>
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
                <div class="form-group">

        <!-- submit buton-->
        <input type="submit" id="abc2" name="log_in" value="Login" class="btn btn-primary" style="cursor: pointer"/>

        <!-- Modal for wrong email -->
      		<div class="modal fade" id="wrongEM" tabindex="-1" role="dialog" aria-labelledby="wrongEM" aria-hidden="true">
      				<div class="modal-dialog" role="document">
      					<div class="modal-content">
      					  <div class="modal-header">
          						<h5 class="modal-title" id="wrongEM" style="color: black">Oops!</h5>
          						<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          					  </div>
          					  <div class="modal-body" style="color: black">
          						<p>
          						  You entered the
          						  <span style="color: #ff0000">wrong email</span>
          						</p>
      					  </div>
      					</div>
      			  </div>
    				</div>

        <!-- Modal for wrong password-->
        	<div class="modal fade" id="wrongPW" tabindex="-1" role="dialog" aria-labelledby="wrongPW" aria-hidden="true">
  				  <div class="modal-dialog" role="document">
    					<div class="modal-content">
    					  <div class="modal-header">
        						<h5 class="modal-title" id="wrongPW" style="color: black">Oops!</h5>
        						<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        					  </div>
        					  <div class="modal-body" style="color: black">
        						<p>
        						  You entered the
        						  <span style="color: #ff0000">wrong password</span>
        						</p>
    					  </div>
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
    #### Checking Data
    $wrong_email = false;
    $wrong_pass = false;

  	if (isset($_POST['log_in'])){
  		$empty_data = array();
  		#Get email entered
  		if(empty($_POST['email'])){
  			$empty_data[] = 'email';
  		}
  		else{
  			#Remove white space and store
  			$email = trim($_POST['email']);
  		}
  		#GET PASSWORD ENTERED
  		if(empty($_POST['password'])){
  			$empty_data[] = 'password';
  		}
  		else{
  				#Remove white space and store
  				$password = trim($_POST['password']);
  		}

  		if(empty($empty_data)){
  			$query = "SELECT email_address, password, firstName, lastName, employeeId, isManager FROM employee WHERE email_address='$email' or password='$password' limit 1";
  			$result = mysqli_query($dbc, $query);
  			#parse data to strings
  			$data = mysqli_fetch_assoc($result);
  			$input_pass = $data["password"];
  			$input_email = $data["email_address"];

  			#Check if data is matched
  			if(($data["password"] == $password) && ($input_email == $email)){
  				#Session Variables
  				$_SESSION["logged_user"] = $data["firstName"] . ' ' . $data["lastName"];
          $_SESSION['employeeId'] = $data["employeeId"];

          # Agent or Manager
          if ($data["isManager"] == 1){
            $enable_manager = true;
    				mysqli_close($dbc);
          }
          else{
            $enable_header = true;
    				mysqli_close($dbc);
          }
  			}
  			else if(($input_pass != $password) && ($input_email == $email)){
          $wrong_pass = true;
  				echo mysqli_error($dbc);

  				mysqli_close($dbc);
  			}
  			else if(($input_pass == $password) && ($input_email != $email)){
          $wrong_email = true;
  				echo mysqli_error($dbc);
  				mysqli_close($dbc);
  			}
  			else{
          echo 'here';
          $wrong_email = true;
  				echo mysqli_error($dbc);
  				mysqli_close($dbc);
  			}
  		}
  	}
  	else{
  		#echo 'button sucks';
  	}
  ?>

  <!--Show modals-->
  <?php if($wrong_pass) : ?>
    <script>
      $("#wrongPW").modal()
    </script>
  <?php elseif($wrong_email) : ?>
    <script>
      $("#wrongEM").modal()
    </script>
  <?php endif;?>

  <?php if($enable_header) : ?>
      <script>
       window.location = "home_Agent.php";
      </script>
  <?php elseif($enable_manager) : ?>
      <script>
       window.location = "home_Manager.php";
      </script>
  <?php endif;?>
</body>

</html>
