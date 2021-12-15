<?php

    include "con_db.php";

    $db = conectarServidor();
    $id_cliente = $_SESSION['id'];

    if($_SESSION['id'])
    {
        $id_carrito = $_SESSION['id_carrito'];

        $query = "SELECT * FROM carrito_producto WHERE id_carrito = $id_carrito";
        $resultado = mysqli_query($db, $query);

        /* $query = "SELECT carrito.id_cliente as id_cliente, carrito_producto.id_carrito as id_carrito,
        carrito_producto.id_producto as id_producto, producto.objeto as objeto, producto.modelo as modelo,
        producto.precio as precio, carrito_producto.cantidad as cantidad FROM carrito_producto INNER JOIN carrito
        ON carrito.id = carrito_producto.id_carrito = $id_cliente"; */

        $consultaTotal = "SELECT SUM(producto.precio * carrito_producto.cantidad_producto) as subtotal FROM
        carrito_producto INNER JOIN carrito ON  carrito.id = carrito_producto.id_carrito INNER JOIN
        producto ON producto.id = carrito_producto.id_producto WHERE id_cliente = $id_cliente";
        
        $resultadoTotal = mysqli_query($db, $consultaTotal);
        $suma = mysqli_fetch_assoc($resultadoTotal);
        $subtotal = $suma['subtotal'];
    }

    //ELIMINAR PRODUCTO
    if(isset($_POST['eliminar'])){
        
        $id_producto = $_POST['id_producto'];
        $id_producto = filter_var($id_producto, FILTER_VALIDATE_INT);
        $id_carrito = $_POST['id_carrito'];
        $id_carrito = filter_var($id_carrito, FILTER_VALIDATE_INT);

        if($id_producto)
        {
            $eliminarProducto = "DELETE FROM carrito_producto WHERE id_producto = ${id_producto} AND id_carrito = ${id_carrito}";
            $resulEliminar = mysqli_query($db, $eliminarProducto);
        }

        if($resulEliminar)
        {
            header('Location: carrito.php');
        }
    }
?>