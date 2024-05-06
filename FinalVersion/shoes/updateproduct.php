<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the product id exists, for example update.php?id=1 will get the product with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the createproduct.php, but instead we update a record
        $id = isset($_GET['id']) ? $_GET['id'] : NULL;
	$title = isset($_POST['title']) ? $_POST['title'] : '';
    	$brand = isset($_POST['brand']) ? $_POST['brand'] : '';
    	$description = isset($_POST['description']) ? $_POST['description'] : '';
    	$price = isset($_POST['price']) ? $_POST['price'] : '';
    	$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
    	$img = isset($_POST['img']) ? $_POST['img'] : '';
	// Update the record
        $stmt = $pdo->prepare('UPDATE products SET id = ?, title = ?, brand = ?, description = ?, price = ?, quantity = ?, img = ? WHERE id = ?');
        $stmt->execute([$id, $title, $brand, $description, $price, $quantity, $img, $_GET['id']]);
        $msg = 'Product Information Updated Successfully!';
    }

// Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$product) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Update Product')?>

<div class="content update">
    <h2>Update Product Information for ID #<?=$product['id']?></h2>
    <form action="updateproduct.php?id=<?=$product['id']?>" method="post">
    <div>
        <label for="title">Product Name</label>
        <input type="text" name="title" placeholder="Shoe Name" value="<?=$product['title']?>" id="title">
    </div>
    <div>
        <label for="brand">Brand Name</label>
        <input type="text" name="brand" placeholder="Shoe Brand" value="<?=$product['brand']?>" id="brand">
    </div>
    <div>
        <label for="price">Price</label>
        <input type="text" name="price" placeholder="350" value="<?=$product['price']?>" id="price">
    </div>
    <div>
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" placeholder="30" value="<?=$product['quantity']?>" id="quantity">
    </div>
    <div>
        <label for="img">Image File Name</label>
        <input type="text" name="img" placeholder="filename.jpg" value="<?=$product['img']?>" id="img">
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" name="description" placeholder="Product Description" value="<?=$product['description']?>" id="description">
    </div>
    <input type="submit" value="Update">
</form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>