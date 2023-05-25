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
	// Failed to establish connection
	die("Sorry: Cannot establish a connection to the database");
}
else
{
	//Success in making the connection
	$CustID = filter_input(INPUT_POST, 'Customer_ID');
	// making the query for the action
	if($query = "SELECT CustomerID, CustomerName, 
					SUM(RentalBalance) AS RemainingBalance 
				FROM vrentalinfo 
				WHERE CustomerID = :CustomerID;
				 ")  
	{    
		if($query==null)
		{
			// query not established 
		    echo "No Such Record Found";
		    die();    
		}    
		else
		{  
			// query is successfully executed
			$stmt = $conn->prepare($query);
		    $stmt->execute(array(':CustomerID' => $CustID ));  
		    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			// makes the table for an appealing look in the screen
		    echo "<table border=1>
			<tr>
				<th>Customer_ID</th>
				<th>Customer_Name</th>
				<th>Remaining_Balance</th>
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
	
// Fixed
?>