<!DOCTYPE html>
<html lang="en">
<head>
	<title>contact details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">

		<form name="form" action="#" method="post">
			<h1 style="text-align: center">Contact Details</h1>
			<div class="row" style="margin-top: 30px;">
				<div class="col-md-6">
					<label>First Name:</label>
					<input name="firstname" type="text" class="form-control">
				</div>
				<div class="col-md-6">
					<label>Last Name:</label>
					<input name="lastname" type="text" class="form-control">
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Email:</label>
					<input name="email" type="text" class="form-control">
				</div>
				<div class="col-md-6">
					<label>Phone:</label>
					<input name="phone" type="text" class="form-control">
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Birth day:</label>
					<input name="dob" type="date" class="form-control">
				</div>
				<div class="col-md-6">
					<label>Passport Id:</label>
					<input name="passportId" type="text" class="form-control" rows="10" cols="30">
				</div>	
			</div>

			<div class="row" style="margin-top: 40px;">
				<div class="col-md-12">
					<label style="margin-top: 0px;">Comments:</label>
					<textarea name="comments" rows="5" cols="100%">
					</textarea>
				</div>
			</div>

		<div style="margin-left: 50%; margin-top: 20px;">
			<input type="submit" name="submit" value="Submit">
		</div>		

		</form>

		<div style="margin-left: 47.5%; margin-top: 30px;">
			<form>
		    	<input type="submit" name="submit" value="Choose Payment" onclick="window.location.href='http://localhost/Rider%20Project/paymentdetails.php'" />
			</form>
		</div>

	</div>

</body>
</html>

<?php

	if(isset($_POST['submit'])){
	
		error_reporting(0);

		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$dob=$_POST['dob'];
		$passportId=$_POST['passportId'];
		$comments=$_POST['comments'];

		
		$hostname= "localhost";
		$username="root";
		$password="";
		
		$con = mysqli_connect($hostname,$username,$password);
		
		$database=mysqli_select_db($con,"taxi");

		$sql="INSERT INTO contact(firstname,lastname,email,phone,dob,passportId,comments) VALUES('$firstname','$lastname','$email','$phone','$dob','$passportId','$comments')";
		
		$result=mysqli_query($con,$sql);
		
		mysqli_close($con);

		
		
	}
?>