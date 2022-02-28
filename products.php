<?php
    include "includes/loader.inc.php";
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product list</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="title">
            <i class="fas fa-shopping-cart"></i>
            <h2>Product List</h2>
        </div>
        <div class="buttons">
            <a href="addProduct.php"><button class="button">ADD</button></a>
            <input type="submit" id="delete-product-btn" class="button" value="MASS DELETE" form="product-list"></input>
        </div>
        
    </header>

    

    <div class="container">
        <?php
            $product=new ProductViewer();
        ?>

        <div class="productListContainer">
            <form action="includes/delProduct.php" method="post" id="product-list">
                <!--sorted by PK-->
                <?php $product->showProductList(); ?>
            </form>
        </div>
    </div>

    <footer>
        <span>Scandiweb Test assignment</span>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js" integrity="sha512-eP6ippJojIKXKO8EPLtsUMS+/sAGHGo1UN/38swqZa1ypfcD4I0V/ac5G3VzaHfDaklFmQLEs51lhkkVaqg60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/frontLogic.js"></script>
</body>
</html>