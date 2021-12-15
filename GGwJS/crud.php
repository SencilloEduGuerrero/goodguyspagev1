<?php
session_start();

if(!$_SESSION)
{
    header('Location: index.php');
}

include("inventario.php");
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
      <a class = "cuentas__enlace"> <?php echo $_SESSION['nombre']; ?></a>
      <a class = "cuentas__enlace" href = "carrito.php"> Carrito </a>
      <a class = "cuentas__enlace" href = "salir.php"> Salir </a>
   </nav>

   <main class = "contenedor">
      <h1>Agregar Contenido</h1> 

      <div class = "sesion">
         <div class = "sesion__fondo">

            <form class = "crud" method = "post">
            <pSesion>
            Seleccione un Objeto
            <br>
            <select class = "formulario__campo" name = "id">
               <option value = "1">Muñeco</option>
               <option value = "2">Ropa</option>
               <option value = "3">Herramientas</option>
               <option value = "4">Pilas</option>
               <option value = "5">Accesorios</option>
               <option value = "6">Caja</option>
               <option value = "7">Cereal</option>
               <option value = "8">Cuaderno</option>
            </select>
            <br>

            <br>
            <input type = "submit" class = "campo" value = "Mostrar" name = "mostrar">
            <br> <br>

            <?php
            
            if (isset($_POST['id']))
            {
               señal(strtolower($_POST['id']));
            }

            function señal($id)
            {
               switch ($id)
               {
                  case "1":
                     {
                        ?>
                        Diseño (Muñeco)
                        <img class = "objeto__imagen" src = "img/GGMuñeco.png" alt = "Imagen del Producto">
                        <br>
                        <select class = "formulario__campo" name = "modelo">
                        <option disabled selected>--Seleccionar Diseño--</option>
                           <option value = "1988">Diseño 1988</option>
                           <option value = "1990">Diseño 1990</option>
                           <option value = "1991">Diseño 1991</option>
                           <option value = "2013">Diseño 2013</option>
                           <option value = "2017">Diseño 2017</option>
                           <option value = "2021">Diseño 2021</option>
                        </select>
                        <br>

                        Cantidad a Agregar
                        <br>
                        <input class = "formulario__campo" type = "number" placeholder = "Cantidad" min = "1" max = "100" name = "cantidad" value = "">
                        </br>

                        <br> <br>
                        <input type = "submit" class = "campo" value = "Agregar" name = "agregar">
                        <br>

                        <?php
                     }
                  break;
                  case "2":
                     {
                        ?>
                           Tipo (Ropa)
                           <img class = "objeto__imagen" src = "img/GGRopa.png" alt = "Imagen del Producto">
                           <br>
                           <select class = "formulario__campo" name = "modelo">
                           <option disabled selected>--Seleccionar Tipos--</option>
                              <option value = "1988">Diseño 1988</option>
                              <option value = "1990">Diseño 1990</option>
                              <option value = "1991">Diseño 1991</option>
                              <option value = "2013">Diseño 2013</option>
                              <option value = "2017">Diseño 2017</option>
                              <option value = "2021">Diseño 2021</option>
                           </select>
                           <br>

                           Cantidad a Agregar
                           <br>
                           <input class = "formulario__campo" type = "number" placeholder = "Cantidad" min = "1" max = "100" name = "cantidad" value = "">
                           </br>

                           <br> <br>
                           <input type = "submit" class = "campo" value = "Agregar" name = "agregar">
                           <br>
                           <?php
                     }
                  break;
                  case "3":
                     {
                        ?>
                           Tipo (Herramientas)
                           <img class = "objeto__imagen" src = "img/GGMartillo.png" alt = "Imagen del Producto">
                           <br>
                           <select class = "formulario__campo" name = "modelo">
                           <option disabled selected>--Seleccionar Tipos--</option>
                              <option value = "constructor">Constructor</option>
                              <option value = "beisbolista">Beisbolista</option>
                              <option value = "vaquero">Vaquero</option>
                              <option value = "soldado">Soldado</option>
                              <option value = "apache">Apache</option>
                              <option value = "bombero">Bombero</option>
                           </select>
                           <br>

                           Cantidad a Agregar
                           <br>
                           <input class = "formulario__campo" type = "number" placeholder = "Cantidad" min = "1" max = "100" name = "cantidad" value = "">
                           </br>

                           <br> <br>
                           <input type = "submit" class = "campo" value = "Agregar" name = "agregar">
                           <br>

                        <?php
                     }
                  break;
                  case "4":
                     {
                        ?>
                           Tipo (Baterias)
                           <img class = "objeto__imagen" src = "img/GG Pilas.png" alt = "Imagen del Producto">
                           <br>
                           <select class = "formulario__campo" name = "modelo">
                           <option disabled selected>--Seleccionar Tipos--</option>
                              <option value = "1988">Pilas 1988</option>
                              <option value = "1980">Pilas 1980</option>
                              <option value = "1988">Pilas 1988</option>
                              <option value = "2013">Pilas 2013</option>
                              <option value = "2017">Pilas 2017</option>
                              <option value = "2021">Pilas 2021</option>
                           </select>
                           <br>

                           Cantidad a Agregar
                           <br>
                           <input class = "formulario__campo" type = "number" placeholder = "Cantidad" min = "1" max = "100" name = "cantidad" value = "">
                           </br>

                           <br> <br>
                           <input type = "submit" class = "campo" value = "Agregar" name = "agregar">
                           <br>

                        <?php
                     }
                  break;
                  case "5":
                     {
                        ?>
                           Tipo (Accesorios)
                           <img class = "objeto__imagen" src = "img/GGAccesorios.png" alt = "Imagen del Producto">
                           <br>
                           <select class = "formulario__campo" name = "modelo">
                           <option disabled selected>--Seleccionar Tipos--</option>
                              <option value = "constructor">Constructor</option>
                              <option value = "beisbolista">Beisbolista</option>
                              <option value = "vaquero">Vaquero</option>
                              <option value = "soldado">Soldado</option>
                              <option value = "apache">Apache</option>
                              <option value = "bombero">Bombero</option>
                           </select>
                           <br>

                           Cantidad a Agregar
                           <br>
                           <input class = "formulario__campo" type = "number" placeholder = "Cantidad" min = "1" max = "100" name = "cantidad" value = "">
                           </br>

                           <br> <br>
                           <input type = "submit" class = "campo" value = "Agregar" name = "agregar">
                           <br>

                        <?php
                     }
                  break;
                  case "6":
                     {
                        ?>
                           Tipo (Caja)
                           <img class = "objetoEx__imagen" src = "img/GGCaja.png" alt = "Imagen del Producto">
                           <br>
                           <select class = "formulario__campo" name = "modelo">
                           <option disabled selected>--Seleccionar Tipos--</option>
                              <option value = "clasico">Clasica</option>
                              <option value = "moderno">Moderna</option>
                           </select>
                           <br>

                           Cantidad a Agregar
                           <br>
                           <input class = "formulario__campo" type = "number" placeholder = "Cantidad" min = "1" max = "100" name = "cantidad" value = "">
                           </br>

                           <br> <br>
                           <input type = "submit" class = "campo" value = "Agregar" name = "agregar">
                           <br>

                        <?php
                     }
                  break;
                  case "7":
                     {
                        ?>
                           Sabor (Cereal)
                           <img class = "objeto__imagen" src = "img/GGCereal.png" alt = "Imagen del Producto">
                           <br>
                           <select class = "formulario__campo" name = "modelo">
                           <option disabled selected>--Seleccionar Sabor--</option>
                              <option value = "chocolate">Chocolate</option>
                              <option value = "fresa">Fresa</option>
                              <option value = "vainilla">Vainilla</option>
                           </select>
                           <br>

                           Cantidad a Agregar
                           <br>
                           <input class = "formulario__campo" type = "number" placeholder = "Cantidad" min = "1" max = "100" name = "cantidad" value = "">
                           </br>

                           <br> <br>
                           <input type = "submit" class = "campo" value = "Agregar" name = "agregar">
                           <br>

                        <?php
                     }
                  break;
                  case "8":
                     {
                        ?>
                           Diseño (Cuaderno)
                           <img class = "objetoEx__imagen" src = "img/GGCuaderno.png" alt = "Imagen del Producto">
                           <br>
                           <select class = "formulario__campo" name = "modelo">
                           <option disabled selected>--Seleccionar Diseño--</option>
                              <option value = "constructor">Constructor</option>
                              <option value = "beisbolista">Beisbolista</option>
                              <option value = "vaquero">Vaquero</option>
                              <option value = "soldado">Soldado</option>
                              <option value = "apache">Apache</option>
                              <option value = "bombero">Bombero</option>
                           </select>
                           <br>

                           Cantidad a Agregar
                           <br>
                           <input class = "formulario__campo" type = "number" placeholder = "Cantidad" min = "1" max = "100" name = "cantidad" value = "">
                           </br>

                           <br> <br>
                           <input type = "submit" class = "campo" value = "Agregar" name = "agregar">
                           <br>
                           
                        <?php
                     }
                  break;
               }
            }
            ?>
         </pSesion>

            </form>
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