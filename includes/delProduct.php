<?php

/**
 * This file receives the data from the form inside products.php.
 * Through the object istantiated from the class ProductController 
 * is possible to delete the selected products.
 */

include "loader.inc.php";

$selected = $_POST;
$prod = new ProductController;

foreach ($selected as $select) {
    $prod->delProd($select);
}

header("Location: ../products.php");
