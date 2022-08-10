<?php

/**
 * Product is the abstract class that represents the basic product.
 * This class is the MODEL of the MVC model used.
 * The class has 4 properties and 4 methods.
 */
abstract class Product extends Database
{
    private $sku;
    private $productName;
    private $price;
    private $numProducts;
    
    protected function getProductList()
    {
        $sql = "SELECT * FROM products ORDER BY sku";
        $statement = $this->connect()->query($sql);
        $this->numProducts = $statement->rowCount();
        $rows = $statement->fetchAll();

        return $rows;
    }
    
    protected function getNumProducts()
    {
        return $this->numProducts;
    }
    
    protected function insertProduct($sku, $name, $price, $category, $special)
    {
        $sql = "INSERT INTO products(sku, name, price, category, special)
        VALUES (?, ?, ?, ?, ?)";
        $statement = $this->connect()->prepare($sql);
        $statement->execute([$sku, $name, $price, $category, $special]);
    }

    protected function deleteProduct($sku)
    {
        $sql = "DELETE from products WHERE sku=:sku";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(["sku" => $sku]);
    }
}
