<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GrupoDTO {
    private $codigo = 0;
    private $cod_materia = 0;
    private $numero_grupo = 0;
    private $pl_codigo = 0;
    private $capacidad = 0;
    private $codigo_docente = 0;
    private $inscritos = 0;
    private $pa_codigo = 0;
    
    function __construct() {
        
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getCod_materia() {
        return $this->cod_materia;
    }

    function getNombre_grupo() {
        return $this->nombre_grupo;
    }

    function getPl_codigo() {
        return $this->pl_codigo;
    }

    function getCapacidad() {
        return $this->capacidad;
    }

    function getCodigo_docente() {
        return $this->codigo_docente;
    }

    function getInscritos() {
        return $this->inscritos;
    }

    function getPa_codigo() {
        return $this->pa_codigo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setCod_materia($cod_materia) {
        $this->cod_materia = $cod_materia;
    }

    function setNombre_grupo($nombre_grupo) {
        $this->nombre_grupo = $nombre_grupo;
    }

    function setPl_codigo($pl_codigo) {
        $this->pl_codigo = $pl_codigo;
    }

    function setCapacidad($capacidad) {
        $this->capacidad = $capacidad;
    }

    function setCodigo_docente($codigo_docente) {
        $this->codigo_docente = $codigo_docente;
    }

    function setInscritos($inscritos) {
        $this->inscritos = $inscritos;
    }

    function setPa_codigo($pa_codigo) {
        $this->pa_codigo = $pa_codigo;
    }
    
}
