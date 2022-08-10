<?php include "includes/loader.inc.php"; ?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="title">
            <i class="fas fa-cart-plus"></i>
            <h2>Product Add</h2>
        </div>
        <div class="buttons">
            <input type="submit" id="saveButton" class="button" value="Save" form="product_form"><!--Save and goes to the list-->
            <a href="products.php"><button class="button">Cancel</button></a><!--Cancel the Save operation and goes to the list-->
        </div>
    </header>
    
    <div class="container">
        <form id="product_form" action="includes/saveProduct.php" method="post">
            <div class="common-info">
                <div class="inputElement">
                    <label>SKU</label>
                    <input type="text" id="sku" name="sku" placeholder="Unique code..." required>
                </div>

                <div class="inputElement">
                    <label>Name</label>
                    <input type="text" id="name" name="name" placeholder="My beautiful product.." required>
                </div>

                <div class="inputElement">
                    <label>Price ($)</label>
                    <input type="text" id="price" name="price" placeholder="9.99" required>
                </div>
            </div>

            <div class="special-attr-sel">
                <select id="productType" name="category" required>
                    <option id="voidCategory" value="voidCategory">Choose a category</option>
                    <option id="dvd" value="disc">DVD</option>
                    <option id="book" value="book">Book</option>
                    <option id="furniture" value="furniture">Furniture</option>
                </select>
            </div>

            <div class="special-attribute-box">
                <div class="special-attribute disc">
                    <label>Size (MB)</label>
                    <input type="text" id="size" name="discSize" required>
                    <p>Please, provide size</p>
                </div>

                <div class="special-attribute furniture">
                    <label>Height (cm)</label>
                    <input type="text" id="height" name="height" required>
                    
                    <label>Width (cm)</label>
                    <input type="text" id="width" name="width" required>
                    
                    <label>Length (cm)</label>
                    <input type="text" id="length" name="length" required>
                    
                    <p>Please, provide dimensions</p>
                </div>

                <div class="special-attribute book">
                    <label>Weight (KG)</label>
                    <input type="text" id="weight" name="bookWeight" required>
                    <p>Please, provide weight</p>
                </div>
            </div>
        </form>
    </div>

    <footer>
        <span>Scandiweb Test assignment</span>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js" integrity="sha512-eP6ippJojIKXKO8EPLtsUMS+/sAGHGo1UN/38swqZa1ypfcD4I0V/ac5G3VzaHfDaklFmQLEs51lhkkVaqg60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/frontLogic.js"></script>
</body>
</html>
