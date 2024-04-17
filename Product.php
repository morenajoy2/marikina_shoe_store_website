<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Shoe Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo">LOGO</div>
        </div>
        <div class="menu">
            <button>HOME</button>
            <button>PRODUCT</button>
            <button>CONTACT</button>
            <button>ABOUT</button>
            <button>ORDERS</button>
        </div>
        <button class="register">REGISTER</button>
    </header>
    <div class="text">The quick brown fox jumps over the lazy dog</div>
    
    <?php
        echo '<br><span class="text2">Marikina Shoes (???)</span><br><br><br>';
        echo '<span class="filters">Shoes</span>';        
    ?>
    <hr class="solid">
    <?php
        echo '<br><br><span class="filters">Brand</span><br>';       
    ?>
    <br>
    <input type="checkbox" id="brand1" name="myCheckbox">
    <br>
    <input type="checkbox" id="brand2" name="myCheckbox">
    <br>
    <input type="checkbox" id="brand3" name="myCheckbox">
    <br>
    <input type="checkbox" id="brand4" name="myCheckbox">
    <br>
    <hr class="solid">

    <?php
        echo '<br><span class="filters">Size</span><br>';       
    ?>
     <br>
     <label class="checkbox-container">
    <input type="checkbox" id="XS" name="size" class="size">
    <span class="checkmark"></span>
    <span class="checkmark-label">XS</span>
    </label>

    <label class="checkbox-container">
    <input type="checkbox" id="S" name="size" class="size">
    <span class="checkmark"></span>
    <span class="checkmark-label">S</span>
    </label>

    <label class="checkbox-container">
    <input type="checkbox" id="M" name="size" class="size">
    <span class="checkmark"></span>
    <span class="checkmark-label">M</span>
    </label>

    <br>

    <label class="checkbox-container">
    <input type="checkbox" id="L" name="size" class="size">
    <span class="checkmark"></span>
    <span class="checkmark-label">L</span>
    </label>

    <label class="checkbox-container">
    <input type="checkbox" id="XL" name="size" class="size">
    <span class="checkmark"></span>
    <span class="checkmark-label">XL</span>
    </label>

    <label class="checkbox-container">
    <input type="checkbox" id="XXL" name="size" class="size">
    <span class="checkmark"></span>
    <span class="checkmark-label">XXL</span>
    </label>

    <hr class="solid">
    <br>
    
    <?php
        echo '<br><span class="filters">Category</span><br><br>';       
    ?>

    <label class="checkbox-container">
    <input type="checkbox" id="kids" name="kids" class="size">
    <span class="checkmark"></span>
    <span class="checkmark-label">Kids</span>
    </label>
    <br>
    <label class="checkbox-container">
    <input type="checkbox" id="mens" name="mens" class="size">
    <span class="checkmark"></span>
    <span class="checkmark-label">Mens</span>
    </label>
    <hr class="solid">
    
    <div class="container">
        <div class="column">Product 1</div>
        <div class="column">Product 2</div>
        <div class="column">Product 3</div>
        <div class="column">Product 4</div>
        <div class="column">Product 5</div>
        <div class="column">Product 6</div>
        <div class="column">Product 7</div>
        <div class="column">Product 8</div>
        <div class="column">Product 9</div>
        <div class="column">Product 10</div> 
        
    </div>

</body>
</html>
