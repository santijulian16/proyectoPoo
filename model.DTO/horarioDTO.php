<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HorarioDTO {
    private $gru_codigo = 0;
    private $fecha = "";
    private $hora_inicio = "";
    private $hora_fin = "";
    private $sal_codigo = "";
    private $pa_codigo = "";
    
    function __construct() {
        
    }
    
    function getGru_codigo() {
        return $this->gru_codigo;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora_inicio() {
        return $this->hora_inicio;
    }

    function getHora_fin() {
        return $this->hora_fin;
    }

    function getSal_codigo() {
        return $this->sal_codigo;
    }

    function getPa_codigo() {
        return $this->pa_codigo;
    }

    function setGru_codigo($gru_codigo) {
        $this->gru_codigo = $gru_codigo;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora_inicio($hora_inicio) {
        $this->hora_inicio = $hora_inicio;
    }

    function setHora_fin($hora_fin) {
        $this->hora_fin = $hora_fin;
    }

    function setSal_codigo($sal_codigo) {
        $this->sal_codigo = $sal_codigo;
    }

    function setPa_codigo($pa_codigo) {
        $this->pa_codigo = $pa_codigo;
    }
}
