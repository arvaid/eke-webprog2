<?php

// konstansokként defináljuk a kapcsolódás paramétereit
define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_PORT','3306');
define('DB_NAME','ixwyow');
define('DB_USER','beadando');
define('DB_PASS','7slF9MZtyt8Vabue');

// függvényt, amely visszaad egy nyitott db kapcsolatot, amely kódolása UTF-8
// PDO-t használunk!
function getConnection(){
    $dsn = DB_TYPE.':host='.DB_HOST.':'.DB_PORT.';dbname='.DB_NAME;
    $connection = new PDO($dsn,DB_USER, DB_PASS);
    $connection->exec("SET NAMES 'utf8'");
    return $connection;
}

// rekord beszúrása a táblába dinamikus paraméterekkel
// p1: a végrehajtani kívánt insert utasítás
// p2: az insert paraméterei
function insert($query, $params){
    $connection = getConnection();
    $stmt = $connection->prepare($query);
    $success = $stmt->execute($params);
    $stmt->closeCursor();
    $connection = null;
    return $success;
}

// rekordlista lekérdezése dinamikus paraméterekkel
// p1: a végrehajtani kívánt select utasítás
// p2: a select lehetséges paraméterei (nem kötelező)
function select($query, $params = []){
    $connection = getConnection();
    $stmt = $connection->prepare($query);
    $success = $stmt->execute($params);

    $records = $success ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
    $stmt->closeCursor();
    $connection = null;

    return $records;
}

function delete_from($query, $params){
    return insert($query, $params);
}

function update_record($query, $params) {
    return insert($query, $params);
}