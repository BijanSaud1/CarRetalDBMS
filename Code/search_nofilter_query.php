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
	// connection failed to be established
	die("Sorry: could not establish connection");
}
else
{
	// connection with the database success 
	$CustID = filter_input(INPUT_POST, 'Customer_ID');
	// query to change the intended action
	if($query = "SELECT CustomerID, CustomerName, 
					SUM(RentalBalance) AS RemainingBalance 
				FROM vrentalinfo 
				GROUP BY CustomerID
				ORDER BY RemainingBalance ASC;
				 ")  
	{    
		// query not running or the data in the database does not match 
		if($query==null)
		{
		    echo "Sorry: No Record Found";
		    die();    
		}    
		else
		{  
			// Successful running of teh query 
			$stmt = $conn->prepare($query);
		    $stmt->execute(array(':Customer_ID' => $CustID ));  
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