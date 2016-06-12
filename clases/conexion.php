<?php
require_once 'class.inputfilter.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexion
 *
 * @author JuanDiego
 */
class conexion {
    protected $con;
    // con la propiedad filtro creamos un objeto de la class.inputfilter.php 
    // que filtrará los datos de entrada a la BD
    protected $filtro;
    public function __construct() {
            $mysqli = new mysqli('localhost', 'root', '', 'locales');
            if ($mysqli->connect_error) {
            die('Error de Conexión (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
            }
            $this->con=$mysqli;
            //$this->filtro = new InputFilter();
        }
}
