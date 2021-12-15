<?php

include "con_db.php";

$db = conectarServidor();

if (isset($_POST['enviar']))
{
    if(!empty($_POST['email']) && !empty($_POST['contraseña']))
    {
        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ;
        $contraseña = mysqli_real_escape_string($db, $_POST['contraseña']);

        $query = "SELECT * FROM cliente WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows)
        {
            $user = mysqli_fetch_assoc($resultado);
            $auth = password_verify($contraseña, $user['contraseña']);

            if($auth)
            {
                session_start();
                $_SESSION['email'] = $user['email'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['login'] = true;
                $_SESSION['administrador'] = $administrador;
                $_SESSION['nombre'] = $user['nombre'];

                $id_usuario = $_SESSION['id'];

                $query2 = "SELECT id FROM carrito WHERE id_cliente = '$id_usuario'";
                $resultado2 = mysqli_query($db, $query2);

                $karrito = mysqli_fetch_assoc($resultado2);
                $_SESSION['id_carrito'] = $karrito['id'];

                header('Location: index.php');
            }
            else
            {
                ?>
                <h3 class = "bad">¡Los valores ingresados no coinciden!</h3>
                <?php
            }
        }
        else
        {
            ?>
            <h3 class = "bad">¡Los valores ingresados no coinciden!</h3>
            <?php
        }
    }
    else if (!$_POST['email'])
    {
        ?>
        <h3 class = "bad">¡Email vacio!</h3>
        <?php
    }
    else if (!$_POST['contraseña'])
    {
        ?>
        <h3 class = "bad">¡Contraseña vacía!</h3>
        <?php
    }
}

?>