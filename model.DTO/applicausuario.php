<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Applicausuario {
    private $cod_app = 0;
    private $cod_usu = 0;
    
    function __construct() {
        
    }
    function getCod_app() {
        return $this->cod_app;
    }

    function getCod_usu() {
        return $this->cod_usu;
    }

    function setCod_app($cod_app) {
        $this->cod_app = $cod_app;
    }

    function setCod_usu($cod_usu) {
        $this->cod_usu = $cod_usu;
    }

}
