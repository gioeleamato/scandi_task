<?php

/**
 * ProductController is the class that represent the Controller of the implemented MVC model.
 * From it the three main categories classes are derivated: Book, Disc, Furniture.
 * The class has 0 properties and 2 methods.
 */
class ProductController extends Product
{
    protected function saveProduct($sku, $name, $price, $category, $special)
    {
        $this->insertProduct($sku, $name, $price, $category, $special);
    }

    public function delProd($id)
    {
        $this->deleteProduct($id);
    }
}
