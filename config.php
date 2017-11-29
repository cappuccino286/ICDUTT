<?php

class config {

    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DATA = 'test';
    public $_db;
    public function __construct() {
        try {
            $this->_db = new PDO('mysql:host='.config::HOST.';dbname='.config::DATA, config::USER, config::PASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
function change($string){
    $newstring = str_replace("'", "\'", $string);
    $newstring = str_replace('"', '\"', $newstring);
    return $newstring;
}
?>
