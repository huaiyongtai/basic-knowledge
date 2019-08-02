<?php


function random($length)
{
    $url = 'https://suijimimashengcheng.51240.com/web_system/51240_com_www/system/file/suijimimashengcheng/get/';
    $args = [
        'dx' => 'true', //大写字母 -- 大写
        'xx' => 'true', //小写字母 -- 小
        'sz' => 'true', //数字     -- 数字
        'fh' => 'true', //特殊字符 -- 符号
        'fh_value' => '!@#$%25%5E&*',
        'cd' => $length,
        'ajaxtimestamp' => time() . rand(100, 999),
    ];

    $urlQuest = "$url?" . http_build_query($args);
    $res = file_get_contents($urlQuest);
    $doc = new DOMDocument($res);

    $error = libxml_use_internal_errors(true);

    $doc->loadHTML($res);

    libxml_use_internal_errors($error);

    $ele = $doc->getElementById('ss_mmscjg');
    $scret = $ele->getAttribute('value');

    if (strlen($scret) != $length) {
        return random($length);
    }

    return $scret;
}


$ascCodes = [];
$ascCodes = array_merge($ascCodes, range(49, 57));
$ascCodes = array_merge($ascCodes, range(97, 122));
$ascCodes = array_merge($ascCodes, range(65, 90));

$args = $_SERVER['argv'];
$length = isset($args[1]) && (int)$args[1] == $args[1] ? $args[1] : 8;
foreach ($ascCodes as $code) {
    $key = chr($code);
    $value = random($length);
    echo "'{$key}' => '{$value}'\n";
}
exit;
