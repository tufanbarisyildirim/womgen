<?php
    namespace Womgen;
    
    class Womgen
    {
        public static function GenerateModels($wsdl,$folder)
        {
                $var = simplexml_load_file($wsdl);
              //$var->xpath('//wsdl:definitions/wsd:types')     
        }
    }