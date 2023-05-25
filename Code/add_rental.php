
<html>

<head>
	<title> CAR_RENTAL </title>
</head>
<body style="background-color:aqua;">
	<center>
	<form method="post" action="add_rental_query.php">
		<legend> <b> ENTER RENTAL INFO </b> </legend>
		<label id="label1" for="Customer_ID"> Customer ID </label> </br>
		<input type="text" name="Customer_ID" placeholder="Eg: 210" > </br>
		<label id="label10" for="vehicle_Type"> Vehicle Type : Compact = 1, Medium = 2, Large = 3, SUV = 4, Truck = 5, VAN = 7 </label> </br>
		<input type="text" name="vehicle_Type" placeholder="Eg: 3" > </br>
		<label id="label10" for="vehicle_Category"> Category : BASIC = 0, LUXURY = 1 </label> </br>
		<input type="text" name="vehicle_Category" placeholder="Eg: 1" > </br>
		<label id="label4" for="StartDate"> Rental Start Date </label> </br>
		<input type="text" name="StartDate" placeholder="Eg: 2022-04-25" > </br>
		<label id="label5" for="Rental_Type"> Rental Type. Daily = 1, Weekly = 7 </label> </br>
		<input type="text" name="Rental_Type" placeholder="Eg: 7" > </br>
		<label id="label6" for="Quantity"> Rental Type Quantity : AS PER THE RENTAL TYPE </label> </br>
		<input type="text" name="Quantity" placeholder="Eg: 3" > </br>
		<label id="label9" for="PaymentDate"> Payment Date. Enter NULL if paying LATER </label> </br>
		<input type="text" name="PaymentDate" placeholder="Eg: 2022-04-25" > </br>
		<input id="button" type="submit" name="submit">  
	</form>
	</center>
</body>
</html>

<!-- Fixed -->