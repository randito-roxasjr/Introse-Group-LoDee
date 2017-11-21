<html>
<head>
</head>
<title></title>
<body>

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	#connect
	$dbc = @mysqli_connect($servername, $username, $password, 'upperlimit') OR die("Connection Failed: " . mysqli_connect_error());
	#### Checking Data
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

			$query = "SELECT email_address, password FROM employee WHERE email_address='$email' and password='$password' limit 1";
			$result = mysqli_query($dbc, $query);

			#parse data to strings
			$data = mysqli_fetch_assoc($result);
			echo $data["password"] . '<br />' . $data["email_address"] . '<br />';

			if(($data["password"] == $password) && ($data["email_address"] == $email)){
				echo "successfully logged in";
				#mysqli_stmt_close($result);
				mysqli_close($dbc);
			}
			else{
				echo "log in denied <br />";
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
	else{
		echo 'button sucks';
	}
?>
</body>
</head>
</html>
