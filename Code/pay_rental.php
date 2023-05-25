
<html>

	<head>
		<title> CAR_RENTAL</title>
	</head>
	<body style="background-color:aqua;">
		<center>
		<form method="post" action="pay_rental_query.php">
			<legend> <b> ENTER RENTAL INFO: </b> </legend>
			<label id="label1" for="Return_Date"> Return Date </label> </br>
			<input type="text" name="Return_Date" placeholder="Eg: 2022-04-07" > </br>
			<label id="label1" for="cust_Name"> Name: Initial AND LastName </label> </br>
			<input type="text" name="cust_Name" placeholder="Eg: J. Smith" > </br>
			<label id="label2" for="VIN"> Vehicle Identification Number. Length = 17 </label> </br>
			<input type="text" name="VIN" placeholder="Eg: 1T234UI56712341B2" > </br>
			<input id="button" type="submit" name="submit">  
		</form>
		</center>
	</body>
</html>

<!-- fixed -->