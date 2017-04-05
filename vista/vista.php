<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vista
 *
 * @author JuanDiego
 */
class vista {
    
    public function cabecera($inicio) {
        if(isset($inicio) && $inicio=="inicio")
        {
        require_once 'bloqueshtml/cabecera.php';
        }
        if(isset($inicio) && $inicio=="default"){
            require_once '../bloqueshtml/cabecera.php';
        }
    }
    
    public function pie() {
        require_once '../bloqueshtml/pie.php';
    }
    
    public function eventosinicio() {
        require_once 'bloqueshtml/eventosindex.php';
    }
    public function eventos() {
         require_once '../bloqueshtml/listareventos.php';
    }
    public function twitter() {
         require_once '../bloqueshtml/twitterline.html';
    }
    public function facebooktimeline() {
         require_once '../bloqueshtml/facebooktimeline.html';
    }
    public function mensajecookies() {
        require_once '../bloqueshtml/cookiesmensaje.html';
    }
    public function geteventosfinalizados($inicio) {
        if(isset($inicio) && $inicio=="inicio")
        {
        require_once 'bloqueshtml/eventosfinalizadoslist.php';
        }
        if(isset($inicio) && $inicio=="default"){
            require_once '../bloqueshtml/eventosfinalizadoslist.php';
        }
    }
    public function setopiniontripadvisor() {
        require_once '../bloqueshtml/tripadvisorsetopinion.html';
    }
    public function getcategoria() {
        require_once '../bloqueshtml/categoria.php';
    }
    public function getvistaplatos() {
        require_once '../bloqueshtml/platos.php';
    }
    public function getmeta($inicio) {
        if(isset($inicio) && $inicio=="inicio")
        {
        require_once 'bloqueshtml/meta.html';
        }
        if(isset($inicio) && $inicio=="default"){
            require_once '../bloqueshtml/meta.html';
        }
        
    }
    public function googleanalitycs($inicio) {
        if(isset($inicio) && $inicio=="inicio")
        {
        require_once 'bloqueshtml/googleanalitica.html';
        }
        if(isset($inicio) && $inicio=="default"){
            require_once '../bloqueshtml/googleanalitica.html';
        }
        
    }
    public function geticon($inicio) {
        if(isset($inicio) && $inicio=="inicio")
        {
        require_once 'bloqueshtml/icon.html';
        }
        if(isset($inicio) && $inicio=="default"){
            require_once '../bloqueshtml/icon.html';
        }
    }
    public function contactoartista() {
         require_once '../bloqueshtml/eventocontacto.php';
    }
    
    public function getscriptcompartir (){
        require_once '../bloqueshtml/twfacompartir.html';
    }
    public function tripadrecomienda() {
        require_once '../bloqueshtml/recomendadotripadvisor.html';
    }
    public function getopiniontripad() {
        require_once '../bloqueshtml/opinionestripad.html';
    }
    public function getdisqus() {
        require_once '../bloqueshtml/disqus.html';
    }
}
