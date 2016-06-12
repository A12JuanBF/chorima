<?php

include 'conexion.php';

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
        $sql = "INSERT INTO platos (nombre,descripcion,precio,tipo,imagen,local)
VALUES ('" . $this->con->real_escape_string($param['nombre']) . "','" . $this->con->real_escape_string($param['descripcion']) . "'," . $this->con->real_escape_string($param['precio']) . ",'" . $this->con->real_escape_string($param['categoria']) . "','" . $this->con->real_escape_string($param['imagen']) . "','" . $this->local . "');";
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
            return $nombre;
        } else {
            return false;
        }
    }

}
