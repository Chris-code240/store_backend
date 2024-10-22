<?php

class Database {
    public function connect(){
        try {
            $con = new PDO('mysql:host=mysql-chris240.alwaysdata.net;dbname=chris240_store;', 'chris240', ')N*6GA=NLc3dH&=');
        $con->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        return $con;
        } catch (PDOException $th) {
            echo 'Connection Error '.$th->getMessage();
        }
    }
}
