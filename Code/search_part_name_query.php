<?php

// Defining the host for the database
// Here I am using Car_Rental database in PhpMyAdmin to make the database and store values in it
$host = "localhost:8888";
$dbusername = "root";
$dbpassword = "";
$dbname = "Car_Rental";
// establishing connection with the database 
$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername, $dbpassword);
if(!$conn) 
{  
	// connection could not be established 
	die("Sorry: Could not establish connection");
}
else
{
	$PName = filter_input(INPUT_POST, 'part_Name');
	// query for the intended action
	if($query = "SELECT CustomerID, CustomerName, 
					SUM(RentalBalance) AS RemainingBalance 
				FROM vrentalinfo 
				WHERE CustomerName LIKE '%$PName%'
				GROUP BY CustomerID;
				 ")  
	{    
		// query mismatch with the data in the database 
		if($query==null)
		{
		    echo "Sorry: No Record Found";
		    die();    
		}    
		else
		{  
			// query running successfully
			$stmt = $conn->prepare($query);
		    $stmt->execute(array(':PName' => $PName ));  
		    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			// displays table for visual
		    echo "<table border=1>
			<tr>
				<th>Customer ID</th>
				<th>Customer Name</th>
				<th>Remaining Balance</th>
			</tr>";
			foreach($rows as $row){
				echo "<tr>
					<td>".$row["CustomerID"]."</td>
					<td>".$row["CustomerName"]."</td>
					<td>$".number_format($row["RemainingBalance"],2)."</td>
				</tr>";

       		}
            echo "</table>";
			echo "Total number of Rows: ",$stmt->rowCount();
		}

	}
}
		
?>