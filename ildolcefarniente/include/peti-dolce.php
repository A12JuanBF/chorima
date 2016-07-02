<?php

require '../../clases/administrar.php';

/*
 * Archivo php de control entre las clases y las peticiones ajax
 */
if (!empty($_GET['op'])) {
    switch ($_GET['op']) {
        case 1:

            $insertar = new administrar("idfn");
            if ($insertar->platonuevo($_POST)) {
                echo 'Plato introducido';
            } else {
                echo 'ATENCIÓN! Ha ocurrido un error, no se ha introducido el plato';
            }
            break;

        case 2:

            $subirimg = new administrar("idfn");
            $subirimg->subirImg($_FILES);
            break;
        case 3:

            $nuevacategoria = new administrar("idfn");
            if ($nuevacategoria->nuevacategoria($_POST)) {
                echo 'Categoría nueva creada';
            } else {
                echo 'No se ha podido crear la categoría';
            }
            break;

        case 4:

            $borrar = new administrar("idfn");
            if ($borrar->borrarcategoria($_POST['id'])) {
                echo 'Categoría borrada';
            } else {
                echo 'No se ha podido borrar la categoría';
            }
            break;

        case 5:
            $modificar = new administrar("idfn");
            if ($modificar->modificarplato($_POST)) {
                echo 'Plato modificado';
            } else {
                echo 'No se ha podido modificar el plato';
            }
        case 6:
            $modimg = new administrar("idfn");

            echo $modimg->modificarimagen($_FILES, $_POST);

            break;
        case 7:
            $borrar=new administrar("idfn");
            
            if($borrar->borrarplato($_POST))
            {
                echo 'Plato borrado';
            }
            else{
                echo 'Ha ocurrido un error, NO se ha podido borrar el plato';
            }
            break;
    }
}
