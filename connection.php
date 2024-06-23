<?php
$connection = new mysqli($servername, $username, $password, $databasename);

if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
