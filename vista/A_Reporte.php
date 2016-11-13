<?php
include '../modelo/conexion.php';
include '../entidades/Usuario.php';
include '../modelo/MUsuario.php';
include '../modelo/Reporte.php';
include("../PHPMailer-master/class.smtp.php"); 
include("../PHPMailer-master/PHPMailerAutoload.php"); 

$MR=new MReporte();
$MR->enviarReporte($_REQUEST['idpersona']);

