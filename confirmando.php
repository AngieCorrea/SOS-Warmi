<?php

include './modelo/conexion.php';
include './entidades/Usuario.php';
include './modelo/MUsuario.php';
$mu=new MUsuario();
$Usuario=new Usuario();
$Usuario=$mu->buscar($_REQUEST['telefono']);
session_start();
if ($Usuario=="ninguno") {
    $_SESSION["NoEncontrado"]="No se encontro este usuario, te recomendamos registrarte";
    header('Location: index.php');
}else{
    
    $_SESSION["usuario"]=$Usuario;
    header('Location: vista/personal.php');
}
