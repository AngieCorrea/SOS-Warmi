<?php
include '../entidades/Animo.php';
include '../modelo/conexion.php';
include '../modelo/MAnimo.php';
$ma=new MAnimo();

echo $ma->insertarAnimo($_REQUEST["idpersona"], $_REQUEST["valor"]);