<?php

require_once 'conexion.php';
/*

 */

/**
 * Clase que devuelve platos y categorías
 *
 * @author JuanDiego
 */
class carta extends conexion {

    private $local;

    public function __construct($local) {
        parent::__construct();
        $this->local = $local;
    }

    public function getcategorias($lang) {
        if ($lang == "gl") {
            $sql = "select id, nombregl AS nombre from carta where local= '" . $this->local . "'";
        }
        if ($lang == "es") {
            $sql = "select id, nombre from carta where local= '" . $this->local . "'";
        }
        if ($lang == "en") {
            $sql = "select id, nombreen AS nombre from carta where local= '" . $this->local . "'";
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

    public function getplatos($cat, $lang) {
        //SELECT platos.nombre,platos.descripcion,platos.precio,platos.imagen FROM `platos` INNER JOIN `carta` ON platos.tipo=carta.nombre and carta.id=4 and platos.local='".$this->local."' ORDER BY platos.nombre ASC;
        if ($lang == "gl") {
            $sql = "SELECT platos.nombregl as nombre,platos.descripciongl as descripcion,platos.precio as precio,platos.imagen as imagen FROM platos INNER JOIN carta ON platos.tipo=carta.nombre and carta.id=$cat and platos.local='" . $this->local . "' ORDER BY platos.nombre ASC;";
        }
        if ($lang == "es") {
            $sql = "SELECT platos.nombre as nombre,platos.descripcion as descripcion,platos.precio as precio,platos.imagen as imagen FROM platos INNER JOIN carta ON platos.tipo=carta.nombre and carta.id=$cat and platos.local='" . $this->local . "' ORDER BY platos.nombre ASC;";
        }
        if ($lang == "en") {
            $sql = "SELECT platos.nombreen as nombre,platos.descripcionen as descripcion,platos.precio precio,platos.imagen as imagen FROM platos INNER JOIN carta ON platos.tipo=carta.nombre and carta.id=$cat and platos.local='" . $this->local . "' ORDER BY platos.nombre ASC;";
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

}
