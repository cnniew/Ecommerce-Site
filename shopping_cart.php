<?php
session_start();

if (isset($_POST["product_id"])) {
	$product_id = $_POST["product_id"];
	$list_price = intval($_POST["list_price"]);

	if (!isset($_SESSION['shopping_cart'])) {
		$_SESSION['shopping_cart'] = [];
	}

	if (array_key_exists($product_id, $_SESSION['shopping_cart'])) {
		$_SESSION['shopping_cart'][$product_id][0]++;
	} else {
		$_SESSION['shopping_cart'][$product_id] = [1, $list_price];
	}

	var_dump($_SESSION['shopping_cart']);
}
?>