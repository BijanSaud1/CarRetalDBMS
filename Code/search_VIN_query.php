<?php

// Defining the host for the database
// Here I am using Car_Rental database in PhpMyAdmin to make the database and store values in it
$host = "localhost:8888";
$dbusername = "root";
$dbpassword = "";
$dbname = "Car_Rental";
// Establishing connection with the database 
$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername, $dbpassword);
if(!$conn) 
{  
	// connection cannot be established 
	die("Sorry: connection could not be established ");
}
else
{
	$VIN = filter_input(INPUT_POST, 'VIN');
	// query for the intended action
	if($query = "SELECT vehicle.VehicleID, vehicle.Description, 
					(
					CASE
					WHEN EXISTS (SELECT NULL FROM vrentalinfo WHERE VIN = :VIN)
					THEN CONCAT( '$', FORMAT( (AVG(vrentalinfo.OrderAmount/vrentalinfo.TotalDays)), 2 ) )
					ELSE 'Non-Applicable'
					END)
					AS Average_Daily_Price
				 FROM vehicle, vrentalinfo
				 WHERE vehicle.VehicleID = :VIN AND vrentalinfo.VIN = :VIN;
				")  
	{    
		// data mismatched with the database 
		if($query==null)
		{
		    echo "Sorry NO!! Record Found";
		    die();    
		}    
		else
		{  
			// successful connection with the database 
			$stmt = $conn->prepare($query);
		    $stmt->execute(array(':VIN' => $VIN ));  
		    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			// displays table for visual
		    echo "<table border=3>
			<tr>
				<th>VIN</th>
				<th>Vehicle Description</th>
				<th>Average Daily Price</th>
			</tr>";
			foreach($rows as $row){
				echo "<tr>
					<td>".$row["VehicleID"]."</td>
					<td>".$row["Description"]."</td>
					<td>".$row["Average_Daily_Price"]."</td>
				</tr>";
       		}
            echo "</table>";
			echo "Total number of Rows: ",$stmt->rowCount();
		}

	}
}
		
?>