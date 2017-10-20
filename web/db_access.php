<!DOCTYPE html>
<html>
<head>
    <style>
      table {
        border-collapse: collapse;
      }

      table, th, td {
        border:1px solid black;
      }
    </style>
</head>

<body>

<?php

try
{
  $user = 'postgres';
  $password = '';
  $db = new PDO('pgsql:host=127.0.0.1;dbname=fdm', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

foreach ($db->query('SELECT id, firstname, lastname, address FROM customer') as $row)
{
  echo 'id: ' . $row['id'] . '<br/>';
  echo 'name: ' . $row['lastname'] . ', ' . $row['firstname'];
  echo '<br/>' . 'address: ' . $row['address'];
  echo '<br/><br/>';
}

?>

<table>
  <tr>
    <th>id</th>
    <th>name</th>
    <th>address</th>
  </tr>

<?php

$statement = $db->query('SELECT id, firstname, lastname, address FROM customer');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo '<tr><td>' . $row['id'] . '</td><td>' . $row['firstname'] . ' ' . $row['lastname'] . '</td>';
  echo '<td>' .$row['address'] . '</td></tr>';
}

?>

</table>

<p>The page is working</p>
</body>
</html>