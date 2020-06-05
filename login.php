<?php
require_once 'protected/config.php';
require_once PROTECTED_DIR . '/users.php';
require_once PROTECTED_DIR . '/cart.php';
require_once PROTECTED_DIR . '/errors.php';
session_start();

if (user_logged_in()) {
    header('Location:' . INDEX_PAGE);
}

if (!empty($_POST)) {
    if (
        array_key_exists('email', $_POST) &&
        $_POST['email'] != null &&
        array_key_exists('password', $_POST) &&
        $_POST['password'] != null
    ) {
        $success = user_login($_POST['email'], $_POST['password']);
        if (!$success) {
            add_error('Sikertelen bejelentkezés!');
        }
        $location = $success ? INDEX_PAGE : LOGIN_PAGE;
        header('Location: ' . $location);
    } else {
        add_error('Adjon meg egy email címet és jelszót!');
        header('Location: ' . LOGIN_PAGE);
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
                <h1>Bejelentkezés</h1>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="password">Jelszó</label>
                        <input id="password" name="password" type="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Bejelentkezés" name="submit" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once 'component/footer.php' ?>
</body>

</html>