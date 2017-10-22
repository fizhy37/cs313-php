<?php

	include 'session_start.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Client List</title>
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
        <h1>Select a Client</h1>
        <div class="nav_list">
			<button class="other_buttons" onclick="open_page('assign06.php')">Go back</button>
			<?php
				foreach ($db->query("SELECT * FROM customer ORDER BY lastname ASC") as $row)
				{
					echo '<button class="client_buttons" onclick="open_page(\'fdm_customer.php?id=' . $row['id'] . '\')">' . $row['firstname'] . ' ' . $row['lastname'] . '</button>';
					echo '<br/>';
				}
			?>
		</div>
	</div>
</body>
</html>