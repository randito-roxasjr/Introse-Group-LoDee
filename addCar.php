<!-- This page allows a client/employee to submit another car for a specific 
	 client into the database. -->

<?php 
  session_start();
  $invalid_modal = false;
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
              <h2 style="color: white;" class="mb-4">Add Car</h2>			  
              <form method = "post">	  
                <div class="form-group"> <label>Car Model</label>
                  <input type="text" name="carmodel" class="form-control" placeholder="Enter car model" required> </div>
                <div class="form-group"> <label>Car Name</label>
                  <input type="text" name="carname" class="form-control" placeholder="Enter car name" required> </div>
				<div class="form-group"> <label>Car Manufacturer</label>
                  <input type="text" name="carmanufacturer" class="form-control" placeholder="Enter car manufacturer" required> </div>
                <div class="form-group"> <label>Car Value</label>
                  <input type="number" min="1" step="any" id="abc" onkeyup="s()" name="carvalue" min="1" step="any" class="form-control" placeholder="Enter car value" required> </div>  
				<div class="form-group">
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
				</form>
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


    $employee_login = $_SESSION["employeeId"];

    #each one of these looks for a value from the html form, if it is not there, it gets added to data_missing
    if(empty($_POST['carmodel']) or ctype_space($_POST['carmodel'])){

      $data_missing[] = "Car Model";
	  $invalid_modal = true;
    }else{

      $car_model = trim($_POST['carmodel']);
    }

    if(empty($_POST['carname']) or ctype_space($_POST['carname'])){

      $data_missing[] = "Car Name";
	  $invalid_modal = true;
    }else{

      $car_name = trim($_POST['carname']);
    }

    if(empty($_POST['carmanufacturer']) or ctype_space($_POST['carmanufacturer'])){

      $data_missing[] = "Car Manufacturer";
	  $invalid_modal = true;
    }else{

      $car_manufacturer = trim($_POST['carmanufacturer']);
    }

    if(empty($_POST['carvalue']) or ($_POST['carmodel'] < 0)){

      $data_missing[] = "Car Value";
	  $invalid_modal = true;
    }else{

      $car_value = trim($_POST['carvalue']);
    }


    #if there is no data missing, execute code
    if(empty($data_missing)){
      $employee_login = $_SESSION["employeeId"];
      #connects mysql to php
      $servername = "localhost";
        $username = "root";
        $password = "1234";
        $clientId = $_GET['id'];
        #connect
        $dbc = @mysqli_connect("localhost", "root", "1234", 'upperlimit') OR die("Connection Failed: " . mysqli_connect_error());

      #inserts the car to the table
      $query1 = "INSERT INTO carInfo(clientId,manufacturer,modelYear,model,value) VALUES('$clientId', '$car_manufacturer', '$car_model', '$car_name', '$car_value')";
      mysqli_query($dbc,$query1);

    // if(mysqli_query($dbc, $query1)){
    //   echo "Added Car";
    // }
    // else{
    //   echo "Error: " . mysqli_error($dbc);
    // }

		$change_page = true;

    }





  }


?>



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
										global $data_missing;
										 foreach((array)$data_missing as $missing){
											echo "$missing <br />";
										 }
								 ?>							  
								</p>
							  </div>
							</div>
						  </div>
						</div>  

 <?php if($invalid_modal) : ?>
    <script>
      $("#invalidFN").modal()
    </script>	
 <?php endif; ?>
 
  <?php if($change_page) : ?>
      <script>
       window.location = "carAdded.php";
      </script>
  <?php endif; ?>



</body>

</html>