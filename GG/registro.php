<?php
session_start();

if($_SESSION)
{
    header('Location: index.php');
}

include("registros.php");
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
      <a href ="index.html">
         <img class = "hearder__logo" src = "img/Logo.png" alt = "Logotipo"
         width="250" 
         height="300">
      </a>
   </header>

   <nav class = "navegacion">
      <a class = "navegacion__enlace" href = "index.php"> Tienda </a>
      <a class = "navegacion__enlace" href = "nosotros.php"> Nosotros </a>
   </nav>

   <nav class = "cuentas">
      <a class = "cuentas__enlace" href = "sesion.php"> Iniciar Sesion </a>
   </nav>

   <main class = "contenedor">
      <h1>Registrarse</h1>

      <div class = "sesion">
        <div class = "sesion__fondo">
           
            <form class = "registro" method = "post">
         <pSesion>
            Nombre:
            <br>
            <input type = "text" class = "campo" name = "nombre">
            <br>
            Email:
            <br>
            <input type = "email" class = "campo" name = "email">
            <br>
            Contraseña:
            <br>
            <input type = "password" class = "campo" name = "contraseña">
            <br> <br>
            <input type = "submit" class = "campo" value = "Enviar" name = "enviar">
            <br>

            <h3>Ingrese los datos correctos</h3>
         </pSesion>
            </form>
         </div>

          <img class = "sesion__imagen" src = "img/GGZapatos.jpg" alt = "Imagen"
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