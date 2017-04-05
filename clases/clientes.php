<?php

require_once 'conexion.php';
/*
 * Gestión subscripción
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

    public function comprobarmail($param) {
        $sql = "select * from clientes where email='" . $this->con->real_escape_string($param) . "';";
        $result = $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            while ($res = $result->fetch_assoc()) {
                return $res['activo'];
            }
            
        } else {
            return 'ok';
        }
    }

    public function setcliente($param) {
        $sql = "insert into clientes(email,local) values('" . $this->con->real_escape_string($param) . "','" . $this->local . "')";
        return $result = $this->con->query($sql);
    }

    public function getcodigo($mail, $promo) {
        $codigo = self::generarcodigo($mail);
        $sql = "insert into codigo(promocion,codigo,fecha,mail,local) values(" . $this->con->real_escape_string($promo) . ",'" . $codigo . "',CURDATE(),'" . $this->con->real_escape_string($mail) . "','" . $this->local . "')";
        if ($this->con->query($sql)) {
            $sql = "select nombre, descripcion from promo where id=" . $promo;
            $result = $this->con->query($sql);
            if ($this->con->affected_rows > 0) {
                while ($res = $result->fetch_assoc()) {
                    $datos['nombre'] = $res['nombre'];
                    $datos['descripcion'] = $res['descripcion'];
                }
            }
            $datos['codigo'] = $codigo;
            return $datos;
        }
    }

    public function getofertas() {
        $sql = "SELECT nombre , descripcion, id , fecha,(TO_DAYS( CURDATE()) - TO_DAYS(fecha )) AS dias FROM promo  where local='$this->local' ";
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

    public function getoferta($id) {
        $sql = "SELECT * FROM promo where id =$id ";
        $result = $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            while ($res = $result->fetch_assoc()) {
                $descripcion = $res['descripcion'];
            }
            return $descripcion;
        } else {
            return false;
        }
    }

    public function comprobarmailcodigo($param) {
        /* método que comprueba si el cliente ya solicitó el código de la promoción correspondiente  */
        $sql = "select * from codigo where promocion='" . $this->con->real_escape_string($param['promocion']) . "' and mail='" . $this->con->real_escape_string($param['email']) . "'";
        $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function validarcodigo($codigo) {
        $sql = "select codigo.promocion,codigo.codigo,(TO_DAYS( CURDATE()) - TO_DAYS(codigo.fecha )) AS dias,codigo.usado,promo.nombre,promo.descripcion from codigo inner join promo on codigo.promocion=promo.id where codigo.codigo='" . $codigo . "'";
        $result = $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            while ($res = $result->fetch_assoc()) {
                if ($res['dias'] > 30) {
                    return '<h3 class="text-center">Código caducado</h3>';
                }
                if ($res['usado'] == "S") {
                    return '<h3 class="text-center">Este código ya ha sido canjeado</h3>';
                }
                if ($res['dias'] < 30 && $res['usado'] == "N") {
                    
                    $sql="UPDATE codigo SET usado='S', fechcanj=NOW() WHERE codigo='".$codigo."';";
                    $this->con->query($sql);
                    return '<h3 class="text-center">'.$res["nombre"].'</h3><p class="text-center">'.$res["descripcion"].'</p>';
                }
            }
        } else {
            return '<h3 class="text-center">Código erróneo</h3>';
        }
    }
    
    public function borrarcliente($email) {
        $sql="update clientes set activo='N' WHERE email='".$email."'";
        $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            return true;
        }
        else{
            return false;
        }
    }
    public function activarcliente($email) {
        $sql="update clientes set activo='S' WHERE email='".$email."'";
        $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            return true;
        }
        else{
            return false;
        }
    }

    private static function generarcodigo($mail) {
        $fecha = new DateTime();
        $time = md5($fecha->getTimestamp());
        $str1 = substr($time, -6);
        $str2 = substr($mail, 0, 4);
        $codigo = md5($str1 . $str2);
        $codigo = substr($codigo, 0, 5);
        return $codigo;
    }

}
