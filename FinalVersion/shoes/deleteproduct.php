<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the product ID exists
if (isset($_GET['id'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$product) {
        exit('A Product doesn\'t exist with that ID!');
    }
    // Pop-up confirming if the user wants to proceed with deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // If the user clicked the "Yes" button, delete product record
            $stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'Product Deleted Succesfully.';
        } else {
            // If the user clicked the "No" button, redirect them back to the read page
            header('Location: readproduct.php');
            exit;
        }
    }
} else {
    exit('No Product ID specified!');
}
?>



<?=template_header('Delete Product')?>

<div class="content delete">
	<h2>Deleting Product ID #<?=$product['id']?> - <?=$product['title']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete Product ID #<?=$product['id']?>?</p>
    <div class="yesno">
        <a href="deleteproduct.php?id=<?=$product['id']?>&confirm=yes">Yes</a>
        <a href="deleteproduct.php?id=<?=$product['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>





