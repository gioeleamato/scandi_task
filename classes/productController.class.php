<?php

class ProductController extends Product
{
    
    
    protected function saveProduct($sku, $name, $price, $category, $special)
    {
        $this->insertProduct($sku, $name, $price, $category, $special);
    }

    private function dimensionComposer()
    {

    }



    public function delProd($id)
    {
        $this->deleteProduct($id);
    }




}