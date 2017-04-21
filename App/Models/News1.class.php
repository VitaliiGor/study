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

    public $msg;
    public $author_id;
    public $author;
    public $datetime;


    function __construct(){

    }

    public function setNews($msg, User $user){
        $db = \App\Db::instance();
        $dbh = $db->getDb();
        return $dbh->query("INSERT INTO " . self::TABLE . " (msg, author, author_id) 
                            VALUES ('$msg', '" . $user->name . "', " . $user->id . ")");
    }

    public static function findById($id){
        $db = \App\Db::instance();
        $res = $db->query('SELECT * FROM ' . self::TABLE . ' WHERE id = ' . $id, self::class);
        $res = $res[0];
        if(isset($res->author_id)){
            $res->author = \App\Models\User::findById($res->author_id);
        }
        return $res;
    }

    public static function findAll(){
        $db = \App\Db::instance();
        $res = $db->query('SELECT * FROM ' . self::TABLE, self::class);
        foreach($res as $result) {
            foreach ($result as $k => $v) {
                $id = null;
                if ($k == 'author_id') {
                    if (isset($v)) {
                        $id = $v;
                    }
                    $result->author = \App\Models\User::findById($id);
                }
            }
        }
        return $res;
    }

}