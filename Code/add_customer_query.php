<?php

// Defining the host for the database
// Here I am using Car_Rental database in PhpMyAdmin to make the database and store values in it
$host = "localhost:8888";
$dbusername = "root";
$dbpassword = "";
$dbname = "Car_Rental";

// making the actual connection here 
$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername, $dbpassword);
if(!$conn) 
{  
	// connection fails
	die("Sorry: Connection could not be established");
}
else
{
	// Success makes changes to the database and also delivers an echo to the screen
	$phone_number = filter_input(INPUT_POST, 'phone_num');
	$name = filter_input(INPUT_POST, 'cust_Name');
	
	$query = "INSERT INTO customers (Name, Phone) VALUES ('$name', '$phone_number')" ;
	if ($conn->query($query))
	{
		// connection to the query and changes
		//Success
		echo "Success: New Customer Added";
	}
	else
	{
		// Failes to make the change in query
		echo "Failed: Customer is not Added \n". $query."\n";
		foreach ($conn->errorInfo() as $error) {
			echo $error."\t"; 	
		} 
	}
}

// Fixed 
?>

