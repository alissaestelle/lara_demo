<?php

function formatArr($arr)
{
    $cleanArr = var_dump($arr);
    return $cleanArr;
}

function thisClass($uri)
{
    $whiteText = 'bg-gray-900 text-white';
    $grayText = 'text-gray-300';

    return $_SERVER['REQUEST_URI'] === $uri ? $whiteText : $grayText;
} ?>
