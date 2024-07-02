<!DOCTYPE html>
<html lang="en">

<head>
  <title>Products</title>
  <?php include 'head.php' ?>
  <link rel="stylesheet" type="text/css" href="css/products.css?<?php echo time(); ?>" />
</head>

<body>
  <?php include 'navbar.php' ?>

  <main class="page__main products-page__main">
    <button class="filter-section__toggle" aria-label="Open filter menu">
      <i class="ri-filter-line ri-lg filter-section__toggle-icon" aria-label="Toggle filter menu"></i>Filter
    </button>

    <aside class="filter-section">
      <div class="filter-form__header">
        <h2 class="filter-form__header-title">Filter</h2>
        <button class="filter-form__header-close" aria-label="Close filter menu">
          <i class="ri-close-line ri-xl"></i>
        </button>
      </div>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="get">
        <section class="filter-form__section">
          <h3 class="filter-form__subtitle">Collections</h3>
          <div class="filter-form__item">
            <input type="checkbox" id="latest-arrivals" name="collections[]" value="latest-arrivals" />
            <label class="filter-form__item-label" for="latest-arrivals">Latest Arrivals</label>
          </div>
          <div class="filter-form__item">
            <input type="checkbox" id="urban" name="collections[]" value="urban" />
            <label class="filter-form__item-label" for="urban">Urban Oasis</label>
          </div>
          <div class="filter-form__item">
            <input type="checkbox" id="cozy" name="collections[]" value="cozy" />
            <label class="filter-form__item-label" for="cozy">Cozy Comfort</label>
          </div>
          <div class="filter-form__item">
            <input type="checkbox" id="fresh" name="collections[]" value="fresh" />
            <label class="filter-form__item-label" for="fresh">Fresh Fusion</label>
          </div>
        </section>

        <section class="filter-form__section">
          <h3 class="filter-form__subtitle">Category</h3>
          <div class="filter-form__item">
            <input type="checkbox" id="unisex" name="category[]" value="unisex">
            <label class="filter-form__item-label" for="unisex">Unisex</label>
          </div>
          <div class="filter-form__item">
            <input type="checkbox" id="women" name="category[]" value="women">
            <label class="filter-form__item-label" for="women">Women</label>
          </div>
          <div class="filter-form__item">
            <input type="checkbox" id="men" name="category[]" value="men">
            <label class="filter-form__item-label" for="men">Men</label>
          </div>
        </section>

        <section class="filter-form__section">
          <h3 class="filter-form__subtitle">Sort by</h3>
          <div class="filter-form__item">
            <input type="radio" id="newest" name="sort-by" value="newest">
            <label class="filter-form__item-label" for="newest">Newest</label>
          </div>
          <div class="filter-form__item">
            <input type="radio" id="price-low-high" name="sort-by" value="price-low-high">
            <label class="filter-form__item-label" for="price-low-high">Price: Low to high</label>
          </div>
          <div class="filter-form__item">
            <input type="radio" id="price-high-low" name="sort-by" value="price-high-low">
            <label class="filter-form__item-label" for="price-high-low">Price: High to low</label>
          </div>
        </section>

        <button class="filter-form__update-btn" type="submit">Update</button>
      </form>
    </aside>

    <?php include 'products_listing.php' ?>

  </main>

  <?php include 'footer.php' ?>
</body>

</html>