<?php

class Emisor extends XML
{

    /* no se está ocupando */
    // public $regimenFiscal;

    /* funcion como public */
    // protected function __construct()
    public function __construct()
    {
        $this->atributos = [];
        $this->atributos['Nombre'] = '';
        $this->atributos['RegimenFiscal'] = '';
        $this->rules = [];
        $this->rules['Nombre'] = 'R';
        $this->rules['RegimenFiscal'] = 'R';

        /*Se agregan atributos y reglas faltantes */
        $this->atributos['Rfc'] = '';
        $this->rules['Rfc'] = 'R';
    }

    public function getNode()
    {
        $xml = '<cfdi:Emisor ' . $this->getAtributes() . ' />';
        return $xml;
    }
}
