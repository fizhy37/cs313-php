<?php

include 'connect_db.php';

$errors = array();

if (isset ($_POST['username'])) {
    //pull from post and check in database
    //if correct set loggedin = true and redirect else error message
    echo $_POST['username'];
    echo $_POST['password'];
    if ($db->query("SELECT * FROM user WHERE username = '$_POST[username]' AND password = '$_POST[password]'"))
    {
        $_SESSION['loggedin'] = true;
        header('Location: assign06.php');
    } else {
        array_push($errors, "Incorrect username or password");
    }
}

include 'header.php';

if (count($errors) > 0) {
    foreach ($errors as $error) {
        echo $error; //<br/>
    }
}
?>

<form action="login.php" method="POST">
    <label for="username">Username:
    <input type="text" name="username">
    <label for="password">Password:
    <input type="password" name="password">
    <input type="submit" value="login">
</form>

<?php
include 'footer.php';
?>