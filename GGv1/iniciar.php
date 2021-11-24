<?php

include "con_db.php";
session_start();

$db = conectarServidor();

$index = 'index.php';

if (isset($_POST['enviar']))
{
    if (strlen($_POST['email']) >= 1 && strlen($_POST['contraseña']) >= 1)
    {
        $consulta = "SELECT email AND contraseña='contraseña' FROM datos WHERE email='email'";
        $resultado = mysqli_query($db, $consulta);

        if (count($resultado) && password_verify($_POST['contraseña'], $results['contraseña']))
        {
            $_SESSION['users_id'] = $results['id'];
            header("href = index.php");
        }
        else
        {
            ?>
            <h3 class = "bad">¡Los valores ingresados no coinciden!</h3>
            <?php
        }
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