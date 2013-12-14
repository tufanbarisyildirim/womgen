<?php
    include 'config.php';
    $webserviceLibraryFolder = dirname(__FILE__) . '/Webservice';
    Womgen\Womgen::GenerateModels('auxies/geoipservice.wsdl',$webserviceLibraryFolder);