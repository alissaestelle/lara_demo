<?php

function consoleLog($msg)
{
    $parseMsg = json_encode($msg, JSON_HEX_TAG);
    $consoleMsg = "console.log({$parseMsg})";
    return $consoleMsg;
}

function formatArr($arr)
{
    $newArr = var_dump($arr);
    return $newArr;
}

function eHandler($code)
{
    http_response_code($code);
    // include $e;
    return include "views/{$code}.php";
}

function thisClass($uri)
{
    $whiteText = 'bg-gray-900 text-white';
    $grayText = 'text-gray-300';

    return $_SERVER['REQUEST_URI'] === $uri ? $whiteText : $grayText;
} ?>
