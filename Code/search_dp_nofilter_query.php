<?php

// Defining the host for the database
// Here I am using Car_Rental database in PhpMyAdmin to make the database and store values in it
$host = "localhost:8888";
$dbusername = "root";
$dbpassword = "";
$dbname = "Car_Rental";
// Establishing the connection with the database 
$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername, $dbpassword);
if(!$conn) 
{  
	// connection failed to establish
	die("Sorry: Could not establish a connection");
}
else
{
	// Success in establishing the connection
	$Pdescription = filter_input(INPUT_POST, 'vehicle_description');

	// query for the action intended
	if($query = "SELECT vehicle.VehicleID AS VIN, vehicle.Description AS Vehicle_Description , 'Non-Applicable' AS Average_Daily_Price
				FROM vehicle
				WHERE VehicleID IN
					(SELECT vehicle.VehicleID
					FROM vehicle
					LEFT JOIN vrentalinfo ON vehicle.VehicleID = vrentalinfo.VIN
					WHERE vrentalinfo.VIN is NULL)
				UNION
				SELECT VIN, Vehicle AS Vehicle_Description , 
				CONCAT( '$', FORMAT( (AVG(OrderAmount/TotalDays)), 2 ) )
					AS Average_Daily_Price
				FROM vrentalinfo
				GROUP BY VIN
				ORDER BY CAST( REPLACE(REPLACE(REPLACE( Average_Daily_Price ,'.', ''), '$', ''), 'Non-Applicable', '000') AS SIGNED ) ASC;
				")  
	{    
		// error in the query or the database table does not have the values 
		if($query==null)
		{
		    echo "Sorry: No Record Found";
		    die();    
		}    
		else
		{  
			// successful riunning of the query 
			$stmt = $conn->prepare($query);
		    $stmt->execute(array(':vehicle_description' => $Pdescription ));  
		    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			// making a table for visual 
		    echo "<table border=1>
			<tr>
				<th>VIN</th>
				<th>Vehicle Description</th>
				<th>Average Daily Price</th>
			</tr>";
			foreach($rows as $row){
				echo "<tr>
					<td>".$row["VIN"]."</td>
					<td>".$row["Vehicle_Description"]."</td>
					<td>".$row["Average_Daily_Price"]."</td>
				</tr>";
       		}
            echo "</table>";
			echo "Total number of Rows: ",$stmt->rowCount();
		}

	}
}
		
?>