<?php
    include 'config.php';
    $webserviceLibraryFolder = dirname(__FILE__) . '/Webservice';
    
    $generator = new Womgen\Womgen('auxies/ebhs.wsdl');
    $generator->GenerateModels($webserviceLibraryFolder);
    
    $generator = new Womgen\Womgen('auxies/geoipservice.wsdl');
    $generator->GenerateModels($webserviceLibraryFolder);