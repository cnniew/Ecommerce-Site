<!DOCTYPE html>
<html lang="en">

<head>
  <title>StyleNest</title>
  <?php include 'header.php' ?>
</head>

<body>
  <main>
    <section class="hero-section">
      <div>
        <h1 class="hero__header">Summer styles are finally here</h1>
        <h2 class="hero__subheader">This year, our new summer collection will be your haven from the world's harsh elements.</h2>
        <a class="hero__cta" href="https://www.greatfrontend.com/">Shop now</a>
      </div>
      <img class="hero__img" src="img/woman-riding-escalator.jpg" alt="">
    </section>

    <section class="latest-arrivals-section">
      <div class="latest-arrivals__header">
        <h3 class="latest-arrivals__title">Latest Arrivals</h3>
        <a class="latest-arrivals__view-all" href="https://www.greatfrontend.com/">View all</a>
      </div>

      <div class="latest-arrivals__products-listing">
        <?php
        require 'config.php';
        require 'connection.php';
        $sql = "SELECT 
                  p.ProductID, 
                  p.ProductName, 
                  p.ImageURL,
                  i.ListPrice
              FROM 
                  Products p, 
                  Inventory i
              WHERE 
                  p.ProductID = i.ProductID 
                  AND NOT(i.Stock = 0) 
                  LIMIT 8";
        $result = $connection->query($sql);

        while ($row = $result->fetch_assoc()) {
          echo
          '<div class="product__product-card">
          <img class="product__img" src="img/' . $row["ImageURL"] . '" alt="' . $row["ProductName"] . '">
          <p class="product__name">' . $row["ProductName"] . '</p>
          <p class="product__price">$' . $row["ListPrice"] . '</p>
        </div>';
        }
        ?>
      </div>
    </section>
  </main>

</body>

</html>