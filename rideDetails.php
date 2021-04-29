<?php
if(isset($_POST['submit'])){
	
	$pickupdate=$_POST['pickupdate'];
	$pickuptime=$_POST['pickuptime'];
	$pickUpLocation=$_POST['pickUpLocation'];
	$dorpOffLocation=$_POST['dorpOffLocation'];


	$hostname='localhost';
	$username='root';
	$password='';

	$con=mysqli_connect($hostname,$username,$password);
	
	$db=mysqli_select_db($con, "taxi");

	$sql="INSERT INTO ride(pickupdate,pickuptime,pickUpLocation,dorpOffLocation) VALUES ('$pickupdate','$pickuptime','$pickUpLocation','$dorpOffLocation')";
	
	$result= mysqli_query($con,$sql);

	if (mysqli_query($con, $sql)) {
    	echo "New record created successfully";
	}
	
	mysqli_close($con);

	 
}
?>

<html>
<head>
<title>Booking System</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

	<body>

		<div class="container">
			<h1>Rider Details</h1>
		
		    <form name="form" action="#" method="post">
		    	
		    	<div class="form-group">
				  <label>Pickup Date:</label>
				  <input type="date" class="form-control" name="pickupdate" id="pickupdate">
				</div>

				<div class="form-group">
				  <label>Pickup time:</label>
				  <input type="time" class="form-control" name="pickuptime" id="pickuptime">
				</div>

				<div class="form-group">
				    <label>Pickup Location:</label>
				    <select class="form-control" name="pickUpLocation" id="pickUpLocation">
				      <option value="Colombo">Colombo</option>
		              <option value="Jaffna">Jaffna</option>
		              <option value="Mathtara">Mathtara</option>
		              <option value="Kaluthara">Kaluthara</option>
				    </select>
  				</div>

  				<div class="form-group">
				    <label>Drop Off Location:</label>
				    <select class="form-control" name="dorpOffLocation" id="dorpOffLocation">
				      <option value="Galle">Galle</option>
		              <option value="Katharagama">Katharagama</option>
		              <option value="Bandarawela">Bandarawela</option>
		              <option value="Ella">Ella</option>
				    </select>
  				</div>

		        <div class="form-group">
		        	<input type="submit" name="submit" value="Submit" />
		        </div>
		        
		        <div class="form-group">
		        	<input type="text" name="distance" placeholder="Total Distance" value="" />
		         	<input type="text" name="duratoin" placeholder="Total Duration" value="" />
		        </div>

		        <script>history.pushState({}, "", "")</script>
		         
	 
		    </form>

			<!-- After Buttion click go to the link --> 
		    <form>
		    	<input type="button" value="Choose Vehical" onclick="window.location.href='http://localhost/Rider%20Project/chooseVehical.php'" />
		    </form>

		</div>
		

	</body>
</html>
