<?php
    include '../modelo/conexion.php';
    include '../entidades/Usuario.php';
    include '../modelo/MUsuario.php';
    $mu=new MUsuario();
    $mu->eliminarAmigos($_REQUEST["idcuenta"], $_REQUEST["idafiliado"]);
    $mu->eliminarAmigos($_REQUEST["idafiliado"],$_REQUEST["idcuenta"]);