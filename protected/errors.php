<?php

function errors_exist() {
    return array_key_exists('errors', $_SESSION) &&
           $_SESSION['errors'] != null &&
           count($_SESSION['errors']) > 0;
}

function get_errors() {
    if (!array_key_exists('errors', $_SESSION)) {
        $_SESSION['errors'] = [];
    }
    return $_SESSION['errors'];
}

function add_error($error) {
    if (!array_key_exists('errors', $_SESSION) || $_SESSION['errors'] == null) {
        $_SESSION['errors'] = [];
    }
    array_push($_SESSION['errors'], $error);
}

function clear_errors() {
    $_SESSION['errors'] = [];
}
