<?php
include '../modelo/conexion.php';
include '../entidades/Animo.php';
include '../entidades/Usuario.php';
include '../modelo/MUsuario.php';
include '../modelo/MAnimo.php';
$ma=new MAnimo();
$animo=new Animo();
$animo=$ma->buscar($_REQUEST["id"]);
if ($animo->getTipo()==0) {
    echo '<img src="../img/tensiometro 1.png" alt="">';
}elseif ($animo->getTipo()==1) {
    echo '<img src="../img/tensi 1.png" alt="">';
}elseif ($animo->getTipo()==2) {
    echo '<img src="../img/tensi 3.png" alt="">';
}elseif ($animo->getTipo()==3) {
    echo '<img src="../img/tensi 4.png" alt="">';
}elseif ($animo->getTipo()==4) {
    echo '<img src="../img/tensi 6.png" alt="">';
}elseif ($animo->getTipo()==5) {
    echo '<img src="../img/tensi 5.png" alt="">';
}elseif ($animo->getTipo()==6) {
    echo '<img src="../img/tensi 6.png" alt="">';
}



