<?php

/**
 * created by Ulises J. Cornejo Fandos in 17/03/2017
 */

spl_autoload_register('__kernel_autoload');
spl_autoload_register('__models_autoload');
spl_autoload_register('__functions_autoload');

//------------------------------------------------
function __kernel_autoload($exec)
{
    $exec = 'core/kernel/'. $exec .'.php';
    if (is_readable($exec)) {
        require_once($exec);
    }
}

function __function_autoload($function)
{
    $function = 'core/bin/functions/'. $function .'.php';
    if (is_readable($function)) {
        require_once($function);
    }
}

function __model_autoload($model)
{
    $model = 'core/models/'. $model .'.php';
    if (is_readable($model)) {
        require_once($model);
    }
}

function __functions_autoload($functions)
{
    foreach ($functions as $function) {
        __function_autoload($function);
    }
}

function __models_autoload($models)
{
    foreach ($models as $model) {
        __model_autoload($model);
    }
}
