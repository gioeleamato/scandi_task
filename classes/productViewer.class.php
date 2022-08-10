<?php

/**
 * ProductViewer is the class that represent the Viewer of the implemented MVC model.
 * The class has 0 properties and 2 methods.
 */
class ProductViewer extends Product
{
    public function showProductList()
    {
        $table=$this->getProductList();

        if ($table) {
            foreach ($table as $row) {
                $this->templateBuilder($row);
            }
        } else {
            echo "
                <div class='noItemsContainer'>
                    <img src='images/noItems.png' class='noItemsImage'>
                    <span class='noItemsText'>No items</span>
                </div>
            ";
        }
    }

    private function templateBuilder($row)
    {
        echo '<div class="product-box">
                <input type="checkbox" name="'.$row["sku"]
                .'" value="'.$row["sku"].'" class="delete-checkbox">
        ';
                switch ($row['category']) {
                    case "disc":
                        echo '<i class="fa-solid fa-compact-disc"></i>';
                        break;
                    case "book":
                        echo '<i class="fa-solid fa-book"></i>';
                        break;
                    case "furniture":
                        echo '<i class="fa-solid fa-couch"></i>';
                        break;
                }
            echo '
                <div class="product-info">
                    <span class="detail sku">'.$row["sku"].'</span>
                    <span class="detail name">'.$row["name"].'</span>
                    <span class="detail price">'.$row["price"].' $</span>
                    <span  class="detail special">'.$row["special"].'</span>
                </div>
            </div>
            ';
    }
}
