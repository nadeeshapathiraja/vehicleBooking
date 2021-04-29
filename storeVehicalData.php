<html>

<head>
    <title>vehical</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form method="post" name="form" action="#" enctype="multipart/form-data">

                    <div class="form-group">
                        <h1>Add Vehical Details</h1>
                    </div>

                    <div class="form-group">
                        <label>Image:</label>
                        <input name="image" type="file" placeholder="Browse" class="form-control">
                    </div>

                    <div class="form-group">
                        <label> Price Per Km:</label>
                        <input name="price" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Max Pasengers:</label>
                        <input name="pasengers" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Max Suitcases:</label>
                        <input name="suitcases" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <input name="submit" type="submit" value="Submit">
                    </div>

                    <script>
                    history.pushState({}, "", "")
                    </script>

                </form>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>


</body>

</html>

<?php

if (isset($_POST['submit'])) {

    $file_tmp = $_FILES['image']['tmp_name'];
    $file_name = $_FILES['image']['name'];
    $price = $_POST['price'];
    $pasengers = $_POST['pasengers'];
    $suitcases = $_POST['suitcases'];

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

    $target = "images/" . basename($file_name);

    $sql = "INSERT INTO 51_storevehicle (image,price,pasengers,suitcases) VALUES('$file_name','$price','$pasengers','$suitcases')";

    $result = mysqli_query($con, $sql);

    echo $result;

    if ($result) {
        echo "Number of records Inserted";
        move_uploaded_file($_FILES["image"]["tmp_name"], $target);
    }


    mysqli_close($con);
}
?>