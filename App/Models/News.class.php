<?php
/**
 * Created by PhpStorm.
 * User: V
 * Date: 17.04.2017
 * Time: 13:13
 */

namespace App\Models;

use App\Model;
class News extends Model
{
    const TABLE = 'news';

    public $news;
    public $author;

    function __construct()
    {

    }

    public function setNews($msg, User $user){
        $db = \App\Db::instance();
        $dbh = $db->getDb();
        return $dbh->query("INSERT INTO " . self::TABLE . " (msg, author, author_id) 
                            VALUES ('$msg', '" . $user->name . "', " . $user->id . ")");
    }

}