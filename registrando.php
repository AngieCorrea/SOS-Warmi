<?php
try{
    
    include './entidades/Usuario.php';
    include './modelo/conexion.php';
    include './modelo/MUsuario.php';
    include './modelo/MAnimo.php';
    $mu=new MUsuario();
    $Usuario=new Usuario();
    $Usuario->setNombres($_REQUEST['txtnombres']);
    $Usuario->setApellidos($_REQUEST['txtapellidos']);
    $Usuario->setTelefono($_REQUEST['txttelefono']);
    $Usuario->setSexo($_REQUEST['cbsexo']);
    $telefono=$Usuario->getTelefono();
    
    $mu->insertar($Usuario);
    $Usuario= $mu->buscar($telefono);
    $ma=new MAnimo();
    $ma->insertarAnimo($Usuario->getId(), 0);
    session_start();
    $_SESSION["usuario"]=$Usuario;
    header('Location: vista/personal.php');
}  catch (Exception $e){
    header('Location: nuevo.php');
}