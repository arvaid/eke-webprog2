<?php
require_once 'protected/config.php';
require_once PROTECTED_DIR . 'users.php';
session_start();

if (array_key_exists('user', $_SESSION)) {
    user_logout();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
