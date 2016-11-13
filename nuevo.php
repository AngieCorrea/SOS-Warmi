<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <script src="js/jquery.js" type="text/javascript"></script>
        
    </head>
    <body class=" w3-teal">
        <div class="w3-half w3-container" >
            <div class="w3-padding-8 w3-padding-xlarge w3-center">
              <h1>Registro</h1>
              <p class="w3-opacity">llenar datos verdaderos</p>
              <form action="registrando.php" method="POST" class="w3-container w3-card-2 w3-padding-8 w3-white">
                    <div class="w3-group">
                      <label>Nombres</label>
                      <input name="txtnombres" class="w3-input" style="width:100%;" type="text" required>
                    </div>
                    <div class="w3-group">
                      <label>Apellidos</label>
                      <input name="txtapellidos" class="w3-input" style="width:100%;" type="text" required>
                    </div>
                    <div class="w3-group">
                        <label>Telefono</label>
                        <input name="txttelefono" class="w3-input" style="width:100%;" type="text" required>
                    </div>  
                    <div class="w3-group">
                        <label>Sexo</label>
                        <select class="form-control" name="cbsexo">
                            <option value="F" >Femenino</option>
                            <option value="M" >Masculino</option>
                        </select>
                    </div>
                    <input type="submit" class="w3-btn" value="Registrar">
              </form>
              <h1 id="detalle"></h1>
            </div>
        </div>        
    </body>
</html>