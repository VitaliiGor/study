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
$user = \App\Models\User::findById(3);
/*$news1 = new \App\Models\News();
$msg = $news1->news = "Hi all people! I love freedom!! I dont like meat and shnaps!I like Spb and Sochi and Gadiykino!!";
$res = $news1->setNews($msg, $user1);*/
/*$user = new \App\Models\User();
$user->name = 'Jora';
$user->email = 'J@mail.do';
$user->age = 31;
$user->datetime = time();
$a = $user->insert(); */

/*$news = new \App\Models\News();
$news->msg = 'I learn PHP too very much!!!!';
$news->author_id = $user->id; //
$news->author = $user->name;
$news->datetime = time();
$n = $news->insert();*/

$news = \App\Models\News::findAll();
//var_dump($news[0]->msg);

    if($_GET['id'])
    include 'article.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <style>
        article{
            width: 500px;
            margin: 0 0 20px 0;
            padding: 10px;
            border: 1px dotted red;
            font-size: 1.5em;
        }
        p{
            margin: 0;
            position: absolute;
            float: left;
        }
        span{
            position: relative;
            margin-left: 300px;
        }
        a{
            margin-left: 50px;
        }
    </style>
</head>
<body>
<h1>All news:</h1>
<?php
foreach($news as $n){
    $dt = date('d-m-Y H:i', ($n->datetime));
    echo <<<EOF
<p>Author: <b>{$n->author}</b>, $dt</p>
<span>
<a href="article.php?id={$n->id}">Read more</a>
<a href="test.php?del={$n->id}">Delete</a>
</span>
<article>
{$n->msg}
</article>

EOF;
}

?>

</body>
</html>
