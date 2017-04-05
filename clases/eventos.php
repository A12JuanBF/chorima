<?php

include 'conexion.php';
@include '../../include/notificacionevento.php';
@include '../../include/meses.php';

/**
 * Clase para crear y modificar los eventos
 *
 * @author JuanDiego
 */
class eventos extends conexion {

    private $local;

    public function __construct($local) {
        parent::__construct();
        $this->local = $local;
    }

    public function crearevento($fil, $param) {
        $file = $fil["fichero"];
        $fecha = new DateTime();
        $tipo = $file["type"];
        if ($tipo == 'image/jpg' || $tipo == 'image/jpeg' || $tipo == 'image/png' || $tipo == 'image/gif') {
            $nombre = $fecha->getTimestamp() . $file["name"];
            $ruta_provisional = $file["tmp_name"];
            if ($this->local = "idfn") {
                $carpeta = "../../../img-eventos/";
            }
            if ($this->local = "chor") {
                $carpeta = "../../../atabernadachorima.es/img-eventos/";
            }
            $src = $carpeta . $nombre;
            move_uploaded_file($ruta_provisional, $src);
            if ($param['video'] != "") {
                $video = $param['video'];

                $string = explode("https://", $video);
                $substring = explode("/", $string[1]);
                $strfinal = $substring[1];
            } else {
                $strfinal = "";
            }

            $sql = "INSERT INTO eventos (nombre,local,tipo,descripcion,imagenperfil,link,fecha,hora,video)
VALUES ('" . $this->con->real_escape_string($param['nombre']) . "','" . $this->local . "','" . $this->con->real_escape_string($param['tipo']) . "','" . $this->con->real_escape_string($param['descripcion']) . "','" . $nombre . "','" . $this->con->real_escape_string($param['link']) . "','" . $this->con->real_escape_string($param['fecha']) . "','" . $this->con->real_escape_string($param['hora']) . "','" . $this->con->real_escape_string($strfinal) . "');";
            $result = $this->con->query($sql);
            //return notificacion("jdbermejofdez@gmail.com");
            $sql2 = "SELECT MAX(id) AS id FROM eventos;";
            $result2 = $this->con->query($sql2);
            if ($this->con->affected_rows > 0) {
                while ($res = $result2->fetch_assoc()) {
                    $id = $res['id'];
                }
                $arrhora = explode(":", $param['hora']);
                $arrfecha = explode("-", $param['fecha']);
                $dia = $arrfecha[2];
                $mes = $arrfecha[1];
                $mes = getmes($mes);
                $hora = $arrhora[0] . ":" . $arrhora[1];
                $fecha = $dia . "/" . $mes;
                $search = [
                    "id" => $id,
                    "nombre" => $param['nombre'],
                    "descripcion" => $param['descripcion'],
                    "tipo" => $param['tipo'],
                    "imagenperfil" => $nombre,
                    "fecha" => $fecha,
                    "hora" => $hora
                ];
                $sql3 = "select email from clientes where local='" . $this->local . "' and activo='S' order by nombre asc";
                $result3 = $this->con->query($sql3);
                if ($this->con->affected_rows > 0) {
                    while ($res2 = $result3->fetch_assoc()) {
                        notificacion($res2['email'], $search);
                    }
                    return true;
                }
            }
        } else {
            return false;
        }
    }

    public function geteventos($param, $inicio, $fin) {
        if ($param == "Pendiente") {
            $orden = "ASC";
        } else {
            $orden = "DESC";
        }
        $sql = "select * from eventos where estado='" . $this->con->real_escape_string($param) . "' and local='" . $this->local . "'order by fecha $orden LIMIT $inicio,$fin ";
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

    public function seteventos($param) {
        $critica = nl2br($this->con->real_escape_string($param['critica']));
        if ($param['video'] != "") {
            $video = $param['video'];

            $string = explode("https://", $video);
            $substring = explode("/", $string[1]);
            $strfinal = $substring[1];
        } else {
            $strfinal = "";
        }
        $sql = "UPDATE eventos SET nombre='" . $this->con->real_escape_string($param['nombre']) . "',tipo='" . $this->con->real_escape_string($param['tipo']) . "',descripcion='" . $this->con->real_escape_string($param['descripcion']) . "' , critica='" . $critica . "' , link='" . $this->con->real_escape_string($param['link']) . "' , fecha='" . $this->con->real_escape_string($param['fecha']) . "' , hora= '" . $this->con->real_escape_string($param['hora']) . "' , estado='" . $this->con->real_escape_string($param['estado']) . "' , video='" . $strfinal . "'  WHERE id=" . $this->con->real_escape_string($param['id']) . ";";
        return $result = $this->con->query($sql);
    }

    public function paginadoreventos($param) {
        $sql = "select * from eventos where estado='" . $this->con->real_escape_string($param) . "' and local='" . $this->local . "'";
        $this->con->query($sql);
        return $this->con->affected_rows;
    }

    public function setimagenes($param, $arr) {
        $campo = $arr['campo'];
        @$img = $arr['imagen'];
        $id = $arr['id'];

        if ($this->local = "idfn") {
            @unlink("../../../img-eventos/" . $img . "");
        }
        if ($this->local = "chor" && $img != "") {
            @unlink("../../../atabernadachorima.es/img-eventos/" . $img . "");
        }
        @$file = $param[$campo];
        $fecha = new DateTime();
        $tipo = $file["type"];
        if ($tipo == 'image/jpg' || $tipo == 'image/jpeg' || $tipo == 'image/png' || $tipo == 'image/gif') {
            $nombre = $fecha->getTimestamp() . $file["name"];
            $ruta_provisional = $file["tmp_name"];
            if ($this->local = "idfn") {
                $carpeta = "../../../img-eventos/";
            }
            if ($this->local = "chor") {
                $carpeta = "../../../atabernadachorima.es/img-eventos/";
            }
            $src = $carpeta . $nombre;
            move_uploaded_file($ruta_provisional, $src);
            $sql = "UPDATE eventos SET $campo='" . $nombre . "' where id=" . $id;
            $result = $this->con->query($sql);

            echo $nombre;
        } else {
            return false;
        }
    }

    public function borrareventos($param) {
        if ($param['imagenperfil'] != "") {
            @unlink("../../../atabernadachorima.es/img-eventos/" . $param['imagenperfil'] . "");
        }
        if ($param['imagen1'] != "") {
            @unlink("../../../atabernadachorima.es/img-eventos/" . $param['imagen1'] . "");
        }
        if ($param['imagen2'] != "") {
            @unlink("../../../atabernadachorima.es/img-eventos/" . $param['imagen2'] . "");
        }
        if ($param['imagen3'] != "") {
            @unlink("../../../atabernadachorima.es/img-eventos/" . $param['imagen3'] . "");
        }
        if ($param['imagen4'] != "") {
            @unlink("../../../atabernadachorima.es/img-eventos/" . $param['imagen4'] . "");
        }
        $sql = "DELETE FROM eventos WHERE id=" . $param['id'];
        return $result = $this->con->query($sql);
    }

}
