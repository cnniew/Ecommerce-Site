<!DOCTYPE html>
<html lang="en">

<head>
  <title>Product Details</title>
  <?php include 'head.php' ?>
  <link rel="stylesheet" type="text/css" href="css/home.css?<?php echo time(); ?>" />
</head>

<body>
  <header>
    <?php include 'navbar.php' ?>
  </header>

  <?php
  require 'config.php';
  require 'connection.php';

  if (isset($_GET['category'])) {
    $sql .= ' AND p.CategoryID IN ("' . implode('", "', $_GET['category']) . '")';
  }

  ?>

  <?php include 'footer.php' ?>
</body>

</html>