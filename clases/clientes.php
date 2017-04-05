<?php
require 'conexion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clientes
 *
 * @author JuanDiego
 */
class clientes extends conexion {
    private $local;

    public function __construct($local) {
        parent::__construct();
        $this->local = $local;
    }
    
    public function setmedio($param) {
        $sql = "INSERT INTO clientes (nombre,email,tipo,local)
VALUES ('" . $this->con->real_escape_string($param['nombre']) . "','" . $this->con->real_escape_string($param['email']) . "','" . $this->con->real_escape_string($param['tipo']) . "','" . $this->local . "');";
        return $result = $this->con->query($sql);
    }
    public function getmedios($param) {
        $sql="select * from clientes where tipo='".$param."' and local='".$this->local."' and activo='S' order by nombre asc";
        $result = $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            while ($res = $result->fetch_assoc()) {
                $search[] = $res;
            }
            return json_encode($search);
        } else {
            return false;
        }
    }
    
    public function setpromo($param) {
        $sql="insert into promo (nombre,descripcion,fecha,importe,local) values ('".$param['nombre']."','".$param['descripcion']."',CURDATE(),".$param['importe'].",'$this->local')";
        return $result = $this->con->query($sql);
    }
    public function getofertas() {
        $sql="select * from promo order by fecha asc limit 10";
        $result = $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            while ($res = $result->fetch_assoc()) {
                $search[] = $res;
            }
            return json_encode($search);
        } else {
            return false;
        }
    }
}
