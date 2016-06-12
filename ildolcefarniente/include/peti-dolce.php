<?php
include '../../clases/administrar.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!empty($_GET['op'])) {
    switch ($_GET['op']) {
        case 1:
            $insertar= new administrar("idfn");
            return $insertar->platonuevo($_POST);
            break;
        
        case 2:
            $subirimg= new administrar("idfn");
            $subirimg->subirImg($_FILES);
            break;
    }
}
