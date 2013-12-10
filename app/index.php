<?php
    spl_autoload_register('womgen_autoload');

    function womgen_autoload($ClassName)
    {
        if(is_file($file = 'lib/' . $ClassName)) 
            include $ClassName;
    }