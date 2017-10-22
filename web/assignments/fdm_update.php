<?php

    include 'session_start.php';
    
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	
	$firstname = $lastname = $phone = $address = "";
	$errors = array();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["firstname"])) {
			array_push($errors, "First name is required");
		} else {
			$firstname = test_input($_POST["firstname"]);
		}
		if (empty($_POST["lastname"])) {
			array_push($errors, "Last name is required");
		} else {
			$lastname = test_input($_POST["lastname"]);
		}
		if (empty($_POST["phone"])) {
			array_push($errors, "Phone number is required");
		} else {
			$phone = test_input($_POST["phone"]);
		}
		if (empty($_POST["address"])) {
			array_push($errors, "Address is required");
		} else {
			$address = test_input($_POST["address"]);
		}
		if (empty($_POST["topic"])) {
			$topicError = "Topic is required";
		}
		if (!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && 
			!empty($_POST["phone"]) && !empty($_POST["address"])) {
				$st = $db->prepare("UPDATE customer SET (firstname, lastname, phone, address) = (:firstname, :lastname, :phone, :address) WHERE id = '$_GET[id]'");
				$st->execute(array(':firstname' => $firstname, ':lastname' => $lastname, ':phone' => $phone, ':address' => $address));
				$id = (int)$db->lastInsertId();
				header("Location: assign06.php");
		}
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
    }
    
    if(isset($_GET['id'])) {
        $statement = $db->query("SELECT * FROM customer WHERE id = '$_GET[id]'");
        $row = $statement->fetch(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Client</title>
	<link rel="stylesheet" href="db.css">
	<script src="fdm_js.js"></script>
</head>

<body>
	<nav>
        <a class="bar" href="../home.html">Home</a>
        <a class="bar" href="../assignments.html">Assignments</a>
        <a class="bar" href="http://fisherdigitalmedia.businesscatalyst.com">FDM Website</a>
		<a class="bar" href="https://www.youtube.com/sabertoothzebras">YouTube</a>
		<a class="bar" href="assign06.php">Assignment 06</a>
    </nav>
    <div class="topper">
        <h1>Add a Client</h1>
        <div class="search_settings">
            <?php
                if (count($errors) > 0) {
                    echo '<p class="error_message">';
                    foreach ($errors as $error) {
                        echo $error . '<br/>';
                    }
                    echo '</p>';
                }
            ?>
            <form action="" method="POST">
                <label for="firstname">First Name: </label><br/>
                <input class="searchbar" type="text" name="firstname" value="<?php echo $row[firstname]?>" required/><br/>
                <label for="lastname">Last Name: </label><br/>
                <input class="searchbar" type="text" name="lastname" value="<?php echo $row[lastname]?>" required/><br/>
                <label for="phone">Phone Number: </label><br/>
                <input class="searchbar" type="text" name="phone" value="<?php echo $row[phone]?>" required/><br/>
                <label for="address">Address: </label><br/>
                <input class="searchbar" type="text" name="address" value="<?php echo $row[address]?>" required/><br/>
                <input class="submission" type="submit" value="Update Client"/>
            </form>
        </div>
	</div>
</body>
</html>