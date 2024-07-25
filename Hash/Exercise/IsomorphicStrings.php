<?php

function solution($s, $t): bool
{
    if (strlen($s) !== strlen($t)) {
        return false;
    }

    $mapST = [];
    $mapTS = [];

    for ($i = 0; $i < strlen($s); $i++) {
        $charS = $s[$i];
        $charT = $t[$i];

        if (isset($mapST[$charS]) && $mapST[$charS] !== $charT) {
            return false;
        }
        if (isset($mapTS[$charT]) && $mapTS[$charT] !== $charS) {
            return false;
        }

        $mapST[$charS] = $charT;
        $mapTS[$charT] = $charS;
    }

    return true;
}

$s = "egg";
$t = "add";

echo "\n";
echo "Solution hashmap";
echo "\n";
var_dump(solution($s, $t));