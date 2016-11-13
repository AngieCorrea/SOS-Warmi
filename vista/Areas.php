<?php
    include '../modelo/conexion.php';    
    include '../entidades/Animo.php';
    include '../entidades/Usuario.php';
    include '../modelo/MUsuario.php';
    include '../modelo/MAnimo.php';
    
    if($_REQUEST["area"]=="amigos"){
        
        $mu=new MUsuario();
        $quer=$mu->amigos($_REQUEST["id"]);
        echo '<table id="tab-estado">';
        for ($i=0;$i<mysqli_num_rows($quer);$i++){
            $fila=  mysqli_fetch_array($quer);
            echo '<tr>';
            echo '<td class="td-imgEstado"><img src="../img/cara 0.png" alt=""></td>';
            echo '<td><h6 id="nombres">'.$fila["nombres"].'</h6></td>';
            echo '<td><h6 id="nombres">'.$fila["telefono"].'</h6></td>';
            $animo=new Animo();
            $ma=new MAnimo();
            $animo=$ma->buscar($fila["idpersona"]);
            
            if ($animo->getTipo()==0) {
                $strin= '<img id="in" src="../img/tensiometro 1.png" alt="">';
            }elseif ($animo->getTipo()==1) {
                $strin= '<img id="in" src="../img/tensi 1.png" alt="">';
            }elseif ($animo->getTipo()==2) {
                $strin= '<img id="in" src="../img/tensi 3.png" alt="">';
            }elseif ($animo->getTipo()==3) {
                $strin= '<img id="in" src="../img/tensi 4.png" alt="">';
            }elseif ($animo->getTipo()==4) {
                $strin= '<img id="in" src="../img/tensi 6.png" alt="">';
            }
            echo '<td class="betterexp">'.$strin.'</td>';
            echo '<td class="eliminar">'
            . '<a href="javascript:;" onclick="eliminar('.$_REQUEST["id"].','.$fila["idpersona"].');return false;">'
                    . '<img src="../img/Error_Symbol.png" alt=""></a></td>';
            echo '</tr>';
        }
        echo '</table>';
    }elseif ($_REQUEST["area"]=="aviso") {
        echo '<a href="javascript:;" onclick="reporte('.$_REQUEST["id"].');return false;"><img src="../img/envio.png" alt=""></a>';
        echo '<input type=text id=mens>';
    }elseif ($_REQUEST["area"]=="estado") {
        echo '<table id="tab-estado">';
        echo '<tr><td class="td-imgEstado"><a href="javascript:;" onclick="cambiar('.$_REQUEST["id"].',0);return false;">'
                . '<img src="../img/cara 0.png" alt=""></a></td>';
        echo '<td class="descripcion"><p>TODO BIEN </p></td></tr>';
        echo '<tr><td class="td-imgEstado"><a href="javascript:;" onclick="cambiar('.$_REQUEST["id"].',1);return false;">'
                . '<img src="../img/cara 1.png" alt=""></a></td>';
        echo '<td class="descripcion"><p>Hoy se mostró celoso  y ha empezado a  enfadarse constantemente, me crítica y se burla de mí.</p></td></tr>';
        echo '<tr><td class="td-imgEstado"><a href="javascript:;" onclick="cambiar('.$_REQUEST["id"].',2);return false;">'
                . '<img src="../img/cara 2.png" alt=""></a></td>';
        echo '<td class="descripcion"><p>Hoy intento golpearme con alguna parte de su cuerpo o con un objeto.</p></td></tr>';
        echo '<tr><td class="td-imgEstado"><a href="javascript:;" onclick="cambiar('.$_REQUEST["id"].',3);return false;">'
                . '<img src="../img/cara 3.png" alt=""></a></td>';
        echo '<td class="descripcion"><p>Después de ver actos que no me agradan en él, Hoy tome la decisión de terminar con él pero me amenazó con matarme o matarse.</p></td></tr>';
        echo '<tr><td class="td-imgEstado"><a href="javascript:;" onclick="cambiar('.$_REQUEST["id"].',4);return false;">'
                . '<img src="../img/cara 4.png" alt=""></a></td>';
        echo '<td class="descripcion"><p>Hoy nos enojamos y discutimos. He sentido que mi vida está en peligro. Hoy me golpeo.</p></td></tr>';
        echo '</table>';
        
        //echo '<a href="javascript:;" onclick="afiliar(1,2);return false;">a</a>';
    }elseif ($_REQUEST["area"]=="buscar") {
        $mu=new MUsuario();
        $quer=$mu->buscarAmigo($_REQUEST["id"]);
        echo '<table id="tab-estado">';
        for ($i=0;$i<mysqli_num_rows($quer);$i++){
            $fila=  mysqli_fetch_array($quer);
            echo '<tr>';
            echo '<td class="td-imgEstado"><img src="../img/cara 1.png" alt=""></td>';
            echo '<td><h6 id="nombres">'.$fila["nombres"].'</h6></td>';
            echo '<td><h6 id="nombres">'.$fila["apellidos"].'</h6></td>';   
            echo '<td class="agregar">'
            . '<a href="javascript:;" onclick="afiliar('.$_REQUEST["id"].','.$fila["idpersona"].');return false;">'
                    . '<img src="../img/exito.png" alt=""></a></td>';
            echo '</tr>';
        }
        echo '</table>';
    }