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
	// Connection fails 
	die("Sorry: Connection could not be established");
}
else
{
	//Connnection passes and the changes are made to the database
	$RentalType = filter_input(INPUT_POST, 'Rental_Type');
	$CustID = filter_input(INPUT_POST, 'Customer_ID');
	$Category = filter_input(INPUT_POST, 'vehicle_Category');
	$StartDate = filter_input(INPUT_POST, 'StartDate');
	$ReturnDate = 0000-00-00;
	$Qty = filter_input(INPUT_POST, 'Quantity');
	$Type = filter_input(INPUT_POST, 'vehicle_Type');
	$PaymentDate = filter_input(INPUT_POST, 'PaymentDate');

	// this query makes the changes in teh database and also formats the input
	//from the user to make it as per the values initially inserted in the database

	$query = "INSERT INTO rental (CustID,  StartDate, RentalType, Qty, 
	                              ReturnDate, PaymentDate, VehicleID, OrderDate, TotalAmount, Returned) 
								  VALUES ('$CustID', '$StartDate', '$RentalType', '$Qty',
										  (
											SELECT DATE_ADD('$StartDate', INTERVAL ('$RentalType'*'$Qty') DAY) AS '$ReturnDate'
										  ), '$PaymentDate', 
										  (SELECT vehicle.VehicleID
											FROM vehicle
											WHERE Type = $Type AND Category = $Category AND VehicleID IN
											(SELECT vehicle.VehicleID
											FROM vehicle
                                            LEFT JOIN rental AS RENT ON vehicle.VehicleID = RENT.VehicleID
											WHERE RENT.VehicleID is NULL
											)
											UNION
											SELECT DISTINCT RENT2.VehicleID
											FROM rental AS RENT2, vehicle
											WHERE RENT2.VehicleID = vehicle.VehicleID AND Type = $Type AND Category = $Category AND 												
													RENT2.VehicleID NOT IN
											(
											SELECT RENT3.VehicleID
											FROM rental AS RENT3
											WHERE (StartDate >= '$StartDate' AND StartDate <= '$ReturnDate') OR 															
													(ReturnDate >= '$StartDate' AND ReturnDate <= '$ReturnDate')
											)
											GROUP BY vehicle.vehicleID
											LIMIT 1
										  ), CURDATE(), 
										  (
										    SELECT 
											CASE 
											WHEN $RentalType = 1 THEN (Daily*$Qty)
											ELSE (Weekly*$Qty)
											END AS TotalAmount
											FROM rate
											WHERE Type = $Type AND Category = $Category
										  ), 
										  (
										    SELECT
											CASE
											WHEN '$PaymentDate' = 'NULL' THEN 0
											ELSE 1
											END AS Ret
										  )
										 );" ;
	if ($conn->query($query))
	{
		// success in changing the query
		echo "Success: New rental Added.";
	}
	else
	{
		//failure 
		echo "Failed: no new rental is added: \n". $query."\n";
		foreach ($conn->errorInfo() as $error) {
			echo $error."\t"; 	
		} 
	}
}

// Fixed
?>