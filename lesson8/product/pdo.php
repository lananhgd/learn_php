<?php
$DB_TYPE = 'mysql';
$DB_HOST = 'localhost';
$DB_NAME = 'crud';
$USER = 'root';
$PW = '';

try {
    $connection = new PDO("$DB_TYPE:host=$DB_HOST;dbname=$DB_NAME", $USER, $PW);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}

function prepareSQL($sql) {
    global $connection;
    return $connection->prepare($sql);
}

function all() {
    $sql = "SELECT * FROM products";
    $stmt = prepareSQL($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function create($data) {
    $sql = "INSERT INTO products (name, price, category_id) VALUES (:name, :price, :category_id)";
    $stmt = prepareSQL($sql);
    $stmt->execute($data);
}

function delete($data) {
    $sql = "DELETE FROM products where id = :id";
    $stmt = prepareSQL($sql);
    $stmt->execute($data);
}

function update($name, $price, $category_id, $id) {
    $sql = "UPDATE products SET name = :name, price = :price, category_id = :category_id WHERE id = :id";
    $stmt = prepareSQL($sql);
    $stmt->execute([
        'name' => $name,
        'price' => $price,
        'category_id' => $category_id,
        'id' => $id
    ]);
}

function select($data) {
    $sql = "SELECT * FROM products WHERE id = $data";
    $stmt = prepareSQL($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
