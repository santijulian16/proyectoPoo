<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class salonDTO {
    private $codigo = 0;
    private $nombre = "";
    private $estado = "";
    private $edi_codigo = 0;
    
    function __construct() {
        
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEstado() {
        return $this->estado;
    }

    function getEdi_codigo() {
        return $this->edi_codigo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setEdi_codigo($edi_codigo) {
        $this->edi_codigo = $edi_codigo;
    }
}
