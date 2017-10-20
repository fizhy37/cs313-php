<?php
	include 'connect_db.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Client Results</title>
		<style>
			.boldScrip {
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<div class="middle_col">
        <?php
			if(isset($_GET['id'])) {
				$statement = $db->query("SELECT * FROM customer WHERE id = '$_GET[id]'");
				$row = $statement->fetch(PDO::FETCH_ASSOC);
			
				echo '<h1>' . $row['firstname'] . ' ' . $row['lastname'] . '</h1>';
				echo '<span class="boldScrip">' . $row['firstname'] . ' ' . $row['lastname'] . '</span>  - ' . $row['address'] . '<br/><br/>';
				
				foreach ($db->query("SELECT * FROM sale WHERE customerid = '$_GET[id]'") as $sale)
				{
					$statement3 = $db->query("SELECT * FROM package WHERE id = $sale[packageid]");
					$package = $statement3->fetch(PDO::FETCH_ASSOC);
					echo $row['firstname'] . ' paid $' . $sale['totalcost'] . ' for the ' . $package['packagename'] . ' Package.<br/>';
					echo 'The ' . $package['packagename'] . ' Package description is: ' . $package['description'] . '<br/>';
				}
			}
		?>
		</div>
	</body>
</html>