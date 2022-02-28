<?php
include "loader.inc.php";


$sku=$_POST["sku"];
$name=$_POST["name"];
$price=$_POST["price"];

$category=$_POST["category"];


if(isset($_POST["discSize"]) && $_POST["discSize"]!=="")
{
    $discSize=$_POST["discSize"];

    $saved=new Disc($sku, $name, $price, $category, $discSize);
    $saved->saveMe();

    //echo "Classe Disc istanziata";

}


if(isset($_POST["height"]) && isset($_POST["width"]) && isset($_POST["length"]) && 
    ($_POST["height"]!=="" && $_POST["width"]!=="" && $_POST["length"]!==""))
{
    $height=$_POST["height"];
    $width=$_POST["width"];
    $length=$_POST["length"];

    $saved=new Furniture($sku, $name, $price, $category, $height, $width, $length);
    $saved->saveMe();

    //echo "Classe Furniture istanziata";
}


if(isset($_POST["bookWeight"]) && $_POST["bookWeight"]!=="")
{
    $bookWeight=$_POST["bookWeight"];

    $saved=new Book($sku, $name, $price, $category, $bookWeight);
    $saved->saveMe();

    //echo "Classe Book istanziata";
}

//$url="https://".$_SERVER["HTTP_HOST"]."/tests/products.php";
header("Location: ../products.php");
//header("Location: ".$url);
//exit;