<?php

if (isset ($_SESSION)) {
    session_unset();  
    session_destroy();
    header('Location: login.php');
    exit;
} else {
    header('Location: assign06.php');
    exit;
}


?>