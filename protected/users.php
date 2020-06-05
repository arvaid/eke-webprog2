<?php
require_once 'database.php';
require_once 'errors.php';

function user_logged_in()
{
    return array_key_exists('user', $_SESSION);
}

function user_login($email, $password)
{
    $sql = 'SELECT * FROM user WHERE email = :email';
    $result = select($sql, ['email' => $email]);
    if (count($result) == 0) {
        return false;
    }
    if (password_verify($password, $result[0]['password'])) {
        $_SESSION['user'] = $result[0];
        return true;
    }
    return false;
}

function user_get_by_id($id) {
    $sql = 'SELECT * FROM user WHERE id = :id';
    $result = select($sql, ['id' => $id]);
    if (count($result) == 0) {
        add_error('Nem létezik ilyen felhasználó!');
        return [];
    }
    return $result[0];
}

function user_logout()
{
    unset($_SESSION['user']);
}

function user_sign_up($email, $password, $first_name, $last_name, $zipcode, $city, $address)
{
    $sql = 'SELECT email FROM user WHERE email = :email';
    $result = select($sql, ['email' => $email]);
    if (count($result) > 0) {
        return false;
    }

    $sql = 'INSERT INTO user (email, password, first_name, last_name, zipcode, city, address) ' .
        'VALUES (:email, :password, :first_name, :last_name, :zipcode, :city, :address)';
    $success = insert($sql, [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'first_name' => $first_name,
        'last_name' => $last_name,
        'zipcode' => $zipcode,
        'city' => $city,
        'address' => $address
    ]);
    return $success;
}

function user_update($id, $email, $first_name, $last_name, $zipcode, $city, $address)
{
    $sql = 'UPDATE user SET email = :email, first_name = :first_name, last_name = :last_name, zipcode = :zipcode, city = :city, address = :address WHERE id = :id';
    $success = update_record($sql, [
        'id' => $id,
        'email' => $email,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'zipcode' => $zipcode,
        'city' => $city,
        'address' => $address
    ]);
    return $success;
}

function admin_logged_in()
{
    return array_key_exists('admin', $_SESSION);
}

function admin_login($username, $password)
{
    $sql = 'SELECT * FROM admin WHERE username = :username';
    $result = select($sql, ['username' => $username]);

    if (count($result) == 0) {
        add_error('Helytelen email cím!');
        return false;
    }
    if (password_verify($password, $result[0]['password'])) {
        $_SESSION['admin'] = $result[0];
        return true;
    }
    add_error('Helytelen jelszó!');
    return false;
}

function admin_logout()
{
    unset($_SESSION['admin']);
}
