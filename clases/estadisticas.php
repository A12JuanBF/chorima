<?php
require 'conexion.php';
/*
 
 */

/**
 * Description of estadisticas
 *
 * @author JuanDiego
 */
class estadisticas extends conexion {
    private $local;

    public function __construct($local) {
        parent::__construct();
        $this->local = $local;
    }
    
    public function getnumclientes() {
        $sql="select email, count(email) as numero from clientes where activo='S' and tipo='cliente' and local='".$this->local."'";
        $result = $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            while ($res = $result->fetch_assoc()) {
                $numero= $res['numero'];
            }
            return $numero ;
        } else {
            return false;
        }
    }
    
    public function getofertadatos($id) {
        $sql="select codigo.promocion,count(codigo.codigo) as cantidad,codigo.mail as mail, codigo.fechcanj as fechcanj, promo.nombre,promo.descripcion,promo.importe as importe,promo.id,sum(promo.importe) as importetotal,codigo.usado from codigo inner join promo on codigo.promocion=promo.id and codigo.promocion=$id and codigo.local='".$this->local."'";
        $result = $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            while ($res = $result->fetch_assoc()) {
                $search[]= $res;
            }
            return $search ;
        } else {
            return false;
        }
    }
    
    public function getofertas() {
        $sql="select * from promo where local='".$this->local."'";
        $result = $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            while ($res = $result->fetch_assoc()) {
                $search[]= $res;
            }
            return $search ;
        } else {
            return false;
        }
    }
    public function getnumcodigocanjeado($id) {
        $sql="select count(codigo) as canjeado from codigo where usado='S' and promocion=$id";
        $result = $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            while ($res = $result->fetch_assoc()) {
                $numero= $res['canjeado'];
            }
            return $numero ;
        } else {
            return false;
        }
    }
    public function getnumofertasolicitada($id) {
        $sql="select count(codigo) as canjeado from codigo where promocion=$id";
        $result = $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            while ($res = $result->fetch_assoc()) {
                $numero= $res['canjeado'];
            }
            return $numero ;
        } else {
            return false;
        }
    }
    public function getfacturacion() {
        $sql="select  sum(promo.importe) as facturacion from codigo , promo where promo.id=codigo.promocion and codigo.usado='S' and promo.local='".$this->local."'";
        $result = $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            while ($res = $result->fetch_assoc()) {
                $numero= $res['facturacion'];
            }
            return $numero ;
        } 
    }
    public function getcodigo($id) {
        $sql="select * from codigo where promocion=".$id." and local='".$this->local."'";
        $result = $this->con->query($sql);
        if ($this->con->affected_rows > 0) {
            while ($res = $result->fetch_assoc()) {
                $search[]= $res;
            }
            return $search ;
        } else {
            return false;
        }
    }
}
