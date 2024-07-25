<?php

function findUnion(array $array1, array $array2): array {
    $union = [];
    $array1Size = count($array1);
    $array2Size = count($array2);

    // Add all elements from the first array to the union array
    for ($i = 0; $i < $array1Size; $i++) {
        $union[] = $array1[$i];
    }

    // Add elements from the second array to the union array if they are not already present
    for ($j = 0; $j < $array2Size; $j++) {
        $isPresent = false;
        for ($k = 0; $k < count($union); $k++) {
            if ($array2[$j] === $union[$k]) {
                $isPresent = true;
                break;
            }
        }
        if (!$isPresent) {
            $union[] = $array2[$j];
        }
    }

    return $union;
}

$arr1 = [1,2,3,4];
$arr2 = [3,4,5,6];
print_r(findUnion($arr1, $arr2));