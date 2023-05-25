<?php

// Defining the host for the database
// Here I am using Car_Rental database in PhpMyAdmin to make the database and store values in it
$host = "localhost:8888";
$dbusername = "root";
$dbpassword = "";
$dbname = "Car_Rental";

// Establishing the connection to the database 
$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername, $dbpassword);
if(!$conn) 
{  
	// connection failed to establish
	die("Sorry: Could not establish the connection");
}
else
{
	$description = filter_input(INPUT_POST, 'vehicle_description');
	// query for the action intended search
	if($query = "SELECT vehicle.VehicleID, vehicle.Description , 
					(
					CASE
					WHEN EXISTS (SELECT NULL FROM vrentalinfo WHERE vrentalinfo.Vehicle = CONCAT('\"','$description','\"'))
					THEN CONCAT( '$', FORMAT( (AVG(vrentalinfo.OrderAmount/vrentalinfo.TotalDays)), 2 ) )
					ELSE 'Non-Applicable'
					END)
					AS Average_Daily_Price
				 FROM vehicle, vrentalinfo
				 WHERE vehicle.Description = CONCAT('\"','$description','\"') AND vrentalinfo.Vehicle = CONCAT('\"','$description','\"')
				 GROUP BY vehicle.VehicleID;
				")  
	{    
		if($query==null)
		{
			// query connection not established 
		    echo "No Such Record Found";
		    die();    
		}    
		else
		{  
			// successful running of the query
			$stmt = $conn->prepare($query);
		    $stmt->execute(array(':description' => $description ));  
		    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			// displays the table for visual 
		    echo "<table border=1>
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
// Fixed		
?>