<?php

class Comprobante extends XML
{
    function __construct()
    {
        $this->atributos = [];
        $this->atributos['Version'] = '3.3';
        $this->atributos['Serie'] = '';
        $this->atributos['Folio'] = '';
        $this->atributos['Sello'] = ' ';
        $this->atributos['NoCertificado'] = '';
        $this->atributos['Certificado'] = ' ';
        $this->atributos['CondicionesDePago'] = '';
        $this->atributos['Descuento'] = '';
        $this->atributos['MotivoDescuento'] = '';
        $this->atributos['TipoCambio'] = '';
        $this->atributos['Moneda'] = '';
        $this->atributos['Total'] = '';
        $this->atributos['MetodoPago'] = 'PUE';
        $this->atributos['FormaPago'] = '';
        $this->atributos['TipoDeComprobante'] = '';
        $this->atributos['LugarExpedicion'] = '';
        $this->atributos['NumCtaPago'] = '';
        $this->atributos['FolioFiscalOrig'] = '';
        $this->atributos['SerieFolioFiscalOrig'] = '';
        $this->atributos['FechaFolioFiscalOrig'] = '';
        $this->atributos['MontoFolioFiscalOrig'] = '';
        $this->rules = [];
        $this->rules['Version'] = 'R';
        $this->rules['Serie'] = 'O';
        $this->rules['Folio'] = 'O';
        $this->rules['Sello'] = 'R';
        $this->rules['MetodoPago'] = 'R';
        $this->rules['FormaPago'] = 'R';
        $this->rules['NoCertificado'] = 'R';
        $this->rules['Certificado'] = 'R';
        $this->rules['CondicionesDePago'] = 'O';
        $this->rules['Descuento'] = 'O';
        $this->rules['MotivoDescuento'] = 'O';
        $this->rules['TipoCambio'] = 'O';
        $this->rules['Moneda'] = 'R';
        $this->rules['Total'] = 'R';
        $this->rules['TipoDeComprobante'] = 'R';
        $this->rules['LugarExpedicion'] = 'R';
        $this->rules['NumCtaPago'] = 'O';
        $this->rules['FolioFiscalOrig'] = 'O';
        $this->rules['SerieFolioFiscalOrig'] = 'O';
        $this->rules['FechaFolioFiscalOrig'] = 'O';
        $this->rules['MontoFolioFiscalOrig'] = 'O';

        /* se agregan más atributos */
        $this->atributos['SubTotal'] = '';
        $this->atributos['Fecha'] = '';
        $this->rules['SubTotal'] = 'R';
        $this->rules['Fecha'] = 'R';
    }
}
