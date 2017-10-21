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
		<?php
			foreach ($db->query("SELECT * FROM customer") as $row)
			{
				echo '<button class="client_buttons" onclick="open_page(\'fdm_customer.php?id=' . $row['id'] . '\')">' . $row['firstname'] . ' ' . $row['lastname'] . '</button>';
				echo '<br/>';
			}
		?>
		<button id="fdmlist" class="client_buttons" onclick="open_page('fdm_list.php')">List of Clients</button>
		<button id="fdmsearch" class="client_buttons" onclick="open_page('fdm_search.php')">Search Clients</button>
		<button id="fdmadd" class="client_buttons" onclick="open_page('fdm_add_client.php')">Add Client</button>
		</div>
	</div>
</body>
</html>