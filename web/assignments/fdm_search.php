<?php

	include 'session_start.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Database Search</title>
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
        <div class="nav_list">
			<form action="" method="POST">
				<label for="customer">Search Clients by First or Last Name: </label><input type="text" name="customer"/>
				<input type="submit" value="Search"/>
			</form>
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
</body>
</html>