<html>
<head>
<title> add client </title>
</head>
<body>


<?php
	if(isset($_POST['submit'])){
		$data_missing = array();
		
		
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
		
		if(empty($_POST['address'])){
			
			$data_missing[] = "Address";
		}else{
			
			$house_address = trim($_POST['address']);
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
		
		if(empty($_POST['carmake'])){
			
			$data_missing[] = "Car Make";
		}else{
			
			$car_make = trim($_POST['carmake']);
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
		
		if(empty($_POST['phonenumber'])){
			
			$data_missing[] = "Phone Number";
		}else{
			
			$phone_number = trim($_POST['phonenumber']);
		}
		
		#if there is no data missing, execute code
		if(empty($data_missing)){
			
			#connects mysql to php
			require_once('home_Agent_mysqli_connect.php');
			
			#inserts the client to the table
			$query1 = "INSERT INTO client(employeeId,firstName,lastName,addressline1,province,city,postalCode,phonenumber1) VALUES(10001,?,?,?,?,?,?,?)";
			#inserts carinfo along with the client
			$query2 = "INSERT INTO carinfo(clientId,manufacturer,modelYear,model,value) VALUES(?,?,?,?,?)";
			#searches for the clientId to put with the carinfo
			$query3 = "SELECT clientId from client WHERE lastName='$last_name' limit 1";
			
			
	
		
		$stmt1 = mysqli_prepare($dbc,$query1);
		
		$stmt2 = mysqli_prepare($dbc,$query2);
		
		$stmt3 = mysqli_prepare($dbc,$query3);
		
		mysqli_stmt_bind_param($stmt1,"sssssis", $first_name,$last_name, $house_address,$client_province,$client_city,$client_postalcode,$phone_number);
		
		mysqli_stmt_execute($stmt1);
		
		$result = mysqli_query($dbc,$query3);
		
		$value = mysqli_fetch_object($result);

		
		
		mysqli_stmt_bind_param($stmt2,"issss", $value->clientId, $car_manufacturer, $car_name,$car_model,$car_value);
		mysqli_stmt_execute($stmt2);
		
	
		$affected_rows1 = mysqli_stmt_affected_rows($stmt1);
		$affected_rows2 = mysqli_stmt_affected_rows($stmt2);
		
		#if both inserts went through
		if($affected_rows1 == 1 and $affected_rows2 == 1){
			echo 'Client Added';
			
			mysqli_stmt_close($stmt1);
			
			mysqli_stmt_close($stmt2);
			mysqli_close($dbc);
		} else{
			echo 'error occurred <br />';
			echo mysqli_error($dbc);
			
			mysqli_stmt_close($stmt1);
			
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

<form action = "http://localhost:8080/upperlimit/clientadded.php" method = "post">	  
                <div class="form-group"> <label>First Name</label>
                  <input type="text" name="firstname" class="form-control" placeholder="Enter client's first name" required> </div>
				<div class="form-group"> <label>Last Name</label>
                  <input type="text" name="lastname" class="form-control" placeholder="Enter client's last name" required> </div>
                <div class="form-group"> <label>Address</label>
                  <input type="text" name="address" class="form-control" placeholder="Enter client's address" required> </div>
				<div class="form-group"> <label>Province</label>
                  <input type="text" name="province" class="form-control" placeholder="Enter province" required> </div>
				<div class="form-group"> <label>City</label>
                  <input type="text" name="city" class="form-control" placeholder="Enter city" required> </div>
				<div class="form-group"> <label>Postal Code</label>
                  <input type="number" name="postalcode" min="1" step="any" class="form-control" placeholder="Enter postal code" required> </div>
                <div class="form-group"> <label>Car Make</label>
                  <input type="text" name="carmake" class="form-control" placeholder="Enter car make" required> </div>
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
                <div class="form-group"> <label>Phone Number</label>
                  <input type="tel" name="phonenumber" class="form-control" placeholder="Enter client's mobile/landline number" required> </div>
                <div class="form-group"> <label>Payments</label>
                  <input type="number" min="1" step="any" id="abc" onkeyup="s()" class="form-control" placeholder="Enter payments" required> </div>								
				
							  <div class="form-group">
								<label for="recipient-name" class="form-control-label">Recipient:</label>
								<input type="text" class="form-control" id="recipient-name">
							  </div>
							  <div class="form-group">
								<label for="recipient-name" class="form-control-label">Subject:</label>
								<input type="text" class="form-control" id="subject">
							  </div>							  
							  <div class="form-group">
								<label for="message-text" class="form-control-label">Details:</label>
								<textarea class="form-control" id="message-text"></textarea>
							  </div>

						
						  <p>
							<input type="submit" name="submit" value="Send" />
						</p>						  
						  </form>
</body>

</html>