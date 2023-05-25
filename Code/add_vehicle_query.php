<?php


// Defining the host for the database
// Here I am using Car_Rental database in PhpMyAdmin to make the database and store values in it
$host = "localhost:8888";
$dbusername = "root";
$dbpassword = "";
$dbname = "Car_Rental";

// Establishing the connection
$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername, $dbpassword);
if(!$conn) 
{  
	// Connection fails
	die("Sorry: Connection could not be established");
}
else
{
	// connection passes 
	$Category = filter_input(INPUT_POST, 'vehicle_Category');
	$VIN = filter_input(INPUT_POST, 'VIN');
	$Type = filter_input(INPUT_POST, 'vehicle_Type');
	$Year = filter_input(INPUT_POST, 'build_Year');
	$Description = filter_input(INPUT_POST, 'vehicle_Description');
	$query = "INSERT INTO vehicle (VehicleID, Description, Year, Type, Category) VALUES ('$VIN', CONCAT('\"','$Description','\"'), '$Year', '$Type' , '$Category')" ;
	if ($conn->query($query))
	{
		// success in changing the query
		echo "Success: New vehicle Added.";
	}
	else
	{
		// failure
		echo "Failed: Vehicle NOT Added \n". $query."\n";
		foreach ($conn->errorInfo() as $error) {
			echo $error."\t"; 	
		} 
	}
}// Fixed
?>