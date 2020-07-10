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


function gen($a) {
    echo __LINE__.__FUNCTION__.$a.PHP_EOL;
    yield $a++;
    echo __LINE__.__FUNCTION__.$a.PHP_EOL;
}

$stime = microTimeFloat();
$smem  = usageMem();


$gen = gen(1);
echo "++++++++++++FOREACH+++++++++++".PHP_EOL;
foreach ($gen as $key => $val) {
    var_dump(__LINE__, $key, $val);
}
exit;

echo $smem.PHP_EOL;
echo $smem / 1024 / 1024;

