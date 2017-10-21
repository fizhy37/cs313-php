<?php

	include 'session_start.php';
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Client Results</title>
	<link rel="stylesheet" href="db.css">
	<script src="fdm_js.js"></script>
</head>
<body>
	<nav>
		<a class="bar" href="../home.html">Home</a>
		<a class="bar" href="../assignments.html">Assignments</a>
		<a class="bar" href="http://fisherdigitalmedia.businesscatalyst.com">FDM Website</a>
		<a class="bar" href="https://www.youtube.com/sabertoothzebras">YouTube</a>
	</nav>
	<div class="topper">
	<?php
		if(isset($_GET['id'])) {
			$statement = $db->query("SELECT * FROM customer WHERE id = ?");
			$result = $query->execute($_GET['id']);
			$row = $statement->fetch(PDO::FETCH_ASSOC);
		
			echo '<h1>' . $row['firstname'] . ' ' . $row['lastname'] . '</h1>';
			echo '<p>' . $row['address'] . '</p><div class="nav_list">';
			
			foreach ($db->query("SELECT * FROM sale WHERE customerid = $result") as $sale)
			{
				$statement3 = $db->query("SELECT * FROM package WHERE id = ?");
				$result2 = $query->execute($sale['packageid']);
				$package = $statement3->fetch(PDO::FETCH_ASSOC);
				echo '<button class="client_buttons">Total Cost: $' . $sale['totalcost'] . '<br/>Package: ' . $package['packagename'] . '</button>';
			}
		}
	?>
	</div>
	</div>
</body>
</html>