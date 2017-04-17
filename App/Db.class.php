<?php


namespace App;


class Db{
    use Singleton;

    const DB_NAME = 'D:/USR/www/myTest.db';
    private $_db;

    protected function __construct(){
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


    public function getDb(){
        return $this->_db;
    }

    public function execute($sql, $params = []){
        $sth = $this->_db->prepare($sql);
        return $sth->execute($params);
    }

    public function query($sql, $class){
        $sth = $this->_db->prepare($sql);
        $res = $sth->execute();
        if(false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }


}


?>