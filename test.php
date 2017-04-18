<?php
/**
 * Created by PhpStorm.
 * User: V
 * Date: 18.04.2017
 * Time: 21:09
 */
require __DIR__ . '/autoload.php';

/*$user = new \App\Models\User();
//$user->id =7 ;
$user->name = 'Vanya';
$user->email = 'vano@mail.bl';
$user->age = 30;
$user->datetime = time();
$a = $user->save();
echo $user->id;
*/
$con = \App\Config::instance();
$con->setConfig('db2', 'mySql');
var_dump($con->getConfig('db2'));



?>