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
	// connection failed to establish
	die("Sorry: Could not establish connection");
}
else
{
	// connection successfully made 
	$Pdescription = filter_input(INPUT_POST, 'part_description');
	// query for the intended action
	if($query = "SELECT vehicle.VehicleID AS VIN, vehicle.Description AS Vehicle_Description , 'Non-Applicable' AS Average_Daily_Price
				FROM vehicle
				WHERE vehicle.Description LIKE '%$Pdescription%' AND VehicleID IN
					(SELECT vehicle.VehicleID
					FROM vehicle
					LEFT JOIN vrentalinfo ON vehicle.VehicleID = vrentalinfo.VIN
					WHERE vrentalinfo.VIN is NULL)
				UNION
				SELECT VIN, Vehicle AS Vehicle_Description , 
				CONCAT( '$', FORMAT( (AVG(OrderAmount/TotalDays)), 2 ) )
					AS Average_Daily_Price
				FROM vrentalinfo
				WHERE Vehicle LIKE '%$Pdescription%'
				GROUP BY VIN;
				")  
	{    
		// data mismatch or the query error
		if($query==null)
		{
		    echo "Sorry: No record Found";
		    die();    
		}    
		else
		{  
			// query successfully running 
			$stmt = $conn->prepare($query);
		    $stmt->execute(array(':Pdescription' => $Pdescription ));  
		    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			// displays table for visual
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