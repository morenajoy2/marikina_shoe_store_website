<?=template_header('Place Order')?>

<div class="placeorder content-wrapper">
    <h1>Your Order Has Been Placed</h1>
    <p>Thank you for ordering with us! We'll contact you regarding your order details.</p>
</div>

<?=template_footer()?>

<?php

unset($_SESSION['cart'])

?>