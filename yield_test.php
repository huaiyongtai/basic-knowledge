<?php


function microTimeFloat()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function usageMem()
{
    return memory_get_usage();
}


function gen() {
    echo __LINE__.PHP_EOL;
    yield 1;
    echo __LINE__.PHP_EOL;
}

$stime = microTimeFloat();
$smem  = usageMem();


$gen = gen();
var_dump(__LINE__, $gen->key());
var_dump(__LINE__, $gen->current()); exit;


echo $smem.PHP_EOL;
echo $smem / 1024 / 1024;

