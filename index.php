<?php

require __DIR__ . '/autoload.php';

//$db = new \App\Db();
$db = \App\Db::instance();
$dbh = $db->getDb();

//$res = $db->execute("INSERT INTO users (name,age,email) VALUES ('John',25,'john@mail.ru')")
//$res = $db->query("SELECT * FROM users WHERE age>20");
//$res = \App\Models\User::findAll();
//var_dump($res);
//$res = $db->execute("INSERT INTO users (name,age,email) VALUES ('John',25,'john@mail.ru')")
/*$sql = "CREATE TABLE news(
                              id INTEGER PRIMARY KEY AUTOINCREMENT,
                              msg TEXT,
                              author_id INTEGER,
                              datetime INTEGER
                          )";  */
//$res = $dbh->query($sql);
/*$user1 = \App\Models\User::findById(2);
$news1 = new \App\Models\News();
$msg = $news1->news = "Hi all people! I love freedom!! I dont like meat and shnaps!I like Spb and Sochi and Gadiykino!!";
$res = $news1->setNews($msg, $user1);*/
$user = new \App\Models\User();
$user->name = 'Jora';
$user->email = 'J@mail.do';
$a = $user->insert();

?>