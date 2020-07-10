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

$stime = microTimeFloat();
$smem  = usageMem();

echo $smem.PHP_EOL;
echo $smem / 1024;

