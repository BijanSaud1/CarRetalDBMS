<html>
      <!--This is the main .php file which will be used to boot the GUI and follow the functions -->
	<head>
		<title> CAR_RENTAL </title>
	</head>
	<body style="background-color:aqua;">
		<center>
		<legend> <b> CAR RENTAL DATABASE </b> </legend>
		<legend> Choose From the Following </legend></br>
		<form action="http://localhost/Code/add_customer.php">
  			  <input type="submit" value="ADD A NEW CUSTOMER" />
		</form>
		<form action="http://localhost/Code/add_vehicle.php">
  			  <input type="submit" value="ADD A NEW VEHICLE" />
		</form>
		<form action="http://localhost/Code/add_rental.php">
  			  <input type="submit" value="ADD A NEW RENTAL" />
		</form>
		<form action="http://localhost/Code/pay_rental.php">
  			  <input type="submit" value="PAY REMAINING RENTAL AMOUNT" />
		</form>
		<form action="http://localhost/Code/customer_view.php">
  			  <input type="submit" value="CHECK CUSTOMER BALANCE" />
		</form>
		<form action="http://localhost/Code/dailyprice_view.php">
  			  <input type="submit" value="FIND DAILY PRICE OF RENTAL VEHICLE" />
		</form>
		</center>

	</body>
</html>