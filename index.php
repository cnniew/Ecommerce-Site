<!DOCTYPE html>
<html lang="en">

<head>
  <title>StyleNest Home</title>
  <?php include 'head.php' ?>
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

    <section class="commitment-section">
      <div class="commitment__header">
        <h4 class="commitment__subtitle">Elevate Your Experience</h4>
        <h3 class="commitment__title">Our Commitment to Exceptional Service</h3>
        <p class="commitment__description">We pride ourselves on a foundation of exceptional customer service, where every interaction is a testament to our dedication to excellence.</p>
      </div>

      <div class="commitment__listing">
        <div class="commitment__feature">
          <i class="ri-truck-line ri-xl commitment__feature-icon"></i>
          <h5 class="commitment__feature-title">Complimentary Shipping</h5>
          <p class="commitment__feature-description">Enjoy the convenience of free shipping for all orders. We believe in transparent pricing, and the price you see is the price you pay—no surprise fees.</p>
        </div>
        <div class="commitment__feature">
          <i class="ri-shield-check-line ri-xl commitment__feature-icon"></i>
          <h5 class="commitment__feature-title">2-Year Quality Promise</h5>
          <p class="commitment__feature-description">Shop with confidence knowing that we stand behind our products. Should any issue arise within the first two years, rest assured we're here to help with a hassle-free replacement.</p>
        </div>
        <div class="commitment__feature">
          <i class="ri-exchange-line ri-xl commitment__feature-icon"></i>
          <h5 class="commitment__feature-title">Easy Exchanges</h5>
          <p class="commitment__feature-description">If your purchase isn't quite right, pass it on to a friend who might love it, and let us know. We're happy to facilitate an exchange to ensure you have the perfect item to complement your lifestyle.</p>
        </div>
      </div>
    </section>

    <footer>

    </footer>
  </main>

</body>

</html>