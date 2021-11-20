<?php

function dd($p = [])
{
    echo '<pre>';
    print_r($p);
    echo '</pre>';
    die();
}
function redirect($url)
{
    header('Location: ' . $url);
}
function getCurrentDate($format = 'Y-m-d H:i:s')
{
    date_default_timezone_set('America/Cuiaba');
    return date($format);
}
function convertData($data, string $format = 'd/m/Y H:i:s')
{
    return date($format, strtotime($data));
}
