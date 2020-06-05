<?php
require_once 'protected/config.php';
require_once PROTECTED_DIR . '/database.php';
require_once PROTECTED_DIR . '/users.php';
require_once PROTECTED_DIR . '/products.php';
require_once PROTECTED_DIR . '/cart.php';
session_start();

if (array_key_exists('login', $_GET)) {
    if (!empty($_POST) && !admin_logged_in()) {
        if (
            !array_key_exists('username', $_POST) ||
            $_POST['username'] == null ||
            !array_key_exists('password', $_POST) ||
            $_POST['password'] == null
        ) {
            add_error('Adjon meg egy email címet és jelszót!');
        } else {
            admin_login($_POST['username'], $_POST['password']);
            header('Location: ' . ADMIN_PAGE);
        }
    }
}

if (array_key_exists('logout', $_GET)) {
    if (admin_logged_in()) {
        admin_logout();
    }
    header('Location: ' . INDEX_PAGE);
}

if (
    array_key_exists('import', $_GET) &&
    array_key_exists('submit', $_POST) &&
    $_POST['submit'] == 1
) {
    if (count($_FILES) == 0) {
        add_error('Nem adott meg fájlt!');
    } else {
        product_import();
    }
    header('Location: ' . ADMIN_PAGE);
}

if (array_key_exists('export', $_GET)) {
    product_export_all();
}

if (array_key_exists('new', $_GET)) {
    if (!empty($_POST)) {
        if (
            !array_key_exists('name', $_POST) ||
            !array_key_exists('price', $_POST) ||
            !array_key_exists('stock', $_POST)
        ) {
            add_error("Hiányzó paraméterek!");
        } else {
            product_create($_POST['name'], $_POST['stock'], $_POST['price']);
            header('Location: ' . ADMIN_PAGE);
        }
    }
}

if (array_key_exists('edit', $_GET)) {
    if (!array_key_exists('id', $_GET)) {
        add_error('Hiányzó azonosító!');
        return;
    }

    if (!empty($_POST)) {
        if (
            !array_key_exists('name', $_POST)  ||
            !array_key_exists('price', $_POST) ||
            !array_key_exists('stock', $_POST)
        ) {
            add_error('Hiányzó paraméterek!');
        } else {
            product_update($_GET['id'], $_POST['name'], $_POST['stock'], $_POST['price']);
            header('Location: ' . ADMIN_PAGE);
        }
    }
}

if (array_key_exists('delete', $_GET)) {
    if (!array_key_exists('id', $_GET)) {
        add_error('Hibás kérés!');
        return;
    }
    product_delete($_GET['id']);
    header('Location: ' . ADMIN_PAGE);
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
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
    <div>
        <h2><a href="<?= ADMIN_PAGE ?>?logout">&lt; Vissza a főoldalra</a></h2>
    </div>
    <div class="container">
        <?php include_once 'component/errors.php'; ?>
        <div class="row">
            <div class="col">
                <?php
                if (admin_logged_in()) {
                    if (array_key_exists('new', $_GET)) {
                        include_once 'component/product_new_form.php';
                    } elseif (array_key_exists('edit', $_GET) && array_key_exists('id', $_GET)) {
                        $record = product_get_by_id($_GET['id']);
                        include_once 'component/product_edit_form.php';
                    } else {
                        include_once 'component/admin_view.php';
                    }
                } else {
                    include_once 'component/admin_login_form.php';
                }
                ?>
            </div>
        </div>
    </div>
    <?php include_once 'component/footer.php'; ?>
</body>

</html>