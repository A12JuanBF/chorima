<?php

require '../../clases/eventos.php';


if (!empty($_GET['op'])) {
    switch ($_GET['op']) {
        case 1:
            $eventonuevo = new eventos("chor");
            if ($eventonuevo->crearevento($_FILES, $_POST)) {
                echo 'Evento creado';
            } else {
                echo 'ATENCIÓN! Ha ocurrido un error';
            }



            break;
        case 2:
            $actualizarevento = new eventos("chor");
            if ($actualizarevento->seteventos($_POST)) {
                echo 'Evento modificado';
            } else {
                echo 'ATENCIÓN! Ha ocurrido un error';
            }
            break;

        case 3:
            $subirimagen= new eventos("chor");
            $subirimagen->setimagenes($_FILES, $_POST);
            
            break;
        
        case 4:
            $borrarevento=new eventos("chor");
            if($borrarevento->borrareventos($_POST)){
                echo 'Evento borrado';
            }else{
                echo 'ATENCIÓN! Ha ocurrido un error';
            }
            break;
    }
}

