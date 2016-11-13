<?php
class MAnimo{
    function buscar($id){
        $cado=new cado();
        try {
            $cado->conectar();
            $quer=$cado->recuperar("SELECT * FROM animo WHERE idanimo=(SELECT MAX(idanimo) AS ids FROM animo WHERE idpersona =".$id." )");
            $cado->desconectar();
            if (mysqli_num_rows($quer)==1) {
                $fila=  mysqli_fetch_array($quer);
                $animo=new Animo();
                $animo->setIdanimo($fila["idanimo"]);
                $animo->setIdpersona($fila["idpersona"]);
                $animo->setFecha($fila["fecha"]);
                $animo->setHora($fila["hora"]);
                $animo->setTipo($fila["tipo"]);
            }else{
                $animo="ninguno";
            }
            return $animo;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
    public function insertarAnimo($id,$tipo){
            $cado=new cado();
            try{
                $cado->conectar();
                $cado->ejecutar("insert into animo(idpersona,fecha,hora,tipo)"
                        . " values(".$id.",CURDATE(),CURTIME(),".$tipo.")");
                $cado->desconectar();
                return true;
            }  catch (Exception $e){
                return false;
            }
    }
}
