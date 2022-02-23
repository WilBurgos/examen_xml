<?php

include_once './CFDI.php';

class Main
{
    private $cfdi_xml;
    private $array_data = [
        "Comprobante" => [
            "LugarExpedicion" => "64000",
            "TipoDeComprobante" => "i",
            "Moneda" => "MXN",
            "SubTotal" => "100",
            "Total" => "116",
            "FormaPago" => "01",
            "NoCertificado" => "00000010101010101",
            "Fecha" => "2021-10-06 11:00:00"
        ],
        "Emisor" => [
            "Rfc" => "TME960709LR2",
            "Nombre" => "Tracto Camiones s.a de c.v",
            "RegimenFiscal" => "612"
        ]
    ];

    /* El método  __construct debe ser público*/
    // protected function __construct()
    public function __construct()
    {
        $this->cfdi_xml = new CFDI;
    }

    /* función createXML no debe estar static */
    // final public static function createXML()
    final public function createXML()
    {
        //Obtener el XML por medio de la clase XML
        foreach ($this->array_data as $key => $value) :
            if ($key != (string) 'Comprobante') :
                foreach ($value as $attribute => $value) :
                //Setear attributos
                $this->cfdi_xml->emisor->setAtribute($attribute,$value);
                endforeach;
            endif;
            /* enviar emisor para que se genere el XML */
            if ($key != (string) 'Emisor') :
                foreach ($value as $attribute => $value) :
                $this->cfdi_xml->comprobante->setAtribute($attribute,$value);
                endforeach;
            endif;
        endforeach;

        /* imprimir */
        echo $this->cfdi_xml->getNode();
    }
}

try {
    $main = new Main;
    $main->createXML();
} catch (\Exception $error) {
    echo $error->getMessage();
}
