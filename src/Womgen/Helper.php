<?php
    namespace Womgen;

    class Helper
    {
        /**
        * @link http://www.php.net/manual/tr/book.simplexml.php#108688
        * @param \SimpleXMLElement $obj
        * @return array
        */
        public static function Xml2Array(\SimpleXMLElement $obj)
        {
            $namespace = $obj->getDocNamespaces(true); 
            $namespace[NULL] = NULL; 

            $children = array(); 
            $attributes = array(); 
            $name = strtolower((string)$obj->getName()); 

            $text = trim((string)$obj); 
            if( strlen($text) <= 0 ) { 
                $text = NULL; 
            } 

            // get info for all namespaces 
            if(is_object($obj)) { 
                foreach( $namespace as $ns=>$nsUrl ) { 
                    // atributes 
                    $objAttributes = $obj->attributes($ns, true); 
                    foreach( $objAttributes as $attributeName => $attributeValue ) { 
                        $attribName = strtolower(trim((string)$attributeName)); 
                        $attribVal = trim((string)$attributeValue); 
                        if (!empty($ns)) { 
                            $attribName = $ns . ':' . $attribName; 
                        } 
                        $attributes[$attribName] = $attribVal; 
                    } 

                    // children 
                    $objChildren = $obj->children($ns, true); 
                    foreach( $objChildren as $childName=>$child ) { 
                        $childName = strtolower((string)$childName); 
                        if( !empty($ns) ) { 
                            $childName = $ns.':'.$childName; 
                        } 
                        $children[$childName][] = self::Xml2Array($child); 
                    } 
                } 
            } 

            return array( 
                'name'=>$name, 
                'text'=>$text, 
                'attributes'=>$attributes, 
                'children'=>$children 
            ); 
        }
    }
