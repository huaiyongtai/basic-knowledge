<?php


function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
$stime = microtime_float();

echo time().PHP_EOL;
echo $stime;
