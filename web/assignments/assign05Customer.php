<?php
	$dbUrl = getenv('DATABASE_URL');

	$dbopts = parse_url($dbUrl);

	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');

	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Customer Results</title>
		<style>
			.boldScrip {
				font-weight: bold;
			}
		</style>
	</head>
	<body>
        <?php
            $statement = $db->query("SELECT * FROM customer WHERE id = '$_GET[id]'");
            $row = $statement->fetch(PDO::FETCH_ASSOC);
        
		    echo '<h1>' . $row['firstname'] . ' ' . $row['lastname'] . '/h1>';
			echo '<span class="boldScrip">' . $row['firstname'] . ' ' . $row['lastname'] . '</span>  - ' . $row['address'] . '<br/>';
		?>
	</body>
</html>