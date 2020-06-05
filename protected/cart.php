<?php
require_once 'database.php';
require_once 'errors.php';

function create_cart()
{
    if (!cart_exists()) {
        $_SESSION['cart'] = [];
    }
}

function cart_exists()
{
    return array_key_exists('cart', $_SESSION);
}

function cart_empty()
{
    create_cart();
    return empty($_SESSION['cart']);
}

function cart_contains_product($id)
{
    create_cart();
    return array_key_exists($id, $_SESSION['cart']);
}

function get_cart()
{
    create_cart();
    return $_SESSION['cart'];
}

function cart_add($id)
{
    create_cart();
    if (!cart_contains_product($id)) {
        $sql = "SELECT * FROM product WHERE id=:id";
        $result = select($sql, ['id' => $id]);
        if (count($result) == 0) {
            add_error("A megadott termék nem létezik!");
            return false;
        }
        $row = $result[0];
        $_SESSION['cart'][$id] = [
            'id' => $id,
            'amount' => 1,
            'name' => $row['name'],
            'price' => $row['price']
        ];
        return true;
    }
}

function cart_increase_amount($id)
{
    create_cart();
    $product = product_get_by_id($id);
    if (count($product) == 0) {
        add_error('Nem létezik ilyen termék!');
        return false;
    }

    if (!cart_contains_product($id)) {
        add_error('A kosár nem tartalmazza a megadott terméket!');
        return false;
    } elseif ($_SESSION['cart'][$id]['amount'] < $product['stock']) {
        $_SESSION['cart'][$id]['amount']++;
    }
    return true;
}

function cart_decrease_amount($id)
{
    create_cart();
    if (cart_contains_product($id)) {
        if ($_SESSION['cart'][$id]['amount'] > 1) {
            $_SESSION['cart'][$id]['amount']--;
        }
    }
}

function cart_remove($id)
{
    create_cart();
    if (cart_contains_product($id)) {
        unset($_SESSION['cart'][$id]);
    }
}

function cart_total()
{
    create_cart();
    $sum = 0;
    foreach ($_SESSION['cart'] as $product) {
        $sum += $product['amount'] * $product['price'];
    }
    return $sum;
}

function cart_count()
{
    create_cart();
    $count = 0;
    foreach ($_SESSION['cart'] as $product) {
        $count += $product['amount'];
    }
    return $count;
}

function cart_clear()
{
    $_SESSION['cart'] = [];
}
