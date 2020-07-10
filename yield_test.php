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
    exit;
    yield 1;
}

$stime = microTimeFloat();
$smem  = usageMem();


$gen = gen();
var_dump($gen); exit;


echo $smem.PHP_EOL;
echo $smem / 1024 / 1024;

