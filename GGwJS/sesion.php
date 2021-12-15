<?php
session_start();

// Verifica si hay sesión activa.
if($_SESSION)
{
    header('Location: index.php');
}

include("iniciar.php");
?>

<html>
<head>
   <meta charset = "UTF-8">
   <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
   <title>GoodGuys FanStore</title>
   <link rel = "stylesheet" href = "normalize.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
   <link rel = "stylesheet" href = "styles.css">
</head>

<body>
   <header class = "header">
      <a href ="index.php">
         <img class = "hearder__logo" src = "img/Logo.png" alt = "Logotipo"
         width="250" 
         height="300">
      </a>
   </header>

   <nav class = "navegacion">
      <a class = "navegacion__enlace" href = "index.php"> Tienda </a>
      <a class = "navegacion__enlace" href = "nosotros.php"> Nosotros </a>
      <input class = "formulario__submit" type = "submit" onclick = "cambioFondo()" value = "Cambiar Fondo">
   </nav>

   <nav class = "cuentas">
      <a class = "cuentas__enlace" href = "registro.php"> Registrarse </a>
   </nav>

   <main class = "contenedor">
         
   <h1>Iniciar Sesion</h1>

      <form class = "sesion" action = "sesion.php" method = "post" id = "sesionID">
        <div class = "sesion__fondo">
         <pSesion>
            Email:
            <br>
            <input type = "text" class = "campo" name = "email">
            <br>
            Contraseña:
            <br>
            <input type = "password" class = "campo" name = "contraseña">
            <br> <br>
            <input type="submit" class = "campo" value = "Enviar" name = 'enviar' onclick= "return sesionIniciada()">
            <br>

            <h3>Ingrese los datos correctos</h3>
         </pSesion>
      </form>

      <img class = "sesion__imagen" src = "img/sesion.png" alt = "Imagen"
                        width="250"
                        height="300">
                        <br> <br>
      </div>
   </main>

   <footer class = "footer">
     <p class = "footer__texto">GoodGuys FanStore</a> 
   </footer>

</body>
</html>

<!-- Script #5 Fondos !-->
<script src = "js/fondo.js"></script>