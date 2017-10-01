<!Doctype HTML>
<html>
	<body>
		<?php
			$name = "";
			$email = "";
			$major = "";
			$places = "";
			$comments = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$name = test_input($_POST["name"]);
				$email = test_input($_POST["email"]);
				$major = test_input($_POST["major"]);
				$places = test_input($_POST["places"]);
				$comments = test_input($_POST["comments"]);
			}

			display();

			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			function display() {
				echo "Name: $name";
				echo "Email: " . $email;
				echo "Major: " . $major;
				echo "Places Visited: " . $places;
				echo "Comments: " . $comements;
			}
		?>
	</body>
</html>

