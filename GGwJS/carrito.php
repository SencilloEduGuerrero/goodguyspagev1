<?php
session_start();

if(!$_SESSION)
{
    header('Location: index.php');
}

include("almacen.php");
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
         <img class = "hearder__logo " src = "img/Logo.png" alt = "Logotipo"
         width="250" 
         height="300">
      </a>
   </header>

   <nav class = "navegacion">
      <a class = "navegacion__enlace" href = "index.php"> Tienda </a>
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
      <h1>Carrito</h1>
      
   <?php if ($subtotal)
      { ?>
      <div class = "carrito">
         <?php
         while($producto = mysqli_fetch_assoc($resultado)):
            $id_producto = $producto['id_producto'];
            $cantidad = $producto['cantidad_producto'];
            $queryProducto = "SELECT * FROM producto WHERE id = $id_producto";
            $resultadoProducto = mysqli_query($db, $queryProducto);
            $producto = mysqli_fetch_assoc($resultadoProducto);
            ?>

         <div class = "carrito__contenido">
            
            <p class = "objeto__contenido"> Objeto: <?php echo $producto['objeto']; ?></p>
            <p class = "objeto__contenido"> Modelo: <?php echo $producto['modelo']; ?></p>
            <p class = "objeto__contenido"> Cantidad: <?php echo $cantidad; ?></p>
            <p class = "objeto__contenido"> Precio: <?php echo $producto['precio']; ?></p>

         </div>
      </div>

      <form method = "POST">
         <input type = "hidden" name = "id_producto" value = "<?php echo $id_producto ?>">
         <input type = "hidden" name = "id_carrito" value = "<?php echo $id_carrito; ?>">
         <input class = "formulario__submit" type = "submit" value = "Eliminar" name = 'eliminar' onclick= "return ConfirmDelete()">
      </form>
      <?php endwhile; ?>

      <div class="carrito__total">
         <h2 class="carrito__subtotal">Subtotal: $<?php echo $subtotal; ?> </h2>
         <a href="pago.php" class="boton">Pago</a>
      </div>

   <?php } ?>
         
   <?php if(!$subtotal)
      { ?>
         <h3 class = "carrito__vacio">¡Carrito Vacío!</h3>
   <?php } ?>

   </main>

   <footer class = "footer">
     <p class = "footer__texto">GoodGuys FanStore</a> 
   </footer>

</body>

</html>

<!-- SCRIPT #2 !-->
<script type = "text/javascript">
    function ConfirmDelete()
    {
        var respuesta = confirm("¿Estas seguro de vaciar el carrito?");

        if (respuesta == true)
        {
            return true;
        }
        else
        {
           return false;
        }
    }
</script>

<!-- Script #5 Fondos !-->
<script src = "js/fondo.js"></script>