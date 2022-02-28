<?php

class Furniture extends ProductController
{
    private $sku;
    private $name;
    private $price;
    private $category;
    private $height;
    private $width;
    private $length;
    private $unit="cm";  
    //H x W x L
    
    public function __construct($sku, $name, $price, $category, $height, $width, $length)
    {
        $this->sku=$sku;
        $this->name=$name;
        $this->price=$price;
        $this->category=$category;
        $this->height=$height;
        $this->width=$width;
        $this->length=$length;
    }

    private function composeSpecialAttribute()
    {
        $special=$this->height." cm x ".$this->width." cm x ".$this->length." cm";
        return $special;
    }

    public function saveMe()
    {
        $this->saveProduct($this->sku, $this->name, $this->price, $this->category,$this->composeSpecialAttribute());
    }
}