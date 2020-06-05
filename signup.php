<?php
require_once 'protected/config.php';
require_once PROTECTED_DIR . 'users.php';
require_once PROTECTED_DIR . '/cart.php';
session_start();
if (!empty($_POST)) {
    if (
        array_key_exists('email', $_POST) &&
        array_key_exists('password', $_POST) &&
        array_key_exists('first_name', $_POST) &&
        array_key_exists('last_name', $_POST) &&
        array_key_exists('zipcode', $_POST) &&
        array_key_exists('city', $_POST) &&
        array_key_exists('address', $_POST)
    ) {
        $success = user_sign_up(
            $_POST['email'],
            $_POST['password'],
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['zipcode'],
            $_POST['city'],
            $_POST['address']
        );
        if (!$success) {
            add_error('Sikertelen regisztráció!');
            header('Location: ' . SIGNUP_PAGE);
        }
        header('Location: ' . INDEX_PAGE);
    } else {
        add_error('Hiányzó paraméterek!');
        header('Location: ' . SIGNUP_PAGE);
    }
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
    <?php include_once 'component/navbar.php'; ?>
    <?php include_once 'component/errors.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Regisztráció</h1>
                <form action="<? SIGNUP_PAGE ?>" method="post">
                    <div class="form-group">
                        <label for="first_name">Vezetéknév</label>
                        <input id="first_name" name="first_name" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="last_name">Keresztnév</label>
                        <input id="last_name" name="last_name" type="text" class="form-control" />
                    </div class="form-group">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" class="form-control" />
                    </div class="form-group">
                    <div class="form-group">
                        <label for="password">Jelszó</label>
                        <input id="password" name="password" type="password" class="form-control" />
                    </div class="form-group">
                    <div class="form-group">
                        <label for="zipcode">Irányítószám</label>
                        <input type="text" name="zipcode" id="zipcode" class="form-control">
                    </div>
                    <div class=" form-group">
                        <label for="city">Város</label>
                        <input type="text" name="city" id="city" class="form-control">
                    </div>
                    <div class=" form-group">
                        <label for="address">Cím</label>
                        <input type="text" name="address" id="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Mentés" />
                    </div class="form-group">
                </form>
            </div>
        </div>
    </div>
    <?php include_once 'component/footer.php' ?>
</body>

</html>