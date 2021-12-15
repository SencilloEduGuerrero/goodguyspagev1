<!-- Script #3 Notificacion !-->
<script>
   function registroIniciado()
   {
      alert("¡Se ha registrado la sesión!")
   }
</script>
<?php

// Conectar a la base de datos e incluirla.
include "con_db.php";
$db = conectarServidor();

// Verifica si se presionó el botón de enviar.
if (isset($_POST['enviar']))
{
    // Verifica si los campos de registro no esten vacíos.
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['contraseña']) >= 1)
    {
        // Obtenemos los valores.
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email'], FILTER_VALIDATE_EMAIL);
        $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
        $administrador = false;

        $queryVerificacion = "SELECT id FROM cliente WHERE email = $email";
        $verificacion = mysqli_query($db, $queryVerificacion);

        // Verificación del EMAIL --> NO FUNCIONA.
        if ($verificacion)
        {
            ?>
            <h3 class = "bad">¡El Email ya existe!</h3>
            <?php
        }
        else
        {
            $consulta = "INSERT INTO cliente(nombre, email, contraseña, administrador) VALUES ('$nombre','$email','$contraseña', '$administrador')";
            $resultado = mysqli_query($db, $consulta);

            $queryID = " SELECT id FROM cliente WHERE email = '${email}' ";
            $resultadoId = mysqli_query($db, $queryID);

            $cliente = mysqli_fetch_assoc($resultadoId);
            $clienteid = $cliente['id'];

            $queryCarrito = " INSERT INTO carrito (id_cliente) VALUES ($clienteid) ";
            $inserCarrito = mysqli_query($db, $queryCarrito);
            ?>

                <html>
                return registroIniciado();
                </html>

                <?php
            header('Location: sesion.php');
        }
    }
    // En caso de no haber un resultado, se mostrará un texto que indica si se registró o no.
    else if (!$_POST['nombre'])
    {
        ?>
        <h3 class = "bad">¡Nombre vacio!</h3>
        <?php
    }
    else if (!$_POST['email'])
    {
        ?>
        <h3 class = "bad">¡Email vacío!</h3>
        <?php
    }
    else if (!$_POST['contraseña'])
    {
        ?>
        <h3 class = "bad">¡Contraseña vacío!</h3>
        <?php
    }
}

if ($_SESSION)
{
    header('Location: index.php');
}

?>