<?php
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    // Prepare the SQL statement, we basically are checking if the product exists in our database
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$product_id]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in the database, now we can create/update the session variable for the cart
        $_SESSION['orders'][$product_id] = $quantity;
    }
    // Prevent form resubmission...
    header('Location: index.php?page=orders');
    exit;
}

// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['orders']) && isset($_SESSION['orders'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['orders'][$_GET['remove']]);
    // Prevent form resubmission...
    header('Location: index.php?page=orders');
    exit;
}

// Update product quantities in cart if the user clicks the "Refresh" button on the shopping cart page
if (isset($_POST['refresh']) && isset($_SESSION['orders'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'quantity-') !== false && is_numeric($value)) {
            $product_id = (int)substr($key, strlen('quantity-'));
            $quantity = (int)$value;
            // Always do checks and validation
            if (isset($_SESSION['orders'][$product_id]) && $quantity > 0) {
                // Update the quantity
                $_SESSION['orders'][$product_id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('Location: index.php?page=orders');
    exit;
}

if (isset($_POST['checkout']) && isset($_SESSION['orders']) && !empty($_SESSION['orders'])) {
    // Retrieve user information from the session
    $userEmail = $_SESSION['email'];
    $userMobileNumber = $_SESSION['mobile_number'];

    // Connect to the database
    $pdo = pdo_connect_mysql();

    // Prepare a SQL statement to insert order details into the orders table
    $stmt = $pdo->prepare('INSERT INTO orders (Title, Brand, Description, Price, Quantity, img, email, mobile_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

    // Loop through the products in the cart
    foreach ($_SESSION['orders'] as $product_id => $quantity) {
        // Get product details from the products table
        $stmt_product = $pdo->prepare('SELECT * FROM products WHERE id = ?');
        $stmt_product->execute([$product_id]);
        $product = $stmt_product->fetch(PDO::FETCH_ASSOC);

        // Insert order details into the orders table
        $stmt->execute([$product['title'], $product['brand'], $product['description'], $product['price'], $quantity, $product['img'], $userEmail, $userMobileNumber]);
    }

    // Clear the cart session
    unset($_SESSION['orders']);

    // Redirect to the checkout page or any other page you prefer
    header('Location: index.php?page=checkout');
    exit;
}
    


// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['orders']) ? $_SESSION['orders'] : array();
$products = array();
$subtotal = 0.00;

// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        // Update subtotal based on the new quantity
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
}
?>

<?=template_header('Orders')?>

<div class="cart content-wrapper">
    <h1>Orders</h1>
    <form action="index.php?page=orders" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Brand</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="6" style="text-align:center;"> You have no products currently added in your Cart.</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="index.php?page=product&id=<?=$product['id']?>">
                            <img src="imgs/<?=$product['img']?>" width="50" height="50" alt="<?=$product['title']?>">
                        </a>
                    </td>
                    <td>
                        <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['title']?></a>
                        <br>
                        <a href="index.php?page=orders&remove=<?=$product['id']?>" class="remove">Remove</a>
                    </td>
                    <td class="brand"><?=$product['brand']?></td>
                    <td class="price">&#8369;<?=$product['price']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">&#8369;<?=$product['price'] * $products_in_cart[$product['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">&#8369;<?=$subtotal?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Refresh" name="refresh">
            <input type="submit" value="Checkout" name="checkout">
        </div>
    </form>
</div>

<?=template_footer()?>
