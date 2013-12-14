<?php
    namespace Womgen;

    class Womgen
    {
        public $wsdl;

        public function __construct($wsdl)
        {
            $this->wsdl = $wsdl;      
        }
        
        public function GenerateModels($folder = null)
        {
            /** 
            *@var \Womgen\WsdlElement
            */
            $var = simplexml_load_file($this->wsdl,'\Womgen\WsdlElement');
            echo '<pre>';
            $xml_array = $var->ToArray();
            echo var_export($xml_array);
        }
}