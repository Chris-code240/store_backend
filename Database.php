<?php

class Database {
    public function connect(){
        try {
            $con = new PDO('mysql:host=sql3.freesqldatabase.com;port=3306;dbname=sql3739839;', 'sql3739839', '9QlI3fmUBN');
        $con->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        return $con;
        } catch (PDOException $th) {
            echo 'Connection Error '.$th->getMessage();
        }
    }
}
