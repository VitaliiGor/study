<?php
/**
 * Created by PhpStorm.
 * User: V
 * Date: 17.04.2017
 * Time: 13:13
 */

namespace App\Models;

use App\Model;
/** LAZY LOAD
 *
 * &property \App\Models\News $author
 */
class News extends Model
{
    const TABLE = 'news';


    public $msg;
    public $author_id;
    public $datetime;

    public function __get($name)
    {
        switch($name){
            case 'author': return User::findById($this->author_id);
            break;
            default: return null;

        }
    }

    public function __set($name, $value){
        switch($name){
            case 'author': $this->$name = $value;
                break;
            default: ;

        }
    }

    public function __isset($name)
    {  switch($name){
        case 'author': return true; //: return !empty($this->author_id);
            break;
        default: return false;
        }
    }

}