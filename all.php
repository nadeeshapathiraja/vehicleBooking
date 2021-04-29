<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
* {
    box-sizing: border-box;
}

body {
    background-color: #f1f1f1;
}

#regForm {
    background-color: #ffffff;
    margin: 100px auto;
    font-family: Raleway;
    padding: 40px;
    width: 70%;
    min-width: 300px;
}

h1 {
    text-align: center;
}

input {
    padding: 10px;
    width: 100%;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
    background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
    display: none;
}

button {
    background-color: #4CAF50;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
}

button:hover {
    opacity: 0.8;
}

#prevBtn {
    background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
}

.step.active {
    opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
    background-color: #4CAF50;
}
</style>

<body>

    <form id="regForm" method="post" action="/booking-summary">

        <h1>Ride Details</h1>
        <!-- One "tab" for each step in the form: -->


        <!-- Page 1 strat -->
        <div class="tab">
            <h2>Ride Details</h2>

            <label>Pickup Date:</label>
            <p><input type="date" oninput="this.className = ''" name="pickupdate"></p>

            <label>Pickup time:</label>
            <p><input type="time" oninput="this.className = ''" name="pickuptime"></p>

            <label>Pickup Location:</label>
            <p>
                <select class="form-control" name="pickUpLocation" id="pickUpLocation">
                    <option value="Colombo">Colombo</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Mathtara">Mathtara</option>
                    <option value="Kaluthara">Kaluthara</option>
                </select>
            </p>

            <p>
                <label>Drop Off Location:</label>

                <select class="form-control" name="dorpOffLocation" id="dorpOffLocation">
                    <option value="Galle">Galle</option>
                    <option value="Katharagama">Katharagama</option>
                    <option value="Bandarawela">Bandarawela</option>
                    <option value="Ella">Ella</option>
                </select>
            </p>

        </div>
        <!-- Page 1 end -->


        <!-- Page 2 Start -->
        <div class="tab">
            <h2>Choose Vehicle</h2>
            <p>
                <label>Number of Passenger:</label>

                <select name="pasengers" class="form-control" id="pasengers">

                    <?php

                    for ($i = 1; $i <= 100; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                    <option name="pasengers"> </option>
                </select>
            </p>

            <p>
                <label>Number Of Suitcases:</label>

                <select name="suitcases" class="form-control" id="suitcases" onchange="vehicle()">
                    <?php

                    for ($i = 1; $i <= 10; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                    <option name="suitcases"> </option>
                </select>
            </p>

            <input type="button" name="select" value="Select Vehicle" onclick="myFunction()" />

            <script type="text/javascript">
            $(document).ready(function() {
                document.getElementById("vehicleTable").style.display = "none";

            });

            function vehicle() {

                var elms = document.querySelectorAll("[id='table']");

                for (var i = 0; i < elms.length - 2; i++) {
                    elms[i].style.display = 'none';
                }

            }

            function myFunction() {
                var x = document.getElementById("vehicleTable");

                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
            </script>

            <div id="vehicleTable">

                <table class="table table-dark">

                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Max Passengers</th>
                            <th scope="col">Max Suitcases</th>
                            <th scope="col">Select Vehicle</th>
                        </tr>
                    </thead>


                    <?php
                    error_reporting(0);

                    $pasengers = $_POST['pasengers'];
                    $suitcases = $_POST['suitcases'];

                    $hostname = "localhost";
                    $username = "SCWORDPRESS-3136311437";
                    $password = "60409e1bd7d1";

                    $con = mysqli_connect($hostname, $username, $password);

                    $dbconect = mysqli_select_db($con, "SCWORDPRESS-3136311437");

                    $sql = "SELECT * FROM 51_storevehicle";

                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                        if ($row[3] > $pasengers) {
                            if ($row[4] > $suitcases) {
                                echo "                    
                          
                                  <tr id='table'>
                                      <th><img src=images/$row[1] width=100px height=100px/></th>
                                      <td>$row[2]</td>
                                      <td>$row[3]</td>
                                      <td>$row[4]</td>
                                      <td>
                                         <input type='radio' name='vehicle' value='$row[0]'>
                                      </td>
                                  </tr>  
                                    
                                </tbody>";
                            }
                        }
                    }

                    ?>



                </table>

            </div>



        </div>
        <!-- Page 2 end -->


        <!-- Page 3 Start -->
        <div class="tab">
            <h2>Contact Details</h2>

            <div>
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
            </div>

        </div>
        <!-- Page 3 end -->


        <!-- Page 4 Start -->
        <div class="tab">

            <h2>Payment Details</h2>

            <div class="custom-control custom-radio">

                <div class="row">

                    <div class="col-md-4">
                        <label class="custom-control-label">Card Payment</label>
                    </div>

                    <div class="col-md-1">
                        <input type="radio" class="custom-control-input" id="cardpayment" value="Card Payment"
                            name="payment" checked>
                    </div>

                    <div class="col-md-7">

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">
                        <label class="custom-control-label">Deposit to Bank / Direct Transfer</label>
                    </div>

                    <div class="col-md-1">
                        <input type="radio" class="custom-control-input" id="cashpayment" value="Cash Payment"
                            name="payment">
                    </div>

                    <div class="col-md-7">

                        <div class="row">

                            <div class="col-md-4"></div>

                            <div class="col-md-4">
                                <input type="submit" name="submit" id="allData" value="Submit" onclick="ClickButton()">
                            </div>

                            <script type="text/javascript">
                            function ClickButton() {
                                $("#allData").click(function() {
                                    alert("test");
                                });
                            }
                            </script>

                            <div class="col-md-4"></div>

                        </div>


                    </div>

                </div>

            </div>



        </div>
        <!-- Page 4 end -->


        <!-- Common -->
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>



        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <!--  <span class="step"></span> -->
        </div>

        <script>
        history.pushState({}, "", "")
        </script>

    </form>

    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab


    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";

        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }

        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").style.display = "none";;
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:

        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
    </script>

</body>

</html>