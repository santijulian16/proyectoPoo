<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuarioDTO {
    private $codigo = 0;
    private $nombre = "";
    private $apellido= "";
    private $documento = "";
    private $clave = "";
    
    function __construct() {
        
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getClave() {
        return $this->clave;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }
    function getApellido() {
        return $this->apellido;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }


}
