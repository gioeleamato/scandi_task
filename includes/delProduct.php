<?php
include "loader.inc.php";


$selected=$_POST;

$prod=new ProductController;


foreach($selected as $select)
{
    $prod->delProd($select);
}

header("Location: ../products.php");