<?php
require_once 'config.php';
require_once 'database.php';

function product_get_all() {
    $sql = "SELECT * FROM product";
    return select($sql);
}

function product_get_by_id($id) {
    $sql = "SELECT * FROM product WHERE id = :id";
    return select($sql, ['id' => $id])[0];
}

function product_delete($id) {
    $sql = "DELETE FROM product WHERE id = :id";
    $success = delete_from($sql, ['id' => $id]);
    if (!$success) {
        add_error('A termék törlése sikertelen!');
    }
    return $success;
}

function product_update($id, $name, $stock, $price) {
    $sql = "UPDATE product SET name = :name, stock = :stock, price = :price WHERE id = :id";
    $success = update_record($sql, [
        'id' => $id,
        'name' => $name,
        'stock' => $stock,
        'price' => $price
    ]);
    return $success;
}

function product_create($name, $stock, $price) {
    $sql = "INSERT INTO product (name, stock, price) VALUES(:name, :stock, :price)";
    $success = insert($sql, [
        'name' => $name,
        'stock' => $stock,
        'price' => $price
    ]);
    return $success;
}

function product_export_all() {
    $filename = 'export/products_' . time() . '.csv';
    $file = fopen($filename, 'w');

    foreach (product_get_all() as $product) {
        fputcsv($file, $product, ';');
    }
    fclose($file);
    header('Location: ' . $filename);
    echo "<script>window.close();</script>";
}

function product_import() {
    $filename = 'import_' . time() . '.csv';
    $srcPath = $_FILES['file']['tmp_name'];
    $dstPath = 'import\\' . $filename;

    if (move_uploaded_file($srcPath, $dstPath)) {
        $file = fopen($dstPath, 'r');
        $firstline = fgets($file);
        $fields = explode(';', $firstline);
        while ($line = fgets($file)) {
            $fields = explode(';', $line);
            $name = $fields[0];
            $stock = $fields[1];
            $price = $fields[2];
            if (!product_create($name, $stock, $price)) {
                add_error("Termék hozzáadása sikertelen: " . $name);
            }
        }
        fclose($file);
        return true;
    }
    else {
        add_error('Sikertelen felöltés!');
        return false;
    }

}