<?php
    class cado
    {

        private $conexion;

        public function conectar()
        {
            if(!isset($this->conexion))
            {
                $this->conexion = (mysqli_connect("localhost","root","root","dbhackaton")) or die(mysqli_error());
            }
        }

        public function ejecutar($sql)
        {
            $resultado=mysqli_query($this->conexion,$sql) or die(mysql_error());
        }
        
        public function recuperar($sql)
        {
            $resultado= mysqli_query($this->conexion,$sql) or die(mysql_error());
            return $resultado;
        }

        public function desconectar()
        {
            mysqli_close($this->conexion);
        }

}

