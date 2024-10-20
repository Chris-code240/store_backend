<?php
include_once './Database.php';
function getBySKU($sku, $type){
    $db = new Database();
    $query = 'SELECT * FROM '.$type.' WHERE SKU = ? ORDER BY ID ASC;';

    $stmt = $db->connect()->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute([$sku]);
    $rows = $stmt->fetch();
    return json_encode($rows);
}

function getAll(){
    $db = new Database();    
    $query1 = 'SELECT * FROM dvd ORDER BY ID ASC;';
    $query2 = 'SELECT * FROM book ORDER BY ID ASC;';
    $query3 = 'SELECT * FROM furniture ORDER BY ID ASC;';

    $stmt1 = $db->connect()->prepare($query1);
    $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    $stmt1->execute();

    $stmt2 = $db->connect()->prepare($query2);
    $stmt2->setFetchMode(PDO::FETCH_ASSOC);
    $stmt2->execute();

    $stmt3 = $db->connect()->prepare($query3);
    $stmt3->setFetchMode(PDO::FETCH_ASSOC);
    $stmt3->execute();

    $rows1 = $stmt1->fetchAll();
    $rows2 = $stmt2->fetchAll();
    $rows3 = $stmt3->fetchAll();
    return json_encode(array_merge($rows1, $rows2, $rows3));    
}

