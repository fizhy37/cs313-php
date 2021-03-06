<?php

	include 'session_start.php';
	$dbUrl = getenv('DATABASE_URL');

	if (empty($dbUrl)) {
		// example localhost configuration URL with postgres username and a database called cs313db
		$dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
	} else {
		$dbopts = parse_url($dbUrl);

		$dbHost = $dbopts["host"];
		$dbPort = $dbopts["port"];
		$dbUser = $dbopts["user"];
		$dbPassword = $dbopts["pass"];
		$dbName = ltrim($dbopts["path"],'/');

		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Database Search</title>
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