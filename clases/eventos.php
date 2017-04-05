<?php

require_once 'conexion.php';

/**
 * Clase para obtener los eventos en la web de A taberna da chorima
 *
 * @author JuanDiego
 */
class eventos extends conexion {

    private $local;

    public function __construct($local) {
        parent::__construct();
        $this->local = $local;
    }

    public function geteventos($num,$num2) {
        $sql = "select * from eventos where fecha >= CURDATE() and estado='Pendiente' order by fecha asc limit $num ,$num2 ;";
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

    public function geteventofinalizado($id) {
        if ($id != "default") {
            $sql = "select * from eventos where id=$id;";
        } else {
            $sql = "select * from eventos where estado='Finalizado' order by fecha desc;";
        }
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

    public function geteventopendiente($id) {
        $sql = "select * from eventos where id=".$id." limit 1;";
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

    public function paginareventos($id) {
        $sql = "select id  from eventos where estado='Finalizado' and id > $id order by fecha asc limit 1 ;";
        $result = $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            while ($res = $result->fetch_assoc()) {
                $search['Anterior'] = $res;
            }
        }
        $sql1 = "select id  from eventos where estado='Finalizado' and id < $id order by fecha desc limit 1 ;";
        $result1 = $this->con->query($sql1);
        if ($this->con->affected_rows > 0) {
            while ($res = $result1->fetch_assoc()) {
                $search['Siguiente'] = $res;
            }
        }
        return json_encode($search);
    }

    public function geteventosfinalizadosprev($num) {
        $sql = "select * from eventos where estado='Finalizado' order by fecha desc limit $num;";
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
