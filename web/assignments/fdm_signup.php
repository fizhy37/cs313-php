<?php
	require('connect_db.php');
	//require('password.php');
	
	if (isset ($_SESSION['username'])) {
		//echo "<script>window.alert('You are signed in already.');</script>";
		header("location: assign06.php");
		die();
	}
	
	$username = "";
	$errors = array();

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_POST['username'])) {
			$username = test_input($_POST['username']);
		} else {
			array_push($errors, "You must enter your username");
		}
		if (!empty($_POST['password'])) {
			$password = test_input($_POST['password']);
		} else {
			array_push($errors, "You must enter your password");
		}
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			echo "HERE";
			$st = $db->prepare("SELECT username FROM user_account WHERE username = '$username'");
			$st->execute();
			$count = (int)$st->rowCount();
			if ($count == 0) {
				echo "count is 0";
				$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$st = $db->prepare("INSERT INTO user_account (username, password, is_admin) VALUES('$username', '$hashedPassword', false)");
				$st->execute();
				session_start();
				$_SESSION['username'] = $username;
				header("location: assign06.php");
				die();
			} else {
				echo "count is not 0";
				array_push($errors, "Your username already exists.");
			}
		}
	}
	
	function test_input($data) {
	  //$data = trim($data);
	  //$data = stripslashes($data);
	  //$data = htmlspecialchars($data);
	  return $data;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
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
        <h1>Sign up!</h1>
		<div class="search_settings">
			<?php
				if (count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo '<p class="error_message">' . $error . '</p><br/>';
                    }
                }
			?>
			<form action="" method="POST">
				
				<label for="username">Enter a username:</label>
				<input class="searchbar" type="text" name="username" value="<?php echo $username;?>" autofocus required><br/>

				<label for="password">Enter a password:</label>
				<input class="searchbar" type="password" name="password"><br/>

				<input class="submission" type="submit" value="Sign Up">
			</form>
			<a class="other_buttons" href="login.php">Already have an account? Login</a>
		</div>
	</div>
</body>
</html>