<?php
if (isset($_REQUEST["submit"])) {

    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $dob = $_REQUEST['dob'];
    $passportId = $_REQUEST['passportId'];
    $comments = $_REQUEST['comments'];
    $pickupdate = $_REQUEST['pickupdate'];
    $pickuptime = $_REQUEST['pickuptime'];
    $pickUpLocation = $_REQUEST['pickUpLocation'];
    $dorpOffLocation = $_REQUEST['dorpOffLocation'];
    $payment = $_REQUEST['payment'];
    $pasengers = $_REQUEST['pasengers'];
    $suitcases = $_REQUEST['suitcases'];
    $vehicle = $_REQUEST['vehicle'];

    //Mail to admin
    $to = "pdncpathiraja@gmail.com"; //change
    $subject = "Customer Booking";

    $message = "
<html>
<head>
<title>Booking Details</title>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
</head>
<body>
<p>Customer Booking Details</p>
<table class='table table-dark table-striped'>
<thead>
      <tr>
        <th>Details</th>
        <th>Value</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td>First Name</td>
        <td>$firstname</td>
    </tr>
    <tr>
        <td>Last name</td>
        <td>$lastname</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>$email</td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td>$phone</td>
    </tr>
    <tr>
        <td>Date Of Birth</td>
        <td>$dob</td>
    </tr>
    <tr>
        <td>Passport ID</td>
        <td>$passportId</td>
    </tr>
    <tr>
        <td>Comment</td>
        <td>$comments</td>
    </tr>
    <tr>
        <td>Pickup Date</td>
        <td>$pickupdate</td>
    </tr>
    <tr>
        <td>Pickup Time</td>
        <td>$pickuptime</td>
    </tr>
    <tr>
        <td>Pickup Location</td>
        <td>$pickUpLocation</td>
    </tr>
    <tr>
        <td>DropOff Location</td>
        <td>$dorpOffLocation</td>
    </tr>
    <tr>
        <td>Payment Method</td>
        <td>$payment</td>
      </tr>
      <tr>
        <td>Number Of Pasengers</td>
        <td>$pasengers</td>
      </tr>
      <tr>
        <td>Number of Suitcases</td>
        <td>$suitcases</td>
      </tr>
      <tr>
        <td>Vehicle Type</td>
        <td>$vehicle</td>
      </tr>
    </tbody>
</table>
<p>Copy This!</p>
<table class='table table-dark table-striped'>
    <thead>
      <tr>
        <th>Vehicle Type </th>
        <th>Pickup Location </th>
        <th>Dropoff Location </th>
        <th>PickUp Date </th>
        <th>PickUp Time </th>
        <td>Number Of Pasengers </td>
        <td>Number of Suitcases </td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>$vehicle</td>
        <td>$pickUpLocation</td>
        <td>$dorpOffLocation</td>
        <td>$pickupdate</td>
        <td>$pickuptime</td>
        <td>$pasengers</td>
        <td>$suitcases</td>
    </tbody>
  </table>


</body>
</html>
";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= "$email" . "\r\n";


    mail($to, $subject, $message, $headers);

    // Mail To Customer
    $customerMsg = "Your Booking Send Success.Thank You..!";
    $Customersubject = "Your Booking Details Recived";
    $headerCompany = "pdncpathiraja@gmail.com"; //change
    mail($email, $Customersubject, $customerMsg, $headerCompany);

    //Store DB Part
    $hostname = "localhost";
    $username = "SCWORDPRESS-3136311437";
    $password = "60409e1bd7d1";
    $database  = "SCWORDPRESS-3136311437";

    $con = new mysqli($hostname, $username, $password, $database);
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "INSERT INTO 51_booking (firstname,lastname,email,phone,dob,passportId,comments,pickupdate,pickuptime,pickUpLocation,dorpOffLocation,payment,pasengers,suitcases,vehicle) VALUES('$firstname','$lastname','$email','$phone','$dob','$passportId','$comments','$pickupdate','$pickuptime','$pickUpLocation','$dorpOffLocation','$payment',$pasengers,$suitcases,'$vehicle')";

    $result = mysqli_query($con, $sql);

    if ($con->query($sql) === TRUE) {
        echo '<script>alert("Your Booking Send Success.Thank You..!")</script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
}

//Load Data
$selectId = "SELECT * FROM person WHERE passportId='$passportId' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con, $selectId);
$name = "";
while ($row = mysqli_fetch_array($result)) {

    $firstname = $row[1];
    $lastname = $row[2];
    $email = $row[3];
    $phone = $row[4];
    $dob = $row[5];
    $passportId = $row[6];
    $comments = $row[7];
    $pickupdate = $row[8];
    $pickuptime = $row[9];
    $pickUpLocation = $row[10];
    $dorpOffLocation = $row[11];
    $payment = $row[12];
    $pasengers = $row[14];
    $suitcases = $row[15];
}


// }	

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

        <form action="#" method="post">

            <div>
                <h1> Booking Summary</h1>
            </div>

            <div class="row">

                <div class="col-md-4">

                    <h4>Ride Details</h4>



                    <div class="row" style="margin-top: 30px;">

                        <div class="col-md-6">
                            <label>First Name:</label>
                            <input name="firstname" type="text" class="form-control" value="<?php echo $firstname; ?>">
                        </div>

                        <div class="col-md-6">
                            <label>Last Name:</label>
                            <input name="lastname" type="text" class="form-control" value="<?php echo $lastname; ?>">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Email:</label>
                            <input name="email" type="text" class="form-control" value="<?php echo $email; ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Phone:</label>
                            <input name="phone" type="text" class="form-control" value="<?php echo $phone; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Birth day:</label>
                            <input name="dob" type="date" class="form-control" value="<?php echo $dob; ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Passport Id:</label>
                            <input name="passportId" type="text" class="form-control"
                                value="<?php echo $passportId; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Pick Up Date:</label>
                            <input name="pickupdate" type="date" class="form-control"
                                value="<?php echo $pickupdate; ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Pick Up Time:</label>
                            <input name="pickuptime" type="text" class="form-control"
                                value="<?php echo $pickuptime; ?>">
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label>Pick Up Location:</label>
                            <input name="pickUpLocation" type="text" class="form-control"
                                value="<?php echo $pickUpLocation; ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Drop Of Location:</label>
                            <input name="dorpOffLocation" type="text" class="form-control"
                                value="<?php echo $dorpOffLocation; ?>">
                        </div>

                    </div>

                </div>

                <div class="col-md-3">
                    <h4 class="display-4">Payment Details</h4>

                    <div class="custom-control custom-radio">
                        <label>Payment Method:</label>
                        <input name="payment" type="text" class="form-control" value="<?php echo $payment; ?>">
                    </div>

                </div>

                <div class="col-md-3">

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="display-4">Vehicle Details</h4>

                            <label>Number Of Pasengers:</label>
                            <input name="pasengers" type="text" class="form-control" value="<?php echo $pasengers; ?>">

                            <label>Number Of Suitcases:</label>
                            <input name="suitcases" type="text" class="form-control" value="<?php echo $suitcases; ?>">


                        </div>
                    </div>


                </div>

            </div>

            <!-- button -->
            <div class="row">
                <div class="col-md-8"></div>

                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-6">
                            <input type='button' class='btn btn-danger'
                                onclick="window.location.replace('https://www.cablanka.com/booking/')" value='Cancle'>
                        </div>
                        <div class="col-md-6">
                            <input type="button" name="submit" value="BOOK NOW!" />
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>


            </div>
        </form>
    </div>


</body>

</html>