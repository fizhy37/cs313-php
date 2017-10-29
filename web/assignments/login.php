<?php

include 'connect_db.php';

$username = "";
$errors = array();

$stmt = $db->prepare("SELECT * FROM user_account WHERE username = ?");
if ($stmt->execute(array($_POST['username']))) {
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $firstRow = $data[0];
}

if (isset ($_POST['username'])) {
    //pull from post and check in database
    //if correct set loggedin = true and redirect else error message
    /* 
    if ($_POST['password'] === $firstRow['password']) {
        session_start();
        $_SESSION['loggedin'] = true;
        header('Location: assign06.php');
    } else {
        array_push($errors, "Incorrect username or password");
    }
    
    if (password_verify($password, $passFromDB)) {
        session_start();
        $_SESSION['username'] = $username;
        header("location: assign06.php");
        die();
    } else {
        array_push($errors, "Incorrect username or password");
    }
    */
}

$username = "";

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
    if (!empty($_POST['username']) && !empty($_POST['username'])) {
        $st = $db->prepare("SELECT * FROM user_account WHERE username = '$username'");
        $st->execute();
        $row = $st->fetch();
        $passFromDB = $row['password'];
        if (password_verify($password, $passFromDB)) {
            session_start();
            $_SESSION['username'] = $username;
            header("location: assign06.php");
            die();
        } else {
            array_push($errors, "Invalid username or password");
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
        
                <input class="submission" type="submit" value="Login">
            </form>
        </div>
        <a class="other_buttons" href="fdm_signup.php">Don't have an account? Sign up here.</a>
    </div>
<?php
include 'footer.php';
?>