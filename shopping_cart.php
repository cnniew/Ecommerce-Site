<!DOCTYPE html>
<html lang="en">

<head>
	<title>Shopping Cart</title>
	<?php include 'head.php' ?>
	<link rel="stylesheet" type="text/css" href="css/shopping_cart.css?<?php echo time(); ?>" />
</head>

<body>
	<?php include 'navbar.php' ?>

	<main class="page__main">
		<h1>Shopping Cart</h1>

		<?php
		session_start();

		if (isset($_POST["product-id"])) {
			$product_id = $_POST["product-id"];
			$product_name = $_POST["product-name"];
			$list_price = intval($_POST["list-price"]);
			$description = $_POST["product-description"];

			if (!isset($_SESSION['shopping-cart'])) {
				$_SESSION['shopping-cart'] = [];
			}

			//check if product already in shopping cart
			if (array_key_exists($product_id, $_SESSION['shopping-cart'])) {
				$_SESSION['shopping-cart'][$product_id][3]++;
			} else {
				$_SESSION['shopping-cart'][$product_id] = [$product_name, $list_price, $description, 1];
			}

			var_dump($_SESSION['shopping-cart']);
		}
		?>

	</main>

	<?php include 'footer.php' ?>
</body>

</html>