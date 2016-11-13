<?php
class MReporte{
    public function enviarReporte($id){
        $cado=new cado();
        try{
            $cado->conectar();
            $cado->ejecutar("insert into reporte(idpersona,fecha,hora)"
                    . " values(".$id.",CURDATE(),CURTIME())");
            $cado->desconectar();
            return true;
        }  catch (Exception $e){
            return $e;
        }
    }
}

