<?php
$var_getMenu = isset($_GET['menu']) ? $_GET['menu'] : 'inicio';
echo "<br>";
switch ($var_getMenu) {
case "inicio":
require_once ('./views/bienvenida.php');
break;
case "acercade":
require_once('./views/login.php');
break;
case "contacto":
require_once('./views/contacto.php');
break;
case "preguntas":
require_once('./views/preguntas.php');
break;
default:
require_once('./views/bienvenida.php');
}
?>