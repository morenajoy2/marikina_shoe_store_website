<?php
include 'functions.php'; // Include the file where pdo_connect_mysql() is defined
$pdo = pdo_connect_mysql(); // Establish a database connection and assign it to $pdo

// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY id DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('About')?>

<head>
    <style>
        .info {
            position: relative;
            text-align: justify;
        }

        .info img {
            position: absolute;
            right: 120px;
            bottom: 80px;
        }
        
    </style>
</head>

<div class="featured">
    <h1>Marikina Shoes</h1>
    <p>Step into Style: Where Every Pair Tells a Story</p>
</div>

<div class="info">
    <b><p class="content1">Crafted in Marikina</p></b>
    <p class="content2">
    Marikina Shoe Store Inventory Management Website Application, we pride ourselves on curating the finest selection of Marikina-made shoes, renowned for their impeccable craftsmanship and timeless style. From elegant heels to comfortable flats, and everything in between, we offer a diverse range of footwear options to suit every taste and occasion.

Our Inventory Management Website Application streamlines the shopping experience, allowing you to browse our extensive catalog with ease. Whether you're searching for the perfect pair of shoes for a special event or looking to update your everyday wardrobe, our intuitive platform empowers you to discover the ideal footwear effortlessly.

With features like real-time inventory updates, personalized recommendations, and secure online transactions, we prioritize convenience and customer satisfaction at every step. Say goodbye to the hassle of traditional shoe shopping and embrace the convenience of digital browsing with Marikina Shoe Store Inventory Management Website Application.

As proud advocates of Marikina's rich shoemaking heritage, we are committed to supporting local artisans and promoting sustainable practices within the industry. Every purchase you make not only enhances your wardrobe but also contributes to the preservation of a centuries-old craft and the livelihoods of talented shoemakers.

Join us on a journey of style, quality, and innovation. Experience the allure of Marikina-made footwear like never before with [Your Store Name]'s Inventory Management Website Application. Step into a world where every shoe tells a story and where fashion meets artistry.

Discover the perfect pair today at Marikina Shoe Store Inventory Management Website Application.
        <img src="imgs/shoes.jpg" alt="Shoes" width="600" height="550">
    </p>

    <!-- START CODE HERE,  ADD THE INFO FROM MESSENGER FOR THIS ABOUT PAGE -->  
</div>


<?=template_footer()?>