<?php


require '../../clases/clientes.php';
require '../../include/enviarpromo.php';
/*
 * Archivo php de control entre las clases y las peticiones ajax
 */
if (!empty($_GET['op'])) {
    switch ($_GET['op']) {
        case 1:

            $insertar = new clientes("chor");
            if ($insertar->setmedio($_POST)) {
                echo 'Medio de comunicación introducido';
            } else {
                echo 'ATENCIÓN! Ha ocurrido un error, no se ha introducido el medio de comunicación';
            }
            break;

        case 2:
            $insertar = new clientes("chor");
            if ($insertar->setpromo($_POST)) {
                $clientes=json_decode($insertar->getmedios("cliente"));
                foreach ($clientes as $value) {
                    enviarpromo($value->email, $_POST);
                }
            } else {
                echo 'error';
            }
            break;
    }
}

