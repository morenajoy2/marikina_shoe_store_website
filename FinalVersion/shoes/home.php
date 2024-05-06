<?php
include 'functions.php'; // Include the file where pdo_connect_mysql() is defined
$pdo = pdo_connect_mysql(); // Establish a database connection and assign it to $pdo

// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY id DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Home')?>

<div class="featured">
    <h1>Marikina Shoes</h1>
    <p>Step into Style: Where Every Pair Tells a Story</p>
</div>

<div class="info">
<b><p class="content1">Crafted in Marikina</p></b>
<p class="content2">
    Discover footwear that embodies the rich heritage and artisanal craftsmanship of Marikina. Each pair is meticulously crafted with dedication and skill, ensuring comfort, quality, and style that stands the test of time.
</p>
</div>

<div class="recentlyadded content-wrapper">
    <h2>Recently Added Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['title']?>">
            <span class="name"><?=$product['title']?></span>
            <span class="price">
                 &#8369;<?=$product['price']?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>