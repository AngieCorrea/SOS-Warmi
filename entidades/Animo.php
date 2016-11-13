<?php
class Animo{
    private $idanimo;
    private $idpersona;
    private $fecha;
    private $hora;
    private $tipo;
    
    function getIdanimo() {
        return $this->idanimo;
    }

    function getIdpersona() {
        return $this->idpersona;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setIdanimo($idanimo) {
        $this->idanimo = $idanimo;
    }

    function setIdpersona($idpersona) {
        $this->idpersona = $idpersona;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
}