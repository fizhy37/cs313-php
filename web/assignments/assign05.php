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
		<h1>Search database</h1>
		<?php
			foreach ($db->query("SELECT * FROM customer, package, sale") as $row)
			{
			  echo $row['firstname'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</span> - "' . $row['content'] . '"';
			  echo '<br/>';
			}
		?>
		<br/>
		<form action="" method="POST">
			<label for="customer">Search Customers: </label><input type="text" name="customer"/>
			<input type="submit" value="Search"/>
		</form>
		<?php
			if(isset($_POST['customer'])) {
				foreach ($db->query("SELECT * FROM customer WHERE firstname = '$_POST[customer]' OR lastname = '$_POST[customer]'") as $row)
				{
				  echo '<a href="week5TeamActContent.php?id=' . $row['id'] . '"><span class="boldScrip">' . $row['firstname'] . '</span></a>';
				  echo '<br/>';
				}
			}
		?>
	</body>
</html>