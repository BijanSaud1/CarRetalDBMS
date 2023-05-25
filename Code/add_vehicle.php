
<html>
<head>
	<title> CAR_RENTAL </title>
</head>
<body style="background-color:aqua;">
	<center>
	<form method="post" action="add_vehicle_query.php">
		<legend> <b> Enter the Information for Vehicle </b> </legend> </br>
		<label id="label1" for="VIN"> Vehicle Identification Number of Length 17 </label> </br>
		<input type="text" name="VIN" placeholder="Eg: 1V2F33G42T2131V43" > </br> </br>
		<label id="label2" for="vehicle_Description"> Vehicle Description </label> </br>
		<input type="text" name="vehicle_Description" placeholder="Eg: Toyota Camry LE" > </br> </br>
		<label id="label3" for="build_Year"> Vehicle Year </label> </br>
		<input type="text" name="build_Year" placeholder="Eg: 2022" > </br> </br>
		<label id="label4" for="vehicle_Type"> Type : 'Compact' = 1, 'Medium' = 2, 'Large' = 3, 'SUV' = 4, 'Truck' = 5, 'VAN' = 7  </label> </br>
		<input type="text" name="vehicle_Type" placeholder="Eg: 5" > </br> </br>
		<label id="label5" for="vehicle_Category"> Category : 'BASIC' = 0, 'LUXURY' = 1 </label> </br>
		<input type="text" name="vehicle_Category" placeholder="Eg: 1" > </br> </br>
		<input id="button" type="submit" name="submit">  
	</form>
	</center>
</body>
</html>

<!-- Fixed -->