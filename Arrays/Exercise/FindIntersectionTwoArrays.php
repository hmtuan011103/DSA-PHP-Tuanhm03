<?php

function findIntersection($arr1, $arr2): array
{
    $n1 = count($arr1);
    $n2 = count($arr2);

    $newArray = [];

    for ($i = 0; $i < $n1; $i++) {
        for ($j = 0; $j < $n2; $j++) {
            if ($arr1[$i] === $arr2[$j]) {
                $newArray[] = $arr1[$i];
            }
        }
    }

    return $newArray;

}

$arr1 = [1,2,3,4];
$arr2 = [3,4,5,6];
print_r(findIntersection($arr1, $arr2));