<?php

class Database {
    public function connect(){
        try {
            $con = new PDO('mysql:host=localhost;port=3306;dbname=store;',$username = 'root', $password = 'root');
        $con->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        return $con;
        } catch (PDOException $th) {
            echo 'Connection Error '.$th->getMessage();
        }
    }
}
