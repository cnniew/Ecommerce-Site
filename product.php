<!DOCTYPE html>
<html lang="en">

<head>
  <title>Product Details</title>
  <?php include 'head.php' ?>
  <link rel="stylesheet" type="text/css" href="css/product.css?<?php echo time(); ?>" />
</head>

<body>
  <header>
    <?php include 'navbar.php' ?>
  </header>

  <main class="product-page__main">
    <section class="product-details__section">
      <?php
      require 'config.php';
      require 'connection.php';

      if (isset($_GET['productID'])) {
        $product_id = $_GET['productID'];
        $query_info = 'SELECT p.ProductName, p.Description, p.CollectionID, i.ListPrice, pi.ImageURL FROM Products p,  Inventory i, ProductImgs pi WHERE p.ProductID = "' . $product_id . '" AND p.ProductID = pi.ProductID AND p.ProductID = i.ProductID';
        $query_features = 'SELECT * FROM ProductInfo WHERE ProductID = "' . $product_id . '" AND Title = "Features"';
        $query_fabric_care = 'SELECT * FROM ProductInfo WHERE ProductID = "' . $product_id . '" AND Title = "Fabric & Care"';
        $query_shipping = 'SELECT * FROM ProductInfo WHERE ProductID = "' . $product_id . '" AND Title = "Shipping"';
      }

      if ($result = $connection->query($query_info)) {
        echo '<div class="product-details__imgs">
          <img class="product-details__imgs-active ' . $product_id . '" src="img/products/' . $product_id . '/' . $product_id . '-1.jpg" alt="enlarged product photo">

          <div class="product-details__imgs-thumbnails">';
        while ($row = $result->fetch_assoc()) {
          $product_name = $row["ProductName"];
          $description = $row["Description"];
          $collection = $row["CollectionID"];
          $list_price = $row["ListPrice"];
          echo '<img class="product-details__imgs-img" src="img/products/' . $product_id . '/' . $row["ImageURL"] . '" alt="photo of product ' . $product_name . '">';
        }
        echo '</div>
          </div>
        
          <div class="product-details__content">
            <h2 class="product-details__content-name">' . $product_name . '</h2>
            <p class="product-details__content-price">$' . $list_price . '</p>
            <p class="product-details__content-description">' . $description . '</p>

            <form action="shopping_cart.php" method="post">
              <input type="hidden" name="product_id" value="' . $product_id . '">
              <input type="hidden" name="list_price" value="' . $list_price . '">
              <button class="product-details__content-btn" type="submit">Add to Cart</button>
            </form>

          ';
      }

      if ($result = $connection->query($query_features)) {
        echo '<div class="product-info__section">
            <div class="product-info__container">
              <h3 class="product-info__title">Features</h3>
              <ul class="product-info__list">';
        while ($row = $result->fetch_assoc()) {
          echo '<li class="product-info__list-item">' . $row["Description"] . '</li>';
        }
        echo '</ul>
            </div>';
      }

      if ($result = $connection->query($query_fabric_care)) {
        echo '<div class="product-info__container product-info__container--fabric-care">
                <h3 class="product-info__title">Fabric & Care</h3>
                <ul class="product-info__list">';
        while ($row = $result->fetch_assoc()) {
          echo '<li class="product-info__list-item">' . $row["Description"] . '</li>';
        }
        echo '</ul>
            </div>';
      }

      if ($result = $connection->query($query_shipping)) {
        echo
        '<div class="product-info__container">
          <h3 class="product-info__title">Shipping</h3>
          <ul class="product-info__list">';
        while ($row = $result->fetch_assoc()) {
          echo '<li class="product-info__list-item">' . $row["Description"] . '</li>';
        }
        echo '</ul>
              </div>
            </div>
          </div>
        </section>';
      }
      ?>

      <section class="product-specs__section">
        <h2 class="product-specs__heading">Discover timeless elegance</h2>
        <p class="product-specs__description">Step into a world where quality meets quintessential charm with our collection. Every thread weaves a promise of unparalleled quality, ensuring that each garment is not just a part of your wardrobe, but a piece of art. Here's the essence of what makes our apparel the hallmark for those with an eye for excellence and a heart for the environment.</p>

        <ul class="product-specs__navbar">
          <li class="eco-friendly product-specs__navbar-items active">Sustainability</li>
          <li class="uncompromised-comfort product-specs__navbar-items">Comfort</li>
          <li class="built-to-last product-specs__navbar-items">Durability</li>
          <li class="versatile-by-design product-specs__navbar-items">Versatility</li>
        </ul>

        <div class="eco-friendly product-specs__content show">
          <img class="product-specs__content-img" src="img/products-specs/eco-friendly-choice.jpg" alt="girl in yellow sweater">
          <div class="product-specs__content-info">
            <h3 class="product-specs__content-title">Eco-Friendly Choice</h3>
            <p class="product-specs__content-description">With our sustainable approach, we curate clothing that makes a statement of care—care for the planet, and for the art of fashion.</p>
            <ul class="product-specs__content-list">
              <li class="product-specs__content-list-item"><i class="ri-recycle-line ri-xl product-specs__content-list-icon"></i>Recycled Materials</li>
              <li class="product-specs__content-list-item"><i class="ri-paint-line ri-xl product-specs__content-list-icon"></i>Low Impact Dye</li>
              <li class="product-specs__content-list-item"><i class="ri-plant-line ri-xl product-specs__content-list-icon"></i>Carbon Neutral</li>
              <li class="product-specs__content-list-item"><i class="ri-water-flash-line ri-xl product-specs__content-list-icon"></i>Water Conservation</li>
            </ul>
          </div>
        </div>

        <div class="uncompromised-comfort product-specs__content">
          <img class="product-specs__content-img" src="img/products-specs/uncompromised-comfort.jpg" alt="black fabric">
          <div class="product-specs__content-info">
            <h3 class="product-specs__content-title">Uncompromised Comfort</h3>
            <p class="product-specs__content-description">Our garments are a sanctuary of softness, tailored to drape gracefully and allow for freedom of movement.</p>
            <ul class="product-specs__content-list">
              <li class="product-specs__content-list-item"><i class="ri-t-shirt-line ri-xl product-specs__content-list-icon"></i>Ergonomic Fits</li>
              <li class="product-specs__content-list-item"><i class="ri-hand-heart-line ri-xl product-specs__content-list-icon"></i>Soft-to-the-Touch Fabrics</li>
              <li class="product-specs__content-list-item"><i class="ri-windy-line ri-xl product-specs__content-list-icon"></i>Breathable Weaves</li>
              <li class="product-specs__content-list-item"><i class="ri-color-filter-line ri-xl product-specs__content-list-icon"></i>Thoughtful Design</li>
            </ul>
          </div>
        </div>

        <div class="built-to-last product-specs__content">
          <img class="product-specs__content-img" src="img/products-specs/built-to-last.jpg" alt="white chair with sweaters folded">
          <div class="product-specs__content-info">
            <h3 class="product-specs__content-title">Built to Last</h3>
            <p class="product-specs__content-description">Here's to apparel that you can trust to look as good as new, wear after wear, year after year.</p>
            <ul class="product-specs__content-list">
              <li class="product-specs__content-list-item"><i class="ri-stack-line ri-xl product-specs__content-list-icon"></i>Reinforced Construction</li>
              <li class="product-specs__content-list-item"><i class="ri-scales-2-line ri-xl product-specs__content-list-icon"></i>Quality Control</li>
              <li class="product-specs__content-list-item"><i class="ri-shield-star-line ri-xl product-specs__content-list-icon"></i>Material Resilience</li>
              <li class="product-specs__content-list-item"><i class="ri-price-tag-2-line ri-xl product-specs__content-list-icon"></i>Warranty and Repair</li>
            </ul>
          </div>
        </div>

        <div class="versatile-by-design product-specs__content">
          <img class="product-specs__content-img" src="img/products-specs/versatile-by-design.jpg" alt="clothing rack of earth tone garments">
          <div class="product-specs__content-info">
            <h3 class="product-specs__content-title">Versatile by Design</h3>
            <p class="product-specs__content-description">Our pieces are a celebration of versatility, offering a range of styles that are as perfect for a business meeting as they are for a casual brunch.</p>
            <ul class="product-specs__content-list">
              <li class="product-specs__content-list-item"><i class="ri-rainbow-line ri-xl product-specs__content-list-icon"></i>Adaptive Styles</li>
              <li class="product-specs__content-list-item"><i class="ri-shirt-line ri-xl product-specs__content-list-icon"></i>Functional Fashion</li>
              <li class="product-specs__content-list-item"><i class="ri-plant-line ri-xl product-specs__content-list-icon"></i>Timeless Aesthetics</li>
              <li class="product-specs__content-list-item"><i class="ri-shapes-line ri-xl product-specs__content-list-icon"></i>Mix-and-Match Potential</li>
            </ul>
          </div>
        </div>

      </section>
      <section class="in-this-collection__section">
        <h2 class="in-this-collection__title">In this collection</h2>

        <?php
        $_GET['collections'] = array($collection);
        $_GET['sort-by'] = 'newest';
        $_GET['limit'] = 4;
        include 'products_listing.php'
        ?>
      </section>

  </main>

  <?php include 'footer.php' ?>
</body>

</html>