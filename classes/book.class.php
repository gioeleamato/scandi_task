<?php

/**
 * Book is the class that represent the book category.
 * The class has 6 properties and 3 methods.
 */
class Book extends ProductController
{
    private $sku;
    private $name;
    private $price;
    private $category;
    private $bookWeight;
    private $unit="Kg";
    
    public function __construct($sku, $name, $price, $category, $bookWeight)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->bookWeight = $bookWeight;
    }

    private function composeSpecialAttribute()
    {
        $special = $this->bookWeight;
        return $special." Kg";
    }

    public function saveMe()
    {
        $this->saveProduct(
            $this->sku,
            $this->name,
            $this->price,
            $this->category,
            $this->composeSpecialAttribute()
        );
    }
}
