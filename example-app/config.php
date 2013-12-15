<?php
    spl_autoload_register('womgen_autoload');

    function womgen_autoload($className)
    {
        if(is_file($file = $className . '.php'))
            include $className;

        else if(is_file($file = '../src/' . $className . '.php')) 
            include $file;
}