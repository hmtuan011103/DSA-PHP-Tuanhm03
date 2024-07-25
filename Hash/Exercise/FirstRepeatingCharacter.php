<?php

function solution($string): int
{
    $count = [];
    for ($i = 0; $i < strlen($string); $i++) {
        $key = $string[$i];
        if (isset($count[$key])) {
            $count[$key]++;
        } else {
            $count[$key] = 1;
        }
    }

    for ($i = 0; $i < strlen($string); $i++) {
        if ($count[$string[$i]] > 1) {
            return $count[$string[$i]];
        }
    }

    return -1;
}

$string = 'swiss';

echo "\n";
echo "Solution hashmap";
echo "\n";
echo solution($string);