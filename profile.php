<?php
require_once 'protected/config.php';
require_once PROTECTED_DIR . '/database.php';
require_once PROTECTED_DIR . '/users.php';
require_once PROTECTED_DIR . '/cart.php';
session_start();

if (!user_logged_in()) {
    add_error('Jelentkezzen be!');
    header('Location: ' . LOGIN_PAGE);
}

if (
    array_key_exists('add_to_cart', $_GET) &&
    array_key_exists('id', $_GET)
) {
    cart_add($_GET['id']);
}

if (!empty($_POST)) {
    if (
        array_key_exists('email', $_POST) &&
        array_key_exists('first_name', $_POST) &&
        array_key_exists('last_name', $_POST) &&
        array_key_exists('zipcode', $_POST) &&
        array_key_exists('city', $_POST) &&
        array_key_exists('address', $_POST)
    ) {
        $success = user_update(
            $_SESSION['user']['id'],
            $_POST['email'],
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['zipcode'],
            $_POST['city'],
            $_POST['address']
        );
        if ($success) {
            $_SESSION['user'] = user_get_by_id($_SESSION['user']['id']);
        }
        else {
            add_error('Sikertelen adatmódosítás!');
        }
    }
}



$user = $_SESSION['user'];
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
                <?php include_once 'component/user_settings_form.php'; ?>
            </div>
        </div>
    </div>

    <?php include_once 'component/footer.php' ?>
</body>

</html>