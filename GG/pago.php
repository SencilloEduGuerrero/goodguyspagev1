<?php 
    session_start();

    include "con_db.php";

    $db = conectarServidor();
    $id_cliente = $_SESSION['id'];

    if($_SESSION['id'])
    {
        $query = "SELECT carrito.id_cliente as id_cliente, carrito_producto.id_carrito as id_carrito,
        carrito_producto.id_producto as id_producto, producto.objeto as objeto, producto.modelo as modelo,
        producto.precio as precio, carrito_producto.cantidad_producto as cantidad FROM carrito_producto INNER JOIN carrito ON 
        carrito.id = carrito_producto.id_carrito INNER JOIN producto ON producto.id = carrito_producto.id_producto
        WHERE carrito.id_cliente = $id_cliente";

        $resultado = mysqli_query($db, $query);
        $compra = mysqli_fetch_assoc($resultado);

        $consultaTotal = "SELECT SUM(producto.precio * carrito_producto.cantidad_producto) as subtotal,
        COUNT(carrito_producto.id) as cuenta_productos FROM carrito_producto INNER JOIN carrito ON
        carrito.id = carrito_producto.id_carrito INNER JOIN producto ON producto.id = carrito_producto.id_producto
        WHERE id_cliente = $id_cliente";
        
        $resultadoSuma = mysqli_query($db, $consultaTotal);
        $suma = mysqli_fetch_assoc($resultadoSuma);
        $total = $suma['subtotal'] + ($suma['subtotal'] * 0.16);
        $total = round($total, 2); 
        $cuentaProductos = $suma['cuenta_productos']-1;
    }
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

<main class="contenedor">
    <h1>Paga tu producto aquí</h1>
    <div class="carrito">
        <div class="carrito__producto">

            <div class="carrito__info--compra">
                <a>
                    <p class="carrito__info--titulo"><?php echo $compra['objeto']; ?></p>
                    <?php if($cuentaProductos > 1): ?>
                    <p class="carrito__info--titulo">y otros <?php echo $cuentaProductos; ?> articulos</p>
                    <?php endif; ?>
                    <?php if($cuentaProductos === 1): ?>
                    <p class="carrito__info--titulo">y otro artículo</p>
                    <?php endif; ?>
                </a>
            </div>

        </div>
        <div class="carrito__total">
            <h3 class="carrito__subtotal">Total: $<?php echo $total; ?> MXN</h3>
            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
            <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script>
            <script>
                function initPayPalButton() {
                paypal.Buttons({
                    style: {
                    shape: 'pill',
                    color: 'blue',
                    layout: 'horizontal',
                    label: 'pay',
                    
                    },

                    createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{"amount":{"currency_code":"MXN","value":<?php echo floatval($total); ?>}}]
                    });
                    },

                    onApprove: function(data, actions) {
                    return actions.order.capture().then(function(orderData) {
                        
                        // Full available details
                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                        // Show a success message within this page, e.g.
                        const element = document.getElementById('paypal-button-container');
                        //element.innerHTML = '';
                        //element.innerHTML = 'actura.php';
                        // Or go to another URL:  actions.redirect('thank_you.html');
                        actions.redirect('https://jojocomics.herokuapp.com/factura.php');                        
                    });
                    },

                    onError: function(err) {
                    console.log(err);
                    }
                }).render('#paypal-button-container');
                }
                initPayPalButton();
            </script>
        </div>
    </div>
</main>

<footer class = "footer">
     <p class = "footer__texto">GoodGuys FanStore</a> 
   </footer>

</body>

</html>