<?php
require_once 'protected/config.php';
require_once PROTECTED_DIR . '/database.php';
require_once PROTECTED_DIR . '/products.php';
require_once PROTECTED_DIR . '/cart.php';
require_once PROTECTED_DIR . '/users.php';
session_start();

if (
    array_key_exists('add_to_cart', $_GET) &&
    array_key_exists('id', $_GET)
) {
    cart_add($_GET['id']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Webshop</title>
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
                <table class="table">
                    <thead>
                        <tr>
                            <th>Megnevezés</th>
                            <th>Ár</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (product_get_all() as $product) : ?>
                            <tr>
                                <td>
                                    <a href="<?= PRODUCT_PAGE ?>?id=<?= $product['id'] ?>">
                                        <?= $product['name'] ?>
                                    </a>
                                </td>
                                <td><?= number_format($product['price'], 0, '.', ' '); ?> Ft</td>
                                <td>
                                    <a href="<?= INDEX_PAGE ?>?add_to_cart&id=<?= $product['id'] ?>">
                                        Kosárba
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <?php include_once 'component/footer.php' ?>
</body>

</html>