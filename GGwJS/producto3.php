<?php
session_start();

include "con_db.php";

include("shop.php");
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
         <img class = "hearder__logo " src = "img/Logo.png" alt = "Logotipo"
         width="250" 
         height="300">
      </a>
   </header>

   <nav class = "navegacion">
      <a class = "navegacion__enlace navegacion__enlace--activo" href = "index.php"> Tienda </a>
      <a class = "navegacion__enlace" href = "nosotros.php"> Nosotros </a>
      <input class = "formulario__submit" type = "submit" onclick = "cambioFondo()" value = "Cambiar Fondo">

      <?php
      if ($_SESSION)
      {
         if ($_SESSION['administrador'] = true)
         {
            ?>
            <a class = "navegacion__enlace" href = "crud.php"> CRUD </a>
            <?php
         }
      }
      ?>
   </nav>

   <nav class = "cuentas">
      <?php
            if (!$_SESSION)
            {
               ?> <a class = "cuentas__enlace" href = "sesion.php"> Iniciar Sesion </a>
                  <a class = "cuentas__enlace" href = "registro.php"> Registrarse </a> <?php
            }
            else
            {
               ?>
                <a class = "cuentas__enlace"> <?php echo $_SESSION['nombre']; ?></a>
                <a class = "cuentas__enlace" href = "carrito.php"> Carrito </a> 
                <a class = "cuentas__enlace" href = "logout.php"> salir </a> <?php
            }
      ?>
   </nav>

   <main class = "contenedor">
      <h1>GoodGuy Pilas</h1>

      <div class = "objeto">
         <img class = "objeto__imagen" src = "img/GG Pilas.png" alt = "Imagen del Producto">
      
         <div class = "objeto__contenido">
         <p>
            Pilas tamaño D para las funciones interactivas del GoodGuy.
         </p>
         
         <?php
         if ($_SESSION)
         { ?>
         <form class = "formulario" method = "post">
            <select class = "formulario__campo">
               <option value = "1988">Pilas 1988</option>
               <option value = "1990">Pilas 1990</option>
               <option value = "1991">Pilas 1991</option>
               <option value = "2013">Pilas 2013</option>
               <option value = "2017">Pilas 2017</option>
               <option value = "2021">Pilas 2021</option>
            </select>
            <input class = "formulario__campo" type = "number" placeholder = "Cantidad" min = "1" max = "20" name = "cantidad" value = "1">

            <input type = "hidden" name = "id" value = "4">

            <input class = "formulario__submit" type = "submit" value = "Agregar al Carrito">
         </form>
         <?php
      }
      else
      {
         ?>
            <h1 class = "sesion__nula">¡Favor de Iniciar Sesion!</h1>
         <?php
      } ?>
         </div>
      </div>
   </main>

   <footer class = "footer">
     <p class = "footer__texto">GoodGuys FanStore</a> 
   </footer>

</body>

</html>

<!-- Script #5 Fondos !-->
<script src = "js/fondo.js"></script>