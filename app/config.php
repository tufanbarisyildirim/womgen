<?php
    spl_autoload_register('womgen_autoload');

    function womgen_autoload($className)
    {
        if(is_file($className))
            include $className;

        else if(is_file($file = '../src/' . $className)) 
            include $file;
}