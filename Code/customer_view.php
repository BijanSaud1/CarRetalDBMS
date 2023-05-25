<html>
      
	<head>
		<title> CAR_RENTAL </title>
	</head>
	<body style="background-color:aqua;">
		<center>
		<legend> CHECK CUSTOMER BALANCE</legend>
		<legend> SEARCH BY: </legend>

		<!-- Calls the director to make action runs the query in the files given in action on each form-->
		<form action="http://localhost/Code/search_CustID.php">
  			  <input type="submit" value="Customer ID" />
		</form>
		<form action="http://localhost/Code/search_name.php">
  			  <input type="submit" value="Name" />
		</form>
		<form action="http://localhost/Code/search_part_name.php">
  			  <input type="submit" value="Part of the Name" />
		</form>
		<form action="http://localhost/Code/search_nofilter_query.php">
  			  <input type="submit" value="NO FILTERS" />
		</form>
		</center>

	</body>
</html>