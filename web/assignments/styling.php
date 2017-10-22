<!DOCTYPE html>

<html>
<head>
    <title>Client List</title>
    <link rel="stylesheet" href="db.css">
    <script src="fdm_js.js"></script>
</head>

<body>
    <nav>
        <a class="bar" href="../home.html">Home</a>
        <a class="bar" href="../assignments.html">Assignments</a>
        <a class="bar" href="http://fisherdigitalmedia.businesscatalyst.com">FDM Website</a>
        <a class="bar" href="https://www.youtube.com/sabertoothzebras">YouTube</a>
        <a class="bar" href="assign06.php">Assignment 06</a>
    </nav>
    <div class="topper">
        <h1>Add a Client</h1>
        <div class="search_settings">
            <form action="" method="POST">
                <label for="firstname">First Name: </label><br/>
                <input class="searchbar" type="text" name="firstname" required/><br/>
                <label for="lastname">Last Name: </label><br/>
                <input class="searchbar" type="text" name="lastname" required/><br/>
                <label for="phone">Phone Number: </label><br/>
                <input class="searchbar" type="text" name="phone"/><br/>
                <label for="address">Address: </label><br/>
                <input class="searchbar" type="text" name="address"/><br/>
                <input class="submission" type="submit" value="Add Client"/>
            </form>
        </div>
        <div class="nav_list">
        <?php
            if(isset($_POST['customer'])) {
                foreach ($db->query("SELECT * FROM customer WHERE firstname = '$_POST[customer]' OR lastname = '$_POST[customer]' OR address = '$_POST[customer]'") as $row)
                {
                    echo '<button class="client_buttons" onclick="open_page(\'fdm_customer.php?id=' . $row['id'] . '\')">' . $row['firstname'] . ' ' . $row['lastname'] . '</button>';
                    echo '<br/>';
                }
            }
        ?>
        </div>
    </div>
</body>
</html>