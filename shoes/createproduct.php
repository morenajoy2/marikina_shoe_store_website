<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "title" exists, if not default the value to blank, basically the same for all variables
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
    $img = isset($_POST['img']) ? $_POST['img'] : '';
    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO products VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $title, $brand, $description, $price, $quantity, $img]);
    // Output message
    $msg = 'New Product Created Successfully!';
}
?>




<?=template_header('Create Product')?>

<div class="content update">
	<h2>Create New Product</h2>
    <form action="createproduct.php" method="post">
        <label for="id">ID</label>
        <label for="title">Product Name</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id">
	<input type="text" name="title" placeholder="Shoe Name" id="title">
        <label for="brand">Brand Name</label>
	<label for="description">Description</label>
	<input type="text" name="description" placeholder="Product Description" id="description">
	<input type="text" name="brand" placeholder="Shoe Brand" id="brand">
        <label for="price">Price</label>
 
        <input type="text" name="price" placeholder="350" id="price">
        <label for="quantity">Quantity</label>
        <label for="img">Image File Name</label>
        <input type="text" name="quantity" placeholder="30" id="quantity">
        <input type="text" name="img" placeholder="filename.jpg" id="img">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>













