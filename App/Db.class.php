<?php


namespace App;


class Db{
    const DB_NAME = 'D:/USR/www/myTest.db';
    static private $_instance = null;
    private $_db;

    private function __construct(){
        if(file_exists(self::DB_NAME))
            $this->_db = new \PDO('sqlite:'.self::DB_NAME);
        else{
            $this->_db = new \PDO('sqlite:'.self::DB_NAME);
            $sql = "CREATE TABLE users(
                              id INTEGER PRIMARY KEY AUTOINCREMENT,
                              name TEXT,
                              age INTEGER,
                              email TEXT,
                              datetime INTEGER
                          )";
            $this->_db->exec($sql);
        }

    }
    private function __clone(){}

    public static function getInstance(){
        if(!self::$_instance)
            self::$_instance = new \App\Db();
        return self::$_instance;
    }

    public function getDb(){
        return $this->_db;
    }

    public function execute($sql){
        $sth = $this->_db->prepare($sql);
        $res = $sth->execute();
        return $res;
    }

    public function query($sql){
        $sth = $this->_db->prepare($sql);
        $res = $sth->execute();
        if(false !== $res) {
            return $sth->fetchAll();
        }
        return [];
    }


}


?>