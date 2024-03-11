<?php
//database connection 
define("DB_SERVER", "localhost");
define("DB_USER", "newuser");
define("DB_PASS", "password");
define("DB_NAME", "testing");

function db_connect()
{
  $connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  confirm_db_connect($connection);
  return $connection;
}

function confirm_db_connect($connection)
{
  if ($connection->connect_errno) {
    $msg = "Database connection failed: ";
    $msg .= $connection->connect_error;
    $msg .= " (" . $connection->connect_errno . ")";
    exit($msg);
  }
}

function db_disconnect($connection)
{
  if (isset($connection)) {
    $connection->close();
  }
}

$db = db_connect();
$errors = [];

//sql to query database
function findAll()
{
  global $db;
  $sql = "SELECT * FROM test ";
  $sql .= "ORDER BY id ASC";
  $result = mysqli_query($db, $sql);
  return $result;
}

$dataSet = findAll();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>database testing</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
  </head>
  
  <h1>testing database connection</h1>
  <table>
    <tr>
      <th>Id</th>
      <th>Data</th>
    </tr>
  
    <?php
    // gets the data breaks it apart and populates the table with it
    while ($data = mysqli_fetch_assoc($dataSet)) { ?>
      <tr>
        <td>
          <?= $data['id']; ?>
        </td>
        <td>
          <?= $data['data']; ?>
        </td>
      </tr>
    <?php }db_disconnect($db) ?>
  </table>
</html>
