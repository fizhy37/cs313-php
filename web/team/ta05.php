<!DOCTYPE html>
<html>
<head>
</head>

<body>

<?php

try
{
  $user = 'postgres';
  $password = 'IloveCasslyn37';
  $db = new PDO('pgsql:host=127.0.0.1;dbname=team05', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

foreach ($db->query('SELECT chapter FROM scripture') as $row)
{
  echo 'id: ' . $row['id'] . '<br/>';
}

?>

<table>
  <tr>
    <th>id</th>
    <th>name</th>
    <th>address</th>
  </tr>

<?php

$statement = $db->query('SELECT id, firstname, lastname, addressnum, addressst FROM customer');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo '<tr><td>' . $row['id'] . '</td><td>' . $row['firstname'] . ' ' . $row['lastname'] . '</td>';
  echo '<td>' .$row['addressnum'] . ' ' . $row['addressst'] . '</td></tr>';
}

?>

</table>

<p>The page is working</p>
</body>
</html>