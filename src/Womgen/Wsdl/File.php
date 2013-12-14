<?php
    namespace Womgen\Wsdl;

    class File extends \SimpleXMLElement
    {
        public function ToArray()
        {
            return \Womgen\Helper::Xml2Array($this);
        }

        public function GetComplexTypes(){}
        public function GetMethods(){}
        public function GetEndPoints(){}

    }