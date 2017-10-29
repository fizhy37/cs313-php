<?php

include 'connect_db.php';

$username = "";
$errors = array();

$stmt = $db->prepare("SELECT * FROM user_account WHERE username = ?");
if ($stmt->execute(array($_POST['username']))) {
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $firstRow = $data[0];
}

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
        $st = $db->prepare("SELECT * FROM user_account WHERE username = '$username'");
        $st->execute();
        $row = $st->fetch();
        $passFromDB = $row['password'];
        echo $passFromDB;
        echo "<br/>";
        echo $row['username'];
        echo "<br/>";
        echo $password;
        if (password_verify($password, $passFromDB)) {
            $_SESSION['username'] = $username;
            header("location: assign06.php");
            die();
        } else {
            array_push($errors, "Incorrect username or password");
        }
    }
}
?>
<html>
<head>
  	<title>Login</title>
    <link rel="stylesheet" href="db.css">
    <script src="fdm_js.js"></script>
  	<script type="text/javascript" src="jquery.js"></script>
  	<script type="text/javascript">
  		$(document).ready(function(){
  			
  		});
  	</script>
</head>

<body>
    <nav>
        <a class="bar" href="../home.html">Home</a>
        <a class="bar" href="../assignments.html">Assignments</a>
        <a class="bar" href="http://fisherdigitalmedia.businesscatalyst.com">FDM Website</a>
        <a class="bar" href="https://www.youtube.com/sabertoothzebras">YouTube</a>
    </nav>
    <div class="topper">
        <h1>Login</h1>
        <div class="search_settings">
            <?php
                if (count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo '<p class="error_message">' . $error . '</p><br/>';
                    }
                }
            ?>
            <form action="login.php" method="POST">
                <label for="username">Username: </label>
                <input class="searchbar" type="text" name="username" autofocus><br/>
                <label for="password">Password: </label>
                <input class="searchbar" type="password" name="password"><br/>
                <input class="submission" type="submit" value="login">
            </form>
        </div>
    </div>
<?php
include 'footer.php';
?>