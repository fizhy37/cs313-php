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
		<div class="middle_col">
		<h1>Search Clients</h1>
		<form action="" method="POST">
			<label for="customer">Search Clients by First or Last Name: </label><input type="text" name="customer"/>
			<input type="submit" value="Search"/>
		</form>
		<?php
			if(isset($_POST['customer'])) {
				foreach ($db->query("SELECT * FROM customer WHERE firstname = '$_POST[customer]' OR lastname = '$_POST[customer]' OR address = '$_POST[customer]'") as $row)
				{
				  echo '<a href="fdm_customer.php?id=' . $row['id'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</a>';
				  echo '<br/>';
				}
			}
		?>
		</div>
	</body>
</html>