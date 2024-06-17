<section class="products-listing-section">
  <?php
  require 'config.php';
  require 'connection.php';

  $sql = 'SELECT p.ProductID, p.ProductName, p.ImageURL, i.ListPrice FROM Products p, Inventory i WHERE p.ProductID = i.ProductID AND NOT(i.Stock = 0)';

  if (isset($_GET['category'])) {
    $sql .= ' AND p.CategoryID IN ("' . implode('", "', $_GET['category']) . '")';
  }

  if (isset($_GET['collections'])) {
    $collections = $_GET['collections'];
    $has_latest_arrivals = in_array('latest-arrivals', $collections);
    $mulitple_filters = count($collections) > 1;

    if ($has_latest_arrivals) {
      if ($mulitple_filters) {
        $sql .= ' AND p.CollectionID IN ("' . implode('", "', array_slice($collections, 1)) . '")';
      }
      $sql .= ' AND p.CreatedAt BETWEEN "2024-02-25" AND "2024-05-01"';
    } else {
      $sql .= ' AND p.CollectionID IN ("' . implode('", "', $collections) . '")';
    }
  }

  if (isset($_GET['sort-by'])) {
    $sort_by = $_GET['sort-by'];
    switch ($sort_by) {
      case 'newest':
        $sql .= ' ORDER BY CreatedAt DESC';
        break;
      case 'price-low-high':
        $sql .= ' ORDER BY ListPrice';
        break;
      case 'price-high-low':
        $sql .= ' ORDER BY ListPrice DESC';
        break;
      default:
        break;
    }
  }

  if (isset($_GET['limit'])) {
    $sql .= ' LIMIT ' . $_GET['limit'];
  }
  // echo $sql;

  $result = $connection->query($sql);

  if ($result->num_rows) {
    while ($row = $result->fetch_assoc()) {
      echo
      '<div class="products-listing__product-card">

        <img class="products-listing__img" src="img/' . $row["ImageURL"] . '" alt="' . $row["ProductName"] . '">
        <p class="products-listing__name">' . $row["ProductName"] . '</p>
        <p class="products-listing__price">$' . $row["ListPrice"] . '</p>
      </div>';
    }
  } else {
    echo
    '<div class="products-empty">
      <i class="ri-t-shirt-2-line ri-lg aria-label="shirt" products-empty__icon"></i>
      <h3 class="products-empty__title">Nothing found just yet</h3>
      <p class="products-empty__description">Adjust your filters a bit, and let\'s see what we can find!</p>
      <a class="products-empty__reset-btn" href="' . htmlspecialchars($_SERVER['PHP_SELF']) . '">Reset filters</a>
    </div>';
  }
  ?>
</section>

<a href="product-details.php?product_id="></a>