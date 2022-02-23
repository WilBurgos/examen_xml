<?php

class XML
{
    /* Variables deben ser public */
    // protected $atributos;
    // protected $rules;
    public $atributos;
    public $rules;

    function __construct()
    {
        $this->atributos = array();
        $this->rules = array();
    }

    /* función como public */
    // protected function setSatFormat($value)
    public function setSatFormat($value)
    {
        $aux = trim(strip_tags($value));
        if (!XML::isUtf8($aux)) {
            $aux = utf8_encode($aux);
            if (!XML::isUtf8($aux))
                $aux = utf8_encode($aux);
        }
        $aux = htmlentities($aux, ENT_COMPAT | ENT_HTML401, 'UTF-8');
        $aux = str_ireplace(array(urldecode("%E2%80%9C"), urldecode("%E2%80%9D"), urldecode("%93"), urldecode("%94"), urldecode("%7C")), '"', $aux); //Se sustituye los caracteres �� por "
        $aux = str_ireplace(html_entity_decode("&mdash;", ENT_COMPAT | ENT_HTML401, 'UTF-8'), '&mdash;', $aux);
        $aux = str_ireplace(html_entity_decode("&ndash;", ENT_COMPAT | ENT_HTML401, 'UTF-8'), '&ndash;', $aux);
        $aux = html_entity_decode($aux, ENT_COMPAT | ENT_HTML401, 'UTF-8');
        $aux = str_ireplace('&', '&amp;', $aux);
        $aux = str_ireplace("'", '&apos;', $aux);
        $aux = str_ireplace("<", '&lt;', $aux);
        $aux = str_ireplace(">", '&gt;', $aux);
        $aux = str_ireplace('"', '&quot;', $aux);
        return $aux;
    }


    static function isUtf8($str)
    {
        return (bool)preg_match('%^(?:
                [\x09\x0A\x0D\x20-\x7E]            # ASCII
            | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
            |  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs
            | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
            |  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates
            |  \xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3
            | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
            |  \xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16
        )*$%xs', $str);
    }

    //Resolver funcionalidad
    /* función como public */
    // private function setAtribute($attr, $value)
    public function setAtribute($attr, $value)
    {
        /* Validar que que el atributo exista en en arreglo de atributos */
        // $this->atributos[] = ($attr != 'TipoDeComprobante') ? $this->setSatFormat($value) : $value;
        $this->atributos[$attr] = ($attr != 'TipoDeComprobante') ? $this->setSatFormat($value) : $value;
    }

    function getAtributes()
    {
        $conenido = '';
        foreach ($this->atributos as $key => $value) :
            if (($this->rules[$key] == 'R') && (strlen($this->atributos[$key]) <= 0)) :
                throw new Exception('Atributo ' . $key . ' de ' . get_class($this) . ' es requerido por el SAT');
            else :
                if ((($this->rules[$key] == 'O') || ($this->rules[$key] == 'R')) && (strlen($this->atributos[$key]) > 0))
                    $conenido .= $key . '="' . $value . '" ';
            endif;
        endforeach;
        return $conenido;
    }
}
