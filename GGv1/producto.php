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
      <a class = "navegacion__enlace navegacion__enlace--activo" href = "index.php"> Producto </a>
      <a class = "navegacion__enlace" href = "nosotros.php"> Nosotros </a>
      <a class = "navegacion__enlace" href = "sesion.php"> Iniciar Sesion </a>
   </nav>

   <main class = "contenedor">
      <h1>GoodGuy Incluye Caja</h1>

      <div class = "objeto">
         <img class = "objeto__imagen" src = "img/GGMuñeco.png" alt = "Imagen del Producto">
      
         <div class = "objeto__contenido">
         <p>
            El Clásico GoodGuy, este producto incluye el muñeco, la caja oficial y un par de pilas.
         </p>

         <form class = "formulario">
            <select class = "formulario__campo">
               <option disabled selected>--Seleccionar Diseño--</option>
               <option>Diseño 1988</option>
               <option>Diseño 1990</option>
               <option>Diseño 1991</option>
               <option>Diseño 2013</option>
               <option>Diseño 2017</option>
               <option>Diseño 2021</option>
            </select>
            <input class = "formulario__campo" type = "number" placeholder = "Cantidad" min = "1" max = "10">
            <input class = "formulario__submit" type = "submit" value = "Agregar al Carrito">
         </form>
         </div>
      </div>
   </main>

   <footer class = "footer">
     <p class = "footer__texto">GoodGuys FanStore</a> 
   </footer>

</body>

</html>