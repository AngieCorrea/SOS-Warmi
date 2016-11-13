<?php
    
    include "../entidades/Usuario.php";
    session_start();
    $Usuario=new Usuario();
    $Usuario=$_SESSION["usuario"];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SOS WARMI</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/inicio.css"> 
    <style>
        p{
            font-size: 15px;
        }
        #nombres{
            font-size: 12px;
        }
        #in{
           width: 30%;
        }
    </style>
</head>
<body>
    <div class="">
        <input id="idpersona" hidden="" value="<?php echo $Usuario->getId();?>">
        
        <header class="tituloPrincipal">
            <div id="div-contLog"><div id="div-logo"><img src="../img/logo.png" alt=""></div></div>
            <div id="div-contUsuario" ><p><?php echo $Usuario->getNombres();?></p><div id="div-usuario"><img src="../img/usuario.png" alt=""></div></div>
        </header>
        <div class="div-contenido">
            <div class="div-perfil">
                
                <div class="div-tenciometro" id="tensiometro"></div>
                
            </div>
            <div class="div-navegacion">
                
                <div class="div-reservas">
                    <ul class="tabs menu">
                        <li><a href="javascript:;" onclick="area(<?php echo $Usuario->getId();?>,'aviso');return false;" class="pestañas">Aviso</a></li>
                        <li><a href="javascript:;" onclick="area(<?php echo $Usuario->getId();?>,'estado');return false;"class="pestañas">Estado</a></li>
                        <li><a href="javascript:;" onclick="area(<?php echo $Usuario->getId();?>,'amigos');return false;" class="pestañas">Amigos</a></li>
                        <li><a href="javascript:;" onclick="area(<?php echo $Usuario->getId();?>,'buscar');return false;" class="pestañas">+</a></li>
                        <li><a href="javascript:;" onclick="area(<?php echo $Usuario->getId();?>,'notificacion');return false;" class="pestañas">?</a></li>
                    </ul>

                    <div class="tab_container">
                        <div class="tab_content" id="caja">
                            
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>    
        <footer id="pie">
            <h7>Telefono :<?php echo $Usuario->getTelefono();?></h7>
            <br>
            <h7>Direccion :</h7>
        </footer>
    </div>
    <script src="../js/jquery.js"></script>
    <script type="text/javascript">
        function area(id,area){
            var parametros = {
                "id": id,
                "area":area
            };
            $.ajax({
                data:  parametros,
                url:   'Areas',
                type:  'post',
                success:  function (response) {
                        $("#caja").html(response);
                }
            });    
        }
        $(document).ready(
            tensiometro(document.getElementById("idpersona").value)
        );
        function tensiometro(id){
            var parametros = {
                "id": id 
            };
            $.ajax({
                data:  parametros,
                url:   'A_Tensiometro',
                type:  'post',
                beforeSend: function () {
                        $("#tensiometro").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#tensiometro").html(response);
                }
            });    
        }
        function eliminar(idcuenta,idafiliado){
            var parametros={
                "idcuenta": idcuenta,
                "idafiliado":idafiliado
            };
            $.ajax({
                data:  parametros,
                url:   'A_Eliminar',
                type:  'post'
            });
            area(document.getElementById("idpersona").value,"amigos")
        }
        
        function cambiar(id,valor){
            var parametros={
                "idpersona": id,
                "valor":valor
            };
            $.ajax({
                data:  parametros,
                url:   'A_Animo',
                type:  'post',
                beforeSend: function () {
                        $("#h").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#h").html(response);
                }
            });
            
            tensiometro(document.getElementById("idpersona").value);
            
        }
        
        function afiliar(idcuenta,idafiliado){
            var parametros={
                "idcuenta": idcuenta,
                "idafiliado":idafiliado
            };
            $.ajax({
                data:  parametros,
                url:   'A_Afiliar',
                type:  'post'
            });
            area(document.getElementById("idpersona").value,"buscar");
            
        }

        function reporte(){
            var parametros={
                "idpersona": document.getElementById("idpersona").value,
                "mens": document.getElementById("mens").value
            };
            $.ajax({
               data:  parametros,
                url:   'A_Reporte',
                type:  'post'
            });
            alert("mensaje enviado")
        }
        </script>
    </body>
</html>

