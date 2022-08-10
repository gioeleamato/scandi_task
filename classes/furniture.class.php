<?php

/**
 * Furniture is the class that represent the furniture category.
 * The class has 8 properties and 3 methods.
 */
class Furniture extends ProductController
{
    private $sku;
    private $name;
    private $price;
    private $category;
    private $height;
    private $width;
    private $length;
    private $unit = "cm";
    
    public function __construct($sku, $name, $price, $category, $special)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->height=$special[0];
        $this->width=$special[1];
        $this->length=$special[2];
    }

    private function composeSpecialAttribute()
    {
        $special=$this->height." cm x ".$this->width." cm x ".$this->length." cm";
        return $special;
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
