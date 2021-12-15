<?php

// Conectar a la base de datos e incluirla.
include "con_db.php";

$db = conectarServidor();

// Verifica si se presionó el botón de enviar.
if (isset($_POST['agregar']))
{
    $id = $_POST['id'];
    // Verifica si los campos de registro no esten vacíos.
    if ($id)
    {
        // Obtenemos los valores.
        $modelo = $_POST['modelo'];
        $cantidad = $_POST['cantidad'];

        $consulta = "UPDATE producto SET cantidad = cantidad + $cantidad, modelo = $modelo WHERE producto.id = $id";
        $resultado = mysqli_query($db, $consulta);

        ?>
        <h3 class = "good">¡Se han almacenado <?php echo $cantidad ?> al inventario en el ID: <?php echo $id ?>!</h3>
        <?php
    }
}

?>