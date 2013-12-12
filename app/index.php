<?php
    include 'config.php';
    
    //from : http://www.webservicex.net/geoipservice.asmx?WSDL
    Womgen\Womgen::GenerateModels('auxies/geoipservice.wsdl');
    