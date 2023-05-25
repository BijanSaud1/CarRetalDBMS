<?php

// Defining the host for the database
// Here I am using Car_Rental database in PhpMyAdmin to make the database and store values in it
$host = "localhost:8888";
$dbusername = "root";
$dbpassword = "";
$dbname = "Car_Rental";
// establishing the connection with the database 
$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername, $dbpassword);
if(!$conn) 
{  
	//connection failed to establish
	die("Sorry: Could not establish connection ");
}
else
{
	$Name = filter_input(INPUT_POST, 'cust_Name');
	// query for the action inteneed
	if($query = "SELECT CustomerID, CustomerName, 
					SUM(RentalBalance) AS RemainingBalance 
				FROM vrentalinfo 
				WHERE CustomerName = :Name
				GROUP BY CustomerID;")  
	{    
		// failed to run query 
		if($query==null)
		{
		    echo "Sorry: No record Found";
		    die();    
		}    
		else
		{  
			// successful establishment of the query 
			$stmt = $conn->prepare($query);
		    $stmt->execute(array(':Name' => $Name ));  
		    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			// displaying table for visual
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