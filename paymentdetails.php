<!DOCTYPE html>
<html>
<head>
	<title>payment details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">
</head>
<body>

	<div class="jumbotron jumbotron-fluid" style="width: 800px; margin: auto; margin-top: 100px;">
	  <div class="container">

	    <h1 class="display-4">Payment Details</h1>
	    

		<div class="custom-control custom-radio">
		  <input type="radio" class="custom-control-input" id="cardpayment" value="cardpayment" name="payment" checked>
		  <label class="custom-control-label">Card Payment</label><br>
		</div>

		<div class="custom-control custom-radio">
		  <input type="radio" class="custom-control-input" id="cashpayment" value="cashpayment" name="payment">
		  <label class="custom-control-label" >Deposit to Bank / Direct Transfer</label>
		</div>

		<button type="button" onclick="getvalue()"> 
        	Submit 
    	</button> 
      
      
    	<script> 
	        function getvalue() { 
	            var paymentMethod = document.getElementsByName('payment');

	            if(document.getElementById('cardpayment').checked){
	            	window.location = 'http://localhost/Rider%20Project/bookingSummery.php';
	            }

	            else if(document.getElementById('cardpayment').checked){
	            	window.location = '';
	            }
	        } 
    	</script>

</body>
</html>