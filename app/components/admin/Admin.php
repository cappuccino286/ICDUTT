<?php

class Admin {

    private $_db;

    public function __construct(PDO $_db) {
        $this->_db = $_db;
    }

    public function select() {
        $search = $_POST["username"];
        $q=$this->_db->prepare("SELECT username, password FROM login WHERE username LIKE '%search%'");
        $q->execute(array(':nom'=>$nom));
    }
}
