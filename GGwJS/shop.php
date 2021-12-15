<?php
    $db = conectarServidor();

    if (isset($_POST['enviar']))
    {
        $id = $_POST['id'];

        $id = filter_var($id, FILTER_VALIDATE_INT);

        //CONSULTAR 
        $query = "SELECT id, objeto, modelo, cantidad, precio FROM producto WHERE id = ${id}";

        //LEER LOS RESULTADOS
        $resultado = mysqli_query($db, $query);
        $producto = mysqli_fetch_assoc($resultado);

        $id_producto = $_POST['id'];

        $id_cliente = $_SESSION['id'];

        $consultacarrito = "SELECT id FROM carrito WHERE id_cliente = $id_cliente";
        $resultadocarrito = mysqli_query($db, $consultacarrito);
        
        $carrito = mysqli_fetch_assoc($resultadocarrito);
        
        $id_carrito = $carrito['id'];
        $cantidad = mysqli_real_escape_string($db, $_POST['cantidad']);

        $queryVerificacion = "SELECT id_carrito, id_producto FROM carrito_producto WHERE id_carrito = '${id_carrito}' AND id_producto = '${id_producto}'";
        $resultaVerificacion = mysqli_query($db, $queryVerificacion);
        $verificacion = mysqli_fetch_assoc($resultaVerificacion);

        if ($verificacion === NULL)
        {
            $query = "INSERT INTO carrito_producto(id_carrito, id_producto, cantidad_producto) VALUES ('${id_carrito}', '${id_producto}', '${cantidad}')";
            $resultado = mysqli_query($db, $query);

            if($resultado)
            {
                header("Location: carrito.php");
            }
            else
            {
                $query = "INSERT INTO carrito_producto(id_carrito, id_producto, cantidad_producto) VALUES ('${id_carrito}', '${id_producto}', '${cantidad}') ON DUPLICATE KEY UPDATE";
                $resultado = mysqli_query($db, $query);
            }
        }
        else if($verificacion['id_carrito'])
        {
            $query = "UPDATE carrito_producto SET cantidad_producto = cantidad_producto + ${cantidad} WHERE id_carrito = '${id_carrito}' AND id_producto = '${id_producto}'";
            $resultado = mysqli_query($db, $query);

            if ($resultado)
            {
                header("Location: carrito.php");
            }
        }
    }
?>

<?php 
//CERRAR LA CONEXIÓN
mysqli_close($db);
?>