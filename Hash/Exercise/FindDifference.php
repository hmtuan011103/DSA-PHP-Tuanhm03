<?php

function solution($s, $t): string
{
    $count = [];
    for ($i = 0; $i < strlen($s); $i++) {
        $key = $s[$i];
        if(isset($count[$key])) {
            $count[$key]++;
        } else {
            $count[$key] = 1;
        }
    }

    for ($i = 0; $i < strlen($t); $i++) {
        $key = $t[$i];
        if(!isset($count[$key]) || $count[$key] === 0) {
            return $key;
        } else {
            $count[$key]--;
        }
    }

    return -1;
}

$s = 'abcd';
$t = 'abcdd';

echo "\n";
echo "Solution hashmap";
echo "\n";
echo solution($s, $t);