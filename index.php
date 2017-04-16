<?php

require __DIR__ . '/autoload.php';

//$db = new \App\Db();
$db = \App\Db::getInstance();
//$dbh = $db->getDb();

//$res = $db->execute("INSERT INTO users (name,age,email) VALUES ('John',25,'john@mail.ru')")
//$res = $db->execute("INSERT INTO users (name,age,email) VALUES ('Kolya',29,'pyp@mail.ru')");
$res = $db->query("SELECT * FROM users");
var_dump($res);




?>