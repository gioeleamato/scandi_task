<?php

class Disc extends ProductController
{
    private $sku;
    private $name;
    private $price;
    private $category;
    private $discSize;
    private $unit="MB";  //MB
    
    public static $tipo= "DVD";

    public function __construct($sku, $name, $price, $category, $discSize)
    {
        $this->sku=$sku;
        $this->name=$name;
        $this->price=$price;
        $this->category=$category;
        $this->discSize=$discSize;
    }

    private function composeSpecialAttribute()
    {
        $special=$this->discSize;
        return $special." MB";
    }

    public function saveMe()
    {
        $this->saveProduct($this->sku, $this->name, $this->price, $this->category,$this->composeSpecialAttribute());
    }
    
}