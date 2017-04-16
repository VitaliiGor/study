<?php
// App\Models\User => ./App/Models/User.class.php
function __autoload($class){
    require __DIR__ . '/' . str_replace('\\', '/', $class ) . '.class.php';
}

?>