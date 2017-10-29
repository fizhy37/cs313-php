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
			array_push($errors, "Username is required");
		}
		if (!empty($_POST['password'])) {
			$password = test_input($_POST['password']);
		} else {
			array_push($errors, "Password is required");
		}
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			$st = $db->prepare("SELECT username FROM user_account WHERE username = '$username'");
			$st->execute();
			$count = (int)$st->rowCount();
			if ($count == 0) {
				echo "count is 0";
				$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$st = $db->prepare("INSERT INTO user_account (username, password, is_admin) VALUES('$username', '$hashedPassword', false)");
				$st->execute();
				$_SESSION['username'] = $username;
				header("location: assign06.php");
				die();
			} else {
				echo "count is not 0";
				array_push($errors, "Your username already exists");
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
        <h2>Sign up!</h2>
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
				
				<label for="username">Enter a unique username</label>
				<input class="searchbar" type="text" name="username" value="<?php echo $username;?> autofocus required">

				<label for="password">Enter a password</label>
				<input class="searchbar" type="password" name="password">

				<input type="submit">
			</form>
		</div>
        <a href="login.php">Login</a>
    </body>
</html>