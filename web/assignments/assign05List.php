<?php
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
		<style>
			.boldScrip {
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<h1>Select a Client</h1>
		<?php
			foreach ($db->query("SELECT * FROM customer") as $row)
			{
                echo '<a href="assign05Customer.php?id=' . $row['id'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</a>';
                echo '<br/>';
			}
		?>
		<br/>
	</body>
</html>