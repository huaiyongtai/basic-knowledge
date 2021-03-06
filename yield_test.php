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
    echo __LINE__.":".__FUNCTION__.":$a".PHP_EOL;
    yield ++$a;
    echo __LINE__.":".__FUNCTION__.":$a".PHP_EOL;
    yield ++$a;
    echo __LINE__.":".__FUNCTION__.":$a".PHP_EOL;
}

function gen1($a) {
    echo __LINE__.":".__FUNCTION__.":$a".PHP_EOL;
    yield $a+100 => 'gen1-test';
    exit;
    $a += yield ++$a;
}

$stime = microTimeFloat();
$smem  = usageMem();


echo "++++++++++++START+++++++++++".PHP_EOL;
$gen = gen1(1);
echo "++++++++++++FOREACH+++++++++++".PHP_EOL;
foreach ($gen as $key => $val) {
    echo __LINE__. ":$key => $val".PHP_EOL;
    exit;
}
exit;

echo $smem.PHP_EOL;
echo $smem / 1024 / 1024;

