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
        $sqlProducts = "SELECT 
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
        $resultProducts = $connection->query($sqlProducts);

        while ($rowProducts = $resultProducts->fetch_assoc()) {
          echo
          '<div class="product__product-card">
            <img class="product__img" src="img/' . $rowProducts["ImageURL"] . '" alt="' . $rowProducts["ProductName"] . '">
            <p class="product__name">' . $rowProducts["ProductName"] . '</p>
            <p class="product__price">$' . $rowProducts["ListPrice"] . '</p>
          </div>';
        }
        ?>
      </div>
    </section>

    <section class="collections-section">
      <h3 class="collections__title">Our Collections</h3>
      <div class="collections__listing">
        <?php
        $sqlCollections = "SELECT CollectionName, Description, ImageURL FROM Collections";
        $resultCollections = $connection->query($sqlCollections);
        while ($rowCollections = $resultCollections->fetch_assoc()) {
          echo
          '<div class="collections__collection-card">
            <img class="collection__img" src="img/' . $rowCollections["ImageURL"] . '" alt="">
            <div class="collection__text-container">
              <p class="collection__name">' . $rowCollections["CollectionName"] . '</p>
              <p class="collection__description">' . $rowCollections["Description"] . '</p>
            </div>
          </div>';
        }
        ?>
      </div>
    </section>
  </main>

</body>

</html>