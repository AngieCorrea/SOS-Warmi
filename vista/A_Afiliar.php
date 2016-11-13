<?php
include '../entidades/Usuario.php';
include '../modelo/conexion.php';
include '../modelo/MUsuario.php';
$mu=new MUsuario();
$mu->agregarAmigos($_REQUEST["idcuenta"], $_REQUEST["idafiliado"]);
$mu->agregarAmigos($_REQUEST["idafiliado"],$_REQUEST["idcuenta"] );