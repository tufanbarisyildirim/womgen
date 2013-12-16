<?php
    include 'config.php';
    $webserviceLibraryFolder = dirname(__FILE__) . '/Webservice';
    //::GenerateModels('auxies/geoipservice.wsdl',$webserviceLibraryFolder);
    
    $generator = new Womgen\Womgen('auxies/geoipservice.wsdl');
    $generator->GenerateModels($webserviceLibraryFolder);