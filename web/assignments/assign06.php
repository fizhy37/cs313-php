<?php

include 'session_start.php';

?>
<!DOCTYPE html>
<html>
<head>
  	<title>Assignment 06</title>
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
        <?php
            echo "<h1>Welcome $_SESSION[username]</h1>";
        ?>
        <div class="nav_list">
            <button id="logout" class="client_buttons" onclick="open_page('logout.php')">Logout</button>
            <button id="fdmlist" class="client_buttons" onclick="open_page('fdm_list.php')">List of Clients</button>
            <button id="fdmsearch" class="client_buttons" onclick="open_page('fdm_search.php')">Search Clients</button>
            <button id="fdmadd" class="client_buttons" onclick="open_page('fdm_add_client.php')">Add Client</button>
        </div>
    </div>

<?php
    include 'footer.php';
?>