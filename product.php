<?php
require_once 'protected/config.php';
require_once PROTECTED_DIR . '/database.php';
require_once PROTECTED_DIR . '/products.php';
require_once PROTECTED_DIR . '/cart.php';
require_once PROTECTED_DIR . '/users.php';
session_start();

if (!array_key_exists('id', $_GET)) {
    add_error('Hiányzik a termék azonosító!');
    header('Location: ' . INDEX_PAGE);
}

if (array_key_exists('add_to_cart', $_GET)) {
    cart_add($_GET['id']);
}

$product = product_get_by_id($_GET['id']);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Webshop</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" class="" accesskey="" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <?php include_once 'component/navbar.php' ?>
    <?php include_once 'component/errors.php' ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Megnevezés</th>
                            <td><?= $product['name'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Ár</th>
                            <td><?= $product['price'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <a href="<?= PRODUCT_PAGE ?>?add_to_cart&id=<?= $_GET['id'] ?>" class="btn btn-primary">
                    Kosárba
                </a>
            </div>
        </div>
    </div>

    <?php include_once 'component/footer.php' ?>
</body>

</html>