<?php
if (isset($_REQUEST["edit1"])) {

	error_reporting(0);

	$hostname = "localhost";
	$username = "root";
	$password = "";

	$con = mysqli_connect($hostname, $username, $password);


	$database = mysqli_select_db($con, "taxi");

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$dob = $_POST['dob'];
	$passportId = $_POST['passportId'];
	$comments = $_POST['comments'];

	$sql = "UPDATE contact SET firstname='$firstname',lastname='$lastname',email='$email',phone='$phone',dob='$dob',passportId='$passportId',comments='$comments' WHERE passportId='$passportId'";
	//echo $sql;
	$result = mysqli_query($con, $sql);
	return $result;
	if ($con->query($sql) === TRUE) {
		echo "Record updated successfully: $result<br />";
	} else {
		echo "Error updating record: " . $con->error;
	}

	mysqli_close($con);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>card booking summary</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>


    <!-- Summary -->

    <div class="container">
        <div>
            <h1> Booking Summary</h1>
        </div>

        <div class="row">

            <div class="col-md-4">
                <h2>Ride Details</h2>

                <form>

                    <div class="row" style="margin-top: 30px;">

                        <div class="col-md-6">
                            <label for="inputPrefilledEx">First Name:</label>
                            <input name="firstname" type="text" class="form-control" value="<?php echo $row[1]; ?>">
                        </div>

                        <div class="col-md-6">
                            <label>Last Name:</label>
                            <input name="lastname" type="text" class="form-control" value="<?php echo $row[2]; ?>">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Email:</label>
                            <input name="email" type="text" class="form-control" value="<?php echo $row[3]; ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Phone:</label>
                            <input name="phone" type="text" class="form-control" value="<?php echo $row[4]; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Birth day:</label>
                            <input name="dob" type="date" class="form-control" value="<?php echo $row[5]; ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Passport Id:</label>
                            <input name="passportId" type="text" class="form-control" value="<?php echo $row[6]; ?>">
                        </div>
                    </div>

                    <div class="row" style="margin-top: 40px;">
                        <div class="col-md-12">
                            <label style="margin-top: 0px;">Comments:</label>
                            <textarea name="comments" rows="5" cols="50" value="<?php echo $row[7]; ?>">
							</textarea>
                        </div>
                    </div>

                    <div style="margin-left: 50%; margin-top: 20px;">
                        <input class="button1" name="edit1" type="submit" value="Edit">
                    </div>

                    <script>
                    history.pushState({}, "", "")
                    </script>

                </form>

            </div>

            <div class="col-md-4">
                <h1 class="display-4">Payment Details</h1>


                <form>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="cardpayment" value="cardpayment"
                            name="payment" checked>
                        <label class="custom-control-label">Card Payment</label><br>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="cashpayment" value="cashpayment"
                            name="payment">
                        <label class="custom-control-label">Deposit to Bank / Direct Transfer</label>
                    </div>

                    <div style="margin-left: 50%; margin-top: 20px;">
                        <input class="button1" name="edit2" type="submit" value="Edit">
                    </div>
                </form>

            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <label>Total Distance:</label>
                        <input name="distance" type="text" class="form-control" value="">
                    </div>
                    <div class="col-md-6">
                        <label>Total Price:</label>
                        <input name="price" type="text" class="form-control" value="">
                    </div>
                </div>
            </div>

        </div>


        <!-- button -->
        <div class="row">


            <div class="col-md-10">

            </div>

            <div class="col-md-2">

                <form>
                    <input type="button" value="BOOK NOW!"
                        onclick="window.location.href='https://support.payhere.lk/links-&-buttons/payhere-buttons'" />
                </form>

            </div>


        </div>

    </div>


</body>

</html>