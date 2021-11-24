<?php

include "con_db.php";
$db = conectarServidor();

if (isset($_POST['enviar']))
{

    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['email']) >= 1 &&
        strlen($_POST['contraseña']) >= 1)
    {
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

        $consulta = "INSERT INTO datos(nombre, email, contraseña) VALUES ('$nombre','$email','$contraseña')";
        
        $resultado = mysqli_query($db, $consulta);
    }

    $resultado = '';

    if ($resultado)
    {
        ?>
        <h3 class = "ok">¡Te has registrado correctamente!</h3>
        <?php
    }
    else
    {
        ?>
        <h3 class = "bad">¡Ops! ¡Parece que algo no funciono!</h3>
        <?php
    }
}

?>