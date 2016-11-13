<?php

class MUsuario extends cado{
    
    function buscarAmigo($id){
        $cado=new cado();
        try {
            $cado->conectar();
            $quer=$cado->recuperar("SELECT * FROM PERSONA p LEFT JOIN (SELECT idcuenta, idafiliado FROM amigo WHERE idcuenta=".$id.")".
                    " as x ON x.idafiliado=p.idpersona WHERE (idpersona!=idafiliado OR idcuenta is null) and idpersona !=".$id);
            $cado->desconectar();
            return $quer;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
            
    function buscar($telefono){
        $cado=new cado();
        try {
            $cado->conectar();
            $quer=$cado->recuperar("SELECT * FROM persona WHERE telefono =  '".$telefono."'");
            $cado->desconectar();
            if (mysqli_num_rows($quer)==1) {
                $fila=  mysqli_fetch_array($quer);
                $usuario=new Usuario();
                $usuario->setId($fila["idpersona"]);
                $usuario->setNombres($fila["nombres"]);
                $usuario->setApellidos($fila["apellidos"]);
                $usuario->setTelefono($fila["telefono"]);
                $usuario->setSexo($fila["sexo"]);        
            }else{
                $usuario="ninguno";
            }
            return $usuario;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
    public function insertar(Usuario $usuario){
            $cado=new cado();
            try{
                $cado->conectar();
                $cado->ejecutar("insert into persona(nombres,apellidos,telefono,sexo)"
                        . " values(UPPER('".$usuario->getNombres()."'),UPPER('".$usuario->getApellidos()."'),"
                        . "UPPER('".$usuario->getTelefono()."'),UPPER('".$usuario->getSexo()."'))");
                $cado->desconectar();
                return true;
            }  catch (Exception $e){
                return false;
            }
    }
    
    public function eliminarAmigos($idcuenta,$idafiliado){
        $cado=new cado();
        try {
            $cado->conectar();
            $quer=$cado->ejecutar("delete FROM amigo WHERE idcuenta =".(int)$idcuenta." and idafiliado=".(int)$idafiliado);
            $cado->desconectar();
            return $quer;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
    public function agregarAmigos($idcuenta,$idafiliado){
        $cado=new cado();
        try {
            $cado->conectar();
            $quer=$cado->ejecutar("insert into amigo(idcuenta,idafiliado)"
                        . " values(".$idcuenta.",".$idafiliado.")");
            $cado->desconectar();
            return $quer;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

    public function amigos($id){
        $cado=new cado();
        try {
            $cado->conectar();
            $quer=$cado->recuperar("SELECT * FROM amigo INNER JOIN persona ON amigo.idafiliado = persona.idpersona WHERE idcuenta =".(int)$id);
            $cado->desconectar();
            return $quer;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
}
