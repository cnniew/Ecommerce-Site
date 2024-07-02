<section class="products-listing-section">
  <?php
  require 'config.php';
  require 'connection.php';

  $sql_category = $sql_collection = $sql_sort_by = $sql_limit = $sql_limit = '';

  if (isset($_GET['category'])) {
    $sql_category = ' AND p.CategoryID IN ("' . implode('", "', $_GET['category']) . '")';
  }

  if (isset($_GET['collections'])) {
    $collections = $_GET['collections'];

    if (in_array('latest-arrivals', $collections)) {
      if (count($collections) > 1) {
        $sql_collection = ' AND p.CollectionID IN ("' . implode('", "', array_slice($collections, 1)) . '")';
      }
      $sql_collection .= ' AND p.CreatedAt BETWEEN "2024-02-25" AND "2024-05-01"';
    } else {
      $sql_collection = ' AND p.CollectionID IN ("' . implode('", "', $collections) . '")';
    }
  }

  if (isset($_GET['sort-by'])) {
    $sort_by = $_GET['sort-by'];
    switch ($sort_by) {
      case 'newest':
        $sql_sort_by = ' ORDER BY CreatedAt DESC';
        break;
      case 'price-low-high':
        $sql_sort_by = ' ORDER BY ListPrice';
        break;
      case 'price-high-low':
        $sql_sort_by = ' ORDER BY ListPrice DESC';
        break;
      default:
        break;
    }
  }

  if (isset($_GET['limit'])) {
    $sql_limit = ' LIMIT ' . $_GET['limit'];
  }

  $sql = 'SELECT p.ProductID, p.ProductName, i.ListPrice FROM Products p, Inventory i WHERE p.ProductID = i.ProductID AND NOT(i.Stock = 0) ' . $sql_category . $sql_collection . ' GROUP BY p.ProductID' . $sql_sort_by . $sql_limit;
  // echo $sql;

  $result = $connection->query($sql);

  if ($result->num_rows) {
    while ($row = $result->fetch_assoc()) {
      echo
      '<div class="products-listing__product-card">
        <a href="product.php?productID=' . $row["ProductID"] . '">
          <img class="products-listing__img" src="img/products/' . $row["ProductID"] . '/' . $row["ProductID"] . '-1.jpg" alt="' . $row["ProductName"] . '">
          <p class="products-listing__name">' . $row["ProductName"] . '</p>
          <p class="products-listing__price">$' . $row["ListPrice"] . '</p>
        </a>
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