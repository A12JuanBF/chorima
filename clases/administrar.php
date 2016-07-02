<?php

require 'conexion.php';

/**
 * clase para introducir nuevos platos, modificarlos y gestionar la suscripción de los clientes
 *
 * @author JuanDiego
 */
class administrar extends conexion {
    private $local;

    public function __construct($local) {
        parent::__construct();
        $this->local = $local;
    }

    public function platonuevo($param) {
        //$param = $this->filtro->process($param);
        $sql = "INSERT INTO platos (nombre,descripcion,precio,tipo,imagen,local,descripciongl,descripcionen,nombreen,nombregl)
VALUES ('" . $this->con->real_escape_string($param['nombre']) . "','" . $this->con->real_escape_string($param['descripcion']) . "'," . $this->con->real_escape_string($param['precio']) . ",'" . $this->con->real_escape_string($param['categoria']) . "','" . $this->con->real_escape_string($param['imagen']) . "','" . $this->local . "','" . $this->con->real_escape_string($param['descripciongl']) ."','" . $this->con->real_escape_string($param['descripcionen']) ."','" . $this->con->real_escape_string($param['nombreen']) ."','" . $this->con->real_escape_string($param['nombregl']) ."' );";
        return $result = $this->con->query($sql);
    }

    public function subirImg($param) {
        $file = $param["fichero"];
        $fecha = new DateTime();
        $tipo = $file["type"];
        if ($tipo == 'image/jpg' || $tipo == 'image/jpeg' || $tipo == 'image/png' || $tipo == 'image/gif') {
            $nombre = $fecha->getTimestamp() . $file["name"];
            $ruta_provisional = $file["tmp_name"];
            if ($this->local = "idfn") {
                $carpeta = "../../../ildolce/img-platos/";
            }
            $src = $carpeta . $nombre;
            move_uploaded_file($ruta_provisional, $src);
            echo $nombre;
        } else {
            return false;
        }
    }


    public function nuevacategoria($param) {
        $sql = "INSERT INTO carta (nombre,local,nombregl,nombreen)
VALUES ('" . $this->con->real_escape_string($param['tipo']) . "','" . $this->local . "','" . $this->con->real_escape_string($param['tipogl']) . "','" . $this->con->real_escape_string($param['tipoen']) . "');";
        return $result = $this->con->query($sql);
    }

    public function mostrarcarta() {
        $sql = "select * from carta where local='$this->local'";
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

    public function borrarcategoria($param) {
        $sql = "DELETE FROM carta WHERE id=" . $this->con->real_escape_string($param);
        return $result = $this->con->query($sql);
    }
    
    public function mostrarplatospag($param) {
        $sql = "select * from platos where local='".$this->local."' and tipo='".$this->con->real_escape_string($param)."';";
        $result = $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            while ($res = $result->fetch_assoc()) {
                $search[] = $res;
            }
            return json_encode($search);
        } else {
            echo 'No hay platos en esta categoría';
        }
    }
    public function modificarplato($param) {
        $sql="UPDATE platos SET nombre='".$this->con->real_escape_string($param['nombre'])."', descripcion='".$this->con->real_escape_string($param['descripcion'])."', precio='".$this->con->real_escape_string($param['precio'])."', tipo='".$this->con->real_escape_string($param['categoria'])."' , nombregl='".$this->con->real_escape_string($param['nombregl'])."' , nombreen='".$this->con->real_escape_string($param['nombreen'])."' , descripciongl='".$this->con->real_escape_string($param['descripciongl'])."' , descripcionen='".$this->con->real_escape_string($param['descripcionen'])."'  WHERE id=".$this->con->real_escape_string($param['id']);
        return $result = $this->con->query($sql);     
    }
    
    public function modificarimagen($param,$arr) {
        @$img=$arr['imagen'];
        $id=$arr['id'];
        if ($this->local = "idfn") {
        @unlink("../../../ildolce/img-platos/".$img."");
        }
        @$file = $param["fichero"];
        $fecha = new DateTime();
        $tipo = $file["type"];
        if ($tipo == 'image/jpg' || $tipo == 'image/jpeg' || $tipo == 'image/png' || $tipo == 'image/gif') {
            $nombre = $fecha->getTimestamp() . $file["name"];
            $ruta_provisional = $file["tmp_name"];
            if ($this->local = "idfn") {
                $carpeta = "../../../ildolce/img-platos/";
            }
            $src = $carpeta . $nombre;
            move_uploaded_file($ruta_provisional, $src);
            $sql="UPDATE platos SET imagen='".$nombre."' where id=".$id;
            $result = $this->con->query($sql);
            
            echo $nombre;            
            
        } else {
            return false;
        }
    }
    public function borrarplato($param) {
        if ($this->local = "idfn") {
        @unlink("../../../ildolce/img-platos/".$param['imagen']."");
        }
        $sql = "DELETE FROM platos WHERE id=" . $this->con->real_escape_string($param['id']);
        return $result = $this->con->query($sql);
    }

}
