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
			if(isset($_GET['id'])) {
				$statement = $db->query("SELECT * FROM customer WHERE id = '$_GET[id]'");
				$row = $statement->fetch(PDO::FETCH_ASSOC);
			
				echo '<h1>' . $row['firstname'] . ' ' . $row['lastname'] . '</h1>';
				echo '<span class="boldScrip">' . $row['firstname'] . ' ' . $row['lastname'] . '</span>  - ' . $row['address'] . '<br/>';
				echo 'Here we go again<br/>';
				foreach ($db->query("SELECT * FROM sale WHERE customerid = '$_GET[id]'") as $row2)
				{
					echo $row['firstname'] . ' paid $' . $row2['totalcost'];
					$statement3 = $db->query("SELECT * FROM package WHERE id = $row2[packageid]");
					$row3 = $statement3->fetch(PDO::FETCH_ASSOC);

					//person = $db->query("SELECT * FROM customer WHERE id = '$_GET[id]'");
					//$package = $db->query("SELECT * FROM package WHERE id = $row2[packageid]");
					//echo $person['firstname'] . ' ' . $person['lastname'] . ' purchased the ' . $package['packagename'] . ' package for $' . $package['packageprice'];
					//echo '<br/>';
				}
			}
		?>
	</body>
</html>