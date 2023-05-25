<?php

// Defining the host for the database
// Here I am using Car_Rental database in PhpMyAdmin to make the database and store values in it
$host = "localhost:8888";
$dbusername = "root";
$dbpassword = "";
$dbname = "Car_Rental";
//makes the connection
$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername, $dbpassword);
if(!$conn) 
{  
	// connnection fails 
	die("Connection not established");
}
else
{
	//connection success
	$Return_Date = filter_input(INPUT_POST, 'Return_Date');
	$VIN = filter_input(INPUT_POST, 'VIN');
	$Name = filter_input(INPUT_POST, 'cust_Name');
	
	if ($query = "SELECT customers.Name, 
					CASE
					WHEN PaymentDate = 'NULL' THEN TotalAmount
					ELSE 0
					END AS Balance_Due
				  FROM customers, rental
				  WHERE rental.ReturnDate = '$Return_Date' AND customers.Name = '$Name' 
				  AND customers.CustID = rental.CustID AND rental.VehicleID = '$VIN';")
	{
		if($query==null)
		{
			// query establishment failed 
			echo "Sorry NO!! Record Found";
			die();    
		}    
		else
		{  
			//query establishment passes 
			$stmt = $conn->prepare($query);
			$stmt->execute(array(':Name' => $Name ));  
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			// makes the table for the output to be visual
			echo "<table border=3>
			<tr>
				<th>Customer Name</th>
				<th>Total Paid</th>
			</tr>";
			foreach($rows as $row){
				echo "<tr>
					<td>".$row["Name"]."</td>
					<td>$".$row["Balance_Due"]."</td>
				</tr>";

       		}
            echo "</table>";
			// again updates the database to make changes in the database 
			$update_query = "UPDATE rental
							 SET rental.PaymentDate = CURDATE(), Returned = 1
							 WHERE rental.ReturnDate = '$Return_Date' AND rental.VehicleID = '$VIN' 
								AND  rental.CustID IN
									(SELECT customers.CustID
									 FROM customers
									 WHERE customers.Name = '$Name') " ;				 
							 
							 
			if ($conn->query($update_query))
			{
				// connection to the database and changes in the query established
				echo "\n";
				echo "\n";
				echo "\nThe information of Customer is Updated. \n";
			}
			else
			{
				// updatate failed 
				echo "Failed: NO Update done \n". $query."\n";
				foreach ($conn->errorInfo() as $error) {
					echo $error."\t"; 	
				} 
			}
			
		}
	}
	
}

// fixed
?>