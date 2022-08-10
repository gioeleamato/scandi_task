<?php

/**
 * This file receives the data from the form inside addProduct.php.
 * The category class is instantiated dynamically and the created object 
 * is saved through the method saveMe() implemented inside each category class.
 */

include "loader.inc.php";

if(isset($_POST['submit'])) {
    $sku = $_POST["sku"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $category = $_POST["category"];

    if (isset($_POST["discSize"]) && $_POST["discSize"] !== "") {
        $special = $_POST["discSize"];
    }

    if (isset($_POST["height"]) && isset($_POST["width"]) 
        && isset($_POST["length"]) && ($_POST["height"] !== "" 
        && $_POST["width"] !== "" && $_POST["length"] !== "")
    ) {
        $special = [$_POST["height"], $_POST["width"], $_POST["length"]];
    }

    if (isset($_POST["bookWeight"]) && $_POST["bookWeight"] !== "") {
        $special = $_POST["bookWeight"];
    }

    $product = new $category($sku, $name, $price, $category, $special);
    $product->saveMe();
}
header("Location: ../products.php");
