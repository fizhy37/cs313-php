<?php

	include 'session_start.php';
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Client Details</title>
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
			$statement = $db->query("SELECT * FROM customer WHERE id = '$_GET[id]'");
			$row = $statement->fetch(PDO::FETCH_ASSOC);
		
			echo '<h1>' . $row['firstname'] . ' ' . $row['lastname'] . '</h1>';
			echo '<p>' . $row['phone'] . '<br/>' . $row['address'] . '</p><div class="nav_list">';
			echo '<button class="other_buttons" onclick="open_page(\'fdm_update.php?id=' . $_GET['id'] . '\')">Update ' . $row['firstname'] . ' ' . $row['lastname'] . '</button>';
			
			
			foreach ($db->query("SELECT * FROM sale WHERE customerid = '$_GET[id]'") as $sale)
			{
				$statement3 = $db->query("SELECT * FROM package WHERE id = $sale[packageid]");
				$package = $statement3->fetch(PDO::FETCH_ASSOC);
				echo '<button class="client_detail">Total Cost: $' . $sale['totalcost'] . '<br/>Package: ' . $package['packagename'] . '</button>';
			}
		}
	?>
	</div>
	</div>
</body>
</html>