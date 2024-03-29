<?php

function consoleLog($msg)
{
    $parseMsg = json_encode($msg, JSON_HEX_TAG);
    $consoleMsg = "console.log({$parseMsg})";
    return $consoleMsg;
}

function formatArr($arr)
{
    // $newArr = var_dump($arr);
    // return $newArr;
    if ($arr === null) {
        return;
    }

    foreach ($arr as $a) {
        echo '<pre>';
        var_dump($a);
        echo '</pre>';
    }
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function check($key)
{
    return App\Session::get($key) ?: false;
}

function old($key)
{
    return App\Session::get('OLD', $key) ?: false;
}

function eHandler($code = 404)
{
    http_response_code($code);
    // Add Default View if the Provided Code Doesn't Have One
    viewPath("{$code}.php");
    exit();
}

function validate($x, $y)
{
    if ($x !== $y) {
        eHandler(403);
    }
    return true;
}

function thisClass($uri)
{
    $whiteText = 'bg-gray-900 text-white';
    $grayText = 'text-gray-300';

    return $_SERVER['REQUEST_URI'] === $uri ? $whiteText : $grayText;
}

function filterErr($arr, $x)
{
    foreach ($arr as $a) {
        foreach ($a as $k => $v) {
            if ($k === $x) {
                return $v;
            }
        }
    }
}

function toggleColor()
{
    // $greenText = 'text-green-500';
    $redText = 'text-red-600';

    // return $x === 'Success' ? $greenText : $redText;
    return $redText;
}