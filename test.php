<?php

$parameter = $_SERVER['QUERY_STRING'];
$parameterArray = explode("=", $parameter);
echo "Usuario: ". $parameterArray[1];
?>
