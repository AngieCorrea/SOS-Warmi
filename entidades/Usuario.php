<?php

class Usuario{
    private $id;
    private $nombres;
    private $apellidos;
    private $sexo;
    private $telefono;
    
    
    function getId() {
        return $this->id;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
}

