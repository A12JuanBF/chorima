<?php

/*
  Archivo que controla peticiones ajax
 */
include '../clases/clientes.php';
include 'mailsuscrip.php';

if (!empty($_GET['op'])) {
    switch ($_GET['op']) {

        case 1:
            $cliente = new clientes('chor');
            $activo=$cliente->comprobarmail($_POST['email']);
            if ($activo !='ok') {
                //echo $_POST['email'];
                
               if($activo=='S')
                {
                echo 'mailusado';
                }
                 if($activo=='N')
                 {
                     $cliente->activarcliente($_POST['email']);
                     echo 'activado';
                 }
                
            } if ($activo =='ok') {
                if ($cliente->setcliente($_POST['email'])) {
                    $datos = $cliente->getcodigo($_POST['email'], 1);
                    $bienv = bienvenida($_POST['email'], $datos);
                }
            }
            break;

        case 2:
            $promo = new clientes('chor');
            echo $promo->getoferta($_POST['id']);

            break;

        case 3:
            $cliente = new clientes('chor');
            if ($_POST['promocion'] != 0) {
                $activo=$cliente->comprobarmail($_POST['email']);
                if ($activo=='S') {
                    if ($cliente->comprobarmailcodigo($_POST)) {
                        $datos = $cliente->getcodigo($_POST['email'], $_POST['promocion']);
                        $bienv = enviarcodigo($_POST['email'], $datos);
                    } else {
                        echo 'codigo';
                    }
                } else {
                    echo 'nosuscrip';
                }
            }

            break;

        case 4:
            $codigo = new clientes('chor');
            echo $codigo->validarcodigo($_POST['codigo']);
            break;
        
        case 5:
            $cliente = new clientes('chor');
            
            if($cliente->borrarcliente($_POST['email'])){
                echo '<p>Grazas por usar o noso servizo, podes volver a suscribirte cando queiras</p>';
            }else{
                echo '<p>Email non encontrado</p>';
            }
            
        break;
    }
        
}

