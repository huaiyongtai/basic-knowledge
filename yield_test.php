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
    echo __LINE__;
    yield 1;
}

$stime = microTimeFloat();
$smem  = usageMem();


$gen = gen();
var_dump($gen->current()); exit;


echo $smem.PHP_EOL;
echo $smem / 1024 / 1024;

