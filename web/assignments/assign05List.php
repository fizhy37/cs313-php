<?php

	include 'session_start.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Client List</title>
		<link rel="stylesheet" href="db.css">
		<style>
			.boldScrip {
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<div class="middle_col">
		<h1>Select a Client</h1>
		<?php
			foreach ($db->query("SELECT * FROM customer") as $row)
			{
                echo '<a href="assign05Customer.php?id=' . $row['id'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</a>';
                echo '<br/>';
			}
		?>
		<br/>
		</div>
	</body>
</html>