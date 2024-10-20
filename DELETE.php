<?php

include_once './Database.php';



function delete($selected_products = []){

    try {
        $db = new Database();

        $query1 = 'DELETE FROM dvd WHERE dvd.SKU=?;';
        $query2 = 'DELETE FROM book WHERE book.SKU=?;';
        $query3 = 'DELETE FROM furniture WHERE furniture.SKU=?;';
    
        foreach ($selected_products as $key) {
            # code...
            $stmt = $db->connect()->prepare($query1);
            $stmt->execute([$key]);
            $stmt2 = $db->connect()->prepare($query2);
            $stmt2->execute([$key]);
            $stmt3 = $db->connect()->prepare($query3);
            $stmt3->execute([$key]);
        }
    } catch (PDOException $th) {
        return json_encode(['success'=>false, 'message'=>$th->getMessage()]);
    }

    return json_encode(['success'=>true]);
}