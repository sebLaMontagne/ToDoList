<?php

class Manager{
    protected $_db;

    private function connectDb()
    {
        $this->_db = new PDO('mysql:host=localhost;dbname=todolist','root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function __construct()
    {
        $this->connectDb();
    }
}