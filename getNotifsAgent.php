
<?php
# Connect to Database
        	require_once('home_Agent_mysqli_connect.php');
          $tempEmpId = $_SESSION['employeeId'];
          # query
          $query = "SELECT COUNT(*) as 'NUM' FROM notification WHERE notifType >= 2 and isApproved = 0 and employeeId = $tempEmpId";
          $result = mysqli_query($dbc, $query);
          $data = mysqli_fetch_assoc($result);
?>
          <!-- NOTIFICATION BUTTON -->
              <button id="notifications" class="btn dropdown-toggle text-white" data-toggle="dropdown" style="cursor:pointer">
            			<i style="color: #f42929"class="fa d-inline fa-lg fa-exclamation -o"></i>
            				  <span style="font-size: 18px; font-family: 'Roboto', sans-serif" class="w3-badge w3-red"><?php echo $data['NUM'];?></span>
            					     Notifications
			        </button>
          <div class="dropdown-menu">
          <!-- NOTIFICATION Data -->
<?php


  $query1 = "SELECT e.firstName, e.lastName, n.message, e.employeeId, n.employeeId, n.timeCreated, e.managedBy, e.isManager, n.notifType, n.isApproved FROM employee e, notification n WHERE e.employeeId = n.employeeId and e.employeeId = $tempEmpId and notifType >= 2 and n.isApproved = 0 ORDER BY n.timeCreated LIMIT 3";
  $result1 = mysqli_query($dbc, $query1);

  #INCREMENT ID LOOP
  while($data1 = mysqli_fetch_assoc($result1)){
    echo '<a class="dropdown-item text-center"><center><a href="#">'.$data1["firstName"].' '.$data1["lastName"].'</a>'. ': '. $data1["message"]. '<a href="#"></a></center></a></a>';
    echo '<div class="dropdown-divider"></div>';
  }
?>
