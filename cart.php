<?php
require_once 'protected/config.php';
require_once PROTECTED_DIR . '/database.php';
require_once PROTECTED_DIR . '/products.php';
require_once PROTECTED_DIR . '/cart.php';
require_once PROTECTED_DIR . '/users.php';
session_start();

if (array_key_exists('clear', $_GET)) {
    cart_clear();
    header('Location: ' . CART_PAGE);
}

if (
    array_key_exists('remove', $_GET) &&
    array_key_exists('id', $_GET)
) {
    cart_remove($_GET['id']);
    header('Location: ' . CART_PAGE);
}

if (
    array_key_exists('increase_amount', $_GET) &&
    array_key_exists('id', $_GET)
) {
    cart_increase_amount($_GET['id']);
    header('Location: ' . CART_PAGE);
}

if (
    array_key_exists('decrease_amount', $_GET) &&
    array_key_exists('id', $_GET)
) {
    cart_decrease_amount($_GET['id']);
    header('Location: ' . CART_PAGE);
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Kosár</title>
    <meta charset="utf-8" />
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <?php include_once 'component/navbar.php' ?>
    <?php include_once 'component/errors.php' ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php include_once 'component/cart_view.php'; ?>
            </div>
        </div>
    </div>
    <?php include_once 'component/footer.php' ?>
</body>

</html>