<?
		session_start();
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