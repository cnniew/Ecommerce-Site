<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <?php include 'head.php' ?>
  <link rel="stylesheet" type="text/css" href="css/home.css?<?php echo time(); ?>" />
</head>

<body>
  <?php include 'navbar.php' ?>

  <main class="page__main home-page__main">
    <!-- Hero -->
    <section class="hero-section">
      <div>
        <h1 class="hero__header">Summer styles are finally here</h1>
        <h2 class="hero__subheader">This year, our new summer collection will be your haven from the world's harsh elements.</h2>
        <a class="hero__cta" href="products.php">Shop now</a>
      </div>
      <img class="hero__img" src="img/woman-riding-escalator.jpg" alt="woman riding escalator">
    </section>

    <!-- Latest Arrivals -->
    <?php
    require 'config.php';
    require 'connection.php';

    echo '<section class="latest-arrivals-section">
          <div class="latest-arrivals__header">
            <h3 class="latest-arrivals__title">Latest Arrivals</h3>
            <a class="latest-arrivals__view-all" href="products.php?collections[]=latest-arrivals">View all</a>
          </div>';
    $_GET['sort-by'] = 'newest';
    $_GET['limit'] = 8;
    include 'products_listing.php';
    echo '</section>';

    // Our Collections
    $result_collections = $connection->query('SELECT * FROM Collections');
    if ($result_collections->num_rows) {
      echo
      '<section class="collections-section">
        <h3 class="collections__title">Our Collections</h3>
        <div class="collections__listing">';
      while ($row = $result_collections->fetch_assoc()) {
        echo
        '<div class="collections__collection-card">
          <a href="products.php?collections[]=' . $row["CollectionID"] . '">
            <img class="collection__img" src="img/collections/' . $row["ImageURL"] . '" alt="' . $row["AltText"] . '">
            <div class="collection__text-container">
              <p class="collection__name">' . $row["CollectionName"] . '</p>
              <p class="collection__description">' . $row["Description"] . '</p>
            </div>
          </a>
        </div>';
      }
      echo
      '</div>
        </section>';
    }
    ?>

    <!-- Commitment -->
    <section class="commitment-section">
      <div class="commitment__header">
        <h4 class="commitment__subtitle">Elevate Your Experience</h4>
        <h3 class="commitment__title">Our Commitment to Exceptional Service</h3>
        <p class="commitment__description">We pride ourselves on a foundation of exceptional customer service, where every interaction is a testament to our dedication to excellence.</p>
      </div>

      <div class="commitment__listing">
        <div class="commitment__feature">
          <i class="ri-truck-line ri-xl commitment__feature-icon" aria-label="truck"></i>
          <h5 class="commitment__feature-title">Complimentary Shipping</h5>
          <p class="commitment__feature-description">Enjoy the convenience of free shipping for all orders. We believe in transparent pricing, and the price you see is the price you pay—no surprise fees.</p>
        </div>
        <div class="commitment__feature">
          <i class="ri-shield-check-line ri-xl commitment__feature-icon" aria-label="shield with checkmark inside"></i>
          <h5 class="commitment__feature-title">2-Year Quality Promise</h5>
          <p class="commitment__feature-description">Shop with confidence knowing that we stand behind our products. Should any issue arise within the first two years, rest assured we're here to help with a hassle-free replacement.</p>
        </div>
        <div class="commitment__feature">
          <i class="ri-exchange-line ri-xl commitment__feature-icon" aria-label="circle with two arrows inside"></i>
          <h5 class="commitment__feature-title">Easy Exchanges</h5>
          <p class="commitment__feature-description">If your purchase isn't quite right, pass it on to a friend who might love it, and let us know. We're happy to facilitate an exchange to ensure you have the perfect item to complement your lifestyle.</p>
        </div>
      </div>
    </section>

  </main>

  <?php include 'footer.php' ?>
</body>

</html>