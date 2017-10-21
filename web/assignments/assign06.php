<?php


?>
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
<h1>Fisher Digital Media Client Search</h1>
	<nav>
		<a class="bar" href="../home.html">Home</a>
        <a class="bar" href="../assignments.html">Assignments</a>
        <a class="bar" href="http://fisherdigitalmedia.businesscatalyst.com">FDM Website</a>
		<a class="bar" href="https://www.youtube.com/sabertoothzebras">YouTube</a>
	</nav>
	<div class="topper">
    <h1>Styling Testing</h1>
</div>
<div class="nav_list">
    <button id="fdmlist" class="client_buttons" onclick="open_page('fdm_list.php')">List of Clients</button>
    <button id="fdmsearch" class="client_buttons" onclick="open_page('fdm_search.php')">Search Clients</button>
    <button id="fdmadd" class="client_buttons" onclick="open_page('fdm_add_client.php')">Add Client</button>
</div>

<?php
    include 'footer.php';
?>