<?php
session_start();
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
      <h1>Nuestros Productos</h1>

      <div class = "grid">
         <div class = "producto">
            <a href="producto.php">
               <img class = "producto__imagen" src = "img/GGMuñeco.png" alt = "Imagen Muñeco"
               width="300" 
               height="300">
               <div class = "producto__informacion">
                  <p class = "producto__nombre">GoodGuy Incluye Caja</p>
                  <p class = "producto__precio">$400</p>
               </div>
            </a>
         </div> <!--.producto-->

         <div class = "producto">
            <a href="producto1.php">
               <img class = "producto__imagen" src = "img/GGRopa.png" alt = "Imagen Ropa"
               width="300" 
               height="300">
               <div class = "producto__informacion">
                  <p class = "producto__nombre">GoodGuy Ropa</p>
                  <p class = "producto__precio">$100</p>
               </div>
            </a>
         </div> <!--.producto-->

         <div class = "producto">
            <a href="producto2.php">
               <img class = "producto__imagen" src = "img/GGMartillo.png" alt = "Imagen Herramientas"
               width="200" 
               height="300">
               <div class = "producto__informacion">
                  <p class = "producto__nombre">GoodGuy Herramientas</p>
                  <p class = "producto__precio">$50</p>
               </div>
            </a>
         </div> <!--.producto-->

         <div class = "producto">
            <a href="producto3.php">
               <img class = "producto__imagen" src = "img/GG Pilas.png" alt = "Imagen Pilas"
               width="300" 
               height="300">
               <div class = "producto__informacion">
                  <p class = "producto__nombre">GoodGuy Pilas</p>
                  <p class = "producto__precio">$100</p>
               </div>
            </a>
         </div> <!--.producto-->

         <div class = "producto">
            <a href="producto4.php">
               <img class = "producto__imagen" src = "img/GGAccesorios.png" alt = "Imagen Accesorios"
               width="250" 
               height="300">
               <div class = "producto__informacion">
                  <p class = "producto__nombre">GoodGuy Accesorios</p>
                  <p class = "producto__precio">$100</p>
               </div>
            </a>
         </div> <!--.producto-->

         <div class = "producto">
            <a href="producto5.php">
               <img class = "producto__imagen" src = "img/GGCaja.png" alt = "Imagen Caja"
               width="150" 
               height="300">
               <div class = "producto__informacion">
                  <p class = "producto__nombre">GoodGuy Caja</p>
                  <p class = "producto__precio">$150</p>
               </div>
            </a>
         </div> <!--.producto-->

         <div class = "producto">
            <a href="producto6.php">
               <img class = "producto__imagen" src = "img/GGCereal.png" alt = "Imagen Cereal"
               width="200" 
               height="300">
               <div class = "producto__informacion">
                  <p class = "producto__nombre">GoodGuy Cereal</p>
                  <p class = "producto__precio">$9</p>
               </div>
            </a>
         </div> <!--.producto-->

         <div class = "producto">
            <a href="producto7.php">
               <img class = "producto__imagen" src = "img/GGCuaderno.png" alt = "Imagen Cuaderno"
               width="200" 
               height="300">
               <div class = "producto__informacion">
                  <p class = "producto__nombre">GoodGuy Cuaderno</p>
                  <p class = "producto__precio">$2</p>
               </div>
            </a>
         </div> <!--.producto-->

         <div class = "grafico grafico--icono1"></div>
         <div class = "grafico grafico--icono2"></div>

      </div>
   </main>

   <footer class = "footer">
     <p class = "footer__texto">GoodGuys FanStore</a> 
   </footer>

</body>

</html>

<!-- Script #5 Fondos !-->
<script src = "js/fondo.js"></script>