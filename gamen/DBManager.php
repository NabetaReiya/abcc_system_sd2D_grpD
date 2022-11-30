<?php
class DBManager{
    private function dbConnect(){
        $pdo = new PDO('mysql:host=localhost;dbname=webdb;charset=utf8','webuser','abccsd2');
        return $pdo;
    }

    public function insertUser(){
        $pdo=$this->dbConnect();
        $sql="INSERT INTO user()VALUES();"
    }
}
?>