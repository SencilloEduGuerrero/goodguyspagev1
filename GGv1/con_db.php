<?php
    function conectarServidor() : mysqli
    {
        $db = mysqli_connect('localhost', 'root', '', 'goodguysregistros');
        $db->set_charset('utf8');
        if(!$db)
        {
            echo "No se ha podido conectar a la base de datos";
            exit;
        }
        return $db;
    }
?>