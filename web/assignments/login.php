<?php

include 'connect_db.php';

$errors = array();

$stmt = $db->prepare("SELECT * FROM user_account WHERE username = ?");
if ($stmt->execute(array($_POST['username']))) {
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $firstRow = $data[0];
}

if (isset ($_POST['username'])) {
    //pull from post and check in database
    //if correct set loggedin = true and redirect else error message
    if ($_POST['password'] === $firstRow['password']) {
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