<?php
require_once "User.class.php";

/* spl_autoload_register(function($class) { */
/*     require $class . ".class.php"; */
/* }); */

/* use ITCollege\Lib; */

$tom = new ITCollege\Lib\User("Tom");

$tom->sayHi();
?>
