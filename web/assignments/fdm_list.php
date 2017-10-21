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
		<script src="fdm_js.js"></script>
	</head>
	<body>
		<div class="middle_col">
		<h1>Select a Client</h1>
		<?php
			foreach ($db->query("SELECT * FROM customer") as $row)
			{
                echo '<a href="fdm_customer.php?id=' . $row['id'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</a>';
                echo '<br/>';
			}
		?>
		<br/>
		</div>
	</body>
</html>