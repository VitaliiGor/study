<?php
/**
 * Created by PhpStorm.
 * User: V
 * Date: 18.04.2017
 * Time: 21:09
 */
require __DIR__ . '/autoload.php';

//$user = new \App\Models\User();
//$user->id = 14 ;
/*$user->name = 'Vanya';
$user->email = 'vano@mail.bl';
$user->age = 30;
$user->datetime = time();*/
//$a = $user->delete();

/*$con = \App\Config::instance();
$con->setConfig('db2', 'mySql');
var_dump($con->getConfig('db2'));*/

if($_GET['del']){
    $id = abs((int)$_GET['del']);
    $ndel = \App\Models\News::findById($id);
    $ndel->delete();
    header('location: index.php');
}


?>