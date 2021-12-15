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
      <a class = "navegacion__enlace" href = "index.php"> Tienda </a>
      <a class = "navegacion__enlace navegacion__enlace--activo" href = "nosotros.php"> Nosotros </a>

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
      <h1>Nosotros</h1>
      
      <div class = "nosotros">
         <div class = "nosotros__contenido">
            <pEx>
               Nosotros la Empresa de los GoodGuys, estamos centrados en la creación de los muñecos Good Guys,
               ¡Quienes buscan ser tu mejor amigo!.
            </pEx> <br>
            <pEx>
               A pesar de vender solo productos centrados al muñeco Good Guy, tambien tenemos diferentes productos
               como el cereal del GoodGuy, o cuadernos del mismo, en caso de perder algún objeto o dañar tu muñeco
               ¡Puedes comprar nuevos objetos o llamar al servicio técnico para reparar tu muñeco!
            </pEx> <br>
            <pEx>
               ¡Los GoodGuys buscan nuevos amigos y les gusta ser tratados bien! ¡No pierdas la oportunidad de comprar
               tu GoodGuy!
            </pEx>
            <h3>
               Nuestros muñecos no estan poseidos por asesinos.
            </h3>
         </div>
         <img class = "nosotros__imagen" src = "img/GGFactory.jpg" alt = "imagen_nosotros">
      </div>
   </main>

   <section class = "contenedor comprar">
      <h2 class = "comprar__titulo">Aclarando controversias</h2>
      <div class = "bloques">
         <div class = "bloque">
            <img class = "bloque__imagen" src = "img/icono_1.png" alt = "aclaracion">
            <h1 class = "bloque__titulo">Caso 1988</h1>
            <p>
               El caso de 1988, se debe a una paranoia provocada por un niño y una madre, donde la fabrica de los Good Guys,
               no tiene ninguna relación con dichas acusaciones.
            </p>
         </div>

         <div class = "bloque">
            <img class = "bloque__imagen" src = "img/icono_2.png" alt = "aclaracion">
            <h1 class = "bloque__titulo">Caso 1990</h1>
            <p>
               El caso de 1990, una continuación de acusaciones del mismo propietario que siguió señalando una extraña conducta
               de su muñeco, resultando en acusaciones falsas.
            </p>
         </div>

         <div class = "bloque">
            <img class = "bloque__imagen" src = "img/icono_3.png" alt = "aclaracion">
            <h1 class = "bloque__titulo">Caso 1998</h1>
            <p>
               El caso de 1998, uno de los más absurdos e ilógicos, donde otra vez el mismo propietario, irrumpió una escuela
               militar académica, siendo todo esto falso.
            </p>
         </div>

         <div class = "bloque">
            <img class = "bloque__imagen" src = "img/icono_4.png" alt = "aclaracion">
            <h1 class = "bloque__titulo">Caso 2013</h1>
            <p>
               El caso del 2013, una chica creo acusaciones falsas de su muñeco Good Guy, donde nada de lo que ocurrido tuvo que
               ver la empresa de estos muñecos.
            </p>
         </div>
   </div>
</section>

   <footer class = "footer">
     <p class = "footer__texto">GoodGuys FanStore</a> 
   </footer>

</body>

</html>