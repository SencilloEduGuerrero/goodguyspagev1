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
      <a class = "navegacion__enlace navegacion__enlace--activo" href = "sesion.php"> Iniciar Sesion </a>
   </nav>

   <main class = "contenedor">
      <h1>Iniciar Sesion</h1>

      <form class = "sesion" action = "sesion.php" method = "post">
        <div class = "sesion__fondo">
         <pSesion>
            Correo:
            <br>
            <input type = "text" class = "campo" name = "email">
            <br>
            Contraseña:
            <br>
            <input type = "password" class = "campo" name = "contraseña">
            <br> <br>
            <input type="submit" class = "campo" value="Enviar" name = 'enviar'>
            <br> <br>
         </pSesion>
      </form>

      <?php
         include("iniciar.php");
      ?>

          <img class = "sesion__imagen" src = "img/sesion.png" alt = "Imagen"
          width="250"
          height="300">
          <br> <br>

          <pRegistro>
            ¿No tiene una cuenta registrada? ¡Registrate!
            <br>
            <button onclick = "window.location.href = 'registro.php'"
            class = "campoEx" name = "registro"> Registrarme </button>
          </pRegistro>

      </div>
   </main>

   <footer class = "footer">
     <p class = "footer__texto">GoodGuys FanStore</a> 
   </footer>

</body>

</html>