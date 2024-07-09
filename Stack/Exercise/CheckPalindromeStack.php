<?php

function solution($string): bool
{
    $cleanedString = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $string));
    $cleanedLength = strlen($cleanedString);

    $stack = [];

    for ($i = 0; $i < floor($cleanedLength / 2); $i++) {
        $stack[] = $cleanedString[$i];
    }

    $start = ceil($cleanedLength / 2);

    for ($i = (int) $start; $i < $cleanedLength; $i++) {
        if (array_pop($stack) !== $cleanedString[$i]) {
            return false;
        }
    }

    return true;
}

$input1 = "dad";
$input2 = "A man, a plan, a canal: Panama";
$input3 = "Hello, world!";
$input4 = "1221";
$input5 = "12345";

solution($input4);

echo "Input 3: \"$input4\" => " . (solution($input4) ? 'True' : 'False') . "\n";
