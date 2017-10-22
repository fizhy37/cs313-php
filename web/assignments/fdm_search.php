<?php

	include 'session_start.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Client Search</title>
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
        <h1>Search Clients</h1>
		<div class="search_settings">
			<form action="" method="POST">
				<label for="customer">Search by First or Last Name: </label><br/>
				<input class="searchbar" type="text" name="customer" autofocus/><br/>
				<input class="submission" type="submit" value="Search"/>
			</form>
		</div>
		<div class="nav_list">
			<button class="other_buttons" onclick="open_page('assign06.php')">Go back</button>
			<?php
				if(isset($_POST['customer'])) {
					foreach ($db->query("SELECT * FROM customer WHERE firstname = '$_POST[customer]' OR lastname = '$_POST[customer]' OR address = '$_POST[customer]'") as $row)
					{
						echo '<button class="client_buttons" onclick="open_page(\'fdm_customer.php?id=' . $row['id'] . '\')">' . $row['firstname'] . ' ' . $row['lastname'] . '</button>';
						echo '<br/>';
					}
				}
			?>
		</div>
	</div>
</body>
</html>