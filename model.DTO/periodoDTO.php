<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PeriodoDTO {
    private $codigo = 0;
    private $nombre = "";
    private $fecha_ini = "";
    private $fecha_fin = "";
    
    function __construct() {
        
    }
    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFecha_ini() {
        return $this->fecha_ini;
    }

    function getFecha_fin() {
        return $this->fecha_fin;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFecha_ini($fecha_ini) {
        $this->fecha_ini = $fecha_ini;
    }

    function setFecha_fin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

}
